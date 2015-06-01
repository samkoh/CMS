@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Discussion</div>
                    <div class="panel-body">

                        <br/>

                        <h3>Conflict Papers:</h3>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>Status</th>
                            <th>Title</th>
                            <th>Date</th>
                            </thead>

                            <tbody>
                            @foreach($conflictPapers as $index => $conflictPaper)
                                <tr>
                                    <td>
                                        @if($conflictPaper->tempStatus == -3 )
                                            Conflict
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/conferenceChair/confDiscussion/{{ $conflictPaper->id }}">{{ $conflictPaper->title }}</a>
                                    </td>
                                    <td>{{ date("d M Y",strtotime($conflictPaper->created_at)) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <h3>Reject Papers:</h3>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>Status</th>
                            <th>Title</th>
                            <th>Date</th>
                            </thead>

                            <tbody>
                            @foreach($rejectPapers as $index => $rejectPaper)
                                <tr>
                                    <td>
                                        @if($rejectPaper->tempStatus == -1 )
                                            Reject
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/conferenceChair/confDiscussion/{{ $rejectPaper->id }}">{{ $rejectPaper->title }}</a>
                                    </td>
                                    <td>{{ date("d M Y",strtotime($rejectPaper->created_at)) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <h3>Accept Papers:</h3>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>Status</th>
                            <th>Title</th>
                            <th>Date</th>
                            </thead>

                            <tbody>
                            @foreach($acceptPapers as $index => $acceptPaper)
                                <tr>
                                    <td>
                                        @if($acceptPaper->tempStatus == 1 )
                                            Accept
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/conferenceChair/confDiscussion/{{ $acceptPaper->id }}">{{ $acceptPaper->title }}</a>
                                    </td>
                                    <td>{{ date("d M Y",strtotime($acceptPaper->created_at)) }}</td>
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
