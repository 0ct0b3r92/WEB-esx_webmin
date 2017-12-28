@extends('Themes.AdminLTE.layouts.master')

@section('content')
    <section>

        @include("Themes.AdminLTE.layouts.info")

        <div class="row">
            <div class="col-md-12">
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
                                <a class="users-list-name" href="{{ route('profile',['id' => $Player->id]) }}">{{ $Player->username }}</a>
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
                                    <th>Poster</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Whitelists as $Whitelist)
                                <tr>
                                    <td><a href="">{{ $Whitelist->Member->username }}</a></td>
                                    <td>{{ $Whitelist->created_at->diffforhumans() }}</td>
                                    <td>{!! isset($Whitelist->status) ? '<span class="label label-warning">en attente</span>': '<span class="label label-success">Accepter</span>' !!} </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm">Voir</button>
                                    </td>
                                </tr>
                                @endforeach
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
