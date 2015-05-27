@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Invitation Status</div>
                    <div class="panel-body">

                        <h2>Reviewer Invitation Status</h2>

                        <hr/>

                        <table class="table table-striped table-bordered">
                            <thead>
                            {{--<th>Name</th>--}}
                            <th>Email Address</th>
                            <th>Date and Time</th>
                            <th>Status</th>
                            <th>Action</th>
                            </thead>

                            <tbody>
                            @foreach($invitations as $invitation)
                                <tr>
                                    <td>{{$invitation->recipient_id}}</td>
                                    <td>{{$invitation->created_at}}</td>
                                    <td>
                                    @if($invitation->registerUponInvitation != null)
                                        Accept
                                    @else
                                        Pending
                                    @endif
                                    </td>
                                    <td>
                                        @if($invitation->registerUponInvitation != null)
                                            No Action
                                        @else
                                            <a href="/conferenceChair" class="btn btn-default">Resend Invitation</a>
                                            <a href="/conferenceChair/invitationCancel" class="btn btn-default">Cancel Invitation</a>
                                        @endif
                                    </td>
                                </tr>
                                </tr>
                            @endforeach
                            {{--<tr>--}}
                            {{--<td>John Cena</td>	--}}
                            {{--<td>johncena@email.com</td>		--}}
                            {{--<td>2015-02-14</td>--}}
                            {{--<td>Accepted</td>--}}
                            {{--<td>--}}
                            {{--<a href="/conferenceChair" class="btn btn-default">Resend</a>--}}
                            {{--<a href="/conferenceChair/invitationCancel" class="btn btn-default">Cancel Invitation</a>--}}
                            {{--</td>					--}}
                            {{--</tr>--}}

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
