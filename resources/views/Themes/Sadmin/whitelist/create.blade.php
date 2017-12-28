@extends('Themes.Sadmin.app')

@section('content')
    <header class="content__title">
        <h1>Formulaire de candidature</h1>
        <small>Faire une demande de candidature pour rejoindre {{ Config('app.name') }}</small>
    </header>

    <div class="card new-contact">
        <div class="new-contact__header">
            <img src="{{ Auth::user()->avatar }}" class="new-contact__img" alt="">
        </div>

        <form id="logout-form" action="{{ route('whitelist.validate') }}" method="POST">
            {{ csrf_field() }}
            <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nom Complet de votre personnage</label>
                        <input type="text" class="form-control {{ $errors->has('rpname') ? 'is-invalid' : '' }}" name="rpname" value="{{ old('rpname') }}" placeholder="Ex : Paul Wayne">
                        <i class="form-group__bar"></i>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Experiance RP</label>
                        <input type="text" name="experiance" class="form-control {{ $errors->has('experiance') ? 'is-invalid' : '' }}" value="{{ old('experiance') }}" placeholder="EX. FiveM, Garry's Mod, Arma3">
                        <i class="form-group__bar"></i>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Date de naissance</label>
                        <input type="text" name="birthday" class="form-control {{ $errors->has('birthday') ? 'is-invalid' : '' }}" value="{{ old('birthday') }}" placeholder="AAAA/MM/JJ">
                        <i class="form-group__bar"></i>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Endroit de votre naissance</label>
                        <input type="text" class="form-control {{ $errors->has('town') ? 'is-invalid' : '' }}" name="town" value="{{ old('town') }}" placeholder="Ex : ViceCity">
                        <i class="form-group__bar"></i>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Joueur qui vous as invité <small>Optionnelle</small></label>
                        <input type="text" name="invited_by" value="{{ old('invited_by') }}" class="form-control {{ $errors->has('invited_by') ? 'is-invalid' : '' }}" placeholder="Ex : Mr Lutin">
                        <i class="form-group__bar"></i>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Sexe de votre personange </label>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-light active">
                                <input type="radio" id="option1" name="sexe" value="F" {{ old('F') ? 'checked' : '' }} > Homme
                            </label>
                            <label class="btn btn-light">
                                <input type="radio" id="option2" name="sexe" value="M" {{ old('M') ? 'checked' : 'checked' }}> Femme
                            </label>
                        </div>
                        <i class="form-group__bar"></i>
                    </div>
                </div>

            </div>


            <div class="form-group">
                <label>Votre Histoire RP</label>
                <textarea id="editor1" name="history" class="form-control textarea-autosize {{ $errors->has('history') ? 'is-invalid' : '' }}">
                        {{ old('history') }}
                    </textarea>
                <i class="form-group__bar"></i>
            </div>

            <div class="clearfix"></div>

            <div class="mt-5 text-center">
                <button type="submit" class="btn btn-light">Envoyer ma candidature</button>
            </div>
        </div>
        </form>
    </div>
@endsection


@section('javascript')
    <script src="{{ asset('themes/Sadmin/vendors/bower_components/autosize/dist/autosize.min.js') }}"></script>
    <!-- CK Editor -->
    <script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
        })
    </script>
@stop