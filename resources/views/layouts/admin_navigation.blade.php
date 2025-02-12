<body id="page-top">
    @php
    $settings = \App\Models\AppSettings::first();
    @endphp

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ucwords($settings->name)}}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{url("admin/dashboard")}}">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{url("admin/subscribers")}}">
                    <i class="fa fa-users"></i>
                    <span>Subscribers</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{url("admin/products")}}">
                    <i class="fa fa-certificate"></i>
                    <span>Products</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{url("admin/bestseller")}}">
                    <i class="fa fa-certificate"></i>
                    <span>Best Seller Product</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{url("admin/settings")}}">
                    <i class="fa fa-certificate"></i>
                    <span>Settings</span></a>
            </li>


            <li class="nav-item active">
                <a class="nav-link" href="{{url("admin/homepagecontent")}}">
                    <i class="fa fa-certificate"></i>
                    <span>HomePage Content</span></a>
            </li>


          
             
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseten"
                    aria-expanded="true" aria-controls="collapseten">
                    <i class="fa fa-wallet" style='color:white;'></i>
                    <span><strong style='color:white;'>Orders</strong></span>
                </a>
                <div id="collapseten" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    
                        <a class="collapse-item" href="{{url('admin/pendingorders')}}">Pending Orders</a>
                        <a class="collapse-item" href="{{url("admin/completedorders")}}">Delivered Orders</a>
                    </div>
                </div>
            </li>

             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesix"
                    aria-expanded="true" aria-controls="collapsesix">
                    <i class="fa fa-cog" style='color:white;'></i>
                    <span><strong style='color:white;'>Order History</strong></span>
                </a>
                <div id="collapsesix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('admin/todayorders')}}">Today Orders</a>
                        <a class="collapse-item" href="{{url('admin/weekorders')}}">This Week Orders</a>
                        
                        <a class="collapse-item" href="{{url('admin/monthorders')}}">This Month Orders</a>

                          <a class="collapse-item" href="{{url('admin/yearorders')}}">This year Orders</a>
                    </div>
                </div>
            </li>
             <li class="nav-item active">
                <a class="nav-link" href="{{url("admin/account")}}">
                    <i class="fa fa-bell"></i>
                    <span>account</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{url("admin/reviews")}}">
                    <i class="fa fa-users"></i>
                    <span>Reviews</span></a>
            </li>


             <li class="nav-item active">
                <a class="nav-link" href="{{url("admin/logout")}}">
                    <i class="fa fa-bullseye text-danger"></i>
                    <span class="text-danger">Logout</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                               
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ucwords($settings->name)}} Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset("support.png")}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                                <a class="dropdown-item" href="{{url("admin/account")}}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    account
                                </a>
                        
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{url("admin/logout")}}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">