@extends('mainAdmin')


@section('content')
    <div class="col-md-12 content-box">
        <div class="col-md-9">


            <h1>{{$ev->title}}</h1>



            <hr>
            <i class="glyphicon glyphicon-calendar" title="start_date"></i> <label>Data Início:</label>
            <p>{{ $ev->start_date}} </p>

            <hr>
            <i class="glyphicon glyphicon-calendar" title="start_date"></i> <label>Data Fim:</label>
            <p>{{ $ev->end_date }} </p>

        </div>

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('event.edit', 'Editar', array($ev->id), array('class'=>'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['event.destroy', $ev->id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Apagar', ['class' => 'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection