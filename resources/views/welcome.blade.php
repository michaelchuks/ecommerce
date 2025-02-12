@extends("layouts.page_header")
@section("content")

<!--content starts-->
 <!-- Hero Section Start -->
 <div class="hero-slider hero-slider-one">

    <!-- Single Slide Start -->
    <div class="single-slide" style='background-image: url({{asset("storage/content/$content->slider3")}})'>
        <!-- Hero Content One Start -->
        <div class="hero-content-one container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="slider-content-text text-left">
                        <h5>{{ucwords($content->hero_top)}}</h5>
                        <h1>{{ucwords($content->hero_heading)}}</h1>
                        <p>{{ucwords($content->hero_subtext)}} </p>
                        
                        <div class="slide-btn-group">
                            <a href="{{url("/products")}}" class="btn btn-bordered btn-style-1">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Content One End -->
    </div>
    <!-- Single Slide End -->
    <!-- Single Slide Start -->
    <div class="single-slide" style='background-image: url({{asset("storage/content/$content->slider4")}})'>
        <!-- Hero Content One Start -->
        <div class="hero-content-one container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="slider-content-text text-left">
                        <h5>{{ucwords($content->hero_top)}}</h5>
                        <h1>{{ucwords($content->hero_heading)}}</h1>
                        <p>{{ucwords($content->hero_subtext)}} </p>
                        <div class="slide-btn-group">
                            <a href="{{url("/products")}}" class="btn btn-bordered btn-style-1">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Content One End -->
    </div>
    <!-- Single Slide End -->

</div>
<!-- Hero Section End -->


<!-- Banner Area Start -->
<div class="banner-area section-pt section-pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="single-banner mb-30">
                    <a href="#"><img src="{{asset('pageassets/images/banner/banner-03.jpg')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6  col-md-6">
                <div class="single-banner mb-30">
                    <a href="#"><img src="{{asset('pageassets/images/banner/banner-05.png')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End -->

<!-- Offer Area Start -->
@php
$best_seller_product = \App\Models\Products::find($best_seller->promoted_product_id);
if($best_seller_product->discount != 0){
    $best_seller_discount = ($best_seller_product->discount/100) * $best_seller_product->price;
    $best_seller_discount_price =  $best_seller_product->price -  $best_seller_discount ;
 }
@endphp
<div class="offer-area">
    <div class="container">
        <div class="deal-offer-wrap">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="offer-img">
                        <img src="{{asset("storage/promotion/$best_seller->promotion_image")}}" alt="offer">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="offer-owl">
                        <div class="single-offer">

                            <div class="offer-details">
                                <div class="product-details-view-content">
                                    <div class="product-info">
                                        <h3>Best Seller Product</h3>
                                        <div class="product-rating d-flex">
                                            <ul class="d-flex">
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                            <a href="{{url("/product_reviews/$best_seller_product->id")}}">(<span class="count">1</span> customer review)</a>
                                        </div>
                                        <div class="price-box">
                                            @if($best_seller_product->discount != 0)
                                            <span class="new-price">&#8358;{{ $best_seller_discount_price}}</span>
                                         
                                            <span class="old-price">&#8358;{{$best_seller_product->price}}</span>
                                            @else
                                            <span class="new-price">&#8358;{{ $best_seller_product->price}}</span>
                                            @endif
                                        </div>

                                        <div class="timer">
                                            <!-- countdown start -->
                                            <div class="countdown-deals" data-countdown="{{date("Y/m/d")}}"></div>
                                            <!-- countdown end -->
                                        </div>

                                        <p class="mt-30">{{ucwords($best_seller->promotion_content)}}</p>

                                    </div>
                                </div>
                                <div class="price-cart mt-30">
                                    <a href="{{url("product/$best_seller_product->id")}}" class="add-to-btn btn">View Product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
</div>
<!-- Offer Area End -->


<!-- Banner Area Start -->
<div class="banner-area section-pt section-pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="single-banner mb-30">
                    <a href="#"><img src="{{asset('pageassets/images/banner/banner-01.jpg')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6  col-md-6">
                <div class="single-banner mb-30">
                    <a href="#"><img src="{{asset('pageassets/images/banner/banner-02.jpg')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End -->


 
        <!-- Product Area Start -->
        <div class="product-area section-pb">
            <div class="container">
               
                <div class="row">
                    <div class="col-12 text-center">
                        <ul class="nav product-tab-menu" role="tablist">
                            <li class="product-tab-item nav-item active">
                                <a class="product-tab__link active" id="nav-featured-tab" data-bs-toggle="tab" href="#nav-featured" role="tab" aria-selected="true">Featured</a>
                            </li>
                            <li class="product-tab__item nav-item">
                                <a class="product-tab__link" id="nav-new-tab" data-bs-toggle="tab" href="#nav-new" role="tab" aria-selected="false">New Arrivals</a>
                            </li>
                            <li class="product-tab__item nav-item">
                                <a class="product-tab__link" id="nav-bestseller-tab" data-bs-toggle="tab" href="#nav-bestseller" role="tab" aria-selected="false">Bestseller</a>
                            </li>
                            <li class="product-tab__item nav-item">
                                <a class="product-tab__link" id="nav-onsale-tab" data-bs-toggle="tab" href="#nav-onsale" role="tab" aria-selected="false">On Sale</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                
                <div class="tab-content product-tab__content" id="product-tabContent">
                    <div class="tab-pane fade show active" id="nav-featured" role="tabpanel">
                        <div class="product-carousel-group">
                           
                            <div class="row product-active-row-4">
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-20.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 001</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$44.00</span>
                                                <span class="old-price">$49.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-02.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 005</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$35.00</span>
                                                <span class="old-price">$39.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-06.png")}}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 004</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$42.00</span>
                                                <span class="old-price">$45.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-07.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 004</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$35.00</span>
                                                <span class="old-price">$39.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-08.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 008</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$75.00</span>
                                                <span class="old-price">$79.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-09.png")}}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 009</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$75.00</span>
                                                <span class="old-price">$79.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-10.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 010</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$65.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-11.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 011</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$45.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-12.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 012</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$45.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-13.png")}}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 013</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$45.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-14.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 013</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$45.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-15.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 015</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$35.00</span>
                                                <span class="old-price">$39.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="nav-new" role="tabpanel">
                        <div class="product-carousel-group">
                           
                            <div class="row product-active-row-4">
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-10.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 001</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$44.00</span>
                                                <span class="old-price">$49.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-14.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 005</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$35.00</span>
                                                <span class="old-price">$39.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-15.png")}}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 004</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$42.00</span>
                                                <span class="old-price">$45.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-17.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 004</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$35.00</span>
                                                <span class="old-price">$39.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-08.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 008</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$75.00</span>
                                                <span class="old-price">$79.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-09.png")}}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 009</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$75.00</span>
                                                <span class="old-price">$79.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-10.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 010</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$65.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-11.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 011</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$45.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-12.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 012</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$45.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-13.png")}}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 013</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$45.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-14.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 013</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$45.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-15.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 015</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$35.00</span>
                                                <span class="old-price">$39.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-bestseller" role="tabpanel">
                        <div class="product-carousel-group">
                           
                            <div class="row product-active-row-4">
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-11.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 001</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$44.00</span>
                                                <span class="old-price">$49.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-12.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 005</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$35.00</span>
                                                <span class="old-price">$39.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-13.png")}}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 004</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$42.00</span>
                                                <span class="old-price">$45.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-07.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 004</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$35.00</span>
                                                <span class="old-price">$39.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-08.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 008</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$75.00</span>
                                                <span class="old-price">$79.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-09.png")}}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 009</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$75.00</span>
                                                <span class="old-price">$79.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-10.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 010</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$65.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-11.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 011</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$45.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-12.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 012</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$45.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-13.png")}}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 013</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$45.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-14.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 013</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$45.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-15.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 015</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$35.00</span>
                                                <span class="old-price">$39.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-onsale" role="tabpanel">
                        <div class="product-carousel-group">
                           
                            <div class="row product-active-row-4">
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-20.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 001</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$44.00</span>
                                                <span class="old-price">$49.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-19.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 005</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$35.00</span>
                                                <span class="old-price">$39.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-18.png")}}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 004</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$42.00</span>
                                                <span class="old-price">$45.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-17.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 004</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$35.00</span>
                                                <span class="old-price">$39.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-03.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 008</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$75.00</span>
                                                <span class="old-price">$79.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-09.png")}}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 009</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$75.00</span>
                                                <span class="old-price">$79.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-10.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 010</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$65.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-11.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 011</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$45.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-12.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 012</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$45.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-13.png")}}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 013</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$45.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-14.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 013</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$45.00</span>
                                                <span class="old-price">$69.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area mt-30">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="primary-image" src="{{asset("pageassets/images/product/product-15.png")}}" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                            </div>
                                            <ul class="watch-color">
                                                <li class="twilight"><span></span></li>
                                                <li  class="portage"><span></span></li>
                                                <li class="pigeon"><span></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="product-details.html">Simple Product 015</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$35.00</span>
                                                <span class="old-price">$39.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- Product Area End -->


@include("layouts.news_letter")

@include("layouts.page_footer")

@endsection