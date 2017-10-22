<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href={{ asset('css/filter.css') }}>
    <link rel="stylesheet" href={{ asset('css/match.css') }}>
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <!-- Fixed navbar -->
        <nav class="navbar navbar-light bg-faded rounded navbar-toggleable-md">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#containerNavbar" aria-controls="containerNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}">Football league</a>

                <div class="collapse navbar-collapse" id="containerNavbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{ Request::is('table') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('table') }}">League table</a>
                        </li>
                        <li class="nav-item {{ Request::is('match') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('match.index') }}">Finished matches</a>
                        </li>
                        <li class="nav-item {{ Request::is('upcoming') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('upcoming.index') }}">Upcoming matches</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            "paging": false,
            "info": false,
            "order": [[ 3, "desc" ]]
        });
    } );

    $(document).ready(function() {
        $('#matches').DataTable({
            "paging": true,
            "lengthMenu": [15, 30, 50],
            "info": true,
            "order": [[ 3, "desc" ]]
        });
    } );
</script>
</html>
