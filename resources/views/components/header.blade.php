@auth
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
<div class="container-fluid">
    <div class="navbar-wrapper">
    <div class="navbar-minimize d-inline">
        <button class="minimize-sidebar btn btn-link btn-just-icon" rel="tooltip" data-original-title="Sidebar toggle" data-placement="right">
        <i class="tim-icons icon-align-center visible-on-sidebar-regular"></i>
        <i class="tim-icons icon-bullet-list-67 visible-on-sidebar-mini"></i>
        </button>
    </div>
    <div class="navbar-toggle d-inline">
        <button type="button" class="navbar-toggler">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
        </button>
    </div>
    <a class="navbar-brand" href="javascript:void(0)">@yield('title')</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-bar navbar-kebab"></span>
    <span class="navbar-toggler-bar navbar-kebab"></span>
    <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
    <ul class="navbar-nav ml-auto">
        <li class="dropdown nav-item">
        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
            <div class="photo">
            <img src="/img/avatar/avatar-1.png" alt="Profile Photo">
            </div>
            <b class="caret d-none d-lg-block d-xl-block"></b>
        </a>
        <ul class="dropdown-menu dropdown-navbar">
            <li class="nav-link">
            <a href="javascript:void(0)" class="nav-item dropdown-item">Profile</a>
            </li>
            <li class="nav-link">
            <a href="javascript:void(0)" class="nav-item dropdown-item">Settings</a>
            </li>
            <li class="dropdown-divider"></li>
            <li class="nav-link">
                <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
        </li>
        <li class="separator d-lg-none"></li>
    </ul>
    </div>
</div>
</nav>

@endauth
