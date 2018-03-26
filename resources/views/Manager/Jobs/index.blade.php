@extends("Manager.layouts.manager")

@section('CustomCSS')
    <link rel="stylesheet" href="{{ asset('storage/assets/plugins/datatables/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
@endsection

@section("content")

    <div class="row">
        <div class="col-md-12">
            <h1><i class="fa fa-building"></i> Liste des entreprises</h1>
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
                                    <th>Entreprise</th>
                                    <th>Status</th>
                                    <th># employé</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($Jobs as $job)

                                    <tr>
                                        <td>
                                            {{$job->id}}
                                        </td>
                                        <td>
                                            <div class="media">
                                                <div class="profile-picture bg-gradient bg-primary float-right d-flex mr-3">
                                                    <img src="{{ $job->image }}" width="44" height="44">
                                                </div>
                                                <div class="media-body">
                                                    <div class="heading mt-1">
                                                        <a href="{{ route('manager.jobs.show',['name' => $job->name]) }}">{{ $job->label }}</a>
                                                    </div>
                                                    <div class="subtext"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if($job->whitelisted)<span class="badge badge-danger">Whitelist</span>@else <span class="badge badge-success"> Libre</span> @endif
                                        </td>
                                        <td>
                                            {{ $job->Players->count() }} Employé
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

@endsection

@section('Javascript')
    <!-- Datatables -->
    <script type="text/javascript" src="{{ asset('storage/assets/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('storage/assets/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('storage/assets/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
@endsection
