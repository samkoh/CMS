@extends('master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Paper Reports</div>
                    <div class="panel-body">

                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>All Reviewed Papers</th>
                            <th>Reviewers</th>
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
                                    </td>
                                    <td>
                                        @if($allPaper->status == 1 )
                                            Accept
                                        @else
                                            Reject
                                        @endif
                                    </td>
                                    <td>
                                        {{ $allPaper->created_at }}
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
