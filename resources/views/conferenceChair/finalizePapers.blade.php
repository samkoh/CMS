@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Paper</div>
                    <div class="panel-body">
                        <h4><strong>Paper Name:</strong> <i>{!! $paper->title !!}</i></h4>

                        <hr/>

                        {!! Form::model($paper, ['url' => 'conferenceChair/finalizeAllPapers/' . $paper->id, 'method' => 'PATCH']) !!}

                        <div class="form-group">
                            {!! Form::label('status', 'Paper Status: ')!!}<br/>

                            {!! Form::radio('status', '1',['class' => 'form-control']) !!}
                            <span>Accept</span><br/>

                            {!! Form::radio('status', '-1',['class' => 'form-control']) !!}
                            <span>Reject</span><br/>
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection