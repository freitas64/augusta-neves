

@extends('mainAdmin')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-primary">

                    <div class="content-box-header panel-heading">
                    <div class="panel-title "><h4>Calendário de eventos</h4></div>

                    </div>
                    <div class="panel-body">
                        {!! $calendar->calendar() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="well">
                    <label>Opções</label>

                    <div class="row">
                        <div class="col-sm-6">


                            <a href="{{ route('event.create') }}" class="btn btn-danger " role="button"><i class="glyphicon glyphicon-edit"></i> Adicionar evento</a>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css"></script>

                {!! $calendar->script() !!}

@endsection

@section('scripts')


    <script type="text/javascript">
        <!--

        $(document).ready(function () {

            window.setTimeout(function() {
                $(".alert").fadeTo(1500, 0).slideUp(300, function(){
                    $(this).remove();
                });
            }, 5000);

        });
        //-->
    </script>

@endsection

