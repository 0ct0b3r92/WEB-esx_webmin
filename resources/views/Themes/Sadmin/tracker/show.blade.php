@extends("Themes.Sadmin.app")
@section("content")
    <div class="content__inner q-a">
        <div class="q-a__question">
            <h2>{{ $Bug->title }}</h2>
            {!! $Bug->content !!}

            <div class="tags mt-4">
                <div class="tags__body">

                    <a href="{{ route('bugsTraker.type',['slug' => $Bug->Type->slug ]) }}">{{ $Bug->Type->name }}</a>

                </div>
            </div>

            <div class="q-a__info">
                <div class="q-a__op">
                    <a href=""><img src="{{ $Bug->Member->avatar }}" alt=""></a>
                    <span>Publié par {{ $Bug->Member->username }}, {{ $Bug->created_at->diffforhumans() }}</span>
                </div>

            </div>
        </div>
    </div>

    <div class="content__inner content__inner--sm">
        <div class="card">
            <div class="toolbar toolbar--inner">
                <div class="toolbar__label">Commentaires</div>

                <nav class="toolbar__nav ml-auto hidden-sm-down">
                    {{ $Bug->Comment->count() }} <i class="zmdi zmdi-comment"></i>
                </nav>
            </div>

            <div class="listview listview--bordered listview--block">
                @foreach($Bug->Comment as $Comment)
                <div class="listview__item">

                    {{ $Comment->content }}

                    <div class="q-a__info">
                        <div class="q-a__op">
                            <a href="{{ route('members.profile', ['id' => $Comment->Member->id]) }}"><img src="{{ $Comment->Member->avatar }}" alt="">
                            <span>{{ $Comment->Member->username }}</span></a>
                        </div>

                        <div class="actions hidden-sm-down">
                            <div class="actions__item">
                                <div class="icon-toggle">
                                    <input type="checkbox">
                                    <i class="zmdi zmdi-thumb-up"></i>
                                </div>
                            </div>

                            <div>
                                10
                            </div>

                            <div class="actions__item">
                                <div class="icon-toggle">
                                    <input type="checkbox">
                                    <i class="zmdi zmdi-thumb-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


                @if(!$Bug->status)
                <div class="listview__item">
                    <form method="POST">
                        <div class="form-group">
                            <textarea class="form-control" name="content" placeholder="Ecrire un commentaire"></textarea>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="tracker_id" value="{{ $Bug->id }}">
                            {{ csrf_field() }}
                            <i class="form-group__bar"></i>
                        </div>

                        <button type="submit" class="btn btn-light">Commenter</button>
                    </form>
                </div>
                @endif
                <div class="p-1"></div>
            </div>
        </div>
    </div>
@endsection