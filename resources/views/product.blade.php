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
                            <li class="breadcrumb-item active">{{ucwords($product->name)}}</li>
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
                <div class="row product-details-inner">
                    <div class="col-lg-5 col-md-6">
                        <!-- Product Details Left -->
                        <div class="product-large-slider">
                            <div class="pro-large-img img-zoom">
                                <img src="{{asset("storage/productimages/$product->image")}}" alt="product-details" />
                                <a href="{{asset("storage/productimages/$product->image")}}" data-fancybox="images"><i class="fa fa-search"></i></a>
                            </div>
                            @foreach($images as $image)
                            <div class="pro-large-img img-zoom">
                                <img src="{{asset("storage/productimages/$image->image")}}" alt="product-details" />
                                <a href="{{asset("storage/productimages/$image->image")}}" data-fancybox="images"><i class="fa fa-search"></i></a>
                            </div>
                            @endforeach

                        </div>
                        <div class="product-nav">
                            <div class="pro-nav-thumb">
                                <img src="{{asset("storage/productimages/$product->image")}}" alt="product-details" />
                            </div>
                            @foreach($images as $image)
                            <div class="pro-nav-thumb">
                                <img src="{{asset("storage/productimages/$image->image")}}" alt="product-details" />
                            </div>
                            @endforeach
                        </div>
                        <!--// Product Details Left -->
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="product-details-view-content">
                            <div class="product-info">
                                <h3>{{ucwords($product->name)}}</h3>
                                <div class="product-rating d-flex">
                                    <ul class="d-flex">
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                    </ul>
                                    <a href="#reviews">(<span class="count">{{$total_reviews}}</span> customer review)</a>
                                </div>
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
                                <p>{{$product->description}}.</p>

                                <div class="single-add-to-cart">
                                    <form action="{{url("/productorder")}}" method="post" class="cart-quantity d-flex">
                                        @csrf
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input type="number" class="input-text" min="1" name="quantity" value="1" title="Qty">
                                            </div>
                                        </div>
                                        <input type="hidden" name="product_id" value="{{$product->id}}" />
                                        <button class="add-to-cart" type="submit">Order</button>
                                    </form>
                                </div>
                             
                                <ul class="stock-cont">
                                    <li class="product-sku">Category: <span>{{$product->category}}</span></li>
                                    @if($product->color != null)
                                    <li class="product-stock-status">Colors Available : {{$product->color}}</li>
                                    @endif
                                    @if($product->size != null)
                                    <li class="product-stock-status">Sizes Available : {{$product->size}}</li>
                                    @endif

                                </ul>
                                <div class="share-product-socail-area">
                                    <p>Share this product</p>
                                    <ul class="single-product-share">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    </ul>
                                </div>
                                <br />

                                @if($product->video != null || $product->video != "")
                                <video width="320" height="240" controls>
                                    <source src="{{asset("storage/productvideos/$product->video")}}" type="video/mp4">
                                  
                                    Your browser does not support the video tag.
                                  </video>
                                   @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-description-area section-pt">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-details-tab">
                                <ul role="tablist" class="nav">
                                    <li class="active" role="presentation">
                                        <a data-bs-toggle="tab" role="tab" href="#description" class="active">Description</a>
                                    </li>
                                    <li role="presentation">
                                        <a data-bs-toggle="tab" role="tab" href="#reviews">Reviews</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="product_details_tab_content tab-content">
                                <!-- Start Single Content -->
                                <div class="product_tab_content tab-pane active" id="description" role="tabpanel">
                                    <div class="product_description_wrap  mt-30">
                                        <div class="product_desc mb-30">
                                            <p>{{ucwords($product->description)}}.</p>

                                        </div>

                                    </div>
                                </div>
                                <!-- End Single Content -->
                                <!-- Start Single Content -->
                                <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">
                                    <div class="review_address_inner mt-30">
                                        <!-- Start Single Review -->
                                        @if(count($reviews) > 0)
                                        <div class="pro_review">
                                            <div class="review_thumb">
                                                <img alt="review images" src="{{asset("pageassets/images/other/reviewer-60x60.jpg")}}">
                                            </div>
                                            <div class="review_details">
                                                <div class="review_info mb-10">
                                                    <ul class="product-rating d-flex mb-10">
                                                        <li><span class="icon-star"></span></li>
                                                        <li><span class="icon-star"></span></li>
                                                        <li><span class="icon-star"></span></li>
                                                        <li><span class="icon-star"></span></li>
                                                        <li><span class="icon-star"></span></li>
                                                    </ul>
                                                    <h5>{{$reviews[0]->name}} - <span> {{$reviews[0]->created_at}}</span></h5>

                                                </div>
                                                <p>{{$reviews[0]->review}}.</p>
                                            </div>
                                        </div>
                                        @endif
                                        <!-- End Single Review -->
                                    </div>
                                    <!-- Start RAting Area -->
                                    <div class="rating_wrap mt-50">
                                        <h5 class="rating-title-1">Add a review </h5>
                                        <p>Your email address will not be published. Required fields are marked *</p>
                                        <h6 class="rating-title-2">Your Rating</h6>
                                        <div class="rating_list">
                                            <div class="review_info mb-10">
                                                <ul class="product-rating d-flex mb-10">
                                                    <li><span class="icon-star"></span></li>
                                                    <li><span class="icon-star"></span></li>
                                                    <li><span class="icon-star"></span></li>
                                                    <li><span class="icon-star"></span></li>
                                                    <li><span class="icon-star"></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End RAting Area -->
                                    <div class="comments-area comments-reply-area">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form action="{{url("/savereview")}}" method="post" class="comment-form-area">
                                                    @csrf
                                                    <div class="row comment-input">
                                                        <div class="col-md-6 comment-form-author mt-15">
                                                            <label>Name <span class="required">*</span></label>
                                                            <input type="text" required="required" name="Name" required>
                                                        </div>
                                                        <div class="col-md-6 comment-form-email mt-15">
                                                            <label>Email <span class="required">*</span></label>
                                                            <input type="text" required="required" name="email" required>
                                                        </div>
                                                    </div>
                                                    <div class="comment-form-comment mt-15">
                                                        <label>Comment</label>
                                                        <textarea class="comment-notes" required="required" name="review"></textarea>
                                                    </div>
                                                    <input type="hidden" name="product_id" value="{{$product->id}}" />
                                                    <div class="comment-form-submit mt-15">
                                                        <input type="submit" value="Submit" class="comment-submit">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content -->
                            </div>
                        </div>
                    </div>
                </div>

                 @if(count($related_products) > 0)
                <div class="related-product-area section-pt">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h3> Related Product</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row product-active-lg-4">
                        @foreach($related_products as $product)
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="{{url("product/$product->id")}}">
                                        <img class="primary-image" src="{{asset("storage/productimages/$product->image")}}" alt="">
                                    </a>
                                    @if($product->is_promoted == true)
                                    <div class="label-product label_new">New</div>
                                    @endif
                                   
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                        <li  class="portage"><span></span></li>
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
                @endif

               

            </div>
        </div>
        <!-- main-content-wrap end -->




@include("layouts.page_footer")
@endsection