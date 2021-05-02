@extends('base')

@section('heads')
    <style>
        .ratio-container {
            position: relative;
            width: 90%;
            padding-top: 70%;
            background-color: #333;
        }
        iframe {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
@endsection

@section('content')
<br>

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
        <a href="{{url('/certificates/pdf/' . $cert->id . '/download')}}" class="btn btn-info btn-lg float-right">
            <i class="fa fa-download"></i> Download Certificate
        </a>
    </div>
    <div class="col-md-8">
        <h5>Certificate</h5>
        <div class="ratio-container">
            <iframe src="{{url('/certificates/pdf/' . $cert->id)}}" frameborder="0"></iframe>
        </div>
    </div>
</div>

@endsection
