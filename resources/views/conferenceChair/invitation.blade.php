@extends('master')

@section('content')

    <h2>Send Invitation to reviewer</h2>

    {!! Form::open(['method' => 'GET', 'action' => 'ConfChair\ConfChairInvitationController@confirm']) !!}

    <div class="form-group">
        {!! Form::label('conferenceName', 'Conference Name :') !!}
        {!! Form::select('conferenceName',$conferenceName, 'null', ['id' => '','class' => 'form-control', ''])!!}
    </div>

    <div class="form-group">
        {!! Form::label('subject', 'Email Message Subject:')!!}
        {!! Form::text('subject', null, array('required','class'=>'form-control','placeholder'=>'Email Subject')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('nameTitlePrefix', 'Name Title Prefix :') !!}
        {!! Form::select('nameTitlePrefix',[
        'Sir' => 'Sir.',
        'Mr' => 'Mr.',
        'Mrs' => 'Mrs.',
        'Miss' => 'Miss.',
        'Dr' => 'Dr.',
        'Prof' => 'Prof.'],
        'null', ['id' => '','class' => 'form-control', ''])!!}

    </div>

    <div class="form-group">
        {!! Form::label('name', 'Recipient Name:')!!}
        {!! Form::text('name', null, array('required','class'=>'form-control','placeholder'=>'Name')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email Address:')!!}
        {!! Form::text('email', null, array('required','class'=>'form-control','placeholder'=>'Email Address')) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

@endsection
