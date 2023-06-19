<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href=" {{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    @yield('scriptDelete')
    @yield('scriptLogin')
    <title>@yield('title')</title>
</head>
<body>
    @php $lang = session('locale') @endphp
    <nav>
        <a href="/">@lang('lang.text_hello') {{Auth::user() ? Auth::user()->name : trans('lang.text_guest') }}</a>
        @guest
        <a href="{{ route('login') }}">@lang('lang.text_login')</a>
        @else
        <a href="{{ route('logout') }}">@lang('lang.text_logout')</a>
        <a href="{{ route('articles.index') }}">@lang('lang.text_article_forum')</a>
        <a href="{{ route('fichiers.index') }}">@lang('lang.text_file_repository')</a>
        @endguest
        <a href="{{ route('etudiants.index') }}" class="">@lang('lang.text_display')</a>
        <a class="@if($lang == 'fr') text-info @endif" href="{{ route('lang', 'fr') }}">Français</a>
        <a class="@if($lang == 'en') text-info @endif" href="{{ route('lang', 'en') }}">English</a>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-6 mt-5">
                    <!-- affiche le nom indiqué dans le fichier .env -->
                    @yield('titleHeader')
                </h1>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(!$errors->isEmpty())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>