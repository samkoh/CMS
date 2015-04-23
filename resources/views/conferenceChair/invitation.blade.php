@extends('master')

@section('content')
	
	<h3>Send Invitation to reviewer</h3>

    {!! Form::open() !!}
		<div class="form-group">
			{!! Form::label('name', 'Name:')!!}
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

@endsection
