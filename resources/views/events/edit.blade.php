@extends('base')

@section('content')

<h1>
    Edit Event

    <a href="{{url('/events/' . $event->id)}}"
                class="btn btn-success float-right mt-2">
        Go Back
    </a>

</h1>

{!! Form::model($event, ['url'=>'/events/' . $event->id, 'method'=>'put','enctype'=>'multipart/form-data']) !!}
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
            {!! Form::label('font_family', "Font Family") !!}
            {!! Form::select('font_family', [
                "Cinzel"=>'Cinzel',
                'Anton'=>'Anton',
                'Lobster'=>'Lobster'
            ],null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('font_color', "Font Color (HTML Hex)") !!}
            {!! Form::text('font_color', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('font_size', "Font Size (px)") !!}
            {!! Form::text('font_size', null, ['class'=>'form-control']) !!}
        </div>

    </div>
    <div class="col-md-7">
        <div class="form-group">
            {!! Form::label("details", 'Event Details') !!}
            {!! Form::textarea('details', null, ['class'=>'form-control mytextarea','rows'=>'8']) !!}
        </div>
        <div class="form-group">
            <button class="btn btn-primary float-right" type="submit">
                <i class="fa fa-save"></i> Update Event
            </button>
        </div>
    </div>

</div>
{!! Form::close() !!}

@endsection

@section('scripts')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'details' );
</script>
@endsection
