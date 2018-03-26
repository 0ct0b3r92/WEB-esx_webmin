@extends('Website.layouts.master')

@section('body-class','blog-style blog-page blog-isotope')

@section('title')

    @if(isset($category))
        Categorie : {{ $category->name }}
    @elseif(isset($user))
        Autheur : {{ $user->username }}
    @else
        Journal de la ville
    @endif

    @if(request()->query('page') > 1)
        Page {{ request()->query('page') }}
    @endif

@endsection

@section('content')
    <!-- main slider -->
    <div class="container-fluid jobs no-padding">
        <div class="slider col-lg-12">
            <h1>Journal de Arcadia</h1>
            <p>

                @if(isset($category))
                    Categorie : <span class="tags">{{ $category->name }}</span>
                @elseif(isset($user))
                    Nouvelle crée par : <span class="tags">{{ $user->username }}</span>
                @else
                    Les nouvelles les plus populaire!
                @endif
                @if(request()->query('page') > 1)
                    Page {{ request()->query('page') }}
                @endif

            </p>
        </div>
    </div>

    @include('Website.layouts.tickers')

    <section class="content-wrapper container-fluid no-padding">
        <div class="container main-wrapper">
            <div class="col-lg-12 main-content">
                <section class="latest-news">

                    @foreach($Posts as $post)
                    <!-- single post news -->
                    <div class="isotope-wrapper">
                        <div class="single-post">
                            <div class="thumbnail-wrapper">
                                <a href="{{route("posts.show",$post->slug)}}" class="single-post-img"><img src="{{asset($post->images)}}" alt="thumb"></a>
                            </div>
                            <div class="single-post-content">
                                <h2 class="news-title"><a href="{{route("posts.show",$post->slug)}}">{{$post->name}}</a></h2>
                                <p class="post-meta">
                                    <img src="{{$post->Author->avatar}}" alt="author"> <i class="fa fa-user"></i>  <a href="{{  route('posts.author', $post->Author->id) }}">{{ $post->Author->username }}</a> <i>|</i>
                                    <a href="{{  route('posts.category', $post->Category->slug) }}"><i class="fa fa-tags"></i> {{ $post->Category->name }}</a> <i>|</i>
                                    <a href="{{  route('posts.show', $post->slug) }}"><i class="fa fa-comments"></i> {{ $post->Comments->count() }} Commentaires</a> <i>|</i>
                                    <i class="fa fa-calendar"></i> @if($post->updated_at != $post->created_at) Mise a jour {{ $post->updated_at->diffforhumans() }}@else Publié {{ $post->created_at->diffforhumans() }} @endif
                                </p>
                                <p class="post-text">{!! $post->getExcerpt() !!}</p>
                                <a class="button-medium" href="{{route("posts.show",$post->slug)}}" >Lire Plus</a>
                            </div>
                        </div>
                        <hr class="section-divider">
                    </div>
                    @endforeach

                </section>



                <div class="pagination">
                    {{$Posts->links('pagination.bootstrap-4')}}
                </div>
            </div>

        </div>


    </section>
@endsection