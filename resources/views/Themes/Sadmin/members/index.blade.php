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
            <h4 class="card-title">Basic example</h4>
            <h6 class="card-subtitle">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.</h6>

            <div class="table-responsive">
                <table id="data-table" class="table">
                    <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>Emploie</th>
                        <th>Poste</th>
                        <th>Compte en banque</th>
                        <th>Membre depuis</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Members as $Member)
                        <tr>
                            <td><a href="{{ route('members.profile', ['id' => $Member->id]) }}">{{ $Member->username  }} @if(!empty($Member->Player->firstname))   ( {{ $Member->Player->firstname . " - " . $Member->Player->lastname }} ) @endif </a></td>
                            @if($Member->Player)
                            <td>{{ $Member->Player->Job->label }}</td>
                            <td>{{ $Member->Player->Job->Grade->label }}</td>
                            <td>{{ number_format($Member->Player->bank, 2, ',', ' ') }}$</td>
                            @else
                            <td colspan="3" >Aucun Personnage / Ce joueurs n'est pas whitelist</td>
                            @endif
                            <td>{{ $Member->created_at->diffforhumans() }}</td>
                            <td>
                                <a href="{{ route('members.profile', ['id' => $Member->id]) }}" class="btn btn-info btn-sm">Profil</a>
                                @if($Member->Player && !$Member->owner)<button type="button" class="btn btn-danger btn-sm">Bannir</button>@endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection