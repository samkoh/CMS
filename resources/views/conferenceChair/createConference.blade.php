@extends('master')

@section('content')

    <div style="float: left; width: 20%;">
        <h4>Conference Topic List created by <strong><font color="#43C6DB">{{ Auth::user()->firstname }}</font></strong>:</h4>

        @foreach($conferences as $conference)

            <li>
                {{ $conference->conferenceName }}
            </li>

        @endforeach
    </div>

    <div style="float:left; width: 70%; margin-left: 50px;">
        <h2>Create a Conference</h2>

        {!! Form::open(['action' => 'ConfChair\ConfChairCreateConferenceController@store']) !!}

        {{--{!! Form::hidden('user_id', 1)!!}--}}

        <div class="form-group">
            {!! Form::label('conferenceName', 'Name of the conference:')!!}
            {!! Form::text('conferenceName', null, array('required','class'=>'form-control','placeholder'=>'Conference Name')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('acronym', 'Acronym:')!!}
            {!! Form::text('acronym', null, array('required','class'=>'form-control','placeholder'=>'Acronym')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('theme', 'Theme:')!!}
            {!! Form::text('theme', null, array('required','class'=>'form-control','placeholder'=>'Theme')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('topic', 'Conference Topic :') !!}
            {!! Form::select('topic[]',$topics, 'null', ['id' => 'topic_list','class' =>
            'form-control', 'multiple'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('address', 'Venue:')!!}
            {!! Form::textarea('address', null, array('required','class'=>'form-control','placeholder'=>'Venue')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('websiteURL', 'Website URL:')!!}
            {!! Form::text('websiteURL', null, array('required','active_url', 'class'=>'form-control','placeholder'=>'Website URL')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('conferenceEmail', 'Email:')!!}
            {!! Form::email('conferenceEmail', null, array('required','class'=>'form-control','placeholder'=>'Please enter your Email')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('contactNo', 'Contact No:')!!}
            {!! Form::text('contactNo', null, array('required','class'=>'form-control','placeholder'=>'Contact No')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('faxNo', 'Fax No:')!!}
            {!! Form::text('faxNo', null, array('required','class'=>'form-control','placeholder'=>'Fax No')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('startDate', 'Conference Start Date:') !!}
            {!! Form::input('date','startDate', null, ['class' => 'form-control']) !!}
            <!--This is the method for the date-->
        </div>

        <div class="form-group">
            {!! Form::label('endDate', 'Conference End Date:') !!}
            {!! Form::input('date','endDate', null, ['class' => 'form-control']) !!}
            <!--This is the method for the date-->
        </div>

        <div class="form-group">
            {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>



    <script>
        $('#topic_list').select2({
            placeholder: 'Please select a topic',
            tags: true
        });
    </script>



@endsection
