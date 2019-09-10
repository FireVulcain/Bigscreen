<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bigscreen</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container" id="app">
        <div class="row">
            <div class="col-md-12 text-center logo_container">
                <a href="/">
                    <img src="{{asset('img/bigscreen_logo.png')}}" alt="logo" width="400">
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>