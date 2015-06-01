<!DOCTYPE html>
<html>
<head>
    <title>Conference Management System</title>

    <!-- Latest compiled and minified JavaScript -->
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    {{--<!-- Latest compiled and minified CSS -->--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">--}}
    {{--<!-- Optional theme -->--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/css/select2.min.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/js/select2.min.js"></script>

    <link href="css/style.css" rel="stylesheet">
    <!--Javascript for image slider-->
    <script type="text/javascript" src="javascript/jquerySlide.min.js"></script>
    <script type="text/javascript" src="javascript/image_slide.js"></script>
</head>
<body>
<div class="container">

    <h1 align="center">Conference Management System</h1>
    <br/>
    @include('partials.nav')

    @if(Session::has('flash_message'))
        <div class="alert alert-success {{Session::has('flash_message_important') ? 'alert-important' : '' }}">
            @if(Session::has('flash_message_important'))
                <button type="button" class="close" data-dismiss="alert" arial-hidden="true">&times;</button>
            @endif
            {{ Session::get('flash_message') }}
        </div>
    @endif

    @yield('content')

    <script>
        $('div.alert').not('alert-important').delay(2000).slideUp(300);
    </script>

    @yield('footer')
</div>


</body>
</html>