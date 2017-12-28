@extends("Themes.Sadmin.app")
@section('content')
    <header class="content__title">
        <h1>Contacts</h1>

        <div class="actions">
            <a href="" class="actions__item zmdi zmdi-trending-up"></a>
            <a href="" class="actions__item zmdi zmdi-check-all"></a>

            <div class="dropdown actions__item">
                <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="" class="dropdown-item">Refresh</a>
                    <a href="" class="dropdown-item">Manage Widgets</a>
                    <a href="" class="dropdown-item">Settings</a>
                </div>
            </div>
        </div>
    </header>

    <div class="toolbar">
        <nav class="toolbar__nav">
            <a class="active" href="">Following</a>
            <a href="groups.html">Groups</a>
        </nav>

        <div class="actions">
            <i class="actions__item zmdi zmdi-search" data-sa-action="toolbar-search-open"></i>

            <div class="dropdown actions__item hidden-xs-down">
                <i class="zmdi zmdi-more-vert" data-toggle="dropdown"></i>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="" class="dropdown-item">Refresh</a>
                    <a href="" class="dropdown-item">Delete</a>
                    <a href="" class="dropdown-item">Settings</a>
                </div>
            </div>
        </div>

        <div class="toolbar__search">
            <input type="text" placeholder="Rechercher...">

            <i class="toolbar__search__close zmdi zmdi-long-arrow-left" data-sa-action="toolbar-search-close"></i>
        </div>
    </div>

    <div class="contacts row">
        @foreach($Members as $Member)
        <div class="col-xl-2 col-lg-3 col-sm-4 col-6">
                <div class="contacts__item">
                    <a href="{{ route('members.profile', ['id' => $Member->id]) }}" class="contacts__img">
                        <img src="{{$Member->avatar}}" alt="Avatar de {{ $Member->username }}">
                    </a>

                    <div class="contacts__info">
                        <strong>{{ $Member->username }}</strong>
                        <small>Inscrit : {{ $Member->created_at->diffforhumans() }}</small>
                    </div>

                    <a href="{{ route('members.profile', ['id' => $Member->id]) }}" class="contacts__btn btn btn-info btn-sm">Profil</a>
                    @if($Member->Player && !$Member->owner)<button type="button" class="contacts__btn btn btn-danger btn-sm">Bannir</button>@endif
                </div>
        </div>
        @endforeach
    </div>
@endsection
