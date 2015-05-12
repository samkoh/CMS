@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Discussion</div>
                    <div class="panel-body">


                        @include('partials.reviewer_nav')

                        <br/>

                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>Status</th>
                            <th>Average Marks</th>
                            <th>Title</th>
                            <th>Date</th>
                            </thead>

                            <tbody>
                            @foreach($papers as $index => $paper)
                                <tr>
                                    <td>{{ $paper->status }}</td>
                                    <td>{{ $paper->averageMarks }}</td>
                                    <td>
                                        <li><a href="/reviewer/discussion/{{ $index }}">{{ $paper->title }}</a></li>
                                    </td>
                                    <td>{{ date("d M Y",strtotime($paper->created_at)) }}</td>
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
