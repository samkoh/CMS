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
                            <th>Rate</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Date</th>
                            </thead>

                            <tbody>
                            @foreach($papers as $index => $paper)
                                <tr>
                                    <td>Accept</td>
                                    <td>2</td>
                                    <td>
                                        <li><a href="/reviewer/discussion/{{ $index }}">{{ $paper }}</a></li>
                                    </td>
                                    <td>Paper</td>
                                    <td>2015-03-21</td>
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
