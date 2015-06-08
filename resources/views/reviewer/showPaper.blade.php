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

                        {!! Form::radio('quality', '2',$paperReview->quality == 2) !!}
                        <span>Strongly Agree </span><br/>

                        {!! Form::radio('quality', '1',$paperReview->quality == 1)  !!}
                        <span>Agree</span><br/>

                        {!! Form::radio('quality', '0',$paperReview->quality == 0)  !!}
                        <span>Border Line</span><br/>

                        {!! Form::radio('quality', '-1',$paperReview->quality == -1)  !!}
                        <span>Disagree</span><br/>

                        {!! Form::radio('quality', '-2',$paperReview->quality == -2)  !!}
                        <span>Strongly Disagree</span>
                    </div>

					<div class="form-group">
                        {!! Form::label('rationale', 'The Author provides a strong rationale for why the study is needed:')!!}<br/>

                        {!! Form::radio('rationale', '2',$paperReview->rationale == 2) !!}
                        <span>Strongly Agree </span><br/>

                        {!! Form::radio('rationale', '1',$paperReview->rationale == 1) !!}
                        <span>Agree</span><br/>

                        {!! Form::radio('rationale', '0',$paperReview->rationale == 0) !!}
                        <span>Border Line</span><br/>

                        {!! Form::radio('rationale', '-1',$paperReview->rationale == -1) !!}
                        <span>Disagree</span><br/>

                        {!! Form::radio('rationale', '-2',$paperReview->rationale == -2) !!}
                        <span>Strongly Disagree</span><br/>
                    </div>

					<div class="form-group">
						{!! Form::label('hypothesis', 'The research questions or hypotheses are clearly articulated:')!!}<br/>

                        {!! Form::radio('hypothesis', '2',$paperReview->hypothesis == 2) !!}
                        <span>Strongly Agree </span><br/>

                        {!! Form::radio('hypothesis', '1',$paperReview->hypothesis == 1) !!}
                        <span>Agree</span><br/>

                        {!! Form::radio('hypothesis', '0',$paperReview->hypothesis == 0) !!}
                        <span>Border Line</span><br/>

                        {!! Form::radio('hypothesis', '-1',$paperReview->hypothesis == -1) !!}
                        <span>Disagree</span><br/>

                        {!! Form::radio('hypothesis', '-2',$paperReview->hypothesis == -2) !!}
                        <span>Strongly Disagree</span><br/>
					</div>

					<div class="form-group">
						{!! Form::label('manuscript', 'The manuscript is creative or deals with the subject in a new or novel way:')!!}<br/>

                        {!! Form::radio('manuscript', '2',$paperReview->manuscript == 2) !!}
                        <span>Strongly Agree </span><br/>

                        {!! Form::radio('manuscript', '1',$paperReview->manuscript == 1) !!}
                        <span>Agree</span><br/>

                        {!! Form::radio('manuscript', '0',$paperReview->manuscript == 0) !!}
                        <span>Border Line</span><br/>

                        {!! Form::radio('manuscript', '-1',$paperReview->manuscript == -1) !!}
                        <span>Disagree</span><br/>

                        {!! Form::radio('manuscript', '-2',$paperReview->manuscript == -2) !!}
                        <span>Strongly Disagree</span><br/>
					</div>

                    <div class="form-group">
                        {!! Form::label('structure', 'The structure of this paper content is well defined:')!!}<br/>

                        {!! Form::radio('structure', '2',$paperReview->structure == 2) !!}
                        <span>Strongly Agree </span><br/>

                        {!! Form::radio('structure', '1',$paperReview->structure == 1) !!}
                        <span>Agree</span><br/>

                        {!! Form::radio('structure', '0',$paperReview->structure == 0) !!}
                        <span>Border Line</span><br/>

                        {!! Form::radio('structure', '-1',$paperReview->structure == -1) !!}
                        <span>Disagree</span><br/>

                        {!! Form::radio('structure', '-2',$paperReview->structure == -2) !!}
                        <span>Strongly Disagree</span><br/>
                    </div>

                    <div class="form-group">
                        {!! Form::label('paperEvaluation', 'Overall Evaluation: ')!!}<br/>

                        {!! Form::radio('paperEvaluation', '2',$paperReview->paperEvaluation == 2) !!}
                        <span>Strongly Accept- <i>Paper is recommended for publish in its present form</i> </span><br/>

                        {!! Form::radio('paperEvaluation', '1',$paperReview->paperEvaluation == 1) !!}
                        <span>Accept - <i>Paper is recommended for publish with changes as indicated</i></span><br/>

                        {!! Form::radio('paperEvaluation', '0',$paperReview->paperEvaluation == 0) !!}
                        <span>Border Line - <i>Paper is recommended for major revision</i></span><br/>

                        {!! Form::radio('paperEvaluation', '-1',$paperReview->paperEvaluation == -1) !!}
                        <span>Reject - <i>Paper is not recommended for publication</i></span><br/>

                        {!! Form::radio('paperEvaluation', '-2',$paperReview->paperEvaluation == -2) !!}
                        <span>Strongly Reject - <i>Paper is out of topic and rejected</i></span>
                    </div>

                    <div class="form-group">
                        {!! Form::label('confidenceLevel', 'Confidence Level upon overall evaluation: ')!!}<br/>

                        {!! Form::radio('confidenceLevel', '4',$paperReview->confidenceLevel == 4) !!}
                        <span>4 (expert)</span><br/>

                        {!! Form::radio('confidenceLevel', '3',$paperReview->confidenceLevel == 3) !!}
                        <span>3 (high)</span><br/>

                        {!! Form::radio('confidenceLevel', '2',$paperReview->confidenceLevel == 2) !!}
                        <span>2 (medium)</span><br/>

                        {!! Form::radio('confidenceLevel', '1',$paperReview->confidenceLevel == 1) !!}
                        <span>1 (low)</span><br/>

                        {!! Form::radio('confidenceLevel', '0',$paperReview->confidenceLevel == 0) !!}
                        <span>0 (null)</span>
                    </div>

					<hr/>

					<div class="form-group">
						{!! Form::label('comment', 'Comment:')!!}
						{!! Form::textarea('comment', $paperReview->comment, ['class' => 'form-control']) !!}
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
