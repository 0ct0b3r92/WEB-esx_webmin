@extends("Themes.AdminLTE.layouts.master")

@section("assets")
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">

@stop
@section("content")
    <section class="content-header">
        <h1>
            Nous Rejoindre
            <small>Forumulaire de candidature</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route("home") }}"><i class="fa fa-home"></i> Accueil</a></li>
            <li class="active">Candidature Whitelist</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box center-block" style="width: 800px;">
            <div class="box-header with-border">
                <h3 class="box-title text-center">Candidature</h3>
            </div>

            <form id="logout-form" action="{{ route('validateWhitelist') }}" method="POST">
                {{ csrf_field() }}

            <div class="box-body">

                <div class="form-group {{ $errors->has('rpname') ? ' has-error' : '' }}">
                    <label>Nom Complet de votre personnage</label>
                    <input type="text" class="form-control" name="rpname" value="{{ old('rpname') }}" placeholder="Ex : Paul Wayne">
                    @if ($errors->has('rpname'))
                        <span class="help-block">
                            <strong>Vous devez ecrire votre nom RP</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('town') ? ' has-error' : '' }}">
                    <label>Ancienne Ville</label>
                    <input type="text" class="form-control" name="town" value="{{ old('town') }}" placeholder="Ex : ViceCity">
                    @if ($errors->has('town'))
                        <span class="help-block">
                            <strong>Vous devez renseigner votre ancienne ville</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Sexe : </label>

                    <label>
                        <input type="radio" name="sexe" {{ old('M') ? 'checked' : '' }} class="minimal" value="M" checked>
                        M
                    </label>
                    <label>
                        <input type="radio" name="sexe" value="F" {{ old('F') ? 'checked' : '' }} class="minimal">
                        F
                    </label>
                </div>

                <div class="form-group {{ $errors->has('birthday') ? ' has-error' : '' }}">
                    <label>Date de naissance</label>

                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="birthday" class="form-control pull-right" value="{{ old('birthday') }}" placeholder="AAAA-MM-JJ" id="datepicker">
                    </div>
                    <!-- /.input group -->
                    @if ($errors->has('birthday'))
                        <span class="help-block">
                            <strong>Votre personnage doit être agé de plus de 16ans</strong>
                        </span>
                    @endif
                </div>
                <!-- /.form group -->


                <div class="form-group {{ $errors->has('experiance') ? ' has-error' : '' }}">
                    <label>Experiance RP</label>
                    <input type="text" name="experiance" class="form-control" value="{{ old('experiance') }}" placeholder="Ex : Garry's Mod, Serveur StormIsland">
                    @if ($errors->has('experiance'))
                        <span class="help-block">
                            <strong>Vous devez nous dire vos experiance en RP</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('history') ? ' has-error' : '' }}">
                    <label>Votre histoire</label>
                    <textarea id="editor1" name="history" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        {{ old('history') }}
                    </textarea>
                    @if ($errors->has('history'))
                        <span class="help-block">
                            <strong>Veuillez nous expliquer votre histoire</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Joueur qui vous as invité <small>Optionnelle</small></label>
                    <input type="text" name="invited_by" value="{{ old('invited_by') }}" class="form-control" placeholder="Ex : Mr Lutin">
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="pull-right btn btn-primary btn-flat">Envoyer ma candidature</button>
            </div>
            </form>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
@stop

@section("javascript")
    <!-- bootstrap datepicker -->
    <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- CK Editor -->
    <script src="bower_components/ckeditor/ckeditor.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>


    <script>

        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        });
    </script>
@endsection