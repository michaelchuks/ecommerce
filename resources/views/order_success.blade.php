@extends("layouts.page_header")
@section('content')

 <!-- breadcrumb-area start -->
 <div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{url("/")}}">Home</a></li>
                    <li class="breadcrumb-item active">order success</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- main-content-wrap start -->
<div class="main-content-wrap section-ptb wishlist-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="search-error-wrapper">
                    <h1>Order Successful</h1>
                    <h2></h2>
                    <p class="home-link">Your order has been placed successfully, and the reciept sent to your email address, our support will contact you shortly.</p>
                   
                    <a href="{{url("/products")}}" class="home-bacck-button">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->

@include("layouts.page_footer")
@endsection