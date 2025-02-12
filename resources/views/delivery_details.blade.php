@extends("layouts.page_header")
@section("content")

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
                    <li class="breadcrumb-item active">Checkout Page</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- main-content-wrap start -->
<div class="main-content-wrap section-ptb checkout-page">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="coupon-area">
                  
                   
                </div>
            </div>
        </div>
        <!-- checkout-details-wrapper start -->
        <form action="{{url("/placeorder")}}" method="post">
            @csrf
            @if(Session::get("error"))
            <div class="alert alert-danger">
             <strong class="text-danger">{{Session::get("error")}}</strong>
            </div>
            @endif
        <div class="checkout-details-wrapper">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <!-- billing-details-wrap start -->
                    <div class="billing-details-wrap">
                      
                            <h3 class="shoping-checkboxt-title">Delivery Details</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="single-form-row">
                                        <label>Fullname <span class="required">*</span></label>
                                        <input type="text" value="{{old("name")}}" name="name" required>
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                    <p class="single-form-row">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" value="{{old("email")}}" name="email" required>
                                    </p>
                                </div>
                               
                                <div class="col-lg-12 mb-20">
                                    <div class="single-form-row">
                                        <label>State Of Residence <span class="required">*</span></label>
                                        <div class="nice-select wide">
                                            <select name="state">
                                               
                                                <option>Abia</option>
                                                <option>Adamawa</option>
                                                <option>Akwa Ibom</option>
                                                <option>Anambra</option>
                                                <option>Bauchi</option>
                                                <option>Bayelsa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <p class="single-form-row">
                                        <label>Street address <span class="required">*</span></label>
                                        <input type="text" value="{{old("address")}}" placeholder="House number and street name" name="address" required>
                                    </p>
                                </div>
                               
                                <div class="col-lg-12">
                                    <p class="single-form-row">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input type="text" value="{{old("city")}}" name="city" required>
                                    </p>
                                </div>
                               
                              
                                <div class="col-lg-12">
                                    <p class="single-form-row">
                                        <label>Phone</label>
                                        <input type="text" value="{{old("phone")}}" name="phone" required>
                                    </p>
                                </div>
                              
                               
                              
                                <div class="col-lg-12">
                                    <p class="single-form-row m-0">
                                        <label>Order notes</label>
                                        <textarea  name="note" value="{{old("note")}}" placeholder="Notes about your order, e.g. special notes for delivery." class="checkout-mess" rows="2" cols="5"></textarea>
                                    </p>
                                </div>
                            </div>

                         
                    </div>
                    <!-- billing-details-wrap end -->
                </div>
                <div class="col-lg-6 col-md-6">
                    <!-- your-order-wrapper start -->
                    <div class="your-order-wrapper">
                        <h3 class="shoping-checkboxt-title">Your Order</h3>
                        <!-- your-order-wrap start-->
                        <div class="your-order-wrap">
                            <!-- your-order-table start -->
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{ucwords($product->name)}} <strong class="product-quantity"> × {{$quantity}}</strong>
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">&#8358;{{$price}}</span>
                                            </td>
                                        </tr>
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Order Subtotal</th>
                                            <td><span class="amount">&#8358;{{$total_price}}</span></td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Delivery</th>
                                            <td>
                                                <ul>
                                                    <li>
                                                       
                                                        <label>
                                                           Delivery Fee: <span class="amount">Negotiable</span>
                                                        </label>
                                                    </li>
                                                    
                                                    <li></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">&#8358;{{$total_price}}</span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- your-order-table end -->

                            <!-- your-order-wrap end -->
                          

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout-details-wrapper end -->
        <input type="hidden" name="price" value="{{$price}}" />
        <input type="hidden" name="total_price" value="{{$total_price}}" />
        <div class="order-button-payment">
            <input type="submit" value="Place order" />
        </div>
    </form>
    </div>
</div>
<!-- main-content-wrap end -->


@include("layouts.page_footer")
@endsection