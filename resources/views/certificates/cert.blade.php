<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            background-size: cover;
            background-image: url( {{Storage::path($cert->event->template_path)}} );
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
    </style>
</head>
<body>
    <div id="page">
        <h1 id="name">{{$cert->recipient_name}}</h1>
    </div>
</body>
</html>
