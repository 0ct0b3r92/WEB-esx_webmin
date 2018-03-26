@extends('Manager.layouts.manager')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Entreprise - {{ $Job->label }}</h1>
        </div>
    </div>


    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-user-profile">
                    <div class="profile-page-left">
                        <div class="row">
                            <div class="col-lg-12 mb-4">
                                <div class="profile-picture profile-picture-lg bg-gradient bg-primary mb-4">
                                    <img src="{{ $Job->image }}" width="150" height="150">
                                </div>

                            </div>
                            @if($Job->id != 1)
                            @if($Job->whitelisted)
                            <div class="col-sm-12">
                                <a class="btn btn-success btn-block btn-gradient" href="#">
                                    <i class="fa fa-unlock"></i> Ouvrir
                                </a>
                            </div>
                            @else
                            <div class="col-sm-12">
                                <a class="btn btn-danger btn-block btn-gradient" href="#">
                                    <i class="fa fa-lock"></i> Fermer
                                </a>
                            </div>
                            @endif
                            @endif
                        </div>
                        <hr />

                            <h5>
                                <i class="batch-icon batch-icon-users"></i>
                                Employé
                            </h5>
                            <div class="profile-page-block-outer clearfix">
                                @foreach($Job->Players as $player)
                                    <div class="profile-page-block">
                                        <div class="profile-picture bg-gradient @if($Job->Boss->id == $player->id) bg-warning @else bg-primary @endif ">
                                            <img src="{{ $player->Member->avatar }}" width="44" height="44" data-toggle="tooltip" data-placement="top" title="{{ $player->name }} @if($Job->Boss->id == $player->id) [ Patron ] @endif">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                    </div>
                    <div class="profile-page-center">

                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-4 mb-5">
                                <div class="card card-tile card-xs bg-secondary bg-gradient text-center">
                                    <div class="card-body p-4">
                                        <div class="tile-left">
                                            <i class="fa fa-user batch-icon-xxl"></i>
                                        </div>
                                        <div class="tile-right">
                                            <div class="tile-number">{{ $Job->Players->count() }}</div>
                                            <div class="tile-description">Employé</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4 mb-5">
                                <div class="card card-tile card-xs bg-primary bg-gradient text-center">
                                    <div class="card-body p-4">
                                        <div class="tile-left">
                                            <i class="fa fa-dollar-sign batch-icon-xxl"></i>
                                        </div>
                                        <div class="tile-right">
                                            <div class="tile-number">{{ $Job->Bank }}</div>
                                            <div class="tile-description">Compte de compagnie</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4 mb-5">
                                <div class="card card-tile card-xs bg-success bg-gradient text-center">
                                    <div class="card-body p-4">
                                        <div class="tile-left">
                                            <i class="batch-icon batch-icon-tag-alt-2 batch-icon-xxl"></i>
                                        </div>
                                        <div class="tile-right">
                                            <div class="tile-number">{{ $Job->Invoices->count() }}</div>
                                            <div class="tile-description">Facture en impayé</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                            <div class="col-md-6">
                                <table id="datatable-1" class="table table-datatable table-striped table-hover table-responsive">
                                    <thead class="thead-default">
                                    <tr>
                                        <th>#</th>
                                        <th>Joueur</th>
                                        <th>Par</th>
                                        <th class="text-center">status</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($Job->Invoices as $invoice)

                                        <tr>
                                            <td>
                                                <a href="">Facture #{{$invoice->id}}</a>
                                            </td>
                                            <td>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="heading mt-1">
                                                            <a href="{{ route("manager.members.show",['id' => $invoice->To->Member->id]) }}">{{ $invoice->To->Member->username }}</a>
                                                        </div>
                                                        <div class="subtext"> @if(!empty($invoice->To->firstname))   ( {{$invoice->To->firstname . " - " . $invoice->To->lastname }} ) @endif</div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="heading mt-1">
                                                            <a href="{{ route("manager.members.show",['id' => $invoice->By->Member->id]) }}">{{ $invoice->By->Member->username }}</a>
                                                        </div>
                                                        <div class="subtext"> @if(!empty($invoice->By->firstname))   ( {{$invoice->By->firstname . " - " . $invoice->By->lastname }} ) @endif</div>
                                                    </div>
                                                </div>

                                            </td>

                                            <td class="text-center">
                                                <span class="badge badge-danger">Non Payeé</span>
                                            </td>
                                            <td class="text-center">
                                                {{ $invoice->total }}
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@stop