@extends('master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Reviewer Home Page</div>
				<div class="panel-body">

				@include('partials.reviewer_nav')

				</div>
			</div>
		</div>
	</div>
</div>


@endsection
