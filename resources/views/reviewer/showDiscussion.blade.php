@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Discussion</div>
                    <div class="panel-body">

                        @include('partials.reviewer_nav')

                        <h3 align="center">Discussion Paper</h3>
                        <h4 align="center">{{ $paper->title }}</h4>

                        <br/>

                        {{--{!! Form::model($paper, ['url' => 'paper/' . $paper->id, 'method' => 'PATCH']) !!}--}}
                        {!! Form::model($paper, ['url' => 'reviewer/discussion/' . $paper->id, 'method' => 'POST']) !!}

                        {{--<div class="form-group">--}}
                        {{--{!! Form::label('content', 'Add a comment')!!}--}}
                        {{--{!! Form::textarea('content', null, array('required', 'class'=>'form-control', 'placeholder'=>'Add new comment here')) !!}--}}
                        {{--</div>--}}
                        <div class="form-group">
                            {!! Form::label('1', 'Add a comment')!!}
                            {!! Form::textarea('content', '' , array('required', 'class' => 'form-control', 'size' => '30x5',
                            'placeholder'=>'Add new comment here')) !!}
                        </div>

                        @foreach($paperDiscussion as $index => $Discussion)
                            <div class="form-group">
                                <h4 align="center">{!! Form::label('1', 'Reviewer Comment')!!}</h4>
                                {!! Form::label('created_at', 'Posted On:')!!}
                                {!! Form::input('created_at', '1', $Discussion->created_at, array('disabled' => 'disabled', 'class'=> 'form-control', 'size' => '30x4')) !!}
                                {!! Form::label('1', 'Comments:')!!}
                                {!! Form::textarea('content', $Discussion->content, array('disabled' => 'disabled', 'class' =>
                                'form-control')) !!}
                            </div>
                        @endforeach

                        <div class="form-group">
                            <br/>
                            {!! Form::submit('Add Comment', ['class' => 'btn btn-primary form-control']) !!}
                        </div>

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
