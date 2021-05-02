@extends('base')

@section('heads')

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
    <div class="col-md-4">
        <h5>Certificate Details</h5>
        <table class="table table-striped">
            <tr>
                <th>Event Title</th><td>{{$cert->event->title}}</td>
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
        <button class="btn btn-primary"
                type="button"
                data-toggle="modal"
                data-target="#editCertModal">
            <i class="fa fa-edit"></i> Edit Certificate
        </button>
    </div>
    <div class="col-md-8">
        <h5>Certificate</h5>
        <div class="ratio-container">

            <canvas id="myCanvas" name="Certificate" width="1000" height="700"></canvas>

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

    $(document).ready(function(){

        $('body').waitForImages({
            waitForAll: true,
            finished: function() {
                var c = document.getElementById("myCanvas")
                var ctx = c.getContext("2d")

                ctx.moveTo(0,0)

                var img = document.getElementById('template');
                ctx.drawImage(img,0,0, 1000, 700)

                var name = document.getElementById('name').value;

                ctx.fillStyle='blue'
                ctx.font="62px Bold Arial"
                ctx.textAlign = "center"
                ctx.fillText(name, 500, 350)
                ctx.strokeStyle='#333377'
                ctx.strokeText(name, 500, 350)

                $("#qrcode").ClassyQR({
                    type: 'url',
                    url: 'http://certificates.psite7.org/verify/{{$cert->id}}'
                })

                setTimeout(function(){
                    var qrImg = document.getElementById("qrcode")
                    ctx.fillStyle = "black"
                    ctx.drawImage(qrImg,910,610,80,80)
                },2000)
            }
        });


    })
</script>

@endsection
