@extends('master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Paper Reports</div>
                    <div class="panel-body">

                        <h4 align="center">Summary of all paper status</h4>
                        {{--<table class="table table-striped table-bordered">--}}
                            {{--<thead>--}}
                            {{--<th>Type</th>--}}
                            {{--<th>Number of Papers</th>--}}
                            {{--</thead>--}}

                            {{--<tbody>--}}
                            {{--<tr>--}}
                                {{--<td>--}}
                                    {{--Number of Accepted Papers--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--{{$acceptNum}}--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td>--}}
                                    {{--Number of Rejected Papers--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--{{$rejectNum}}--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td>--}}
                                    {{--Number of All Submitted Papers--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--{{$allPapersNum}}--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--</tbody>--}}
                        {{--</table>--}}

                        <canvas id="daily-reports" width="600" height="300"></canvas>

                        <script>
                            (function() {
                                var ctx = document.getElementById('daily-reports').getContext('2d');
                                var chart = {
                                    labels: ['Accepted Paper','Rejected Papers','All Papers'],
                                    datasets: [{
                                        data: [
                                            {!! json_encode($acceptNum) !!}, {!! json_encode($rejectNum) !!}, {!! json_encode($allPapersNum) !!}
                                        ],
                                        fillColor : "#f8b1aa",
                                        strokeColor: "#bb574e",
                                        pointColor: "#bb574e"
                                    }]
                                };
                                new Chart(ctx).Bar(chart, {bezierCurve: false});
                            })();
                        </script>
                        <hr/>

                        <h4>Paper List</h4>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>All Papers</th>
                            <th>Reviewers' Name</th>
                            <th>Status</th>
                            <th>Submission Date</th>
                            </thead>

                            <tbody>
                            @foreach($allPapers as $allPaper)
                                <tr>
                                    <td>
                                        {{ $allPaper->title }}
                                    </td>
                                    <td>
                                        {{$allPaper->firstname}}
{{--                                        <a href="http://test.com">{{$allPaper->firstname}}</a>--}}
                                    </td>
                                    <td>
                                        @if($allPaper->status == 1 )
                                            Accept
                                        @elseif($allPaper->status == -1 )
                                            Reject
                                        @else
                                            Evaluating
                                        @endif
                                    </td>
                                    <td>
                                        {{ date("d M Y",strtotime($allPaper->created_at)) }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <h4>List of reviewer that not review paper</h4>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>All Papers</th>
                            <th>Reviewers' Name</th>
                            </thead>

                            <tbody>
                            @foreach($nullReviewer as $allPaper)
                                <tr>
                                    <td>
                                        {{ $allPaper->title }}
                                    </td>
                                    <td>
                                        {{$allPaper->firstname}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
