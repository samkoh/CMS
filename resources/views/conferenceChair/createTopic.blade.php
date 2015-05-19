@extends('master')

@section('content')
    <div id="wrapper">
        <div style="width: 100%;">
            <div style="float: left; width: 20%;">
                <h4>Conference Topic List:</h4>

                @foreach($topics as $topic)

                    <li>
                        {{ $topic->name }}
                    </li>

                @endforeach
            </div>

            <div style="float:left; width: 70%; margin-left: 50px;">
                <h2>Insert a new conference topic</h2>

                {!! Form::open(['action' => 'ConfChair\ConfChairCreateTopicController@store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'New topic:')!!}
                    {!! Form::text('name', null, array('required','class'=>'form-control','placeholder'=>'Topic')) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
