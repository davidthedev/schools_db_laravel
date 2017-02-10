<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Toucan DB - @yield('page-title')</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" rel="stylesheet"></script>
</head>
<body>
    <nav class="navbar navbar-default nav-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
            </div>

            <ul class="nav navbar-nav">
                <li role="presentation" class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                <!-- <li role="presentation" class="{{ Request::is('members') ? 'active' : '' }}"><a href="{{ route('members') }}">Members</a></li> -->
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Members <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('add.member') }}">Add</a></li>
                        <li><a href="{{ route('members') }}">View all</a></li>
                    </ul>
                </li>
                <!-- <li role="presentation" class="{{ Request::is('schools') ? 'active' : '' }}"><a href="{{ route('schools') }}">Schools</a></li> -->
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Schools <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('add.school') }}">Add</a></li>
                        <li><a href="{{ route('schools') }}">View all</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        @yield('body')
    </div>
</body>
</html>
