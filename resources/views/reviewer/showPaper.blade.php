@extends('master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">My Review Paper</div>
				<div class="panel-body">

				@include('partials.reviewer_nav')

				<h3>Paper Name: {{ $paper }}</h3>

				<hr/>

				{!! Form::open() !!}

					<div class="form-group">
						{!! Form::label('title', 'Title:')!!}
						{!! Form::text('name', 'Man-Computer Symbiosis', array('disabled' => 'disabled', 'class' => 'form-control')) !!}
					</div>

					<div class="form-group">
						{!! Form::label('type', 'Submission Type:')!!}
						{!! Form::text('type', 'Paper', array('disabled' => 'disabled', 'class' => 'form-control')) !!}
					</div>

					<div class="form-group">
						{!! Form::label('abstract', 'Abstract:')!!}
						{!! Form::textarea('abstract', 'Man-computer symbiosis is an expected development in cooperative interaction between men and electronic computers. It will involve very close coupling between the human and the electronic members of the partnership. The main aims are 1) to let computers facilitate formulative thinking as they now facilitate the solution of formulated problems, and 2) to enable men and computers to cooperate in making decisions and controlling complex situations without inflexible dependence on predetermined programs. In the anticipated symbiotic partnership, men will set the goals, formulate the hypotheses, determine the criteria, and perform the evaluations. Computing machines will do the routinizable work that must be done to prepare the way for insights and decisions in technical and scientific thinking. Preliminary analyses indicate that the symbiotic partnership will perform intellectual operations much more effectively than man alone can perform them. Prerequisites for the achievement of the effective, cooperative association include developments in computer time sharing, in memory components, in memory organization, in programming languages, and in input and output equipment.'
						,array('disabled' => 'disabled', 'class' => 'form-control')) !!}
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
