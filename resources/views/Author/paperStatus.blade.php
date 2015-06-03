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
                            <th>Submitted Paper (s)</th>
                            <th>Submitted Date</th>
                            <th>Paper Status</th>
                            </thead>

                            <tbody>
                            @foreach($papers as $paper)
                                <tr>
                                    <td>
                                        <a href="/author/paperStatus/{{ $paper->id }}">{{ $paper->title }}</a>
{{--                                        {{ $paper->title }}--}}
                                    </td>
                                    <td>
                                        {{ date("d M Y",strtotime($paper->created_at)) }}
                                    </td>
                                    <td>
                                        @if($paper->status == 1 )
                                            Accept
                                        @elseif($paper->status == -1)
                                            Reject
                                        @else
                                           Evaluating
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
