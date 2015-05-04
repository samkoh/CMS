@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Discussion</div>
                    <div class="panel-body">


                        @include('partials.reviewer_nav')

                        <br/>

                        {!! Form::open() !!}

                        <div class="form-group">
                            {!! Form::label('request', 'I want to review this paper, Click Ok to submit or Cancel to exit')!!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('OK', ['class' => 'btn btn-primary']) !!}
                            {{--{!! Form::submit('Cancel', ['class' => 'btn btn-primary']) !!}--}}
                            <a href="/home " class="btn btn-default">Cancel</a>

                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
