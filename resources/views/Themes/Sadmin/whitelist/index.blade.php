@extends('Themes.Sadmin.app')

@section('javascript')
    <!-- Vendors: Data tables -->
    <script src="{{ asset('themes/Sadmin/vendors/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('themes/Sadmin/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('themes/Sadmin/vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('themes/Sadmin/vendors/bower_components/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('themes/Sadmin/vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Liste des candidatures</h4>
            <h6 class="card-subtitle">Liste de tous les candidatures fait par les membres</h6>

            <div class="table-responsive">
                <table id="data-table" class="table">
                    <thead>
                    <tr>
                        <th>Candidature #</th>
                        <th>Membre</th>
                        <th>Status</th>
                        <th>Publier</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Whitelists as $Whitelist)
                        <tr>
                            <td><a href="{{route('whitelist.show',['id' => $Whitelist->id])}}">Candidature #{{ $Whitelist->id }}</a></td>
                            <td><a href="{{route('members.profile',['id' => $Whitelist->user_id]) }}">{{ $Whitelist->member->username }}</a></td>
                            <td>
                                @if($Whitelist->status == 1)<span class="badge badge-success">Validé par <b>{{ $Whitelist->Admin->username }}</b></span>
                                @elseif($Whitelist->status == 2)<span class="badge badge-danger">Refusé par <b>{{ $Whitelist->Admin->username }}</b></span>
                                @else<span class="badge badge-warning">Whitelist en attente</span>@endif
                            </td>
                            <td>{{ $Whitelist->created_at->diffforhumans() }}</td>
                            <td>{{ $Whitelist->created_at->diffforhumans() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection