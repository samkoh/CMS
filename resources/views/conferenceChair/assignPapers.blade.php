@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Assign Papers to Reviewer</div>
                    <div class="panel-body">

                        <h3>Paper Name: {!! $assignPaper !!}</h3>

                        <hr/>

                        {!! Form::open() !!}

                        <!--<div class="form-group">
                            {!! Form::label('reviewer', 'Reviewers:')!!}<br/>
                            {!! Form::checkbox('reviewer', null, null) !!}
                            <span>(1): John Cena (4) </span><br/>

                            {!! Form::checkbox('reviewer', '2', null) !!}
                            <span>(2): Randy Orton (2) </span><br/>

                            {!! Form::checkbox('reviewer', '2', null) !!}
                            <span>(2): Romen Reigns (3) </span><br/>

                            {!! Form::checkbox('reviewer', '2', null) !!}
                            <span>(4): Dean Ambros (1) </span><br/>

                            {!! Form::checkbox('reviewer', '2', null) !!}
                            <span>(2): Romen Reigns (3) </span><br/>

                            {!! Form::checkbox('reviewer', '2', null) !!}
                            <span>(3): Seith Rollins (5) </span><br/>

                            {!! Form::checkbox('reviewer', '2', null) !!}
                            <span>(5): Dwayne Johnson (2) </span><br/>

                            {!! Form::checkbox('reviewer', '2', null) !!}
                            <span>(2): Romen Reigns (3) </span><br/>

                            {!! Form::checkbox('reviewer', '2', null) !!}
                            <span>(1): Mark Henry (2) </span><br/>

                            {!! Form::checkbox('reviewer', '2', null) !!}
                            <span>(4): Brock Lesnar (4) </span><br/>

                            {!! Form::checkbox('reviewer', '2', null) !!}
                            <span>(3): Cody Rhodes (2) </span><br/>

                            {!! Form::checkbox('reviewer', '2', null) !!}
                            <span>(5): Daniel Bryan (6) </span>
                            <br/>
                            <br/>
                            {!! Form::submit('Assign', ['class' => 'btn btn-primary form-control']) !!}

                        </div>-->

                        <!--withinCategory Form Input -->
                            <div class="form-group">
                            {!! Form::label('withinCategory', 'Within reviewer expertise paper category: (1)')!!}
                            {!! Form::select('withinCategory',$withinCategory, 'null', ['id' => 'reviewer_list','class' => 'form-control', 'multiple'])!!}
                        </div>

                        <!--outCategory Form Input -->
                        <div class="form-group">
                            {!! Form::label('outCategory', 'Out of reviewer expertise paper category:') !!}
                            {!! Form::select('outCategory',$outCategory, 'null', ['id' => 'reviewer_list2','class' =>
                            'form-control', 'multiple'])!!}
                            <br/>
                            <br/>
                            {!! Form::submit('Assign', ['class' => 'btn btn-primary form-control']) !!}
                        </div>

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