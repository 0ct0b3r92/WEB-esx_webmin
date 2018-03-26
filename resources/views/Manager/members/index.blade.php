@extends("Manager.layouts.manager")

@section('CustomCSS')
    <link rel="stylesheet" href="{{ asset('storage/assets/plugins/datatables/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
@endsection

@section("content")

    <div class="row">
        <div class="col-md-12">
            <h1><i class="fa fa-group"></i> Liste des membres </h1>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <table id="datatable-1" class="table table-datatable table-striped table-hover table-responsive">
                        <thead class="thead-default">
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Grade</th>
                            <th>Steam ID</th>
                            <th class="text-center">Candidature</th>
                            <th>Rejoins</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($Members as $Member)

                            <tr>
                                <td>
                                    {{$Member->id}}
                                </td>
                                <td>
                                    <div class="media">
                                        <div class="profile-picture bg-gradient bg-primary float-right d-flex mr-3">
                                            <img src="{{ $Member->avatar }}" width="44" height="44">
                                        </div>
                                        <div class="media-body">
                                            <div class="heading mt-1">
                                                <a href="">{{ $Member->username }}</a>
                                            </div>
                                            <div class="subtext"> @if(!empty($Member->Player->firstname))   ( {{ $Member->Player->firstname . " - " . $Member->Player->lastname }} ) @endif</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if($Member->owner) Membre de l'équipe @else Membre @endif
                                </td>

                                <td>
                                    {{$Member->steamid}}
                                </td>
                                <td class="text-center">

                                    @if($Member->StatusWL  != null && $Member->StatusWL->status == 1)
                                        <span class="badge badge-success">Accepté</span>
                                    @elseif($Member->StatusWL  != null && $Member->StatusWL->status == 2)
                                        <span class="badge badge-danger">Refusé</span>
                                    @else
                                        <span class="badge badge-warning">En Attente</span>
                                    @endif
                                </td>
                                <td>{{ $Member->created_at->diffforhumans() }}</td>
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

@endsection

@section('Javascript')
    <!-- Datatables -->
    <script type="text/javascript" src="{{ asset('storage/assets/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('storage/assets/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('storage/assets/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
@endsection