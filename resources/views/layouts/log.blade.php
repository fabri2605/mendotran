<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/select2.min.css">
    @stack('head-style')
    
    <script src="{{ asset('js/app.js') }}" defer ></script>
</head>
<body>
        <div class="preloader">
                <div class="lds-ripple">
                    <div class="lds-pos"></div>
                    <div class="lds-pos"></div>
                </div>
            </div>
            <div id="main-wrapper">
                @if(!Auth::guest())
                <header class="topbar">
                    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                        <div class="navbar-header">
                            <!-- This is for the sidebar toggle which is visible on mobile only -->
                            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                                <i class="ti-menu ti-close"></i>
                            </a>
                            <!-- ============================================================== -->
                            <!-- Logo -->
                            <!-- ============================================================== -->
                            <a class="navbar-brand" href="index.html">
                                <!-- Logo icon -->
                                <b class="logo-icon">
                                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                    <!-- Dark Logo icon -->
                                    <img src="../../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                    <!-- Light Logo icon -->
                                    <img src="../../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                                </b>
                                <!--End Logo icon -->
                                <!-- Logo text -->
                                <!--<span class="logo-text">
                                    <img src="../../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                    <img src="../../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                                </span>!-->
                            </a>
                            <!-- ============================================================== -->
                            <!-- End Logo -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Toggle which is visible on mobile only -->
                            <!-- ============================================================== -->
                            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="ti-more"></i>
                            </a>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <div class="navbar-collapse collapse" id="navbarSupportedContent">
                            <!-- ============================================================== -->
                            <!-- toggle and nav items -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav float-left mr-auto">
                                <li class="nav-item d-none d-md-block">
                                    <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                        <i class="sl-icon-menu font-20"></i>
                                    </a>
                                </li>
                                <!-- ============================================================== -->
                                <!-- Comment -->
                                <!-- ============================================================== -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-bell font-20"></i>
        
                                    </a>
                                    <div class="dropdown-menu mailbox animated bounceInDown">
                                        <span class="with-arrow">
                                            <span class="bg-primary"></span>
                                        </span>
                                        <ul class="list-style-none">
                                            <li>
                                                <div class="drop-title bg-primary text-white">
                                                    <h4 class="m-b-0 m-t-5">4 New</h4>
                                                    <span class="font-light">Notifications</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="message-center notifications">
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)" class="message-item">
                                                        <span class="btn btn-danger btn-circle">
                                                            <i class="fa fa-link"></i>
                                                        </span>
                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Luanch Admin</h5>
                                                            <span class="mail-desc">Just see the my new admin!</span>
                                                            <span class="time">9:30 AM</span>
                                                        </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)" class="message-item">
                                                        <span class="btn btn-success btn-circle">
                                                            <i class="ti-calendar"></i>
                                                        </span>
                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Event today</h5>
                                                            <span class="mail-desc">Just a reminder that you have event</span>
                                                            <span class="time">9:10 AM</span>
                                                        </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)" class="message-item">
                                                        <span class="btn btn-info btn-circle">
                                                            <i class="ti-settings"></i>
                                                        </span>
                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Settings</h5>
                                                            <span class="mail-desc">You can customize this template as you want</span>
                                                            <span class="time">9:08 AM</span>
                                                        </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)" class="message-item">
                                                        <span class="btn btn-primary btn-circle">
                                                            <i class="ti-user"></i>
                                                        </span>
                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Pavan kumar</h5>
                                                            <span class="mail-desc">Just see the my admin!</span>
                                                            <span class="time">9:02 AM</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="nav-link text-center m-b-5" href="javascript:void(0);">
                                                    <strong>Check all notifications</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- ============================================================== -->
                                <!-- End Comment -->
                                <!-- ============================================================== -->
        
                            </ul>
                            <!-- ============================================================== -->
                            <!-- Right side toggle and nav items -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav float-right">
                               
                            </ul>
                        </div>
                    </nav>
                </header>
                @endif
                <div class="container-fluid" style="margin-top: 0%">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                    <footer class="footer text-center">
                       Todos los derechos reservados Secretaría de Servicios Públicos. Desarrollado por <b class="cprimario">Cup Studio</b>
                    </footer>
                </div>
            </div>
            
    <script src="/libs/jquery.min.js" ></script>
    <script src="/js/popper.min.js" ></script>
    <script src="/js/bootstrap.min.js" ></script>
    <script src="/js/admin.js" ></script>
    <script src="/js/app.init.js" ></script>
    <script src="/js/app-style-switcher.js" ></script>
    <script src="/libs/perfect-scrollbar.jquery.min.js" ></script>
    <script src="/libs/sparkline.js" ></script>
    <script src="/js/waves.js" ></script>
    <script src="/js/sidebarmenu.js" ></script>
    <script src="/js/custom.min.js" ></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/select2.min.js"></script>
    
    
</body>
</html>
