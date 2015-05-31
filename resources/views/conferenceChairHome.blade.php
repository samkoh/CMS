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
                <div id="links">
                    <ul>
                        <li>
                            <h2><strong><i>Announcement</i></strong></h2>
                            <ul>
                                <li>To be inform that our last paper review is before <strong><p class="date">July
                                            25,2015</p></strong></li>
                            </ul>
                        </li>
                        <li>
                            <h2>Conference Chair</h2>
                            <ul>
                                <li>Richard Sayre</li>
                            </ul>
                        </li>
                        <li>
                            <h2>Conference Speaker</h2>
                            <ul>
                                <li>Micah Atkin, <i>Australia</i></li>
                                <li>Dr Till T. Bachmann, <i>UK</i></li>
                                <li>Prof. Nigel James , <i>UK</i></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <br/>

                <div>
                    <div class="post">
                        <div class="post">
                            <h2>Overall created Conferences List</h2>

                            @foreach($conferences as $conference)
                                <li>
                                    {{ $conference->conferenceName }}
                                </li>
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- end #links -->
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
