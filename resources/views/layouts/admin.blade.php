<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
    <a class="navbar-brand" href="{{ route('home') }}">{{ Config::get('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topNavBar"
            aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="topNavBar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="{{ route('member') }}">
                    <span data-feather="users"></span>
                    Member
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="{{ route('attendance') }}">
                    <span data-feather="book"></span>
                    Attendance
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#">
                    <span data-feather="calendar"></span>
                    Schedule
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Reports
                </a>
            </li>
        </ul>
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">Sign out</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-10 ml-sm-auto col-lg-11 px-4">
            <br/>
            @yield('content')
        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>