@extends('mainBlog')

@section('banner')
    <div class="container-fluid no-left-padding no-right-padding page-banner portfolio-banner">
        <!-- Container -->
        <div class="container">
            <h3>Contactos</h3>
        </div>
        <!-- Container /- -->
    </div>
@endsection

@section('content')

        <!-- Content Block -->
    <div class="container-fluid no-left-padding no-right-padding contact-section">
        <!-- Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="contact-content">
                        <h3>Olá, não hesite em contactar-me</h3>
                        <p>É preciso deixar-se aqui uma mensagem para os nossos visitantes</p>
                    </div>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="contact-form">
                        <h3>Formulário de contacto</h3>
                        <form class="row" action="{{ url('contact') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="Nome*" name="name"
                                       id="input_name"/>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="email*" name="email"
                                       id="input_email"/>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" placeholder="Assunto" name="subject"
                                       id="input_subject"/>
                            </div>
                            <div class="col-md-12 form-group">
                                    <textarea class="form-control" placeholder="Mensagem" name="bodyMessage"
                                              id="bodyMessage"></textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="submit" value="Enviar mensagem" id="btn_submit"/>
                            </div>
                            <div id="alert-msg" class="alert-msg"></div>
                        </form>
                    </div>
                </div>
            </div><!-- Row /- -->
        </div><!-- Container /- -->
    </div><!-- Content Block /- -->

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    {!! Html::script('js/vendor/tinymce/tinymce.min.js') !!}

    <script type="text/javascript">
        <!--

        $(document).ready(function () {

            window.setTimeout(function() {
                $(".alert").fadeTo(1000, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 2000);

        });
        //-->
    </script>
@endsection
