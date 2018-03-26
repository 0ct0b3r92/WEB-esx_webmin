@extends('Website.layouts.master')
@section('body-class','single-match-page single-team-page custom-profile')
@section('title', $member->username)
@section('content')

    @include('Website.layouts.tickers')

    <div class="container-fluid main-slider no-padding">
        <div class="slider">
            <div class="container">
                <div class="team-a team-b">
                    <div class="team-img">
                        <a ><img class="img-rounded" src="{{ $member->avatar }}">
                            <p class="text-center">{{ $member->username }}</p>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="top-divider"></div>
    <section class="content-wrapper container-fluid no-padding">

        <div class="container no-padding">
            <div class="main-content col-lg-8">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <!-- content title -->
                <div class="main-content-title">
                    <h3><i class="fa fa-bullhorn"></i>Candidature</h3>
                </div>
                <div class="blog-content">
                        {!! $member->StatusWl->history !!}
                </div>
            </div>
            <div class="sidebar col-lg-4">

                <!-- content title -->
                <div class="main-content-title">
                    <h3><i class="fa fa-info-circle"></i> Information </h3>
                </div>

                <ul class="about-profile-list">
                    <li>
                        <strong>Pseudo :</strong> {{ $member->username }}
                    </li>

                    <li><strong>Candidature :</strong> {!! $member->StatusWL->StatusBadge !!}</li>

                    <li>
                        <strong>Rejoins :</strong> {{ $member->created_at->diffforhumans() }}
                    </li>
                </ul>

                @if($member->Player)
                <!-- content title -->
                <div class="main-content-title">
                    <h3><i class="fa fa-info-circle"></i> Information RP</h3>
                </div>

                <ul class="about-profile-list">

                    <li><strong>Nom :</strong> {{ $member->Player->Fullname }}</li>

                    <li><strong>Age :</strong> {{ $member->StatusWL->Age }} ans</li>

                    @if($member->Player)
                    <li><strong>Emploi :</strong> <a href="{{route('jobs.show',$member->Player->Job->name)}}"> {{ $member->Player->Job->label}} - {{ $member->Player->JobGrade->label}}</a> </li>

                    <li><strong>Compte en banque :</strong> {{ $member->Player->MoneyTotal}}</li>
                    @endif
                </ul>
                @endif


            </div>
        </div>

    </section>
@endsection