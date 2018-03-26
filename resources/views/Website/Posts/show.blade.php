@extends('Website.layouts.master')
@section('body-class','blog-style single-post-page teams-page forum forum-general forum-topic')
@section('content')
    <div class="container-fluid no-padding" style="background: url({{asset($post->images)}}) top no-repeat">
        <div class="slider col-lg-12">
            <h1>{{$post->name}}</h1>
        </div>
    </div>

    @include('Website.layouts.tickers')
    <section class="content-wrapper container-fluid no-padding">

        <section class="container main-content-wrapper">

            <div class="ccol-lg-12 no-padding">

                <div class="blog-post">
                    
                    <div class="blog-info">
                        <p class="post-meta">
                            <img src="{{$post->Author->avatar}}" alt="author"> <i class="fa fa-user"></i>  <a href="{{  route('posts.author', $post->Author->id) }}">{{ $post->Author->username }}</a> <i>|</i>
                            <a href="{{  route('posts.category', $post->Category->slug) }}"><i class="fa fa-tags"></i> {{ $post->Category->name }}</a> <i>|</i>
                            <a href="{{  route('posts.show', $post->slug) }}"><i class="fa fa-comments"></i> {{ $post->Comments->count() }} Commentaires</a> <i>|</i>
                            <i class="fa fa-calendar"></i> @if($post->updated_at != $post->created_at) Mise a jour {{ $post->updated_at->diffforhumans() }}@else Publié {{ $post->created_at->diffforhumans() }} @endif
                        </p>
                    </div>

                    <div class="blog-content">
                        {!! $post->html !!}
                    </div>
                </div>
                <div class="clearfix"></div>

                <hr class="section-divider">

                <ul class="forums-list no-padding">

                    @foreach($comments as $comment)
                    <li class="forum-body">
                        <div class="reply-header">
                            <span>{{$comment->created_at->diffforhumans()}}</span>

                            @if(Auth::User()->id == $comment->user_id || Auth::user()->isAdmin)
                                <a data-comment="{{ $comment->id }}" class="delete btn btn-xs btn-danger" href="#">Supprimer</a>
                            @endif
                        </div>

                        <ul class="forum-single">

                            <li class="reply-author">
                                <a> <img class="img-rounded" src="{{$comment->Author->avatar}}" alt="avatar"></a>
                                <br>
                                <a>{{$comment->Author->username}}</a>
                                <br>
                                <p class="author-role">{!! $comment->Author->RoleBadge !!}</p>
                            </li>
                            <li class="reply-content">
                                {!! $comment->html!!}
                            </li>

                        </ul>
                    </li>
                    @endforeach
                    @if(Auth::check())
                    <form method="post" action="{{ route('posts.addComment', $post->slug) }}" id="commentform">
                        {{ csrf_field() }}

                        <input name="user_id" value="{{Auth::User()->id}}" hidden>

                        <input name="post_id" value="{{$post->id}}" hidden>

                        <li class="forum-body">
                            <div class="reply-header"><span>Laisser un commentaire</span></div>

                            <ul class="forum-single">
                                <li class="reply-author">
                                    <a href="{{ route('profile.index')}}"> <img class="img-rounded" src="{{Auth::User()->avatar}}" alt="avatar"></a>
                                    <br>
                                    <a href="{{ route('profile.index')}}">{{Auth::User()->username}}</a>
                                    <br>
                                    <p class="author-role">
                                        {!! Auth::User()->RoleBadge !!}
                                    </p>
                                </li>
                                <li class="reply-content">
                                    <div class="form-section">
                                        <textarea placeholder="Laisser un commentaire..." id="comment" name="comment" cols="45" rows="8" tabindex="6"></textarea>
                                    </div>
                                </li>
                            </ul>
                            <div class="form-submit">
                                <input id="submit" name="submit" class="button-small button-green" type="submit" value="Commenter" tabindex="7">
                            </div>
                        </li>
                    </form>
                    @endif
                </ul>




            </div>

        </section>


    </section>
@endsection