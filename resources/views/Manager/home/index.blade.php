@extends('Manager.layouts.manager')

@section('content')

    <div class="row">

        <div class="col-sm-4 mb-5">
            <div class="card card-sm bg-primary bg-gradient">
                <div class="card-body">
                    <div class="mb-4 clearfix">
                        <div class="float-left text-warning text-left">
                            <i class="fa fa-users batch-icon-xxl"></i>
                        </div>
                        <div class="float-right text-right">
                            <h6 class="m-0">@lang('template.citizen.number')</h6>
                        </div>
                    </div>
                    <div class="text-right clearfix">
                        <div class="display-4">{{ $Players->count() }}</div>
                        <div class="m-0">
                            <a href="{{route('manager.members.index')}}">@lang('template.citizen.list')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mb-5">
            <div class="card card-sm bg-danger bg-gradient">
                <div class="card-body">
                    <div class="mb-4 clearfix">
                        <div class="float-left text-warning text-left">
                            <i class="fas fa-dollar-sign batch-icon-xxl"></i>
                        </div>
                        <div class="float-right text-right">
                            <h6 class="m-0">@lang('template.bank.economyTitle')</h6>
                        </div>
                    </div>
                    <div class="text-right clearfix">
                        <div class="display-4">{{ $Economy }}$</div>
                        <div class="m-0" >
                            <a href="#">@lang('template.bank.link')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mb-5">
            <div class="card card-sm bg-secondary bg-gradient">
                <div class="card-body">
                    <div class="mb-4 clearfix">
                        <div class="float-left text-warning text-left">
                            <i class="fa fa-building batch-icon-xxl"></i>
                        </div>
                        <div class="float-right text-right">
                            <h6 class="m-0">@lang('template.business.town')</h6>
                        </div>
                    </div>
                    <div class="text-right clearfix">
                        <div class="display-4">{{$Business}}</div>
                        <div class="m-0" >
                            <a href="{{ route('manager.jobs.index') }}">@lang('template.business.link')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row mb-5">

        <div class="col-md-6 col-lg-6 col-xl-6 mb-5">
            <div class="card">
                <div class="card-header">
                    @lang('template.PlayerStats.title')
                </div>
                <div class="card-body">
                    <div class="card-chart" data-chart-color-1="#07a7e3" data-chart-legend-1="@lang('template.PlayerStats.player')" data-chart-height="281">
                        <canvas id="login_report"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-6 col-xl-6 mb-5">
            <div class="card">
                <div class="card-header">
                    Derniere Candidature
                </div>
                <div class="card-table">
                    <table class="table table-hover table-responsive align-middle">
                        <thead class="thead-default">
                        <tr>
                            <th>Username</th>
                            <th>Steam ID</th>
                            <th class="text-center">Status</th>
                            <th>Demandé</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Whitelists as $whitelist)

                        <tr>
                            <td>
                                <div class="media">
                                    <div class="profile-picture bg-gradient bg-primary float-right d-flex mr-3">
                                        <img src="{{ $whitelist->Member->avatar }}" width="44" height="44">
                                    </div>
                                    <div class="media-body">
                                        <div class="heading mt-1">
                                            <a href="{{ route('manager.whitelist.show',['id' => $whitelist->id]) }}">{{ $whitelist->Member->username }}</a>
                                        </div>
                                        <div class="subtext">{{ $whitelist->rpname }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{$whitelist->Member->steamid}}
                            </td>
                            <td class="text-center" >
                                @if($whitelist->status == 1)
                                    <span class="badge badge-success">Accepté</span>
                                @elseif($whitelist->status == 2)
                                    <span class="badge badge-danger">Refusé</span>
                                @else
                                    <span class="badge badge-warning">En Attente</span>
                                @endif
                            </td>
                            <td>{{ $whitelist->created_at->diffforhumans() }}</td>
                            <td class="text-right">
                                <a href="{{ route('manager.whitelist.show',['id' => $whitelist->id]) }}" class="btn btn-xs btn-primary">Voir</a>
                            </td>
                        </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
