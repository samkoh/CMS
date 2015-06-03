
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Conference
                Home</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/home">Home</a></li>

                @if(Session::has('confChair'))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Conference
                            Chair <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/conferenceChair/">Send Invitation</a></li>
                            <li><a href="/conferenceChair/allPapers">Assign Papers</a></li>
                            <li><a href="/conferenceChair/invitationStatus">Reviewer Invitation Status</a></li>
                            {{--<li><a href="/conferenceChair/sendBulkEmail">Bulk Email</a></li>--}}
                            <li><a href="/conferenceChair/createConference">Create a new conference</a></li>
                            {{--<li><a href="/conferenceChair/createConferenceFee">Conference Fee</a></li>--}}
                            <li><a href="/conferenceChair/createTopic">Create Topic</a></li>
                            <li><a href="/conferenceChair/finalizeAllPapers">Finalize All Papers</a></li>
                            <li><a href="/conferenceChair/paperReport">Paper Report</a></li>
                            <li><a href="/conferenceChair/confDiscussion">Paper Discussion</a></li>
                            <li><a href="/conferenceChair/usersProfile">User Profile</a></li>
                        </ul>
                    </li>
                @endif

                @if(Session::has('reviewer'))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reviewer
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            {{--<li><a href="/reviewer/reviewerRegistration">Registration</a></li>--}}
                            <li><a href="/reviewer">My Paper</a></li>
                        </ul>
                    </li>
                @endif

                @if(Session::has('author'))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Author
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/author">Submit Paper</a></li>
                            <li><a href="/author/paperStatus">Paper Status</a></li>

                        </ul>
                    </li>
                @endif

                <li class="active"><a href="/profile">Profile</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="/auth/login">Login</a></li>
                    <li><a href="/auth/register">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ Auth::user()->firstname }} <span class="caret"></span></a>
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
<!-- Latest compiled and minified CSS -->