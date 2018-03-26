<?php

namespace App;

use App\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';
    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'content', 'category_id', 'user_id'];

    public function Author(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function Category(){
        return $this->belongsTo(Categories::class,'categories_id','id');
    }

    public function Comments(){
        return $this->hasMany(Comment::class,'post_id','id');
    }

    public function getHtmlAttribute() {
        return Markdown::parse(strip_tags($this->content));
    }

    public function getExcerpt($max_words = 100, $ending = "...") {
        $text = $this->html;
        $words = explode(' ', $text);
        if (count($words) > $max_words) {
            return implode(' ', array_slice($words, 0, $max_words)) . $ending;
        }
        return  Markdown::parse($text);
    }
}
