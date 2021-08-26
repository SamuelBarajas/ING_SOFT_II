<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS FILES -->
    <link rel="stylesheet" href="{{asset("dashboard/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("dashboard/css/paper-dashboard.css")}}">
    <link rel="stylesheet" href="{{asset("dashboard/demo/demo.css")}}">
    <!-- <link rel="stylesheet" href="{{asset("css/app.css")}}"> -->
    <title>CUCEI-Blog</title>
</head>
<body>

    <!-- @include('dashboard.partials.nav-header-main') -->

    <div class="wrapper">
        @include('dashboard.partials.sidebar')
        <div class="main-panel">
            @include('dashboard.partials.nav-header-main')
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        @include('dashboard.partials.session-flash-status')
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset("js/app.js")}}"></script>
    <script src="{{ asset("dashboard/js/material-dashboard.js")}}"></script>
</body>
</html>