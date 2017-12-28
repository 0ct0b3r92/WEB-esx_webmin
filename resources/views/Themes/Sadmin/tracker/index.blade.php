@extends("Themes.Sadmin.app")

@section("content")
    <header class="content__title">
        <h1>Issue Tracker</h1>
    </header>

    <div class="card">
        <div class="toolbar toolbar--inner">
            <div class="toolbar__nav">
                <a class="{{ isActiveRoute('bugsTraker.index') }}" href="">Opened 25</a>
                <a class="hidden-sm-down {{ isActiveRoute('bugTracker.answer') }}" href="">Responded 30</a>
                <a class="{{ isActiveRoute('bugTracker.close') }}" href="">Closed 19</a>
            </div>

            <div class="actions">
                <a href="{{ route('bugsTraker.create') }}" data-toggle="tooltip" data-title="Ajouter une suggestion ou un bug" class="actions__item zmdi zmdi-plus"></a>
            </div>
        </div>

        <div class="listview listview--bordered issue-tracker">

            @foreach($Bugs as $Bug)
            <div class="listview__item">
                <img src="{{ $Bug->Member->avatar }}" class="listview__img hidden-sm-down" alt="">

                <div class="listview__content text-truncate text-truncate">
                    <a class="listview__heading" href="{{ route('bugsTraker.show',['id' => $Bug->id, 'categories' => $Bug->type->slug ]) }}">{{ $Bug->title }}</a>
                    <p>Posté par {{ $Bug->Member->username }}</p>
                </div>

                <div class="issue-tracker__item">
                    <span class="issue-tracker__tag {{ $Bug->Type->type }}">{{ $Bug->Type->name }}</span>
                </div>

                <div class="issue-tracker__item hidden-lg-down">
                    <i class="zmdi zmdi-time"></i>{{ $Bug->updated_at->diffforhumans() }}
                </div>

                <div class="issue-tracker__item hidden-lg-down">
                    <i class="zmdi zmdi-comment-alt"></i> {{ $Bug->Comment->count() }}
                </div>

                <div class="issue-tracker__item actions">
                    <div class="dropdown actions__item">
                        <i class="zmdi zmdi-more-vert" data-toggle="dropdown"></i>

                        <div class="dropdown-menu dropdown-menu-right dropdown-menu--active dropdown-menu--icon">
                            <a href="" class="dropdown-item"><i class="zmdi zmdi-close"></i>Fermer</a>
                            <a href="" class="dropdown-item"><i class="zmdi zmdi-edit"></i>Modifier</a>
                            <a href="" class="dropdown-item"><i class="zmdi zmdi-delete"></i>Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


            <div class="clearfix m-4"></div>
        </div>
    </div>
@endsection