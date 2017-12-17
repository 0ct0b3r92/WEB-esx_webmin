@extends('layouts.master')

@section('content')
    <section>

        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">CPU Traffic</span>
                        <span class="info-box-number">{{ $CpuLoad }}<small>%</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Likes</span>
                        <span class="info-box-number">41,410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-person"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Joueurs</span>
                        <span class="info-box-number">{{ $PlayersCount }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-social-usd"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Économie de la ville</span>
                        <span class="info-box-number">{{ $TownMoney }}$</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dernier Membres</h3>

                        <div class="box-tools pull-right">
                            <span class="label label-success">{{ $Players->count() }} Nouveaux Membres</span>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">
                            @foreach($Players->get() as $Player)
                            <li>
                                <img src="{{ $Player->avatar }}" width="65" alt="User Image">
                                <a class="users-list-name" href="#">{{ $Player->username }}</a>
                                <span class="users-list-date">{{ $Player->created_at->diffforhumans() }}</span>
                            </li>
                            @endforeach
                        </ul>
                        <!-- /.users-list -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{ route('members') }}" class="uppercase">Voir tous les membres</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!--/.box -->
            </div>

            <div class="col-md-6">
                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Derniere demande de Whitelist</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Joueur</th>
                                    <th>Demande/Emploi</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                    <td>Call of Duty IV</td>
                                    <td><span class="label label-success">Shipped</span></td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm">Info</button>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Voir tous les demandes</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>


    </section>
<div class="container">
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


        </div>

    </div>
</div>
@endsection
