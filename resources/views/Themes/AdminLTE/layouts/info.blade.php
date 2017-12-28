<div class="row">
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-person"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Joueurs en ligne</span>
                <span class="info-box-number" id="PlayersOnlines">0/32</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-people"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Population de la ville</span>
                <span class="info-box-number">{{ $PlayersCount }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-social-usd"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Économie de la ville</span>
                <span class="info-box-number">{{ $TownMoney }}$</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->


