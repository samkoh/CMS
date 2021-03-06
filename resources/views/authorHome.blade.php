@extends('master')

@section('content')

    <html xmlns="http://www.w3.org/1999/xhtml">

    <body>
    <div id="wrapper">
        <div id="header">
            <h1>Welcome <strong><font color="43C6DB">{{ Auth::user()->firstname }}</font></strong> to the Author Home
                Page</h1>

            <div class="slideshow">
                <ul class="slideshow">
                    <li class="show"><img width="820" height="250" src="images/slide_image_3.jpg"/></li>
                    <li class="show"><img width="820" height="250" src="images/slide_image_1.jpg"/></li>
                    <li><img width="820" height="250" src="images/slide_image_2.jpg"/></li>
                </ul>
            </div>
            <!--close slideshow-->
        </div>
        <!-- end #header -->
        <div id="content">
                {{--<div class="post">--}}
                    <p>MyConf2015 invites submissions of high-quality research papers describing original and unpublished work.
                    The topics are as shown as below and take note that our conference topics are not limited to the list below.
                    Do check our website for the latest topics.</p>
                {{--</div>--}}

            <!-- end #posts -->
            <div id="links">
                <ul>
                    <li>
                        <h2><strong><i>Announcement</i></strong></h2>
                        <ul>
                            <li>To be inform that our last paper submission is before <strong><p class="date">July
                                        02,2015</p></strong></li>
                        </ul>
                    </li>
                    <li>
                        <h2>Conference Chair</h2>
                        <ul>
                            <li>{{$confChairName->firstname}} {{$confChairName->lastname}},  <i>{{$confChairName->country}}</i></li>
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
                <h2><strong>Conference Topic</strong></h2>

                @foreach($topics as $topic)
                    <li>
                        {{ $topic->name }}
                    </li>
                @endforeach

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
        <!-- end #content -->
    </div>
    <!-- end #wrapper -->
    <div id="footer">
        <p id="legal">Copyright &copy; 2015 Conference Management System. </p>
    </div>
    </body>
    </html>

@endsection
