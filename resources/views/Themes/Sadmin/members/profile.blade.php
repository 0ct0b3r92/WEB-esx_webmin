@extends('Themes.Sadmin.app')
@section('content')
    <header class="content__title">
        <h1>Profil de : {{ $Member->username }}</h1>
    </header>

    <div class="card profile">
        <div class="profile__img">
            <img src="{{ $Member->avatar }}" alt="">
        </div>

        <div class="profile__info">
            <h3>{{ $Member->username }}</h3>
            <ul class="icon-list">
                <li><i class="fa fa-user"></i>@if($Member->whitelisted == 1)<span class="badge badge-success">Whitelisted</span>@else<span class="badge badge-warning">Whitelist en attente</span>@endif</li>
                <li><i class="fa fa-calendar"></i>Membre depuis : {{ $Member->created_at->toFormattedDateString() }}</li>
            </ul>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-6 col-xs-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Vos derniers messages</h4>
                    <h6 class="card-subtitle">Liste des derniere messages de notre éuipe</h6>

                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jhon</td>
                            <td>Victor</td>
                            <td>@victor</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Larry the Bird</td>
                            <td>David</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-lg-6 col-xs-12">
            <div class="card widget-profile">
                <div class="card-body">
                    <div class="text-center">
                        <h2 class="card-title">@if(!empty($Member->Player->firstname)) {{ $Member->Player->firstname . " - " . $Member->Player->lastname }}@else Aucun Personnage @endif</h2>
                    </div>

                    <div class="actions actions--inverse">
                        <div class="actions__item">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="" class="dropdown-item">Refresh</a>
                                <a href="" class="dropdown-item">Manage Widgets</a>
                                <a href="" class="dropdown-item">Settings</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="widget-profile__list">
                    <div class="media">
                        <div class="avatar-char"><i class="zmdi zmdi-phone"></i></div>
                        <div class="media-body">
                            <strong>@if(!empty($Member->Player)) #{{ $Member->Player->phone_number }}@else Aucun numéro @endif</strong>
                            <small>Numero de telephone</small>
                        </div>
                    </div>
                    <div class="media">
                        <div class="avatar-char"><i class="zmdi zmdi-money"></i></div>
                        <div class="media-body">
                            <strong>@if(!empty($Member->Player)) {{ number_format($Member->Player->bank, 2, ',', ' ') }}$ @else Aucun compte en banque @endif</strong>
                            <small>Compte en banque</small>
                        </div>
                    </div>
                    <div class="media">
                        <div class="avatar-char"><i class="fa fa-building-o"></i></div>
                        <div class="media-body">
                            <strong>@if(!empty($Member->Player)) {{ $Member->Player->Job->label }} @else Aucun emploi @endif </strong>
                            <small>Emploi</small>
                        </div>
                    </div>


                    <div class="p-3"></div>
                </div>
            </div>
        </div>

    </div>

@endsection