@extends('master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">Invitation Status</div>
				<div class="panel-body">

				<h3>Reviewer Invitation Status</h3>

				<hr/>

				<table class="table table-striped table-bordered">
					<thead>
						<th>Name</th>
						<th>Email Address</th>
						<th>Date</th>
						<th>Status</th>
						<th>Action</th>
					</thead>

					<tbody>
						
							<tr>
							<td>Luke Harper</td>	
							<td>luke@email.com</td>		
							<td>2015-03-11</td>
							<td>Pending</td>
							<td>
								<a href="/conferenceChair " class="btn btn-default">Resend</a>
								<a href="/conferenceChair/invitationCancel" class="btn btn-default">Cancel Invitation</a>
							</td>					
							</tr>

							<tr>
							<td>John Cena</td>	
							<td>johncena@email.com</td>		
							<td>2015-02-14</td>
							<td>Accepted</td>
							<td>
								<a href="/conferenceChair" class="btn btn-default">Resend</a>
								<a href="/conferenceChair/invitationCancel" class="btn btn-default">Cancel Invitation</a>
							</td>					
							</tr>
					
					</tbody>		
				</table>

				</div>
			</div>
		</div>
	</div>
</div>
	
	

@endsection
