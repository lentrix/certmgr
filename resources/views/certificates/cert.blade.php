<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>Certificate</title>
    <style>
        body{
            margin: 0
        }
        #page{
            width:100%;
            height:100%;
            position: absolute;
            top: 0px;
            left: 0px;
        }
        #template {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0
        }
        #name {
            width: 100%;
            text-align: center;
            position: absolute;
            left: 0;
            top: 265px;
            font-size: 4em;
        }
        @page {
            margin: 14px;
        }
        #qrcode {
            position: absolute;
            bottom: 10px;
            right: 10px;
            padding: 5px;
            background-color: white;
        }
    </style>
</head>
<body>
    <div id="page">
        <img src="{{asset(Storage::url($cert->event->template_path))}}" alt="template" id="template">
        <h1 id="name">{{$cert->recipient_name}}</h1>
        <div id="qrcode">Validation</div>
    </div>

</body>
</html>
