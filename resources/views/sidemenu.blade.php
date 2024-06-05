<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
        </div>
        <ul class="nav" id="side-menu">
            <li style="padding: 70px 0 0;">
                <a href={{ route('index') }} class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
            </li>
            <li>
                <a href={{ route('profiles') }} class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Profile</a>
            </li>
            <li>
                <a href={{ route('devices') }} class="waves-effect"><i class="fa fa-tablet fa-fw" aria-hidden="true"></i>Devices</a>
            </li>
            <li>
                <a href={{ route('data') }} class="waves-effect"><i class="fa fa-database fa-fw" aria-hidden="true"></i>Data</a>
            </li>
            <li>
                <a href={{ route('users') }} class="waves-effect"><i class="fa fa-users fa-fw" aria-hidden="true"></i>Users</a>
            </li>
        </ul>
    </div>
</div>