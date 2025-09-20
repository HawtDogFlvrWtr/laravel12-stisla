<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>@yield('title') EZDash - SU</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Bootstrap CSS (Bootstrap 4) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Datatables CSS -->
	<link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.jqueryui.min.css" crossorigin="" />

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS Files -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/nucleo-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/black-dashboard.css?v=1.1.1') }}"  />
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css" integrity="sha512-VUj0sZbQFPixq7NJ6ioBRK/scakfsdlKl647mLmZaZHWPgpnrWvIfy80/QF3q1l+kozBc8IHrTEoiZY25PSUTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Additional CSS (if any) -->
    @stack('css')
</head>
<body class="sidebar-mini white-content">
  <div class="wrapper">
    <div class="navbar-minimize-fixed">
      <button class="minimize-sidebar btn btn-link btn-just-icon">
        <i class="tim-icons icon-align-center visible-on-sidebar-regular text-muted"></i>
        <i class="tim-icons icon-bullet-list-67 visible-on-sidebar-mini text-muted"></i>
      </button>
    </div>
                <!-- Sidebar -->
            @include('components.sidebar')
            <div class="main-panel" data="orange">
                <!-- Header -->
                @include('components.header')

                <!-- Main Content -->
                @yield('content')

                <!-- Footer -->
                @include('components.footer')
            </div>
        </div>
    </div>

    <!-- jQuery and Popper.js (required for Bootstrap 4) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Bootstrap JS (Bootstrap 4) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom JS Libraries -->
    <script src="{{ asset('library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.6/perfect-scrollbar.min.js" integrity="sha512-gcLXgodlQJWRXhAyvb5ULNlBAcvjuufaOBRggyLCtCqez+9jW7MxP3Is/9serId1YmNZ0Lx1ewh9z2xBwwZeKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('js/black-dashboard.min.js?v=1.1.1') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js" integrity="sha512-T+qL8JzVjquTv+yKR64v+58O+GVCe7A68gbJTzFVs76I7iAcgwisXKyOTaeKZaekcHeiG65p48NDqcMmPgnvIA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
    <!-- Datatables JS Library -->
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js" integrity="sha512-aDicMCy0pnN7hqhfSgvagdrS85SkNmmqWTkcQaGzlvW7UMWcCZ8WVYz7PLICHB6DXDprRlzuu4Od4MyXQ2spQw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Toastr Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Sweet Alerts 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Template JS Files -->
    <script>
        $(document).ready(function() {
        $().ready(function() {
            $sidebar = $('.sidebar');
            $navbar = $('.navbar');
            $main_panel = $('.main-panel');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');
            sidebar_mini_active = true;
            white_color = false;

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



            $('.fixed-plugin a').click(function(event) {
            if ($(this).hasClass('switch-trigger')) {
                if (event.stopPropagation) {
                event.stopPropagation();
                } else if (window.event) {
                window.event.cancelBubble = true;
                }
            }
            });

            $('.fixed-plugin .background-color span').click(function() {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');

            var new_color = $(this).data('color');

            if ($sidebar.length != 0) {
                $sidebar.attr('data', new_color);
            }

            if ($main_panel.length != 0) {
                $main_panel.attr('data', new_color);
            }

            if ($full_page.length != 0) {
                $full_page.attr('filter-color', new_color);
            }

            if ($sidebar_responsive.length != 0) {
                $sidebar_responsive.attr('data', new_color);
            }
            });

            $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
            var $btn = $(this);

            if (sidebar_mini_active == true) {
                $('body').removeClass('sidebar-mini');
                sidebar_mini_active = false;
                blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
            } else {
                $('body').addClass('sidebar-mini');
                sidebar_mini_active = true;
                blackDashboard.showSidebarMessage('Sidebar mini activated...');
            }

            // we simulate the window Resize so the charts will get updated in realtime.
            var simulateWindowResize = setInterval(function() {
                window.dispatchEvent(new Event('resize'));
            }, 180);

            // we stop the simulation of Window Resize after the animations are completed
            setTimeout(function() {
                clearInterval(simulateWindowResize);
            }, 1000);
            });

            $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
            var $btn = $(this);

            if (white_color == true) {

                $('body').addClass('change-background');
                setTimeout(function() {
                $('body').removeClass('change-background');
                $('body').removeClass('white-content');
                }, 900);
                white_color = false;
            } else {

                $('body').addClass('change-background');
                setTimeout(function() {
                $('body').removeClass('change-background');
                $('body').addClass('white-content');
                }, 900);

                white_color = true;
            }


            });

            $('.light-badge').click(function() {
            $('body').addClass('white-content');
            });

            $('.dark-badge').click(function() {
            $('body').removeClass('white-content');
            });
        });
        });
    </script>

    <!-- Additional JS (if any) -->
    @stack('scripts')
</body>
</html>
