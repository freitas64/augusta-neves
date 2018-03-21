@extends('mainAdmin')

@section('content')

    <div class="row">

        <div class="col-sm-9">
            <!-- Star form compose mail -->
            <form class="form-horizontal">
                <div class="panel mail-wrapper rounded shadow">

                    <div class="panel-sub-heading inner-all">
                        <div class="pull-left">
                            <h2 class="lead no-margin"><strong>Assunto:  </strong>  {{$emails->subject}} </h2>
                        </div>
                        <div class="pull-right">

                            {{ $emails->created_at->format('d M Y') }}

                        </div>

                        <div class="clearfix"></div>
                        <div class="pull-right">

                        </div>
                    </div><!-- /.panel-sub-heading -->
                    <hr>
                    <div class="panel-sub-heading inner-all">
                        <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-7 ">
                                Contactos:
                                <div class="tags">
                                    @foreach($emails->contactsNewsletter as $tag)
                                        <span class="label label-default">{{$tag->name}}&nbsp;({{$tag->email}})</span>

                                    @endforeach
                                </div>
                            </div>


                        </div>
                        <hr>
                    </div><!-- /.panel-sub-heading -->
                    <div class="panel-body">
                        <div class="view-mail">
                            {!! $emails->body !!}
                        </div><!-- /.view-mail -->

                        <?php if (!$emails->file == null){
                           ?>
                        <hr>
                        <div class="attachment-mail">
                            <p>


                                <span><i class="fa fa-paperclip"></i>  <a href="{{ asset('images/FicheirosEmail/'.$emails->file) }}" target="_blank">Ver Anexo</a></span>

                               <p><i class="fa fa-download"></i> <a href="{{asset('images/FicheirosEmail/'.$emails->file)}}" download="{{$emails->file}}">Download do anexo</a></p>

                            </p>






                        </div><!-- /.attachment mail -->

                       <? }?>

                    </div><!-- /.panel-body -->

                </div><!-- /.panel -->
            </form>
            <!--/ End form compose mail -->
        </div>
    </div>
@endsection


