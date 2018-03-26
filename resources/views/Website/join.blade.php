@extends('Website.layouts.master')

@section('body-class','tournaments-page register')

@section('content')
    <div class="clearfix"></div>
    <section class="content-wrapper container-fluid pb-5">
        <section class="container">
            <div class="col-lg-7 col-md-12 register-form-wrapper">
                <!-- content title -->
                <div class="main-content-title">
                    <h3>Rejoin nous, et prépare ta vie de rêve!</h3>
                </div>

                <form action="{{ route('whitelist.store') }}" method="POST">
                    {{ csrf_field() }}



                        <p class="form-group">
                            <label for="rpname">Nom RP</label>
                            <input id="rpname" type="text" class=" register form-control {{ $errors->has('rpname') ? 'is-invalid' : '' }}" name="rpname" value="{{ old('rpname') }}" placeholder="Ex : Paul Wayne">
                        </p>

                        <p class="form-group">
                            <label for="experiance">Experience</label>
                            <input id="experiance" type="text" name="experiance" class="register form-control {{ $errors->has('experiance') ? 'is-invalid' : '' }}" value="{{ old('experiance') }}" placeholder="EX. FiveM, Garry's Mod, Arma3">
                        </p>

                        <p class="form-group">
                            <label for="birthday">Date de naissance</label>
                            <input id="birthday" type="text" name="birthday" class="register form-control {{ $errors->has('birthday') ? 'is-invalid' : '' }}" value="{{ old('birthday') }}" placeholder="AAAA/MM/JJ">
                        </p>

                        <p class="form-group">
                            <label for="town">Ville de naissance</label>
                            <input id="town" type="text" class="register form-control {{ $errors->has('town') ? 'is-invalid' : '' }}" name="town" value="{{ old('town') }}" placeholder="Ex : ViceCity">
                        </p>

                        <p class="form-group">
                            <label for="editor1">Votre Histoire RP</label>
                        </p>
                        <p class="form-group">
                            <textarea id="editor1" name="history" class="register form-control load-ckeditor textarea-autosize {{ $errors->has('history') ? 'is-invalid' : '' }}" placeholder="Ecrire votre histoire ici"></textarea>
                            <script>CKEDITOR.replace('history');</script>
                        </p>

                        <p class="mt-5 text-center">
                            <button type="submit" class="button-medium">Envoyer ma candidature</button>
                        </p>

                </form>

            </div>
        </section>
    </section>
@endsection