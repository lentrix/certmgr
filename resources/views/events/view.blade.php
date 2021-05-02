@extends('base')

@section('content')

<!-- Modal -->
<div class="modal fade" id="issueCertModal" tabindex="-1" aria-labelledby="issueCertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="issueCertModalLabel">Issuance of Certificate</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::open(['url'=>'/certificates/' . $event->id, 'method'=>'post']) !!}
        <div class="modal-body">

            <div class="form-group">
                {!! Form::label('recipient_name', 'Name of Recipient') !!}
                {!! Form::text('recipient_name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('recipient_designation', 'Designation') !!}
                {!! Form::text('recipient_designation', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('recipient_org', 'Organization') !!}
                {!! Form::text('recipient_org', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('remarks', 'Remarks') !!}
                {!! Form::text('remarks', null, ['class'=>'form-control']) !!}
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">
              <i class="fa fa-check"></i> Issue Certificate
          </button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
</div>

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
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Recipient</th>
                            <th>Issued by</th>
                            <th>Issued on</th>
                            <th>Remarks</th>
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
                            <td>{{$cert->issuer->name}}</td>
                            <td>{{$cert->issued_at->toFormattedDateString()}}</td>
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
