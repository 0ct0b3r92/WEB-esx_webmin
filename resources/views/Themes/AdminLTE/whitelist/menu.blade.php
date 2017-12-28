<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Menu</h3>
    </div>
    <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
            <li><a href="{{ route('Whitelist') }}"><i class="fa fa-inbox"></i> Liste des demandes <span class="label label-success pull-right">{{ $Whitelists->count('status','0') }} Nouvelles</span></a></li>
            <li><a href="#"><i class="fa fa-file-o"></i> Canditaure Accepter</a></li>
            <li><a href="#"><i class="fa fa-trash-o"></i> Candidature Refusé</a></li>
        </ul>
    </div>
    <!-- /.box-body -->
</div>