@extends('Themes.Sadmin.app')

@section('content')
    <header class="content__title">
        <h1>Ajouter une suggestion / bug</h1>
        <small>Remplir le formulaire pour signalé un bug ou pour faire une suggestion de contenue</small>
    </header>

    <div class="card new-contact">
        <div class="new-contact__header">
            <img src="{{ Auth::user()->avatar }}" class="new-contact__img" alt="">
        </div>

        <form id="logout-form" action="{{ route('bugsTraker.confirm') }}" method="POST">
            {{ csrf_field() }}
            <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Titre de la demande </label>
                        {{ Form::input('text','title',null,['class' => 'form-control','placeholder' => 'Nom de votre demande']) }}
                        <i class="form-group__bar"></i>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Type de demande</label>
                        <select class="form-control" name="type_id">
                            <option selected="selected" value="">Type de demande</option>
                            @foreach($Type as $type)
                                <option value="{{ $type->id }}" {{ $errors->has('type_id') ? 'selected' : ''  }}>{{$type->name}}</option>
                            @endforeach
                        </select>
                            <i class="form-group__bar"></i>
                    </div>
                </div>


            </div>


            <div class="form-group">
                <label>Votre Histoire RP</label>
                {{ Form::textarea('content',old('content'),[ 'class' => "form-control textarea-autosize $errors->has('history') ? 'is-invalid' : ''",'id' => 'editor1' ]) }}

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