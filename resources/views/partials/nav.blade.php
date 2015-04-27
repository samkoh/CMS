<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="https://laracasts.com/series/build-your-first-app-in-laravel">Conference Home</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="/">Home</a></li>					

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Conference Chair <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/conferenceChair/">Send Invitation</a></li>
								<li><a href="/conferenceChair/allPapers">Assign Papers</a></li>		
								<li><a href="/conferenceChair/invitationStatus">Reviewer Invitation Status</a></li>
                                <li><a href="/conferenceChair/sendBulkEmail">Bulk Email</a></li>
                                <li><a href="/conferenceChair/createConference">Create a new conference</a></li>
                                <li><a href="/conferenceChair/createConferenceFee">Conference Fee</a></li>
                                <li><a href="/conferenceChair/createTopic">Create Topic</a></li>
                            </ul>
					</li>

					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reviewer <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/reviewer/reviewerRegistration">Registration</a></li>
                            <li><a href="/reviewer">Paper</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Author <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/author">Submit Paper</a></li>
                        </ul>
                    </li>

				</ul>				

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="/auth/login">Login</a></li>
						<li><a href="/auth/register">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/auth/logout">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	<!-- Latest compiled and minified CSS -->
	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

	<!-- Latest compiled and minified JavaScript -->
	<script src="{{ asset('/javascript/bootstrap.js') }}" type="text/javascript" charset="utf-8" async defer></script>
