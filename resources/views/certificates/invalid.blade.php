@extends('base')

@section('content')

<br>

<div class="row">
    <div class="alert alert-warning">
        <h2>Invalid Certificate Number</h2>
        <p>Our records indicate that this certificate number #{{$certNumber}} does not exist.</p>
    </div>
</div>

@endsection
