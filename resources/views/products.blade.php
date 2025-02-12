@extends("layouts.page_header")
@section("content")
        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{url("/")}}">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->


        <!-- main-content-wrap start -->
        <div class="main-content-wrap shop-page section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <!-- shop-product-wrapper start -->
                        <div class="shop-product-wrapper">
                            <div class="row align-itmes-center">
                               
                            </div>

                            <!-- shop-products-wrap start -->
                            <div class="shop-products-wrap">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="grid">
                                        <div class="shop-product-wrap">
                                            <div class="row">
                                                  @foreach($products as $product)
                                                <div class="col-lg-3 col-md-6">
                                                    <!-- single-product-area start -->
                                                    <div class="single-product-area mt-30">
                                                        <div class="product-thumb">
                                                            <a href="{{url("/product/$product->id")}}">
                                                                <img class="primary-image" src="{{asset("storage/productimages/$product->image")}}" alt="">
                                                            </a>
                                                            @if($product->is_promoted == true)
                                                            <div class="label-product label_new">New</div>
                                                            @endif
                                                           
                                                            <ul class="watch-color">
                                                                <li class="twilight"><span></span></li>
                                                                <li  class="portage"><span></span></li>
                                                                <li class="pigeon"><span></span></li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-caption">
                                                            <h4 class="product-name"><a href="product-details.html">{{ucwords($product->name)}}</a></h4>
                                                            <div class="price-box">
                                                                @if($product->discount != 0 || $product->discount != null)
                                                                @php
                                                                  $discount = ($product->discount/100) * $product->price
                                                                @endphp
                                                                <span class="new-price">&#8358;{{$product->price - $discount}}</span>
                                                                <span class="old-price">&#8358;{{$product->price}}</span>
                                                                @else
                                                                <span class="new-price">&#8358;{{$product->price}}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-area end -->
                                                </div>


                                                @endforeach
                                            </div>
                                        </div>
                                    </div>


                                  

                            <!-- paginatoin-area start -->
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <ul class="pagination-box">
                                            {{$products->links()}}
                                               
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- paginatoin-area end -->
                        </div>
                        <!-- shop-product-wrapper end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- main-content-wrap end -->

       @include("layouts.page_footer")
       @endsection