@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Conference Fee</div>
                    <div class="panel-body">

                        <h2>Conference Fee</h2>

                        <hr/>

                        <div class="form-group">
                            {!! Form::label('conference', 'Please select a conference (name) :') !!}
                            {!! Form::select('conference',$conference, 'null', ['class' => 'form-control'])!!}
                        </div>

                        <br/>
                        <br/>

                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>Fee Label</th>
                            <th>Criteria</th>
                            <th>Fee</th>
                            </thead>

                            <tbody>

                            <tr>
                                <td>
                                    {!! Form::text('name', null, array('required','class'=>'form-control','placeholder'=>'fee label')) !!}
                                </td>
                                {{--<td>--}}
                                    {{--<form role="form">--}}
                                        {{--<div class="checkbox">--}}
                                            {{--<label><input type="checkbox" value="Member">Member</label>--}}
                                        {{--</div>--}}
                                        {{--<div class="checkbox">--}}
                                            {{--<label><input type="checkbox" value="Non-Member">Non-Member</label>--}}
                                        {{--</div>--}}
                                        {{--<div class="checkbox">--}}
                                            {{--<label><input type="checkbox" value="Non-Malaysian">Non-Malaysian</label>--}}
                                        {{--</div>--}}
                                    {{--</form>--}}
                                {{--</td>--}}

                                <td>
                                    {!! Form::select('topic',$fee, 'null', ['class' => 'form-control'])!!}
                                </td>

                                <td>
                                    RM {!! Form::text('amount', null, array('required','class'=>'form-control','placeholder'=>'amount')) !!}
                                </td>
                            </tr>

                            <tr>
                                <td colspan="3">
                                    {!! Form::submit('Add', ['class' => 'btn btn-primary form-control']) !!}
                                </td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
