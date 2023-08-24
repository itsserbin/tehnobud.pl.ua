<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .parent {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            overflow: auto;
        }
        .block {
            width: 250px;
            height: 250px;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: auto;
        }
        .block img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            border: none;
        }
    </style>
</head>
<body>

<div class="parent">
    <div class="block">
        <img src="{{asset('assets/images/img/technical_work/Tech.png')}}" alt=""/>
    </div>
</div>

</body>
</html>
