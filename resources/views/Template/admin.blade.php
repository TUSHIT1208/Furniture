<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/addpro.css') }}">
    <script src="{{ asset('js/addpro.js') }}"></script>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name"><h3>Furni.</h3></span> </a>
                <div class="nav_list"> 
                    <a href="/dash" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                    <a href="{{ route('client.index') }}" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a> 
                    <a href="{{ route('product.create') }}" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">New Products</span> </a> 
                    <a href="{{ route('category.create') }}" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Add New Category</span> </a> 
                    <a href="{{ route('product.index') }}" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Products</span> </a> 
                    <a href="{{ route('placeorder.index') }}" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Order List</span> </a> 
                </div>
            </div> <a href="/login" class="nav_link" onclick="return confirm('Are Sure Want To Leave This Page')"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        @yield('dash')
        @yield('addproduct')
        @yield('addcategory')
        @yield('user')
        @yield('show_client')
        @yield('order')
        @yield('scripts')
        @yield('styles')
    </div>
    <!--Container Main end-->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>