@extends('base')

@section('content')
<br>
<div class="row">
    <div class="col-sm-6 col-md-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>User Login</h4>
            </div>
            <div class="card-body">
                {!! Form::open(['url'=>'/login','method'=>'post']) !!}

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <button class="btn btn-primary float-right" type="submit">
                        <i class="fa fa-check"></i> User Login
                    </button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection
