@extends('base')

@section('heads')

    {{-- Load some google fonts --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    {{-- font-family: 'Anton', sans-serif --}}
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    {{-- font-family: 'Lobster', cursive; --}}
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    {{-- font-family: 'Cinzel', serif; --}}
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">

    <style>
        .ratio-container {
            position: relative;
            width: 100%;
            padding-top: 70%;
            background-color: #eee;
        }
        #myCanvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }
        #template, #qrcode {
            display: none;
        }
    </style>
@endsection

@section('content')

@if(!auth()->guest())
    @include('certificates._delete-cert-modal')
@endif

<!-- Modal -->
<div class="modal fade" id="editCertModal" tabindex="-1" aria-labelledby="editCertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editCertModalLabel">Edit Certificate</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::model($cert, ['url'=>'/certificates/' . $cert->id, 'method'=>'put']) !!}
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
          <button type="submit" class="btn btn-success">
              <i class="fa fa-check"></i> Update Certificate
          </button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
</div>

<br>

<img src="{{asset(Storage::url($cert->event->template_path))}}" alt="template" id="template">
<input type="hidden" id="name" value="{{$cert->recipient_name}}">

<div class="row">
    <div class="col">
        @if(!auth()->guest())
        <a href="{{url('/events/' . $event->id)}}"
                class="btn btn-success float-right"
                title="Go to event">
            <i class="fa fa-calendar-check"></i> Back to Events
        </a>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <h5>Certificate Details</h5>
        <table class="table table-striped">
            <tr>
                <th>Event Title</th>
                <td>
                    {{$event->title}}
                </td>
            </tr>
            <tr>
                <th>Issued on</th><td>{{$cert->issued_at->toFormattedDateString()}}</td>
            </tr>
            <tr>
                <th>Issued by</th><td>{{$cert->issuer->name}}</td>
            </tr>
            <tr>
                <th>Recipient Details</th>
                <td>
                    <strong>{{$cert->recipient_name}}</strong><br>
                    {{$cert->recipient_designation}} <br>
                    {{$cert->recipient_org}}
                </td>
            </tr>
        </table>
        {{-- <button class="btn btn-primary float-right" onclick="downloadCanvas('myCanvas','Certificate.png')">
            <i class="fa fa-download"></i> Download Certificate
        </button> --}}
        <img alt="qrcode" id="qrcode">
        @if(!auth()->guest())
        <button class="btn btn-primary"
                type="button"
                data-toggle="modal"
                data-target="#editCertModal">
            <i class="fa fa-edit"></i> Edit Details
        </button>

        <button class="btn btn-danger"
                type="button"
                data-toggle="modal"
                data-target="#deleteCertModal" >
            <i class="fa fa-trash"></i> Delete Certificate
        </button>
        <br><br>
        @endif
        <div class="alert alert-warning">
            Notice: Sometimes due to load timing, the resulting certificate
            will not be rendered with its proper font and/or the QR Code
            will not be drawn. In such case, you may click on the 'Redraw'
            button when the browser stops loading to generate the proper
            certificate.
            <p class="text-center">
                <button class="btn btn-success" type="button" onClick="drawCert()">
                    <i class="fa fa-recycle"></i> Redraw
                </button>
            </p>

        </div>
        <br>

    </div>
    <div class="col-md-8">
        <h5>Generated Certificate</h5>
        <div class="ratio-container">

            <canvas id="myCanvas" name="Certificate" width="2000" height="1400"></canvas>

        </div>
    </div>
</div>

@endsection


@section('scripts')

<script>

function downloadCanvas(canvasId, filename) {
    link = document.createElement('a')
    link.href = document.getElementById(canvasId).toDataURL();
    link.download = filename;
}

function drawCert() {
    var c = document.getElementById("myCanvas")
    var ctx = c.getContext("2d")

    ctx.moveTo(0,0)

    var img = document.getElementById('template');
    ctx.drawImage(img,0,0, 2000, 1400)

    var name = document.getElementById('name').value;

    $("#qrcode").ClassyQR({
        type: 'url',
        url: 'http://certificates.psite7.org/verify/{{$cert->id}}'
    })

    setTimeout(function(){
        ctx.fillStyle='{{$event->font_color}}'
        ctx.font="{{$fontText}}"
        ctx.textAlign = "center"
        ctx.fillText(name, 1000, 700)
        var qrImg = document.getElementById("qrcode")
        ctx.fillStyle = "black"
        ctx.drawImage(qrImg,1820,1220,160,160)
    },3000)
}

    $(document).ready(function(){

        $('body').waitForImages({
            waitForAll: true,
            finished: drawCert()
        });
    })
</script>

@endsection
