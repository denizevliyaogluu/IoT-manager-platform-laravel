<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/logo.png">
    <title>IoT Manager Platform</title>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
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
                    <a class="logo" href="{{route('index')}}">
                        <b>
                            {{-- <img src="plugins/images/admin-logo.png" alt="home" class="dark-logo" /> --}}
                            {{-- <img src="plugins/images/admin-logo-dark.png" alt="home" class="light-logo" /> --}}
                        </b>
                        <span class="hidden-xs">
                            <img src="plugins/images/admin-text.png" alt="home" class="dark-logo" />
                            <img src="plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
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
                        <a class="profile-pic" href="#"> <img src="plugins/images/users/varun.jpg" alt="user-img"
                                width="36" class="img-circle"><b class="hidden-xs">Steave</b></a>
                    </li>
                </ul>
            </div>
        </nav>
        @include('sidemenu')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Profile page</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href={{route('index')}}>Dashboard</a></li>
                            <li class="active">Profile Page</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user"
                                    src="plugins/images/large/img1.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="plugins/images/users/genu.jpg"
                                                class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white">{{ $user->name }} {{ $user->surname }}</h4>
                                        <h5 class="text-white">{{ $user->email }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-purple"><i class="ti-facebook"></i></p>
                                    <h1>258</h1>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-blue"><i class="ti-twitter"></i></p>
                                    <h1>125</h1>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-danger"><i class="ti-dribbble"></i></p>
                                    <h1>556</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material" method="POST"
                                action="{{ route('profileupdate') }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="col-md-12">Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="name" value="{{ $user->name }}"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Surname</label>
                                    <div class="col-md-12">
                                        <input type="text" name="surname" value="{{ $user->surname }}"
                                            placeholder="Johnathan Doe" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" name="email" value="{{ $user->email }}"
                                            class="form-control form-control-line" id="example-email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" name="phone" value="{{ $user->phone }}"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Address</label>
                                    <div class="col-md-12">
                                        <input type="text" name="address" value="{{ $user->address }}"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
        <script src="js/jquery.slimscroll.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/custom.min.js"></script>
</body>

</html>
