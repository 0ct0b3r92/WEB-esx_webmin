
@extends("Website.layouts.master")

@section('body-class','blog-style blog-page')

@section('content')

    <!-- main slider -->
    <div class="container-fluid events no-padding ">
        <div class="slider  col-lg-12">
            <h1></h1>
        </div>
    </div>

    @include('Website.layouts.tickers')

    <!-- page content wrapper -->
    <section class="content-wrapper container-fluid no-padding">
        <div class="container main-wrapper">
        <!-- tournaments -->
            <section class="tournaments container">
            <!-- content title -->
            <div class="main-content-title">
                <h3><i class="fa fa-gamepad"></i> Liste de nos évenements</h3>
            </div>

            @if(!$Events)
            <!-- single tournament -->
            <div class="col-lg-12  text-center">
                <h4>Aucun évenements a venir</h4>
                <div class="tournament-text">
                    <p><span>Rejoignez notre discord pour plus d'informations</span></p>
                </div>
            </div>
            @else
                <!-- single tournament -->
                <div class="col-lg-6 single-tournament">
                    <a href="single-tournament.html"><h4>esl 2016</h4></a>
                    <div class="tournament-image">
                        <a href="single-tournament.html"><img src="images/smite.jpg"></a>
                    </div>
                    <div class="tournament-text">
                        <p><span>Tournament Begins:</span> May 5, 2016, 9:00 pm</p>
                        <br>
                        <p><span>Maximum participants:</span> 100 teams</p>
                        <p><span>Current participants:</span> 4 teams</p>
                        <br>
                        <p class="tournament-prize"><span>Prize:</span> $5000, $2500, $1000, CS:GO T-Shirt</p>
                    </div>
                    <div class="tournament-join">
                        <a href="single-tournament.html">
                            <i class="fa fa-trophy"></i> Join!
                        </a>
                    </div>
                </div>
            @endif

        </section>
        </div>
    </section>
@endsection