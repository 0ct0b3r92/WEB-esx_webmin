
    <div class="clearfix"></div>
    <section class="content-wrapper container-fluid pb-5">
        <section class="container">
            <div class="col-lg-12 col-md-12 register-form-wrapper">
                <!-- content title -->
                <div class="main-content-title">
                    <h3> Envoyer une demande </h3>
                </div>

                <form action="{{ route('report.store') }}" method="POST">
                    {{ csrf_field() }}

                        <p class="form-group">
                            <input type="text" name="user_id" hidden value="{{ Auth::user()->id }}">
                        </p>

                        <p class="form-group">
                            <label for="experiance">Titre</label>
                            <input id="experiance" type="text" name="name" class="register form-control" value="{{ old('experiance') }}" placeholder="EX. Utilisateur HRP, Abus de pouvoir, Stream Snipe">
                        </p>

                        <p>
                            <label>Type</label>

                            <select name="type_id">
                                <option value="0">- Select -</option>
                                @foreach($types as $key => $type)
                                    <option value="{{$key}}">{{$type}}</option>
                                @endforeach
                            </select>
                        </p>

                        <p class="form-group">
                            <label for="editor1">Message</label>
                            <small>Veuillez inclure une preuve pour votre rapport*</small>
                        </p>
                        <p class="form-group">
                            <textarea id="editor1" rows="10" name="content" class="register form-control load-ckeditor textarea-autosize" placeholder="Ecrire votre demande ici"></textarea>
                        </p>

                        <p class="mt-5 text-center">
                            <button type="submit" class="btn btn-block btn-warning">Envoyer ma demande</button>
                        </p>

                </form>

            </div>
        </section>
    </section>

    <script>

        CKEDITOR.replace('content');
        $(document).ready(function(){

            $.fn.modal.Constructor.prototype.enforceFocus = function () {
                modal_this = this
                $(document).on('focusin.modal', function (e) {
                    if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length
                        // add whatever conditions you need here:
                        &&
                        !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
                        modal_this.$element.focus()
                    }
                })
            };

        });
    </script>