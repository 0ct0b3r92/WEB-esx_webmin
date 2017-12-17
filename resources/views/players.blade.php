@extends("layouts.master")

@section("content")
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Liste des joueurs<small>Information complete de chacun</small></h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li><a href="{{ route('members') }}">Administrations</a></li>
            <li class="active">Liste des joueurs</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Liste des joueurs</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Pseudo</th>
                                <th>Emploie</th>
                                <th>Poste</th>
                                <th>Compte en banque</th>
                                <th>CSS grade</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Players as $Player)
                            <tr>
                                <td>{{ $Player->name }}</td>
                                <td>{{ $Player->Job->name }}</td>
                                <td>{{ $Player->Job->grade->name }}</td>
                                <td>{{ $Player->bank + $Player->money}}</td>
                                <td>X</td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Pseudo</th>
                                <th>Emploie</th>
                                <th>Poste</th>
                                <th>Compte en banque</th>
                                <th>CSS grade</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@stop