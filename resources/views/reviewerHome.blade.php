@extends('master')

@section('content')

    <html xmlns="http://www.w3.org/1999/xhtml">

    <body>
    <div id="wrapper">
        <div id="header">
            <h1>Welcome <strong><font color="43C6DB">{{ Auth::user()->firstname }}</font></strong> to the Reviewer Home
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
            <div id="posts">
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
                    <h2><strong>Paper Submission List</strong></h2>
                    <ol>
                        @foreach($papers as $index => $paper)
                            <li>{{ $paper->title }}</li>
                        @endforeach
                    </ol>
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
