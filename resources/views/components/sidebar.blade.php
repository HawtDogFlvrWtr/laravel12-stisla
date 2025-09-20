@auth
<div class="sidebar" data="orange">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
-->
    <div class="sidebar-wrapper">
    <div class="logo">
        <a href="javascript:void(0)" class="simple-text logo-mini mb-2">
            EZD
        </a>
        <a href="javascript:void(0)" class="simple-text logo-normal">
            Mapping Made Simple
        </a>
    </div>
    <ul class="nav">
        <li class="{{ Request::is('home') ? 'active' : '' }}">
            <a href="{{ url('home') }}">
                <i class="fas fa-home"></i>
                <p>Home</p>
            </a>
        </li>
        <li>
            <a data-toggle="collapse" href="#profileoptions">
                <i class="fas fa-user"></i>
                <p>
                Profile
                <b class="caret"></b>
                </p>
            </a>
            <div class="collapse {{ Request::is('profile/*') ? 'show' : '' }}" id="profileoptions">
                <ul class="nav">
                    <li class="{{ Request::is('profile/edit') ? 'active' : '' }}">
                        <a href="{{ url('/profile/edit') }}">
                        <span class="sidebar-mini-icon">E</span>
                        <span class="sidebar-normal"> Edit Profile </span>
                        </a>
                    </li>
                    <li class="{{ Request::is('profile/change-password') ? 'active' : '' }}">
                        <a href="{{ url('/profile/change-password') }}">
                        <span class="sidebar-mini-icon">P</span>
                        <span class="sidebar-normal"> Change Password </span>
                        </a>
                    </li>
                    <li class="{{ Request::is('profile/dashboards') ? 'active' : '' }}">
                        <a href="{{ url('/profile/dashboards') }}">
                        <span class="sidebar-mini-icon">D</span>
                        <span class="sidebar-normal"> Manage Dashboards </span>
                        </a>
                    </li>
                    <li class="{{ Request::is('profile/add-dashboard') ? 'active' : '' }}">
                        <a href="{{ url('/profile/add-dashboard') }}">
                        <span class="sidebar-mini-icon">D</span>
                        <span class="sidebar-normal"> Add Dashboard </span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="{{ Request::is('upload') ? 'active' : '' }}">
            <a href="{{ url('upload') }}">
                <i class="fas fa-upload"></i>
                <p>Upload GeoFiles</p>
            </a>
        </li>
        <li>
            <a data-toggle="collapse" href="#dashboards">
                <i class="fas fa-chart-pie"></i>
                <p>
                Dashboards
                <b class="caret"></b>
                </p>
            </a>
            <div class="collapse {{ Request::is('dashboard/*') ? 'show' : '' }}" id="dashboards">
                <ul class="nav">
                    @foreach ($dashboards as $dashboard)
                    @php 
                        $url = "dashboard/".$dashboard['id'];
                    @endphp
                    <li class="{{ Request::is($url) ? 'active' : '' }}">
                        <a href="/dashboard/{{ $dashboard['id'] }}">
                        <span class="sidebar-mini-icon mt-1">{{ $dashboard['name'][0] }}</span>
                        <span class="sidebar-normal mt-1"> {{ $dashboard['name'] }} </span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </li>
    </ul>
    </div>
</div>

@endauth
