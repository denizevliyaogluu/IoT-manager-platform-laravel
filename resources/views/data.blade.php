<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('plugins/images/logo.png') }}">
    <title>IoT Manager Platform</title>
    <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/colors/default.css') }}" id="theme" rel="stylesheet">
</head>

<body class="fix-header">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2"
                stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <a class="logo" href={{ route('index') }}>
                        <b>
                            {{-- <img
                                src="{{ asset('plugins/images/admin-logo.png') }}" alt="home"
                                class="dark-logo" /><img src="{{ asset('plugins/images/admin-logo-dark.png') }}"
                                alt="home" class="light-logo" /> --}}
                        </b>
                        <span class="hidden-xs"><img src="{{ asset('plugins/images/admin-text.png') }}"
                                alt="home" class="dark-logo" /><img
                                src="{{ asset('plugins/images/admin-text-dark.png') }}" alt="home"
                                class="light-logo" />
                        </span>
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i
                                    class="fa fa-search"></i></a>
                        </form>
                    </li>
                    <li>
                        <a class="profile-pic" href="#"> <img src="{{ asset('plugins/images/users/varun.jpg') }}"
                                alt="user-img" width="36" class="img-circle"><b
                                class="hidden-xs">{{ Auth::user()->name }}</b></a>
                    </li>
                </ul>
            </div>
        </nav>
        @include('sidemenu')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Data</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href={{ route('index') }}>Dashboard</a></li>
                            <li class="active">Data</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    @foreach ($devices as $device)
                        <div class="col-md-3 col-sm-6">
                            <div class="white-box">
                                <div class="product-img">
                                    <img src="{{ asset($device->image) }}" class="img-responsive"
                                        alt="{{ $device->name }}">
                                </div>
                                <div class="product-text">
                                    <h3 class="box-title">{{ $device->name }}</h3>
                                    <p>{{ Str::limit($device->description, 50) }}</p>
                                    <a href="{{ route('device.data', $device->uniqid) }}" class="btn btn-info">View
                                        Data</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('js/waves.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
</body>

</html>
