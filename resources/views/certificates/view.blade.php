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
        #template {
            display: none;
        }
        #qrcode {
            width: 130px;
            float: right;
        }
    </style>
@endsection

@section('content')
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

        <img alt="qrcode" id="qrcode">
    </div>
    <div class="col-md-8">
        <h5>Certificate</h5>
        <div class="ratio-container">

            <canvas id="myCanvas" width="1000" height="700"></canvas>

        </div>
    </div>
</div>

@endsection


@section('scripts')

<script>
    $(document).ready(function(){
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
        });

        setTimeout(function(){
            var qrImg = document.getElementById("qrcode")
            ctx.fillStyle = "black"
            ctx.drawImage(qrImg,910,610,80,80)
        }, 3000)

    })
</script>

@endsection
