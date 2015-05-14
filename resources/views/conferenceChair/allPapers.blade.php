@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">All Review Papers</div>
                    <div class="panel-body">

                        {{--@foreach($reviewerNo as $index => $reviewer)--}}
                            {{--<li><a href="/conferenceChair/allPapers/{{ $index }}">({{ $reviewer->ReviewerNo }})--}}
                                    {{--- {{ $reviewer->title }}</a></li>--}}
                        {{--@endforeach--}}

                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>No of Reviewers</th>
                            <th>All Submitted Papers</th>
                            </thead>

                            <tbody>
                            @foreach($reviewerNo as $index => $reviewer)
                                <tr>
                                    <td>{{ $reviewer->ReviewerNo }}</td>
                                    <td>
                                        <a href="/conferenceChair/allPapers/{{ $index }}">{{ $reviewer->title }}</a>
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
