@extends('master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">Reviewer Registration</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

				

		{!! Form::open() !!}

			<div class="form-group">
				{!! Form::label('name', 'Name:')!!}
				{!! Form::text('name', null, array('required','class'=>'form-control','placeholder'=>'Name')) !!}
			</div>

			<div class="form-group">
				{!! Form::label('email', 'Email Address:')!!}
				{!! Form::email('email', null, array('required','class'=>'form-control','placeholder'=>'Email Address')) !!}
			</div>

			<div class="form-group">
				{!! Form::label('password', 'Password:')!!}
				<br/>
				{!! Form::password('password', null, array('required','class'=>'form-control','placeholder'=>'Password')) !!}
			</div>

			<div class="form-group">
				{!! Form::label('password', 'Confirm Password:')!!}
				<br/>
				{!! Form::password('password', null, array('required','class'=>'form-control','placeholder'=>'Confirm Password')) !!}
			</div>

			<div class="form-group">
				{!! Form::label('contactNo', 'Contact No:')!!}
				{!! Form::text('contactNo', null, array('required','class'=>'form-control','placeholder'=>'Contact Number')) !!}
			</div>

			<div class="form-group">
				{!! Form::label('expertise', 'Expertise')!!}
				{!! Form::select('expertise', ['Educational', 'Language', 'Mathematics and Science', 'Sports', 'Management, Education'], null, ['class' => 'form-control']) !!}
			</div>
				
			<div class="form-group">
				{!! Form::submit('Register', ['class' => 'btn btn-primary form-control']) !!}
			</div>

	{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
