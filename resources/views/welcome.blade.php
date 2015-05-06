@extends('app')

@section('content')

    <html>
    <head>
        <title>CMS</title>
        {{----}}
        {{--<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>--}}

        {{--<style>--}}
        {{--body {--}}
        {{--margin: 0;--}}
        {{--padding: 0;--}}
        {{--width: 100%;--}}
        {{--height: 100%;--}}
        {{--color: #B0BEC5;--}}
        {{--display: table;--}}
        {{--font-weight: 100;--}}
        {{--font-family: 'Lato';--}}
        {{--}--}}

        {{--.container {--}}
        {{--text-align: center;--}}
        {{--display: table-cell;--}}
        {{--vertical-align: middle;--}}
        {{--}--}}

        {{--.content {--}}
        {{--text-align: center;--}}
        {{--display: inline-block;--}}
        {{--}--}}

        {{--.title {--}}
        {{--font-size: 96px;--}}
        {{--margin-bottom: 40px;--}}
        {{--}--}}

        {{--.quote {--}}
        {{--font-size: 24px;--}}
        {{--}--}}
        {{--</style>--}}
        <title>Conference Management System</title>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <link href="css/style.css" rel="stylesheet">
        <script type="text/javascript" src="javascript/jquerySlide.min.js"></script>
        <script type="text/javascript" src="javascript/image_slide.js"></script>
    </head>
    <body>
    {{--<div class="container">--}}
    {{--<div class="content">--}}
    {{--<div class="title">Welcome to Conference Management System</div>--}}
    {{--<div class="quote">{{ Inspiring::quote() }}</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="homepicture">
        <img width="900" height="250" src="images/slide_image_1.jpg"/>
    </div>
    <div id="wrapper">
        <div id="content">
            <div id="content">
                <h1>Welcome to the <font color="#1e90ff">MyConf2015</font> CMS Home Page</h1>
            </div>
            <br/>

            <div id="">
                <p><strong>MyConf2015</strong> is software engineering conference with aim to converge researches and practitioners
                    from academia, industry and government sectors to advance the state-of-the-art of software engineering research and practice.
                </p>
                <p>
                    This year, <strong>MyConf2015</strong> is inviting academics, researchers, and practitioners to propose special sessions in
                    the conference. The special sessions focus on critical and emerging topics in software engineering,
                    preferably of interest to a relatively large audience.
                </p>
            </div>

            <div id="posts">
                <h2>CMS Provides: </h2>
                <ol>
                    <li>submission of papers to review</li>
                    <li>different interface for different user role</li>
                    <li>manage and monitor the program committee</li>
                    <li>allow reviewers to bit on the papers by themselves</li>
                    <li>show the latest event and announcement in the Home page</li>
                    <li>online discussion of papers by reviewers</li>
                    <li>sending email to authors, committee, reviewers, and those related users</li>
                </ol>
            </div>

            <div id="posts">
                <h2>CMS Role Introduction</h2>
                <ol>
                    <li><strong><i>Conference Chair:</i></strong>
                        <div id="posts">
                            Conference Chair is the person that is registered and confirmed by CMS system admin upon create a new
                            conference. Conference Chair has the privilege to access all of the module and can consider as upper
                            access level besides of system admin.
                        </div>
                    </li>
                    <br/>
                    <li><strong><i>Conference Manager:</i></strong>
                        <div id="posts">
                            Conference Manager is being assigned by Conference Chair to handle some of the tasks such as assign
                            conference committee. For example, Conference Manager will be given privilege to assign 2 types of committee roles such as
                            program committee and technical committee.
                        </div>
                    </li>
                    <br/>
                    <li><strong><i>Conference Committee:</i></strong>
                        <div id="posts">
                            Conference Committee is being assigned by conference manager to handle task that is given by conference manager and
                            each of the member in the committee will be assigned to roles such as Program committee or Technical committee.
                        </div>
                    </li>
                    <br/>
                    <li><strong><i>Reviewer:</i></strong>
                        <div id="posts">
                            Reviewer will be invited by Conference Chair before they register as reviewer for that particular conference. The responsibility
                            of reviewer is bids on the paper to review or being assigned by Conference Chair for paper review.
                        </div>
                    </li>
                    <br/>
                    <li><strong><i>Author:</i></strong>
                        <div id="posts">
                           An author for the CMS can access to the system after the made registration. Author can submit their paper and view the
                            comment that is given by the reviewer regarding to their submitted paper.
                        </div>
                    </li>
                    <br/>
                    <li><strong><i>Participants:</i></strong>
                        <div id="posts">
                            Participants has limited access to this CMS system because they can view the general information of this CMS such as
                            program proceeding, program schedule, make payment, and so on.
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    </body>
    </html>

@endsection
