@extends('base')

@section('content')
<br>

<h2>Verify Certificate</h2>
<div class="row">
    <div class="col-md-4">
        {!! Form::open(['url'=>'/verify', 'method'=>'post']) !!}

        <div class="form-group">
            {!! Form::label('code', 'Enter certificate code') !!}
            {!! Form::text('code', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            <button class="btn btn-primary">
                Verify Certificate
            </button>
        </div>

        {!! Form::close() !!}
    </div>
</div>

@endsection
