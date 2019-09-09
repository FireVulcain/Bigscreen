<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bigscreen - Administration</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="row" id="app">
        <div class="col-md-3 admin_menu">
            <a class="nav-link" href="{{url('/')}}">
                <img src="{{asset('img/bigscreen_logo.png')}}" alt="logo" width="100%">
            </a>
            <a href="#" class="header__icon" id="header__icon"></a>
            <ul class="admin_menu_list navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/administration/accueil')}}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('questionnaire.index')}}">Questionnaire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('reponses.index')}}">Réponses</a>
                </li>
                <li class="nav-item">
                    <a class="logoutButton btn" href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        Déconnexion
                    </a>
                </li>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </ul>
        </div>
        <div class="col-md-9 admin_content">
            @yield('content')
        </div>
    </div>

@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/menu.js')}}"></script>
@show
</body>
</html>