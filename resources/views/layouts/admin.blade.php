<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>
    @stack('prepend-style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.css" />
    @stack('addon-style')
</head>

<body>
    <div class="page-dashboard">
        <div class="d-flex" id="wrapper" data-aos="fade-right">
            <!-- sidebar  -->
            <div class="border-right" id="sidebar-wrapper">
                <div class="sidebar-heading text-center">
                    <img src="/images/admin.png" class="my-4" style="width:100px" alt="logo toko" />
                    <div class="list-group list-group-flush">
                        <a href="{{route('admin-dashboard')}}"
                            class="list-group-item list-group-item-action {{Request::is('admin') ? 'active':''}}">Dashboard
                            Admin</a>
                        <a href="{{route('product.index')}}"
                            class="list-group-item list-group-item-action {{Request::is('admin/product') || Request::is('admin/product/create') ? 'active':''}}">Products</a>
                        <a href="{{route('product-gallery.index')}}"
                            class="list-group-item list-group-item-action {{Request::is('admin/product-gallery') || Request::is('admin/product-gallery/create') ? 'active':''}}">Gallery</a>
                        <a href="{{route('category.index')}}"
                            class="list-group-item list-group-item-action  {{Request::is('admin/category') || Request::is('admin/category/create') ? 'active':''}}">Categories
                        </a>
                        <a href="{{route('transaction.index')}}"
                            class="list-group-item list-group-item-action">Transactions</a>
                        <a href="{{route('user.index')}}"
                            class="list-group-item list-group-item-action  {{Request::is('admin/user') || Request::is('admin/user/create') ? 'active':''}}">Users</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            class="list-group-item list-group-item-action">Sign Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
            <!-- Page Content  -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
                        data-aos="fade-down">

                        <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
                            &laquo; Menu
                        </button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Desktop Menu  -->
                            <ul class="navbar-nav d-none d-lg-flex ml-auto">
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link" id="navbarDropdown" role="button"
                                        data-toggle="dropdown">
                                        <img src="/images/icon-user.png" alt=""
                                            class="rounded-circle mr-2 profile-picture" /> Hi,
                                        {{Auth::user()->name}}</a>
                                    <div class="dropdown-menu">
                                        <a href="{{route('admin-dashboard')}}" class="dropdown-item">Dashboard</a>
                                        <a href="/dashboard-account.html" class="dropdown-item">Settings</a>
                                        <div class="dropdown-devider"></div>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="dropdown-item">Log Out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>

                            </ul>

                            <!-- Mobile menu  -->

                            <ul class="navbar-nav d-block d-lg-none">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Hi, {{Auth::user()->name}}</a>
                                </li>
                                <li class="nav-item">
                                    <a href=" " class="nav-link d-inline-block"> Cart </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Section Content  -->
                    @yield('content')
                </div>

            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    </script>
    @stack('addon-script')
</body>

</html>