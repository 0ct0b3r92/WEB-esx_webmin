@extends("Themes.AdminLTE.layouts.master")
@section("content")
    <section class="content-header">
        <h1>
            Nous Rejoindre
            <small>Forumulaire de candidature</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route("home") }}"><i class="fa fa-home"></i> Accueil</a></li>
            <li class="active">Candidature Whitelist</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box center-block">
            <div class="box-header with-border">
                <h3 class="box-title text-center">Merci {{ Auth::user()->username }}, pour votre candidature!</h3>
            </div>
            <div class="box-body">

                Notre équipe analysera votre demande vous serez automatiquement prevenu de la desisions<br>

                Voici un résumer de votre candidature : <br>
                <dl class="dl-horizontal">
                    <dt>Nom complet</dt>
                    <dd>{{ $Whitelist->rpname }}</dd>
                    <dt>Ancienne ville</dt>
                    <dd>{{ $Whitelist->town }}</dd>
                    <dt>Date de naissance</dt>
                    <dd>{{ $Whitelist->birthday }}</dd>
                    <dt>Vos Experiance RP.</dt>
                    <dd>{{ $Whitelist->experiance }}</dd>
                    <dt>Votre Histoire</dt>
                    <dd>{!! $Whitelist->history !!}</dd>
                </dl>
            </div>
        </div>

    </section>
@stop