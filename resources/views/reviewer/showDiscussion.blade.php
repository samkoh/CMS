@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Discussion</div>
                    <div class="panel-body">

                        @include('partials.reviewer_nav')

                        <h3 align="left">Paper Discussion: {{ $paper->title }}</h3>
                        <br/>
                        <h4 align="left">Paper Review Result:</h4>
                        @foreach($showEvaluationMarks as  $showEvaluationMark)
                            @if($showEvaluationMark->tempId != null)
                                @if( Auth::user()->firstname == $showEvaluationMark->firstname)
                                    Reviewer : {{$showEvaluationMark->tempId}} <strong>(You)</strong> -> Evaluated Mark :
                                @else
                                    Reviewer : {{$showEvaluationMark->tempId}} -> Evaluated Mark :
                                @endif
                                @if($showEvaluationMark->paperEvaluation == 2)
                                    {{$showEvaluationMark->paperEvaluation}} (Strong Accept)
                                @elseif($showEvaluationMark->paperEvaluation == 1)
                                    {{$showEvaluationMark->paperEvaluation}} (Accept)
                                @elseif($showEvaluationMark->paperEvaluation == 0)
                                    {{$showEvaluationMark->paperEvaluation}} (Border Line)
                                @elseif($showEvaluationMark->paperEvaluation == -1)
                                    {{$showEvaluationMark->paperEvaluation}} (Reject)
                                @elseif($showEvaluationMark->paperEvaluation == -2)
                                    {{$showEvaluationMark->paperEvaluation}} (Strong Reject)
                                @else
                                    Unknown
                                @endif
                                <br/>
                            @endif
                        @endforeach
                        <br/>
                        {!! Form::model($paper, ['url' => 'reviewer/discussion/' . $paper->id, 'method' => 'POST']) !!}

                        <div class="form-group">
                            {!! Form::label('1', 'Add a comment')!!}
                            {!! Form::textarea('content', '' , array('required', 'class' => 'form-control', 'size' =>
                            '20x2',
                            'placeholder'=>'Add new comment here')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Add Comment', ['class' => 'btn btn-primary form-control']) !!}
                        </div>
                        <br/>
                        {{--@foreach($paperDiscussion as $index => $Discussion)--}}
                        {{--<div class="form-group">--}}
                        {{--<h4 align="center">{!! Form::label('1', 'Reviewer Comment')!!}</h4>--}}
                        {{--{!! Form::label('created_at', 'Posted On:')!!}--}}
                        {{--{!! Form::input('created_at', '1', $Discussion->created_at, array('disabled' => 'disabled', 'class'=> 'form-control', 'size' => '10x2')) !!}--}}
                        {{--{!! Form::label('1', 'Comments:')!!}--}}
                        {{--{!! Form::textarea('content', $Discussion->content, array('disabled' => 'disabled', 'class' =>--}}
                        {{--'form-control',  'size' => '10x2')) !!}--}}
                        {{--</div>--}}
                        {{--@endforeach--}}
                        <h4 align="left">{!! Form::label('1', 'Comments')!!}</h4>
                        <ul class="list-group">
                            @foreach($paperDiscussion as $index => $Discussion)
                                <li class="list-group-item">
                                    @if($Discussion->user_role_id == 1)
                                        <strong><i>Conference Chair :</i></strong>
                                    @else
                                        <strong><i>Reviewer : {{$Discussion->tempId}}</i></strong>
                                    @endif
                                    <br/>
                                    {{$Discussion->content}}
                                    <br/>
                                    at
                                    <strong><i>{{  \Carbon\Carbon::createFromTimeStamp(strtotime($Discussion->created_at))->diffForHumans() }}</i></strong>
                            @endforeach
                        </ul>

                        {!! Form::close() !!}

                        {{--                        {{ date("d M Y",strtotime($Discussion->created_at)) }}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
