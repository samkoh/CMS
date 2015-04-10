@extends('master')

@section('content')

    <h2>Cancel Invitation</h2>

    <br/>

    {!! Form::open(['action' => 'ConfChairInvitationController@store']) !!}

        <!--Name Form Input -->
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', 'John Cena', ['class' => 'form-control']) !!}
        </div>

        <!--Email Form Input -->
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', 'john@email.com', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('template', 'Message Template:')!!}<br/>
            {!! Form::textarea('template', $message,array('required','class'=>'form-control','placeholder'=>'Name')) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Send', ['class' => 'btn btn-primary form-control']) !!}
        </div>

    {!! Form::close() !!}

@endsection
