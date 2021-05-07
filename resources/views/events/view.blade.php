@extends('base')

@section('content')

@include('events._issue-modal')

<br>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h4>Event Details</h4>
            </div>
            <div class="card-body">
                <h5>{{$event->title}}</h5>
                <hr>
                {!! $event->details !!}
                <p>Person In-charge: <strong>{{$event->person_incharge}}</strong></p>
                <hr>
                Tags:
                @foreach(explode(' ', $event->tags) as $tag)
                    <span class="badge badge-dark">{{$tag}}</span>
                @endforeach
                <hr>
                <div>Template:</div>
                <img src="{{Storage::url($event->template_path)}}" alt="Certificate Template" width="100%">
                {!! Form::open(['url'=>'/events/' . $event->id . '/change-template','method'=>'put','enctype'=>'multipart/form-data']) !!}

                <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="file" required class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                      <label class="custom-file-label" for="inputGroupFile04">Choose Template</label>
                    </div>
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit" id="inputGroupFileAddon04" title="Update Template">
                          <i class="fa fa-recycle"></i>
                      </button>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
            <div class="card-footer">
                <a href="{{url('/events/' . $event->id . '/update')}}" class="btn btn-info">
                    <i class="fa fa-edit"></i> Edit Details
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h4>
                    <button class="btn btn-outline-light float-right"
                            data-toggle="modal"
                            data-target="#issueCertModal">
                        Issue Certificate
                    </button>
                    Certificates Issued
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Recipient</th>
                            <th>Issued by</th>
                            <th>Issued on</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($event->certificates as $cert)
                        <tr>
                            <td>
                                <a href="{{url('certificates/' . $cert->id)}}" style="text-decoration: none; font-weight:600">
                                    {{$cert->recipient_name}}
                                </a>
                            </td>
                            <td>
                                {{$cert->issuer->name}}
                            <td>
                                {{$cert->issued_at->toFormattedDateString()}}
                            </td>
                            <td>{{$cert->remarks}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
