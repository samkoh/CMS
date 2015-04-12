@extends('master')

@section('content')

    <h3>Create a Conference</h3>

    {!! Form::open() !!}

    <div class="form-group">
        {!! Form::label('name', 'Name of the conference:')!!}
        {!! Form::text('name', null, array('required','class'=>'form-control','placeholder'=>'Email Address')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('acronym', 'Acronym:')!!}
        {!! Form::text('acronym', null, array('required','class'=>'form-control','placeholder'=>'Acronym')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('topic', 'Conference Topic :') !!}
        {!! Form::select('topic',$topic, 'null', ['id' => 'topic_list','class' =>
        'form-control', 'multiple'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('address', 'Address:')!!}
        {!! Form::textarea('address', null, array('required','class'=>'form-control','placeholder'=>'Address')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('website', 'Website URL:')!!}
        {!! Form::text('website', null, array('required','class'=>'form-control','placeholder'=>'URL')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:')!!}
        {!! Form::text('email', null, array('required','class'=>'form-control','placeholder'=>'Email')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('contact', 'Contact No:')!!}
        {!! Form::text('contact', null, array('required','class'=>'form-control','placeholder'=>'Contact No')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('faxno', 'Fax No:')!!}
        {!! Form::text('faxno', null, array('required','class'=>'form-control','placeholder'=>'Fax No')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('startDate', 'Conference Start Date:') !!}
        {!! Form::input('date','startDate', null, ['class' => 'form-control']) !!} <!--This is the method for the date-->
    </div>

    <div class="form-group">
        {!! Form::label('endDate', 'Conference End Date:') !!}
        {!! Form::input('date','endDate', null, ['class' => 'form-control']) !!} <!--This is the method for the date-->
    </div>

    <div class="form-group">
        {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    <script>
        $('#topic_list').select2({
            placeholder: 'Please select a topic',
            tags: true
        });
    </script>

@endsection
