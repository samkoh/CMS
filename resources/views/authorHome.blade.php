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
            {{--<h1>Conference Management System</h1>--}}

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
                <div class="post">
                    <h2>Welcome  <strong><font color="yellow">{{ Auth::user()->name }}</font></strong> to the Conference Management System</h2>

                    <div class="story">
                        <p><strong>Conference Management System</strong> is web based software that supports the
                            organization of conferences especially scientific conferences. It helps the program
                            chair(s),
                            the conference organizers, the authors and the reviewers in their respective activities.
                        </p>

                        <p>
                            A <strong>Conference Management System</strong> can be regarded as a domain-specific content
                            management system.
                            Similar systems are used today by editors of scientific journals.
                        </p>
                    </div>
                </div>
                <div class="post">
                    <h2 class="title">Feedback</h2>

                    <div class="story">
                        <p>Below are the feedback regarding to the conferences that is given by the users regarding to
                            conferences that are created using this system. Each of the conference
                            that is
                            created using this system has bring a lot of positive feedback from the users.</p>
                        <blockquote>
                            <li>This system is useful and it saves me a lot of time !
                                <p class="date">Posted on May 05, 2014 by Amin</p>
                            </li>
                            <br/>
                            <li>I love this system, i found it every useful when I participated in last year Conference
                                that held in Russia!
                                <p class="date">Posted on March 08, 2014 by George</p>
                            </li>
                        </blockquote>
                    </div>

                    <br/>
                    <div class="post">
                        <h2>Past Conferences List</h2>
                        <ul>
                            <li><a href="http://www.biosensingconference.com/">4th International Conference on
                                    Bio-Sensing Technology</a></li>
                            <li><a href="http://icsdec.com/">International Conference on Sustainable Design, Engineering
                                    and Construction - ICSDEC 2015</a></li>
                            <li><a href="http://www.frontiersinpolymerscience.com/">Fourth International Symposium
                                    Frontiers in Polymer Science</a></li>
                            <li><a href="http://www.algalbbb.com/">5th International Conference on Algal Biomass,
                                    Biofuels and Bioproducts</a></li>
                            <li><a href="http://www.tetrahedron-symposium.elsevier.com/">16th Tetrahedron Symposium</a>
                            </li>
                            <li><a href="http://www.plantgenomeevolution.com/">Plant Genome Evolution 2015</a></li>
                        </ul>
                    </div>
                    {{--<ul id="tabs">--}}
                    {{--<li><a href="#" name="tab1">One</a></li>--}}
                    {{--<li><a href="#" name="tab2">Two</a></li>--}}
                    {{--</ul>--}}

                    {{--<div id="content">--}}
                    {{--<div id="tab1">...</div>--}}
                    {{--<div id="tab2">...</div>--}}
                    {{--</div>--}}

                </div>
            </div>
            <!-- end #posts -->
            <div id="links">
                <ul>
                    <li>
                        <h2><strong><i>Announcement</i></strong></h2>
                        <ul>
                            <li>To be inform that our last paper submission is before <strong><p class="date">July 02,2015</p></strong></li>
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
                <li>
                    <h2><strong>Conference Topic</strong></h2>
                    <ul>
                        <li>Human vaccines - infectious diseases</li>
                        <li>Human vaccines - non-infectious diseases</li>
                        <li>Veterinary vaccines</li>
                        <li>Vaccine safety</li>
                        <li>Immunology / animal models</li>
                        <li>Dealing with difficult patrons </li>
                        <li>Retention and demonstrating value</li>
                        <li>Change management </li>
                        <li>Linked data</li>
                        <li>Metadata</li>

                    </ul>
                </li>
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
