@extends('base')

@section('heads')
    <script src="https://cdn.tiny.cloud/1/tmna0pou4z2h8mv3sxfv50znomp2v98jftozd7qv5o0xwz6w/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')

<br>
<h1>Create Event</h1>
{!! Form::open(['url'=>'/events', 'method'=>'post','enctype'=>'multipart/form-data']) !!}
<div class="row">

    <div class="col-md-5">

        <div class="form-group">
            {!! Form::label('title', "Title") !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('person_incharge', "Person In-charge") !!}
            {!! Form::text('person_incharge', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tags', "Tags") !!}
            {!! Form::text('tags', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            <div class="alert alert-warning">
                It is important that the image you upload have an aspect ratio of 10:7
                which is equivalent to A4 (landscape). Otherwise, clipping will occur during the
                generation of the certificate.
            </div>
            {!! Form::label('file', "Template Image") !!}
            {!! Form::file('file', null, ['class'=>'form-control']) !!}
        </div>

    </div>
    <div class="col-md-7">
        <div class="form-group">
            {!! Form::label("details", 'Event Details') !!}
            {!! Form::textarea('details', null, ['class'=>'form-control mytextarea','rows'=>'8']) !!}
        </div>
        <div class="form-group">
            <button class="btn btn-primary float-right" type="submit">
                <i class="fa fa-save"></i> Create Event
            </button>
        </div>
    </div>

</div>
{!! Form::close() !!}
@endsection


@section('scripts')
<script type="text/javascript">
    tinymce.init({
      selector: '.mytextarea',
      maxheight: 400
    });
</script>
@endsection
