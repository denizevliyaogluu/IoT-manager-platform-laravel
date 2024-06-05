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
                    <a class="logo" href={{ route('index') }}>
                        <b>
                            {{-- <img src="plugins/images/admin-logo.png"
                                alt="home" class="dark-logo" /><img src="plugins/images/admin-logo-dark.png"
                                alt="home" class="light-logo" /> --}}
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
                        <h4 class="page-title">Devices</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href={{ route('index') }}>Dashboard</a></li>
                            <li class="active">Devices</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Devices</h3>
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#addDeviceModal">Add New Device</button>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($devices as $device)
                                            <tr>
                                                <td>{{ $device->id }}</td>
                                                <td><img src="{{ asset($device->image) }}" class="card-img-top"
                                                        alt="{{ $device->name }}" style="max-width: 100px;"></td>
                                                <td>{{ $device->name }}</td>
                                                <td>
                                                    @php
                                                        $words = str_word_count($device->description, 1);
                                                        $chunks = array_chunk($words, 10);
                                                    @endphp
                                                    @foreach ($chunks as $chunk)
                                                        <p>{{ implode(' ', $chunk) }}</p>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a href="{{ route('device.data', $device->uniqid) }}"
                                                        class="btn btn-info">View Data</a>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#updateDeviceModal{{ $device->id }}">Edit</button>
                                                    <a href="{{ route('admin.devices.delete', $device->uniqid) }}"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Are you sure?')">Delete</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="updateDeviceModal{{ $device->id }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="updateDeviceModalLabel{{ $device->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="updateDeviceModalLabel{{ $device->id }}">Update
                                                                Device</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="updateDeviceForm{{ $device->id }}"
                                                                action="{{ route('admin.devices.updatePost', ['uniqid' => $device->uniqid]) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label for="update-name{{ $device->id }}"
                                                                        class="form-label">Name</label>
                                                                    <input type="text" class="form-control"
                                                                        id="update-name{{ $device->id }}"
                                                                        name="name" value="{{ $device->name }}"
                                                                        required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="update-description{{ $device->id }}"
                                                                        class="form-label">Description</label>
                                                                    <textarea class="form-control" id="update-description{{ $device->id }}" name="description" rows="3"
                                                                        required>{{ $device->description }}</textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="update-image{{ $device->id }}"
                                                                        class="form-label"></label>
                                                                    <input type="file" class="form-control-file"
                                                                        id="update-image{{ $device->id }}"
                                                                        name="image">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                form="updateDeviceForm{{ $device->id }}"
                                                                class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal fade" id="addDeviceModal" tabindex="-1" role="dialog"
                            aria-labelledby="addDeviceModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addDeviceModalLabel">Add New Device</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="addDeviceForm" action="{{ route('admin.devices.createPost') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="add-name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="add-name"
                                                    name="name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="add-description" class="form-label">Description</label>
                                                <textarea class="form-control" id="add-description" name="description" rows="3" required></textarea>
                                            </div>
                                            <br>
                                            <div class="mb-3">
                                                <input type="file" class="custom-file-input" id="add-image"
                                                    name="image" required>
                                                <label class="custom-file-label" for="add-image"></label>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" form="addDeviceForm"
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
</body>

</html>
