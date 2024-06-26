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
    <link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <link href="plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css"
        rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    <a class="logo" href={{route('index')}}>
                        <b>
                            {{-- <img src="plugins/images/admin-logo.png" alt="home" class="dark-logo" /><img
                                src="plugins/images/admin-logo-dark.png" alt="home" class="light-logo" /> --}}
                        </b>
                        <span class="hidden-xs">
                            <img src="plugins/images/admin-text.png" alt="home" class="dark-logo" /><img
                                src="plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                        </span> </a>
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
                                width="36" class="img-circle"><b class="hidden-xs">{{ Auth::user()->name }}</b></a>
                    </li>
                </ul>
            </div>
        </nav>
        @include('sidemenu')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href={{route('index')}}>Dashboard</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Device</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span
                                        class="counter text-success">{{ $devices->count() }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total User</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span
                                        class="counter text-purple">{{ App\Models\User::count() }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Data</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span
                                        class="counter text-info">{{ App\Models\DeviceData::count() }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Device Data Ratios</h3>
                            <canvas id="deviceChart" style="height: 50px;"></canvas>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                                <select class="form-control pull-right row b-none">
                                    <option>March 2017</option>
                                    <option>April 2017</option>
                                    <option>May 2017</option>
                                    <option>June 2017</option>
                                    <option>July 2017</option>
                                </select>
                            </div>
                            <h3 class="box-title">Recent sales</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NAME</th>
                                            <th>STATUS</th>
                                            <th>DATE</th>
                                            <th>PRICE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="txt-oflo">Elite admin</td>
                                            <td>SALE</td>
                                            <td class="txt-oflo">April 18, 2017</td>
                                            <td><span class="text-success">$24</span></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td class="txt-oflo">Real Homes WP Theme</td>
                                            <td>EXTENDED</td>
                                            <td class="txt-oflo">April 19, 2017</td>
                                            <td><span class="text-info">$1250</span></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td class="txt-oflo">Ample Admin</td>
                                            <td>EXTENDED</td>
                                            <td class="txt-oflo">April 19, 2017</td>
                                            <td><span class="text-info">$1250</span></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td class="txt-oflo">Medical Pro WP Theme</td>
                                            <td>TAX</td>
                                            <td class="txt-oflo">April 20, 2017</td>
                                            <td><span class="text-danger">-$24</span></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td class="txt-oflo">Hosting press html</td>
                                            <td>SALE</td>
                                            <td class="txt-oflo">April 21, 2017</td>
                                            <td><span class="text-success">$24</span></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td class="txt-oflo">Digital Agency PSD</td>
                                            <td>SALE</td>
                                            <td class="txt-oflo">April 23, 2017</td>
                                            <td><span class="text-danger">-$14</span></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td class="txt-oflo">Helping Hands WP Theme</td>
                                            <td>MEMBER</td>
                                            <td class="txt-oflo">April 22, 2017</td>
                                            <td><span class="text-success">$64</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-8 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Recent Comments</h3>
                            <div class="comment-center p-t-10">
                                <div class="comment-body">
                                    <div class="user-img"> <img src="plugins/images/users/pawandeep.jpg"
                                            alt="user" class="img-circle">
                                    </div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5><span class="time">10:20 AM 20 may 2016</span>
                                        <br /><span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque
                                            pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui
                                            pellentesque molestie feugiat. Aenean commodo dui pellentesque molestie
                                            feugiat</span> <a href="javacript:void(0)"
                                            class="btn btn btn-rounded btn-default btn-outline m-r-5"><i
                                                class="ti-check text-success m-r-5"></i>Approve</a><a
                                            href="javacript:void(0)"
                                            class="btn-rounded btn btn-default btn-outline"><i
                                                class="ti-close text-danger m-r-5"></i> Reject</a>
                                    </div>
                                </div>
                                <div class="comment-body">
                                    <div class="user-img"> <img src="plugins/images/users/sonu.jpg" alt="user"
                                            class="img-circle">
                                    </div>
                                    <div class="mail-contnet">
                                        <h5>Sonu Nigam</h5><span class="time">10:20 AM 20 may 2016</span>
                                        <br /><span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque
                                            pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui
                                            pellentesque molestie feugiat. Aenean commodo dui pellentesque molestie
                                            feugiat</span>
                                    </div>
                                </div>
                                <div class="comment-body b-none">
                                    <div class="user-img"> <img src="plugins/images/users/arijit.jpg" alt="user"
                                            class="img-circle">
                                    </div>
                                    <div class="mail-contnet">
                                        <h5>Arijit singh</h5><span class="time">10:20 AM 20 may 2016</span>
                                        <br /><span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque
                                            pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui
                                            pellentesque molestie feugiat. Aenean commodo dui pellentesque molestie
                                            feugiat</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="panel">
                            <div class="sk-chat-widgets">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        CHAT LISTING
                                    </div>
                                    <div class="panel-body">
                                        <ul class="chatonline">
                                            <li>
                                                <div class="call-chat">
                                                    <button class="btn btn-success btn-circle btn-lg"
                                                        type="button"><i class="fa fa-phone"></i></button>
                                                    <button class="btn btn-info btn-circle btn-lg" type="button"><i
                                                            class="fa fa-comments-o"></i></button>
                                                </div>
                                                <a href="javascript:void(0)"><img src="plugins/images/users/varun.jpg"
                                                        alt="user-img" class="img-circle"> <span>Varun Dhavan <small
                                                            class="text-success">online</small></span></a>
                                            </li>
                                            <li>
                                                <div class="call-chat">
                                                    <button class="btn btn-success btn-circle btn-lg"
                                                        type="button"><i class="fa fa-phone"></i></button>
                                                    <button class="btn btn-info btn-circle btn-lg" type="button"><i
                                                            class="fa fa-comments-o"></i></button>
                                                </div>
                                                <a href="javascript:void(0)"><img src="plugins/images/users/genu.jpg"
                                                        alt="user-img" class="img-circle"> <span>Genelia Deshmukh
                                                        <small class="text-warning">Away</small></span></a>
                                            </li>
                                            <li>
                                                <div class="call-chat">
                                                    <button class="btn btn-success btn-circle btn-lg"
                                                        type="button"><i class="fa fa-phone"></i></button>
                                                    <button class="btn btn-info btn-circle btn-lg" type="button"><i
                                                            class="fa fa-comments-o"></i></button>
                                                </div>
                                                <a href="javascript:void(0)"><img
                                                        src="plugins/images/users/ritesh.jpg" alt="user-img"
                                                        class="img-circle"> <span>Ritesh Deshmukh <small
                                                            class="text-danger">Busy</small></span></a>
                                            </li>
                                            <li>
                                                <div class="call-chat">
                                                    <button class="btn btn-success btn-circle btn-lg"
                                                        type="button"><i class="fa fa-phone"></i></button>
                                                    <button class="btn btn-info btn-circle btn-lg" type="button"><i
                                                            class="fa fa-comments-o"></i></button>
                                                </div>
                                                <a href="javascript:void(0)"><img
                                                        src="plugins/images/users/arijit.jpg" alt="user-img"
                                                        class="img-circle"> <span>Arijit Sinh <small
                                                            class="text-muted">Offline</small></span></a>
                                            </li>
                                            <li>
                                                <div class="call-chat">
                                                    <button class="btn btn-success btn-circle btn-lg"
                                                        type="button"><i class="fa fa-phone"></i></button>
                                                    <button class="btn btn-info btn-circle btn-lg" type="button"><i
                                                            class="fa fa-comments-o"></i></button>
                                                </div>
                                                <a href="javascript:void(0)"><img
                                                        src="plugins/images/users/govinda.jpg" alt="user-img"
                                                        class="img-circle"> <span>Govinda Star <small
                                                            class="text-success">online</small></span></a>
                                            </li>
                                            <li>
                                                <div class="call-chat">
                                                    <button class="btn btn-success btn-circle btn-lg"
                                                        type="button"><i class="fa fa-phone"></i></button>
                                                    <button class="btn btn-info btn-circle btn-lg" type="button"><i
                                                            class="fa fa-comments-o"></i></button>
                                                </div>
                                                <a href="javascript:void(0)"><img
                                                        src="plugins/images/users/hritik.jpg" alt="user-img"
                                                        class="img-circle"> <span>John Abraham<small
                                                            class="text-success">online</small></span></a>
                                            </li>
                                            <li>
                                                <div class="call-chat">
                                                    <button class="btn btn-success btn-circle btn-lg"
                                                        type="button"><i class="fa fa-phone"></i></button>
                                                    <button class="btn btn-info btn-circle btn-lg" type="button"><i
                                                            class="fa fa-comments-o"></i></button>
                                                </div>
                                                <a href="javascript:void(0)"><img src="plugins/images/users/varun.jpg"
                                                        alt="user-img" class="img-circle"> <span>Varun Dhavan <small
                                                            class="text-success">online</small></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/waves.js"></script>
    <script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <script src="plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>
<script>
    var deviceLabels = [];
    @foreach ($devices as $device)
        deviceLabels.push("{{ $device->name }}");
    @endforeach

    var deviceData = {
        labels: deviceLabels,
        datasets: [{
            label: 'Data Count',
            data: [
                @foreach ($devices as $device)
                    {{ $device->device_data_count }},
                @endforeach
            ],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };
    var options = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };
    var ctx = document.getElementById('deviceChart').getContext('2d');

    var deviceChart = new Chart(ctx, {
        type: 'line',
        data: deviceData,
        options: options
    });
</script>


</body>

</html>
