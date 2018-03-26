<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Comment;
use App\Posts;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $per_page = 9;
    public function index(){
        $Posts = Posts::with('Category', 'Author')->orderBy("updated_at",'DESC')->paginate($this->per_page);
        return view('Website.Posts.isotope', compact('Posts'));
    }

    public function category($slug)
    {
        $category = Categories::where('slug', $slug)->first();
        $Posts = Posts::with('Category', 'Author','Comments')
            ->where('categories_id', $category->id)
            ->orderBy("updated_at",'DESC')
            ->paginate($this->per_page);
        return view('Website.Posts.isotope', compact('Posts', 'category'));
    }


    public function author($user)
    {
        $user = User::where('id',$user)->first();
        $Posts = Posts::with('Category', 'Author','Comments')
            ->where('user_id', $user->id)
            ->orderBy("updated_at",'DESC')
            ->paginate($this->per_page);
        return view('Website.Posts.isotope',compact('Posts', 'user'));
    }

    public function show($slug)
    {
        $post = Posts::where('slug', $slug)->with('Category', 'Author','Comments')->first();
        $posts = Posts::where('categories_id', $post->categories_id)->limit(5)->with('Category', 'Author','Comments')->get();
        $comments = Comment::where('post_id',$post->id)->orderBy('created_at','DESC')->with('Author')->get();
        return view('Website.Posts.show', compact('post', 'comments','posts'));
    }

    public function addComment(Request $request, $slug){
        $Comment = new Comment();
        $Comment->post_id = $request->input('post_id');
        $Comment->user_id = $request->input('user_id');
        $Comment->content = $request->input('comment');
        $Comment->save();
        return redirect(route('posts.show',$slug));
    }


}
