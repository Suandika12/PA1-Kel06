
<head>
    <link rel="icon" type="image/png" href="{{asset('img/logo_web.png')}}" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/animate.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/aos.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous" />
    <style>
        body {
            background-image: url({{ asset('image/login.jpg') }}); 
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
        }
        .loginadmin{
            margin: 0 auto;
            background-color: rgba(0, 0, 0, 0.5);
            width: max-content;
            /* padding: 30px; */
            border-radius: 20px;
            box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
        }
        button{
            width: 100%;
        }
    </style>
</head>