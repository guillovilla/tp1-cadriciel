<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="d-flex flex-column h-100">
@php  $locale = session()->get('locale') @endphp
    <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-info" aria-label="Fourth navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('etudiant.index')}}">
      <img alt="" style="width: 200px;px;" title="" class="img-circle img-thumbnail isTooltip" src="{{ asset('img/logo.jpg') }}" data-original-title="Usuario">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('etudiant.index')}}">@lang('lang.text_liste')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('etudiant.create')}}">@lang('lang.text_ajouter')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('forum.index')}}">Forum</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('document.index')}}">@lang('lang.répertoire_de_documents')</a>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">@lang('Langue')</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('lang', 'en') }}">English</a></li>
              <li><a class="dropdown-item" href="{{ route('lang', 'fr') }}">French</a></li>
            </ul>
          </li>
          <li class="nav-item">
                                @guest
                                    <a class="nav-link active" href="{{route('login')}}">@lang('Connexion')</a>
                                @else
                                    <a class="nav-link active" href="{{route('logout')}}">@lang('Déconnexion')</a>
                                @endguest
          </li>
        </ul>
        <!-- <form role="search">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        </form> -->
      </div>
    </div>
  </nav>
   
    </header>
    <div class="container my-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                 {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="footer mt-auto py-3 bg-info text-white">
        <div class="container text-center">
            &copy; {{ date('Y')}} {{config('app.name')}}. All rights reserved
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>