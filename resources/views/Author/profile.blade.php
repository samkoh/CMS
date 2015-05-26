@extends('master')

@section('content')

    <h2>User Profile</h2>
    @if(Auth::user()->email == $user->email)

        {!! Form::model($user, ['url' => 'profile/' . $user->email, 'method' => 'PATCH']) !!}

        <div class="form-group">
            {!! Form::label('firstname', 'First Name:')!!}
            {!! Form::text('firstname', $user->firstname, array('required','class'=>'form-control','placeholder'=>'first
            name')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('lastname', 'Last Name:')!!}
            {!! Form::text('lastname', $user->lastname, array('required','class'=>'form-control','placeholder'=>'last
            name')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email Address:')!!}
            {!! Form::text('email', $user->email, array('disabled' =>
            'disabled','class'=>'form-control','placeholder'=>'email')) !!}
        </div>

        {{--<div class="form-group">--}}
        {{--{!! Form::label('nameTitlePrefix', 'Title:')!!}--}}
        {{--{!! Form::select('nameTitlePrefix',['Sir', 'Mr'] , 'null', ['id' => '','class' => 'form-control', ''])!!}--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
        {{--{!! Form::label('gender', 'Gender:')!!}--}}
        {{--{!! Form::select('gender',['Male', 'Female'] , 'null', ['id' => '','class' => 'form-control', ''])!!}--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
        {{--{!! Form::label('dateOfBirth', 'Date Of Birth:') !!}--}}
        {{--{!! Form::input('dateOfBirth','startDate', null, ['class' => 'form-control']) !!}--}}
        {{--<!--This is the method for the date-->--}}
        {{--</div>--}}

        <div class="form-group">
            {!! Form::label('nationalIdentityNo', 'National Identity No:')!!}
            {!! Form::text('nationalIdentityNo', $user->nationalIdentityNo,
            array('required','class'=>'form-control','placeholder'=>'national identity no')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('addressLine1', 'Address Line 1:')!!}
            {!! Form::text('addressLine1', $user->addressLine1,
            array('required','class'=>'form-control','placeholder'=>'address')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('addressLine2', 'Address Line 2:')!!}
            {!! Form::text('addressLine2', $user->addressLine2,
            array('required','class'=>'form-control','placeholder'=>'address')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('addressLine3', 'Address Line 3:')!!}
            {!! Form::text('addressLine3', $user->addressLine3, array('class'=>'form-control','placeholder'=>'address'))
            !!}
        </div>

        <div class="form-group">
            {!! Form::label('city', 'City:')!!}
            {!! Form::text('city', $user->city, array('required','class'=>'form-control','placeholder'=>'city')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('state', 'State:')!!}
            {!! Form::text('state', $user->state, array('required','class'=>'form-control','placeholder'=>'state')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('postalCode', 'Postal Code:')!!}
            {!! Form::text('postalCode', $user->postalCode,
            array('required','class'=>'form-control','placeholder'=>'postal
            code')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('contactNo', 'Contact No:')!!}
            {!! Form::text('contactNo', $user->contactNo,
            array('required','class'=>'form-control','placeholder'=>'contact
            no')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('faxNo', 'Fax No:')!!}
            {!! Form::text('faxNo', $user->faxNo, array('required','class'=>'form-control','placeholder'=>'fax no')) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
        </div>


        {!! Form::close() !!}

    @else
        {!! Form::open() !!}

        <div class="form-group">
            {!! Form::label('firstname', 'First Name:')!!}
            {!! Form::text('firstname', $user->firstname, array('disabled' =>
            'disabled','class'=>'form-control','placeholder'=>'first
            name')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('lastname', 'Last Name:')!!}
            {!! Form::text('lastname', $user->lastname, array('disabled' =>
            'disabled','class'=>'form-control','placeholder'=>'last
            name')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email Address:')!!}
            {!! Form::text('email', $user->email, array('disabled' =>
            'disabled','class'=>'form-control','placeholder'=>'email')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('nationalIdentityNo', 'National Identity No:')!!}
            {!! Form::text('nationalIdentityNo', $user->nationalIdentityNo,
            array('disabled' => 'disabled','class'=>'form-control','placeholder'=>'national identity no')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('addressLine1', 'Address Line 1:')!!}
            {!! Form::text('addressLine1', $user->addressLine1,
            array('disabled' => 'disabled','class'=>'form-control','placeholder'=>'address')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('addressLine2', 'Address Line 2:')!!}
            {!! Form::text('addressLine2', $user->addressLine2,
            array('disabled' => 'disabled','class'=>'form-control','placeholder'=>'address')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('addressLine3', 'Address Line 3:')!!}
            {!! Form::text('addressLine3', $user->addressLine3, array('disabled' =>
            'disabled','class'=>'form-control','placeholder'=>'address')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('city', 'City:')!!}
            {!! Form::text('city', $user->city, array('disabled' =>
            'disabled','class'=>'form-control','placeholder'=>'city')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('state', 'State:')!!}
            {!! Form::text('state', $user->state, array('disabled' =>
            'disabled','class'=>'form-control','placeholder'=>'state')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('postalCode', 'Postal Code:')!!}
            {!! Form::text('postalCode', $user->postalCode, array('disabled' =>
            'disabled','class'=>'form-control','placeholder'=>'postal
            code')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('contactNo', 'Contact No:')!!}
            {!! Form::text('contactNo', $user->contactNo, array('disabled' =>
            'disabled','class'=>'form-control','placeholder'=>'contact
            no')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('faxNo', 'Fax No:')!!}
            {!! Form::text('faxNo', $user->faxNo, array('disabled' =>
            'disabled','class'=>'form-control','placeholder'=>'fax no')) !!}
        </div>

        {!! Form::close() !!}

    @endif

@endsection
