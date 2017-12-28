@extends('Themes.Sadmin.app')
@section('content')
    <header class="content__title">
        <h1>Dashboard</h1>
        <small>Welcome to the unique SuperAdmin web app experience!</small>

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

    <div class="row quick-stats">
        <div class="col-sm-6 col-md-3">
            <div class="quick-stats__item">
                <div class="quick-stats__info">
                    <h2 id="onlinePlayers">N/A</h2>
                    <small>Joueurs en ligne</small>
                </div>
                <div class="quick-stats__chart peity-bar">0,0,0,0,7,0,0,0,9,15</div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="quick-stats__item">
                <div class="quick-stats__info">
                    <h2 >5245K</h2>
                    <small>Total Website Clicks</small>
                </div>

                <div class="quick-stats__chart peity-bar">4,7,6,2,5,3,8,6,6,4,8</div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="quick-stats__item">
                <div class="quick-stats__info">
                    <h2>$58,778</h2>
                    <small>Total Sales Orders</small>
                </div>

                <div class="quick-stats__chart peity-bar">9,4,6,5,6,4,5,7,9,3,6</div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="quick-stats__item">
                <div class="quick-stats__info">
                    <h2>214</h2>
                    <small>Total Support Tickets</small>
                </div>

                <div class="quick-stats__chart peity-bar">5,6,3,9,7,5,4,6,5,6,4</div>
            </div>
        </div>
    </div>


@endsection

@section('javascript')
    <script src="{{ asset('themes/Sadmin/vendors/bower_components/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('themes/Sadmin/js/other-charts.js') }}"></script>
    <script src="{{ asset('api.min.js') }}">api.min.jspt>
@endsection