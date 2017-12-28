@extends('Themes.Sadmin.app')
@section('content')
    <header class="content__title">
        <h1>
            @if($Whitelist->status == 1)
                <span class="badge badge-success">Validé par {{ $Whitelist->Admin->username }}</span>
            @elseif($Whitelist->status == 2)
                <span class="badge badge-danger">Refusé par {{ $Whitelist->Admin->username }}</span>
            @else
                <span class="badge badge-warning">En Attente</span>
            @endif

            Candidature de : {{ $Whitelist->rpname }}</h1>
        <small>Poster {{ $Whitelist->created_at->diffforhumans() }}</small>

        @if(Auth::user()->owner)
        <div class="actions">
            @if($Whitelist->status != 1 )
            <a data-user="{{ $Whitelist->Member->id }}" data-validateBy="{{ Auth::user()->id }}" class="accepte actions__item zmdi zmdi-check btn-success"></a>
            @endif
            <a data-user="{{ $Whitelist->Member->id }}" data-validateBy="{{ Auth::user()->id }}" class="refuse actions__item zmdi zmdi-close btn-danger"></a>
        </div>
        @endif

    </header>

    <div class="card profile">
        <div class="profile__img">
            <img src="{{ $Whitelist->Member->avatar }}" alt="">
        </div>

        <div class="profile__info">
            <h3>{{ $Whitelist->Member->username }}</h3>
            <ul class="icon-list">
                <li><i class="zmdi zmdi-pin"></i>{{ $Whitelist->town }}</li>
                <li><i class="fa fa-calendar"></i>{{ $Whitelist->birthday->toFormattedDateString()}}</li>
                <li><i class="fa fa-user"></i>{{ isset($Whitelist->invited_by) ? 'Invité par : ' . $Whitelist->Parrain->username : 'Aucune Invitation' }}</li>
            </ul>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <h4 class="card-body__title mb-4">Histoire RP</h4>
            {!! $Whitelist->history !!}
            <br>
        </div>
    </div>
@endsection