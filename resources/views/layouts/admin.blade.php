<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon icon-->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin_dir/assets/images/favicon/favicon.ico')}}">
        <!-- Libs CSS -->
        <link href="{{asset('admin_dir/assets/libs/bootstrap-icons/font/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{asset('admin_dir/assets/libs/dropzone/dist/dropzone.css')}}"  rel="stylesheet">
        <link href="{{asset('admin_dir/assets/libs/@mdi/font/css/materialdesignicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('admin_dir/assets/libs/prismjs/themes/prism-okaidia.min.css')}}" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{asset('admin_dir/assets/css/theme.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin_dir/assets/css/custom.css')}}">
        <title>ADMIN</title>
    </head>
    <body class="bg-light">
        <div id="db-wrapper">
        <!-- navbar vertical -->
        <!-- Sidebar -->
        <nav class="navbar-vertical navbar">
            <div class="nav-scroller">
                <!-- Brand logo -->
                <a class="navbar-brand" href="/admin">
                <img src="{{asset('admin_dir/assets/images/brand/logo/logo.svg')}}" alt="" />
                </a>
                <!-- Navbar nav -->
                <ul class="navbar-nav flex-column" id="sideNavbar">
                    <li class="nav-item">
                        <a class="nav-link has-arrow  active " href="/admin">
                        <i data-feather="home" class="nav-icon icon-xs me-2"></i>  Dashboard
                        </a>
                    </li>
                    <!-- Nav item -->
                     <li class="nav-item">
                        <div class="navbar-heading">Manage</div>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link has-arrow " href="{{route('admin.users')}}" >
                        <i data-feather="package" class="nav-icon icon-xs me-2" >
                        </i>  Users
                        </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link has-arrow " href="{{route('admin.products')}}" >
                        <i data-feather="package" class="nav-icon icon-xs me-2" >
                        </i>  Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link has-arrow " href="{{route('admin.categories')}}" >
                        <i data-feather="package" class="nav-icon icon-xs me-2" >
                        </i>  Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link has-arrow " href="{{route('admin.colors')}}" >
                        <i data-feather="package" class="nav-icon icon-xs me-2" >
                        </i>  Colors
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link has-arrow " href="{{route('admin.sizes')}}" >
                        <i data-feather="package" class="nav-icon icon-xs me-2" >
                        </i>  Sizes
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Page content -->
        <div id="page-content">
            <div class="header @@classList">
                <!-- navbar -->
                <nav class="navbar-classic navbar navbar-expand-lg">
                    <a id="nav-toggle" href="#"><i
                        data-feather="menu"
                        class="nav-icon me-2 icon-xs"></i></a>

                    <div class="ms-lg-3 d-none d-md-none d-lg-block">
                        <ul class="list-unstyled m-0 d-flex gap-3">
                            <li class="m-0">
                                <a class="text-decoration-none h4" href="/">Home</a>
                            </li>
                        </ul>
                    </div>
                    {{-- <div class="ms-lg-3 d-none d-md-none d-lg-block">
                        <!-- Form -->
                        <form class="d-flex align-items-center">
                            <input type="search" class="form-control" placeholder="Search" />
                        </form>
                    </div> --}}
                </nav>
            </div>
            @yield('content')
        </div>
        <!-- Scripts -->
        <!-- Libs JS -->
        <script src="{{asset('admin_dir/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('admin_dir/assets/libs/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('admin_dir/assets/libs/feather-icons/dist/feather.min.js')}}"></script>
        <script src="{{asset('admin_dir/assets/libs/prismjs/prism.js')}}"></script>
        <script src="{{asset('admin_dir/assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
        <script src="{{asset('admin_dir/assets/libs/dropzone/dist/min/dropzone.min.js')}}"></script>
        <script src="{{asset('admin_dir/assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js')}}"></script>
        <script src="{{asset('admin_dir/assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js')}}"></script>
        <!-- Theme JS -->
        <script src="{{asset('admin_dir/assets/js/theme.min.js')}}"></script>
    </body>
</html>
