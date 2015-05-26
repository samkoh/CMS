@extends('master')

@section('content')
    <div id="wrapper">
        <div style="width: 100%;">
            <div style="float: left; width: 100%;">
                <h3>Users List:</h3>
                <br/>
                <table class="table table-striped table-bordered">
                    <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    </thead>
                    <tbody>

                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{ $user->firstname }}
                            </td>
                            <td>
                                {{$user->lastname}}
                            </td>
                            <td>
                                <a href="/conferenceChair/usersProfile/{{ $user->email }}">
                                    {{ $user->email }}
                            </td>
                            <td>
                                @if($user->user_role_id == 2)
                                    Conference Manager
                                @elseif($user->user_role_id == 3)
                                    Program Committee
                                @elseif($user->user_role_id == 4)
                                    Technical Committee
                                @elseif($user->user_role_id == 5)
                                    Reviewer
                                @elseif($user->user_role_id == 6)
                                    Author
                                @else
                                    Participant
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>

            </div>
        </div>
    </div>

@endsection
