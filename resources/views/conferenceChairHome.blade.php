@extends('master')

@section('content')

    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>Conference Management System</title>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <link href="css/style.css" rel="stylesheet">
        <script type="text/javascript" src="javascript/jquerySlide.min.js"></script>
        <script type="text/javascript" src="javascript/image_slide.js"></script>
    </head>

    <body>
    <div id="wrapper">
        <div id="header">
            <h1>Welcome <strong><font color="yellow">{{ Auth::user()->firstname }}</font></strong> to the Conference Chair Home
                Page</h1>

            <div class="slideshow">
                <ul class="slideshow">
                    <li class="show"><img width="900" height="250" src="images/slide_image_3.jpg"/></li>
                    <li class="show"><img width="900" height="250" src="images/slide_image_1.jpg"/></li>
                    <li><img width="900" height="250" src="images/slide_image_2.jpg"/></li>
                </ul>
            </div>
            <!--close slideshow-->
        </div>
        <!-- end #header -->
        <div id="content">
            <div id="posts">
                {{--<div class="post">--}}
                {{--<h2>Welcome  <strong><font color="yellow">{{ Auth::user()->firstname }}</font></strong> to the Reviewer Page</h2>--}}

                {{--<div class="story">--}}
                {{--<p><strong>Conference Management System</strong> is web based software that supports the--}}
                {{--organization of conferences especially scientific conferences. It helps the program--}}
                {{--chair(s),--}}
                {{--the conference organizers, the authors and the reviewers in their respective activities.--}}
                {{--</p>--}}

                {{--<p>--}}
                {{--A <strong>Conference Management System</strong> can be regarded as a domain-specific content--}}
                {{--management system.--}}
                {{--Similar systems are used today by editors of scientific journals.--}}
                {{--</p>--}}
                {{--</div>--}}
                {{--</div>--}}

                <!-- end #posts -->
                <div style="float: left;">
                        <h2>Overall created Conferences List</h2>
                        <ol>
                            @foreach($conferences as $conference)
                                <li>{{ $conference->conferenceName }}</li>
                            @endforeach
                        </ol>

                    <h2>Conference Manager's Name</h2>
                    <ol>
                        @foreach($conferenceManagers as $conferenceManager)
                            <li>{{$conferenceManager->nameTitlePrefix}}
                                . {{  $conferenceManager->firstname }} {{  $conferenceManager->lastname }},
                                <i>  {{ $conferenceManager->country }}</i></li>
                        @endforeach
                    </ol>

                    <h2>Committees' Name</h2>
                    <ol>
                        @foreach($committeeNames as $committeeName)
                            <li>{{$committeeName->nameTitlePrefix}}
                                . {{  $committeeName->firstname }} {{  $committeeName->lastname }},
                                <i>  {{ $committeeName->country }}</i></li>
                        @endforeach
                    </ol>
                </div>
                <div>
                    <div style="float:right; ">
                        <h2>Reviewers' Name</h2>
                        <ol>
                            @foreach($reviewerNames as $reviewerName)
                                <li>{{$reviewerName->nameTitlePrefix}}
                                    . {{  $reviewerName->firstname }} {{  $reviewerName->lastname }},
                                    <i>  {{ $reviewerName->country }}</i></li>
                            @endforeach
                        </ol>

                        <h2>Author' Name</h2>
                        <ol>
                            @foreach($authorNames as $authorName)
                                <li>{{$reviewerName->nameTitlePrefix}}
                                    . {{  $authorName->firstname }} {{  $reviewerName->lastname }},
                                    <i>  {{ $reviewerName->country }}</i></li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <!-- end #list -->
                <div style="clear: both;">&nbsp;</div>
            </div>
        </div>
        <!-- end #content -->
        <div id="footer">
            <p id="legal">Copyright &copy; 2015 Conference Management System. </p>
        </div>
    </body>
    </html>

@endsection
