{{-- <a class="navbar-brand" href="#">
    <img src="{{asset('images/logo.png')}}" height="40" class="d-inline-block align-top" alt="">
    {{config('app.name')}}
</a> --}}

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{asset('images/logo.png')}}" height="50" class="d-inline-block align-top" alt="">
            <span style="padding-top: 50px; line-height: 50px">{{config('app.name')}}</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if(!auth()->guest())
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/events')}}">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/verify')}}">Verify</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/logout')}}">Logout</a>
                </li>
            </ul>
        </div>
        @endif
    </div>

  </nav>
