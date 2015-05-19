@extends('master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Finalize the Papers</div>
                    <div class="panel-body">

                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>All Reviewed Papers</th>
                            <th>Temporary Status</th>
                            <th>Final Status</th>
                            </thead>

                            <tbody>
                            @foreach($allReviewedPapers as $reviewedPapers)
                                <tr>
                                    <td>
                                        <a href="/conferenceChair/finalizeAllPapers/{{ $reviewedPapers->id }}">{{ $reviewedPapers->title }}</a>
                                    </td>
                                    <td>
                                        @if($reviewedPapers->tempStatus == 1 )
                                            Accept
                                        @elseif($reviewedPapers->tempStatus == -1)
                                            Reject
                                        @else
                                            Evaluating
                                        @endif
                                    </td>
                                    <td>
                                        @if($reviewedPapers->status == 1 )
                                            Accept
                                        @elseif($reviewedPapers->status == -1)
                                            Reject
                                        @else
                                            Not yet finalized
                                        @endif
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
