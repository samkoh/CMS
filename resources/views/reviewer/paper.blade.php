@extends('master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">My Review Paper</div>
				<div class="panel-body">

				@include('partials.reviewer_nav')

				@foreach($papers as $index => $paper)
					<li><a href="/reviewer/paper/{{ $index }}">{{ $paper }}</a></li>
				@endforeach

				</div>
			</div>
		</div>
	</div>
</div>
	
	

@endsection
