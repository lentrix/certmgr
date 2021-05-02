@extends('base')


@section('heads')
<style>

.events-wrapper {
    display: flex;
    align-content: stretch;
    justify-content: space-between;
    flex-wrap: wrap;
}

.event {
    display: flex;
    width: 350px;
    border: 1px solid #888;
    border-radius: 5px;
    margin: 5px;
    padding: 10px;
}

.event img {
    width: 100px;
}

.event-details {
    margin-left: 10px;
}

.event-link {
    text-decoration: none!important;
    color: #333;
}

</style>
@endsection

@section('content')

<h1>Events</h1>

<div class="events-wrapper">

    @foreach($events as $ev)
    <a href="{{url('/events/' . $ev->id)}}" class="event-link">
        <div class="event">
            <img src="{{asset(Storage::url($ev->template_path))}}" alt="">
            <div class="event-details">
                <h5>{{$ev->title}}</h5>
                Tags:
                @foreach(explode(' ', $ev->tags) as $tag)
                    <span class="badge badge-primary">{{$tag}}</span>
                @endforeach
            </div>
        </div>
    </a>
    @endforeach

</div>

@endsection

@section('scripts')

@endsection
