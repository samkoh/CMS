Hello, {{ $name }} with email {{ $email }}

@foreach($ConferenceName as $confName)
    I am the program chair of {{$confName->conferenceName}} 2015.
@endforeach

I am here to invite you to become one of the Paper Committee Member of this conference.

If you are interested in joining us, please click the following link to register before 1st July 2015

http://localhost/auth/show/{{$ConferenceId}}

Please do reply me if you are not interested in joining us.

Thank You,

Sincerely,

{{ $SenderName }}

{{ $SenderEmail }}