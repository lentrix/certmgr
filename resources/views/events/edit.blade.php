@extends('base')

@section('heads')
    <script src="https://cdn.tiny.cloud/1/tmna0pou4z2h8mv3sxfv50znomp2v98jftozd7qv5o0xwz6w/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')

<h1>Edit Event</h1>

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
            <a href="{{url('/events/' . $event->id)}}" class="btn btn-success">
                Go Back
            </a>
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
<script type="text/javascript">
    tinymce.init({
      selector: '.mytextarea',
      maxheight: 400
    });
</script>
@endsection
