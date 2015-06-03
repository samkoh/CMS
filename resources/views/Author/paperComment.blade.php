@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Reviewer Comments</div>
                    <div class="panel-body">

                        <h3 align="left">Paper Title: <i>{{ $paper->title }}</i></h3>
                        <br/>

                        {!! Form::open() !!}
                        <h4 align="left">{!! Form::label('1', 'Comments')!!}</h4>
                        <ul class="list-group">
                            @foreach($comments as $comment)
                                @if($comment->comment != null)
                                    <li class="list-group-item">
                                        {{$comment->comment}}
                                        <br/>
                                        at
                                        <strong><i>{{  \Carbon\Carbon::createFromTimeStamp(strtotime($comment->updated_at))->diffForHumans() }}</i></strong>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
