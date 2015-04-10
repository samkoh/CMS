@extends('master')

@section('content')

    <h3 align="center">Send Bulk Email</h3>
    <br/>

    {!! Form::open() !!}

    <h4>Selection of Recipients</h4><hr/>

    <div class="form-group">
        {!! Form::label('recipient', 'Recipient Group:') !!}
        {!! Form::select('recipient',['Authors', 'Reviewers', 'Committee'], 'null', ['class' => 'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('date', 'Filter by registration month:') !!}
        {!! Form::select('date',$date, 'null', ['class' => 'form-control'])!!}
    </div>

    <h4>Message Entry</h4><hr/>

    <!--Sender Form Input -->
    <div class="form-group">
        {!! Form::label('sender', 'Sender name:') !!}
        {!! Form::text('sender', '', ['class' => 'form-control','placeholder'=>'Name']) !!}
    </div>

    <!--Email Form Input -->
    <div class="form-group">
        {!! Form::label('email', 'Email Address:') !!}
        {!! Form::text('email', '', ['class' => 'form-control','placeholder'=>'Email Address']) !!}
    </div>

    <!--Subject Form Input -->
    <div class="form-group">
        {!! Form::label('subject', 'Subject:') !!}
        {!! Form::text('subject', '', ['class' => 'form-control','placeholder'=>'Subject']) !!}
    </div>

    <h4>Message Body</h4><hr/>

    <!-- Form Input -->
    <div class="form-group">
        {!! Form::label('message', 'Message :') !!}
        {!! Form::textarea('message', '', ['class' => 'form-control','placeholder'=>'Email Content']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection
