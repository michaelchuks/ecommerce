@php
$settings = \App\Models\AppSettings::first();
$categories = \App\Models\Categories::get();
@endphp

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ucwords($settings->name)}} - Ecommerce Store</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("pageassets/images/favicon.ico")}}">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset("pageassets/css/vendor/bootstrap.min.css")}}">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset("pageassets/css/vendor/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{asset("pageassets/css/vendor/simple-line-icons.css")}}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset("pageassets/css/plugins/animation.css")}}">
    <link rel="stylesheet" href="{{asset("pageassets/css/plugins/slick.css")}}">
    <link rel="stylesheet" href="{{asset("pageassets/css/plugins/animation.css")}}">
    <link rel="stylesheet" href="{{asset("pageassets/css/plugins/nice-select.css")}}">
    <link rel="stylesheet" href="{{asset("pageassets/css/plugins/fancy-box.css")}}">
    <link rel="stylesheet" href="{{asset("pageassets/css/plugins/jqueryui.min.css")}}">
    <link rel="stylesheet" href="{{asset("pageassets/css/style.css")}}">
  

</head>

<body>

    <div class="main-wrapper">
        
        <!--  Header Start -->
        <header class="header">

            <!-- Header Top Start -->
            <div class="header-top-area d-none d-lg-block text-color-white bg-gren border-bm-1">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="header-top-settings">
                              
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="top-info-wrap text-end">
                                <ul class="my-account-container">
                                    <li><a href="{{url("/products")}}">View Products</a></li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Header Top End -->

            <!-- haeader Mid Start -->
            <div class="haeader-mid-area bg-gren border-bm-1 d-none d-lg-block ">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-5">
                            <div class="logo-area">
                                <a href="{{url("/")}}"><img src="{{asset("storage/logo/$settings->logo")}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="search-box-wrapper">
                                <div class="search-box-inner-wrap">
                                    <form class="search-box-inner" method="post" action="{{url("productsearch")}}">
                                        @csrf
                                        <div class="search-select-box">
                                            <select class="nice-select">
                                                <optgroup label=" Watch">
                                                    <option value="all">All</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->category}}">{{$category->category}}</option>
                                                    @endforeach
                                                </optgroup>
                                               
                                            </select>
                                        </div>
                                        <div class="search-field-wrap">
                                            <input type="text" name="product" class="search-field" placeholder="Search product...">

                                            <div class="search-btn">
                                                <button><i class="icon-magnifier"></i></button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="right-blok-box text-white d-flex">

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- haeader Mid End -->

            <!-- haeader bottom Start -->
            <div class="haeader-bottom-area bg-gren header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12 d-none d-lg-block">
                            <div class="main-menu-area white_text">
                                <!--  Start Mainmenu Nav-->
                                <nav class="main-navigation text-center">
                                    <ul>
                                        <li><a href="{{url("/")}}">Home</a></li>
                                        <li><a href="{{url("/about")}}">About Us</a></li>
                                        <li><a href="{{url("/contact")}}">Contact</a></li>
                                    </ul>
                                </nav>

                            </div>
                        </div>

                        <div class="col-5 col-md-6 d-block d-lg-none">
                            <div class="logo"><a href="{{url("/")}}"><img src="{{asset("storage/logo/$settings->logo")}}" alt=""></a></div>
                        </div>
                        
                        
                        <div class="col-lg-3 col-md-6 col-7 d-block d-lg-none">
                            <div class="right-blok-box text-white d-flex">


                                <div class="mobile-menu-btn d-block d-lg-none">
                                    <div class="off-canvas-btn">
                                        <a href="#"><img src="{{asset("pageassets/images/icon/bg-menu.png")}}" alt=""></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
            </div>
            <!-- haeader bottom End -->
            
            <!-- off-canvas menu start -->
            <aside class="off-canvas-wrapper">
                <div class="off-canvas-overlay"></div>
                <div class="off-canvas-inner-content">
                    <div class="btn-close-off-canvas">
                        <i class="fa fa-times"></i>
                    </div>

                    <div class="off-canvas-inner">

                        <div class="search-box-offcanvas">
                            <form method="post" action="{{url("/productsearch")}}">
                                <input type="text" placeholder="Search product..." name="product">
                                <button class="search-btn"><i class="icon-magnifier"></i></button>
                            </form>
                        </div>

                        <!-- mobile menu start -->
                        <div class="mobile-navigation">

                            <!-- mobile menu navigation start -->
                            <nav>
                                <ul class="mobile-menu">
                                    <li><a href="{{url("/")}}">Home</a></li>
                                    <li><a href="{{url("/about")}}">About Us</a></li>
                                    <li><a href="{{url("/contact")}}">Contact</a></li>
                                </ul>
                            </nav>
                            <!-- mobile menu navigation end -->
                        </div>
                        <!-- mobile menu end -->


                        <div class="header-top-settings offcanvas-curreny-lang-support">
                            <h5>My Account</h5>
                            <ul class="nav align-items-center">
                               
                                
                            </ul>
                        </div>

                        <!-- offcanvas widget area start -->
                        <div class="offcanvas-widget-area">
                            <div class="top-info-wrap text-left text-black">
                              
                                <ul class="offcanvas-account-container">
                                    <li><a href="{{url("/products")}}">Products</a></li>
                                  
                                </ul>
                            </div>

                        </div>
                        <!-- offcanvas widget area end -->
                    </div>
                </div>
            </aside>
            <!-- off-canvas menu end -->
            
        </header>
        <!--  Header Start -->
        @yield("content")