@extends('master')

@section('content')

    <h3>Conference Topic List:</h3>

    @foreach($topics as $topic)

        <li>
            {{ $topic->name }}
        </li>

    @endforeach

    <hr />


    <h3>Insert a new conference topic</h3>

    {!! Form::open(['action' => 'ConfChair\ConfChairCreateTopicController@store']) !!}
    <div class="form-group">
        {!! Form::label('name', 'New topic:')!!}
        {!! Form::text('name', null, array('required','class'=>'form-control','placeholder'=>'Topic')) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}


@endsection
