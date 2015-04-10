@extends('master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">Discussion</div>
				<div class="panel-body">

				@include('partials.reviewer_nav')

				<h3 align="center">Discussion Paper</h3>
				<h4 align="center">{{ $paper }}</h4>

				<br/>

				{!! Form::open() !!}

					<div class="form-group">
						{!! Form::label('new', 'Add a comment')!!}
						{!! Form::textarea('new', null, array('required', 
												              'class'=>'form-control', 
												              'placeholder'=>'Add new comment here')) !!}
					</div>

					<div class="form-group">
						<h4 align="center">{!! Form::label('1', 'Reviewer 3')!!}</h4>
						{!! Form::label('1', 'Date:')!!}
						{!! Form::input('date', '1', '2015-03-18', array('disabled' => 'disabled', 'class' => 'form-control')) !!}<br/>
						{!! Form::textarea('1', 'Making your work as personalized as possible is a good thing. However, with academic writing, especially of PhD level, you want to make sure that the ...', array('disabled' => 'disabled', 'class' => 'form-control')) !!}
					</div>

					<div class="form-group">
						<h4 align="center">{!! Form::label('2', 'Reviewer 2')!!}</h4>
						{!! Form::label('2', 'Date:')!!}
						{!! Form::input('date', '2', '2015-03-08', array('disabled' => 'disabled', 'class' => 'form-control')) !!}<br/>
						{!! Form::textarea('2', 'The main assumptions of the t-tests are that the Z functions of a given data set assume a standard normal distribution under H0, or the null hypothesis, and that the variance assumes chi-square distribution with a constant number of degrees of freedom.', array('disabled' => 'disabled', 'class' => 'form-control')) !!}
					</div>

					<div class="form-group">
						<h4 align="center">{!! Form::label('3', 'Reviewer 1')!!}</h4>
						{!! Form::label('3', 'Date:')!!}
						{!! Form::input('date', '3', '2015-03-02', array('disabled' => 'disabled', 'class' => 'form-control')) !!}<br/>
						{!! Form::textarea('3', 'Hello. Yes, this sentence requires editing. If you want your paper to be proofread and edited, use our Analyze my writing service.', array('disabled' => 'disabled', 'class' => 'form-control')) !!}
					</div>					

					<div class="form-group">
						{!! Form::submit('Send', ['class' => 'btn btn-primary form-control']) !!}
					</div>

				{!! Form::close() !!}



				</div>
			</div>
		</div>
	</div>
</div>
	
	

@endsection
