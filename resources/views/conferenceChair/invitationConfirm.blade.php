@extends('master')

@section('content')	

	<h2>Confirm Invitation</h2>

	<br/>	

	{!! Form::open(['action' => 'ConfChair\ConfChairInvitationController@store']) !!}

		<div class="form-group">
			{!! Form::label('template', 'Template:')!!}<br/>
			{!! Form::textarea('template', $template, array('required','class'=>'form-control','placeholder'=>'Message')) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Send', ['class' => 'btn btn-primary form-control']) !!}
		</div>

	{!! Form::close() !!}

@endsection
