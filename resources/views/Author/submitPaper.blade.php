@extends('master')

@section('content')

    <h3>Submit Paper</h3>

    {!! Form::open(['route' => 'author.store']) !!}

    {{--{!! Form::hidden('user_id', 1)!!}--}}

    <div class="form-group">
        {!! Form::label('title', 'Paper Title:')!!}
        {!! Form::text('title', null, array('required','class'=>'form-control','placeholder'=>'Paper Title')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('abstractContent', 'Paper Abstract:')!!}
        {!! Form::textarea('abstractContent', null, array('required','class'=>'form-control','placeholder'=>'Paper Abstract')) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection
