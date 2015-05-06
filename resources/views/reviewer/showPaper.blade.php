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

				{!! Form::model($paper, ['url' => 'paper/' . $paper->id, 'method' => 'PATCH']) !!}

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
                        <li><a href="">Download</a></li>
                        {{--@foreach($papers as $paper)--}}
                          {{--<a href="{{route('getentry', $paper->fullPaperUrl)}}">Download </a>--}}
                        {{--@endforeach--}}
                        {{--{!! Form::text('fullPaperUrl', null, array('disabled' => 'disabled', 'class' => 'form-control')) !!}--}}
                        {{--<a href="{{route('getfile', $paper->fullPaperUrl)}}">Download </a>--}}


                    </div>

				{!! Form::close() !!}

				<br/>
				<hr/>

				<h2>Evaluation</h2>

				{!! Form::open() !!}

                    <div class="form-group">
                        {!! Form::label('content', 'Quality of Content:')!!}<br/>

                        {!! Form::radio('content', '',['class' => 'form-control']) !!}
                        <span>2:  Excellent work and a significant contribution </span><br/>

                        {!! Form::radio('content', '',['class' => 'form-control']) !!}
                        <span>1:  Good work, significant</span><br/>

                        {!! Form::radio('content', '',['class' => 'form-control']) !!}
                        <span>0:  Solid work</span><br/>

                        {!! Form::radio('content', '',['class' => 'form-control']) !!}
                        <span>-1: Weak content</span><br/>

                        {!! Form::radio('content', '',['class' => 'form-control']) !!}
                        <span>-2: Only an insignificant contribution</span>
                    </div>

                    <div class="form-group">
                        {!! Form::label('evaluation', 'Overall Evaluation:')!!}<br/>

                        {!! Form::radio('evaluation', '',['class' => 'form-control']) !!}
                        <span>2:  Paper is recommended for publish in its present form </span><br/>

                        {!! Form::radio('evaluation', '',['class' => 'form-control']) !!}
                        <span>1:  Paper is recommended for publish with changes as indicated</span><br/>

                        {!! Form::radio('evaluation', '',['class' => 'form-control']) !!}
                        <span>0:  Paper is recommended for major revision</span><br/>

                        {!! Form::radio('evaluation', '',['class' => 'form-control']) !!}
                        <span>-1: Paper is not recommended for publication</span><br/>

                        {!! Form::radio('evaluation', '',['class' => 'form-control']) !!}
                        <span>-2: Paper is out of topic and rejected</span>
                    </div>

					<!--<div class="form-group">
						{!! Form::label('confidence', 'Reviewer Confidence:')!!}<br/>
						{!! Form::radio('confidence', '4',['class' => 'form-control']) !!}
						<span>2: Expert </span><br/>

						{!! Form::radio('confidence', '3',['class' => 'form-control']) !!}
						<span>1: High</span><br/>

						{!! Form::radio('confidence', '2',['class' => 'form-control']) !!}
						<span>0: Medium</span><br/>

						{!! Form::radio('confidence', '1',['class' => 'form-control']) !!}
						<span>-1: Low</span><br/>

						{!! Form::radio('confidence', '0',['class' => 'form-control']) !!}
						<span>-2: None</span>
					</div>-->

					<div class="form-group">
						{!! Form::label('rationale', 'The Author provides a strong rationale for why the study is needed:')!!}<br/>
                        {!! Form::radio('rationale', '',['class' => 'form-control']) !!}
                        <span>2: Strongly Agree </span><br/>

                        {!! Form::radio('rationale', '',['class' => 'form-control']) !!}
                        <span>1: Agree</span><br/>

                        {!! Form::radio('rationale', '',['class' => 'form-control']) !!}
                        <span>0: Partially agree</span><br/>

                        {!! Form::radio('rationale', '',['class' => 'form-control']) !!}
                        <span>-1: Disagree</span><br/>

                        {!! Form::radio('rationale', '',['class' => 'form-control']) !!}
                        <span>-2: Strongly Disagree</span><br/>
					</div>

					<div class="form-group">
						{!! Form::label('hypotheses', 'The research questions or hypotheses are clearly articulated:')!!}<br/>
						{!! Form::radio('hypotheses', '',['class' => 'form-control']) !!}
						<span>2: Strongly Agree </span><br/>

						{!! Form::radio('hypotheses', '',['class' => 'form-control']) !!}
						<span>1: Agree</span><br/>

                        {!! Form::radio('hypotheses', '',['class' => 'form-control']) !!}
                        <span>0: Partially agree</span><br/>

						{!! Form::radio('hypotheses', '',['class' => 'form-control']) !!}
						<span>-1: Disagree</span><br/>

						{!! Form::radio('hypotheses', '',['class' => 'form-control']) !!}
						<span>-2: Strongly Disagree</span><br/>
					</div>

					<div class="form-group">
						{!! Form::label('manuscript', 'The manuscript is creative or deals with the subject in a new or novel way:')!!}<br/>
                        {!! Form::radio('manuscript', '',['class' => 'form-control']) !!}
                        <span>2: Strongly Agree </span><br/>

                        {!! Form::radio('manuscript', '',['class' => 'form-control']) !!}
                        <span>1: Agree</span><br/>

                        {!! Form::radio('manuscript', '',['class' => 'form-control']) !!}
                        <span>0: Partially agree</span><br/>

                        {!! Form::radio('manuscript', '',['class' => 'form-control']) !!}
                        <span>-1: Disagree</span><br/>

                        {!! Form::radio('manuscript', '',['class' => 'form-control']) !!}
                        <span>-2: Strongly Disagree</span><br/>
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
