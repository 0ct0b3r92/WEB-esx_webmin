@extends("Website.layouts.master")

@section('body-class', 'landing')

@section("content")
    <!-- parallax image 3 -->
    <section class="container-fluid join-tournaments gta landing-tournaments-parallax parallax-img-3 ">

        <div class="fixed-wrapper">
            <div class="parallax-img-wrapper landing-img"></div>
        </div>

        <div class="col-lg-12 text-wrapper">
            <h2>Bienvenue en ville, Citoyens!</h2>
            <p>Rejoins nos fabuleux membres dans leur avanture a la conquête de la richesse, de la popularité et prend le controle de ton destins dans la ville de <span class="tags">Arcadia</span></p>
            <div class="button-wrapper">
                <p><a href="{{ route('whitelist.index') }}" class="button-medium"><i class="fa fa-id-card"></i> Demander mon Passport</a></p>
            </div>
        </div>
    </section>

    @include('Website.layouts.tickers')
    <div class="clearfix"></div>

    <!-- main content wrapper -->
    <section class="container-fluid content-wrapper no-padding">
        <!-- features -->
        <div class="container features ">
            <!-- single feature -->
            <div class="col-lg-4 single-feature">
                <div class="feature-icon-wrapper">
                    <span><i class="fa fa-users"></i></span>
                </div>
                <h2>Communauté</h2>
                <p>Communauté mature de <span class="tags">18+</span> dans un mode Strict RP additionné de Rôleplay semi-réaliste.</p>
            </div>

            <!-- single feature -->
            <div class="col-lg-4 single-feature">
                <div class="feature-icon-wrapper">
                    <span><i class="fa fa-gamepad"></i></i></span>
                </div>
                <h2>Évenements</h2>
                <p>Participe aux évenements lancer par notre gouvernement ou lance tes propres <span class="tags"> évenements</span></p>
            </div>

            <!-- single feature -->
            <div class="col-lg-4 single-feature">
                <div class="feature-icon-wrapper">
                    <span><i class="fa fa-rocket"></i></span>
                </div>
                <h2>GAME STUDIOS</h2>
                <p>Got a game or a project and a need a website? Create your portfolio today with Arcane, easy peasy!</p>
            </div>
        </div>

        <!-- join tournaments parallax section -->
        <section class="container-fluid join-tournaments">

            <div class="fixed-wrapper">
                <div class="parallax-img-wrapper discord"></div>
            </div>
            <div class="container">
                <div class="col-lg-8">
                    <h2>Rejoins la <span style="color: #fea801;">Radio de la ville</span> et discute avec nous!</h2>
                </div>
                <div class="col-lg-4 button-wrapper">
                    <p><a href="" class="button-medium" style="color: #494949"><i class="fa fa-microphone"></i> Rejoindre Discord</a></p>
                </div>
            </div>
        </section>

    </section>



@endsection