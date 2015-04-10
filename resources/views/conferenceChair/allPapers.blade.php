@extends('master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">All Review Papers</div>
				<div class="panel-body">

				@foreach($papers as $index => $paper)
					<li><a href="/conferenceChair/allPapers/{{ $index }}">{{ $paper }}</a></li>
				@endforeach

				</div>
			</div>
		</div>
	</div>
</div>
	
	

@endsection
