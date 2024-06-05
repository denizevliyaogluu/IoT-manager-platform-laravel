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
                    <a class="logo" href={{route('index')}}>
                        <b>
                            {{-- <img src="plugins/images/admin-logo.png" alt="home"
                                class="dark-logo" /><img src="plugins/images/admin-logo-dark.png" alt="home"
                                class="light-logo" /> --}}
                        </b>
                        <span class="hidden-xs"><img src="plugins/images/admin-text.png" alt="home"
                                class="dark-logo" /><img src="plugins/images/admin-text-dark.png" alt="home"
                                class="light-logo" />
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
                        <h4 class="page-title">Users</h4>
                        @if(Auth::user()->role == 'super-admin')
                        <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#addUserModal">Add New User</button>
                        @endif
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href={{route('index')}}>Dashboard</a></li>
                            <li class="active">Users</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Users</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->surname }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->address }}</td>
                                                @if(Auth::user()->role == 'super-admin')
                                                <td>
                                                    <form method="POST" action="{{ route('admin.users.updateStatus', $user->id) }}" style="display: flex; align-items: center;">
                                                        @csrf
                                                        @method('PUT')
                                                        <div style="display: flex; flex-direction: row; align-items: center;">
                                                            <select name="role" class="form-control mr-2">
                                                                <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                                                                <option value="super-admin" @if($user->role == 'super-admin') selected @endif>Super Admin</option>
                                                            </select>
                                                            <div style="margin-left: 10px;">
                                                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                                @else
                                                <td>{{ $user->role }}</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog"
                        aria-labelledby="addUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addUserModalLabel">Add New Device</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="addUserForm" action="{{ route('admin.users.createPost') }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="add-name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="add-name"
                                                name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="add-surname" class="form-label">Surname</label>
                                            <input type="text" class="form-control" id="add-surname"
                                                name="surname" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="add-email" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="add-email"
                                                name="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="add-phone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" id="add-phone"
                                                name="phone" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="add-address" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="add-address"
                                                name="address" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="add-password" class="form-label">Password</label>
                                            <input type="text" class="form-control" id="add-password"
                                                name="password" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="add-role" class="form-label">Select Role</label>
                                            <select class="form-control" id="role" name="role" required>
                                                <option value="admin">Admin</option>
                                                <option value="super-admin">Super Admin</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" form="addUserForm"
                                        class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
