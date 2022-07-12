<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('template.backend.header_script.header')
    @yield('css')
</head>

<body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="fluid"
    data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default'
    data-sidebar-user='true'>
    <div id="wrapper">
        @include('template.backend.navbar.navbar')
        @include('template.backend.sidebar.sidebar')
        <div class="content-page">
            <div class="content">

                @yield('content')

            </div>
            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy;</a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-sm-block">
                                {{-- <a href="javascript:void(0);">About Us</a>
                                <a href="javascript:void(0);">Help</a>
                                <a href="javascript:void(0);">Contact Us</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->
        </div>

    </div>
    @include('template.backend.sidebar.sidebar_right')
    <!--End wrapper-->
    @include('template.backend.footer_script.footer')
    @yield('script')
</body>
<script>
    $('.button-menu-mobile').click(function(){
        $('body').addClass('sidebar-enable');
    })
</script>
</html>
