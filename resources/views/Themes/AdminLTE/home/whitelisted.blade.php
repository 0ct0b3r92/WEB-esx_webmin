@extends('Themes.AdminLTE.layouts.master')

@section("content")
    <section>
        @include("Themes.AdminLTE.layouts.info")
    </section>


    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Bienvenue à toi voyageur!</h3>
            </div>

            <div class="box-body">
                Start creating your amazing application!
            </div>

            <!-- /.box-body -->
            <div class="box-footer">
                Merci d'avoir rejoins {{ config('app.name') }}
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@stop