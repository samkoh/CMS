@extends('master')

@section('content')

    <h3>Insert a new conference topic</h3>

    {!! Form::open() !!}

    <div class="form-group">
        {!! Form::label('topic', 'New topic:')!!}
        {!! Form::text('topic', null, array('required','class'=>'form-control','placeholder'=>'Topic')) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}


@endsection
