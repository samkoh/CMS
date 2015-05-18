@extends('master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">My Review Paper</div>
				<div class="panel-body">

				@include('partials.reviewer_nav')

				<h3>Paper Name: {{ $paper->title }}</h3>

				<hr/>

				{!! Form::model($paper, ['url' => 'reviewer/paper/' . $paper->id, 'method' => 'PATCH']) !!}

					<div class="form-group">
						{!! Form::label('title', 'Title:')!!}
						{!! Form::text('title', null, array('disabled' => 'disabled', 'class' => 'form-control')) !!}
					</div>

					<div class="form-group">
						{!! Form::label('abstractContent', 'Abstract:')!!}
						{!! Form::textarea('abstractContent', null, array('disabled' => 'disabled', 'class' => 'form-control')) !!}
					</div>

                    <div class="form-group">
                        {!! Form::label('fullPaperUrl', 'Download the paper here:')!!}

                        <li> <a href="{{route('getpaper', $paper->fullPaperUrl)}}">{{$paper->title}}</a></li>

                        {{--@foreach($paper as $paper)--}}
                            {{--<li> <a href="">{{$paper->fullPaperUrl}}</a></li>--}}
                        {{--@endforeach--}}
                    </div>

				{!! Form::close() !!}


				<br/>
				<hr/>

				<h2>Evaluation</h2>

                    {!! Form::model($paper, ['url' => 'reviewer/paper/' . $paper->id, 'method' => 'PATCH']) !!}
                    {{--{!! Form::open(['action' => 'Reviewer\ReviewerPaperController@store']) !!}--}}


                    <div class="form-group">
                        {!! Form::label('quality', 'This paper has a high quality content:')!!}<br/>

                        {!! Form::radio('quality', '2',['class' => 'form-control']) !!}
                        <span>Strongly Agree </span><br/>

                        {!! Form::radio('quality', '1',['class' => 'form-control']) !!}
                        <span>Agree</span><br/>

                        {!! Form::radio('quality', '0',['class' => 'form-control']) !!}
                        <span>Border Line</span><br/>

                        {!! Form::radio('quality', '-1',['class' => 'form-control']) !!}
                        <span>Reject</span><br/>

                        {!! Form::radio('quality', '-2',['class' => 'form-control']) !!}
                        <span>Strongly Reject</span>
                    </div>

					<div class="form-group">
                        {!! Form::label('rationale', 'The Author provides a strong rationale for why the study is needed:')!!}<br/>

                        {!! Form::radio('rationale', '2',['class' => 'form-control']) !!}
                        <span>Strongly Agree </span><br/>

                        {!! Form::radio('rationale', '1',['class' => 'form-control']) !!}
                        <span>Agree</span><br/>

                        {!! Form::radio('rationale', '0',['class' => 'form-control']) !!}
                        <span>Border Line</span><br/>

                        {!! Form::radio('rationale', '-1',['class' => 'form-control']) !!}
                        <span>Reject</span><br/>

                        {!! Form::radio('rationale', '-2',['class' => 'form-control']) !!}
                        <span>Strongly Reject</span><br/>
                    </div>

					<div class="form-group">
						{!! Form::label('hypothesis', 'The research questions or hypotheses are clearly articulated:')!!}<br/>

                        {!! Form::radio('hypothesis', '2',['class' => 'form-control']) !!}
                        <span>Strongly Agree </span><br/>

                        {!! Form::radio('hypothesis', '1',['class' => 'form-control']) !!}
                        <span>Agree</span><br/>

                        {!! Form::radio('hypothesis', '0',['class' => 'form-control']) !!}
                        <span>Border Line</span><br/>

                        {!! Form::radio('hypothesis', '-1',['class' => 'form-control']) !!}
                        <span>Reject</span><br/>

                        {!! Form::radio('hypothesis', '-2',['class' => 'form-control']) !!}
                        <span>Strongly Reject</span><br/>
					</div>

					<div class="form-group">
						{!! Form::label('manuscript', 'The manuscript is creative or deals with the subject in a new or novel way:')!!}<br/>

                        {!! Form::radio('manuscript', '2',['class' => 'form-control']) !!}
                        <span>Strongly Agree </span><br/>

                        {!! Form::radio('manuscript', '1',['class' => 'form-control']) !!}
                        <span>Agree</span><br/>

                        {!! Form::radio('manuscript', '0',['class' => 'form-control']) !!}
                        <span>Border Line</span><br/>

                        {!! Form::radio('manuscript', '-1',['class' => 'form-control']) !!}
                        <span>Reject</span><br/>

                        {!! Form::radio('manuscript', '-2',['class' => 'form-control']) !!}
                        <span>Strongly Reject</span><br/>
					</div>

                    <div class="form-group">
                        {!! Form::label('structure', 'The structure of this paper content is well defined:')!!}<br/>

                        {!! Form::radio('structure', '2',['class' => 'form-control']) !!}
                        <span>Strongly Agree </span><br/>

                        {!! Form::radio('structure', '1',['class' => 'form-control']) !!}
                        <span>Agree</span><br/>

                        {!! Form::radio('structure', '0',['class' => 'form-control']) !!}
                        <span>Border Line</span><br/>

                        {!! Form::radio('structure', '-1',['class' => 'form-control']) !!}
                        <span>Reject</span><br/>

                        {!! Form::radio('structure', '-2',['class' => 'form-control']) !!}
                        <span>Strongly Reject</span><br/>
                    </div>

                    <div class="form-group">
                        {!! Form::label('paperEvaluation', 'Overall Evaluation: ')!!}<br/>

                        {!! Form::radio('paperEvaluation', '2',['class' => 'form-control']) !!}
                        <span>Strongly Agree- <i>Paper is recommended for publish in its present form</i> </span><br/>

                        {!! Form::radio('paperEvaluation', '1',['class' => 'form-control']) !!}
                        <span>Agree - <i>Paper is recommended for publish with changes as indicated</i></span><br/>

                        {!! Form::radio('paperEvaluation', '0',['class' => 'form-control']) !!}
                        <span>Border Line - <i>Paper is recommended for major revision</i></span><br/>

                        {!! Form::radio('paperEvaluation', '-1',['class' => 'form-control']) !!}
                        <span>Reject - <i>Paper is not recommended for publication</i></span><br/>

                        {!! Form::radio('paperEvaluation', '-2',['class' => 'form-control']) !!}
                        <span>Strongly Reject - <i>Paper is out of topic and rejected</i></span>
                    </div>

					<hr/>

					<div class="form-group">
						{!! Form::label('comment', 'Comment:')!!}
						{!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
						{!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
					</div>

				{!! Form::close() !!}


				</div>
			</div>
		</div>
	</div>
</div>
	
	

@endsection
