@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Assign Papers to Reviewer</div>
                    <div class="panel-body">

                        <h4><strong>Paper Name:</strong> <i>{!! $paper->title !!}</i></h4>

                        <hr/>

                        {!! Form::model($paper, ['url' => 'conferenceChair/allPapers/' . $paper->id, 'method' => 'POST']) !!}

                        <!--withinCategory Form Input -->
                            <div class="form-group">
                            {!! Form::label('reviewer', 'Choose Reviewers:')!!}
                            {!! Form::select('reviewer',$reviewers , 'null', ['id' => 'reviewer_list','class' => 'form-control', 'multiple'])!!}
                        </div>

                        {{--<!--outCategory Form Input -->--}}
                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('outCategory', 'Out of reviewer expertise paper category:') !!}--}}
                            {{--{!! Form::select('outCategory',$outCategory, 'null', ['id' => 'reviewer_list2','class' =>--}}
                            {{--'form-control', 'multiple'])!!}--}}
                            {{--<br/>--}}
                            {{--<br/>--}}
                        {{--</div>--}}

                        {!! Form::submit('Assign', ['class' => 'btn btn-primary form-control']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <script>
        $('#reviewer_list').select2({
            placeholder: 'Choose a reviewer',
            tags: true
        });
    </script>

    <script>
        $('#reviewer_list2').select2({
            placeholder: 'Choose a reviewer',
            tags: true
        });
    </script>
@endsection