@extends('Manager.layouts.manager')

@section('content')
    <section class="content-header">
        <h1>
            <i class="fa fa-cogs"></i> Réglages

        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        @include('Manager.errors.flash')

        <div class="row">
            <div class="col-md-6">
                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Réglages SiteWeb</h3>
                    </div>
                    <!-- /.box-header -->
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>@lang('settings.servername')</label>
                            <input name="servername"type="text" class="form-control" placeholder="Nom du serveur" value="{{ isset($Settings) ? $Settings->servername : config('app.name') }}" />
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Page Group Steam</label>
                            <input type="url" class="form-control" placeholder="http://steamcommunity.com/groups/EsxManager">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Page communauté Twitch</label>
                            <input type="url" class="form-control" placeholder="https://www.twitch.tv/team/EsxManager">
                        </div>

                        <div class="box-footer text-right">
                            <button type="submit" class="btn btn-primary">Sauvegarder</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->


            <div class="col-md-6">
                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Options des réglages</h3>
                    </div>

                    <div class="form-group">
                        @if($Settings->webhook_activated)
                            <button id="webhook" class="btn btn-block btn-lg btn-red btn-gradient" data-value="0">
                                @lang('settings.webhook.disabled')
                            </button>
                        @else
                            <button id="webhook" class="btn btn-block btn-lg btn-green btn-gradient" data-value="1">
                                @lang('settings.webhook.activate')
                            </button>
                        @endif
                    </div>

                    <div class="form-group">
                        @if($Settings->whitelisted)
                            <button id="whitelist" class="btn btn-block btn-lg btn-red btn-gradient" data-value="0">
                                @lang('settings.whitelist.disabled')
                            </button>
                        @else
                            <button id="whitelist" class="btn btn-block btn-lg btn-green btn-gradient" data-value="1">
                                @lang('settings.whitelist.activate')
                            </button>
                        @endif
                    </div>
                    <!-- /.box-body -->

                    <div class="form-group">
                        @if($Settings->whitelisted)
                            <button id="whitelist" class="btn btn-block btn-lg btn-red btn-gradient" data-value="0">
                                @lang('settings.douanes.disabled')
                            </button>
                        @else
                            <button id="whitelist" class="btn btn-block btn-lg btn-green btn-gradient" data-value="1">
                                @lang('settings.douanes.activate')
                            </button>
                        @endif
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>


        </div>

        <div class="row">
            <div class="col-md-6">
                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Réglages Discord WebHook</h3>
                    </div>
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Discord WebHook [general]</label>
                            <input name="webhook_general"type="url" class="form-control" aria-describedby="webhook_general" placeholder="@lang('settings.webhook.placeholder')" value="{{ isset($Settings) ? $Settings->webhook_general :'' }}" />
                            <small id="webhook_general" class="form-text text-muted">@lang('settings.webhook.general')</small>
                        </div>

                        <div class="form-group">
                            <label>Discord WebHook [Staff]</label>
                            <input name="webhook_staff" type="url" class="form-control" aria-describedby="webhookStaff" placeholder="@lang('settings.webhook.placeholder')" value="{{ isset($Settings) ? $Settings->webhook_staff :'' }}" />
                            <small id="webhookStaff" class="form-text text-muted">@lang('settings.webhook.staff')</small>
                        </div>


                        <div class="box-footer text-right">
                            <button type="submit" class="btn btn-primary">Sauvegarder</button>
                        </div>
                    </form>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->


            <div class="col-md-6">
                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Options</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <div class="table-responsive">


                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

        </div>

    </section>
@endsection


