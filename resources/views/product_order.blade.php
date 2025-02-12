@extends("layouts.page_header")
@section('content')
@php
if($product->discount != 0 || $product->discount != null){
$discount = ($product->discount/100) * $product->price;
$price = $product->price - $discount;
$total_price = $price * $quantity;
}else{
    $price = $product->price;
    $total_price = $product->price * $quantity;
}

@endphp


 <!-- breadcrumb-area start -->
 <div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{url("/")}}">Home</a></li>
                    <li class="breadcrumb-item active">{{ucwords($product->name)}} order details</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- main-content-wrap start -->
<div class="main-content-wrap section-ptb cart-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#" class="cart-table">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="plantmore-product-thumbnail">Images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="plantmore-product-price">Unit Price</th>
                                    <th class="plantmore-product-quantity">Quantity</th>
                                    <th class="plantmore-product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#"><img src="{{asset("storage/productimages/$product->image")}}" alt=""></a></td>
                                    <td class="plantmore-product-name"><a href="#">{{ucwords($product->name)}}</a></td>
                                     <td class="plantmore-product-price"><span class="amount">&#8358;{{$price}}</span></td>
                                    <td class="plantmore-product-quantity">
                                        <input value="{{$quantity}}" readonly type="number">
                                    </td>
                                    <td class="product-subtotal"><span class="amount">&#8358;{{$total_price}}</span></td>
                                
                                </tr>
                              
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="coupon-all">


                              
                            </div>
                        </div>
                        <div class="col-md-4 ml-auto">
                            <div class="cart-page-total">
                                <h2>Order totals</h2>
                                <ul>
                                    <li>Subtotal <span>&#8358;{{$price}}</span></li>
                                    <li>Total <span>&#8358;{{$total_price}}</span></li>
                                </ul>
                                <a href="{{url("/deliverydetails")}}" class="proceed-checkout-btn">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->


@include("layouts.page_footer")
@endsection
