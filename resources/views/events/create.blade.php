@extends('base')

@section('content')

<br>

{!! Form::open(['url'=>'/events', 'method'=>'post','enctype'=>'multipart/form-data']) !!}
<h1>
    <button class="btn btn-primary float-right mt-2" type="submit">
        <i class="fa fa-save"></i> Create Event
    </button>
    Create Event
</h1>

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
            {!! Form::label('font_family', "Font Family") !!}
            {!! Form::select('font_family', [
                "Cinzel"=>'Cinzel',
                'Anton'=>'Anton',
                'Lobster'=>'Lobster'
            ],null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('font_color', "Font Color (HTML Hex)") !!}
            {!! Form::text('font_color', '#222', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('font_size', "Font Size (px)") !!}
            {!! Form::text('font_size', '126', ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label("details", 'Event Details') !!}
            {!! Form::textarea('details', null, ['class'=>'form-control mytextarea','rows'=>'8']) !!}
        </div>
    </div>

</div>
{!! Form::close() !!}

<hr>

@endsection


@section('scripts')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'details' );
</script>
@endsection
