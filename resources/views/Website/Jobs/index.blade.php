@extends('Website.layouts.master')

@section('body-class', 'blog-style teams-page')

@section('title','Nos Entreprises')

@section('content')
    <!-- main slider -->
    <div class="container-fluid jobs no-padding">
        <div class="slider col-lg-12">
            <h1>Nos Emplois</h1>
            <strong>Choisie un emplois et construit ta vie de reve!</strong>
        </div>
    </div>

    @include('Website.layouts.tickers')

    <!-- page content wrapper -->
    <section class="content-wrapper container-fluid no-padding">
        <div class="container main-wrapper">
            <!-- content title -->
            <div class="main-content-title">
                <h3><i class="fa fa-gamepad"></i> Liste de nos emplois</h3>
            </div>

            <ul class="teams-list">

                @foreach($Jobs as $Job)
                <li class="single-team">
                    <div class="team-avatar"><a href=""><img width="50" height="50" src="{{ $Job->image }}"></a></div>
                    <div class="team-info">
                        <a href="{{ route('jobs.show', [ 'job' => $Job->name ]) }}" class="team-title">{{ $Job->label }}</a>
                        <span class="members">@if($Job->whitelisted)<span style="color: red">Candidature Seulement</span> - @endif {{ $Job->Players->count() }} Employé</span>
                    </div>
                </li>
                @endforeach

            </ul>

        </div>
    </section>
@endsection