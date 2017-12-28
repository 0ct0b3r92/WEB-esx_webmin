@extends("layouts.master")

@section("content")
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Liste des joueurs<small>Information complete de chacun</small></h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Accueil</a></li>
            <li class="active">Liste des membres</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Liste des membres</h3>
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
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Members as $Member)
                            <tr @if(!$Member->Player) class="warning" @endif>
                                    <td>{{ $Member->username  }} @if(!empty($Member->Player->firstname))   ( {{ $Member->Player->firstname . " - " . $Member->Player->lastname }} ) @endif </td>
                                @if($Member->Player)
                                    <td>{{ $Member->Player->Job->label }}</td>
                                    <td>{{ $Member->Player->Job->Grade->label }}</td>
                                    <td>{{ number_format($Member->Player->bank, 2, ',', ' ') }}$</td>
                                @else
                                    <td colspan="3" class="text-center">Aucun Personnage / Ce joueurs n'est pas whitelist</td>
                                @endif
                                    <td>X</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@stop