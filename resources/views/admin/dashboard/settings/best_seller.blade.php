@extends("layouts.admin_header")
@section("content")
@include("layouts.admin_navigation")
<div class="card shadow mb-4">
    <div class="card-header py-3">
   <h6 class="m-0 font-weight-bold text-success" style="display:flex;align-items:center;justify-content:space-between;"><span>Best Seller Product
    </span></h6>
   </div>
   
   @php
    $promoted_product = \App\Models\Products::find($best_seller->promoted_product_id);
   @endphp
       
       <div class="card-body">
           <div class="card-body">
               @if(Session::get("success"))
                <div class="alert alert-success">
                 <strong class="text-success">{{Session::get("success")}}</strong>
                </div>
                @endif
                <!--content-->
                <p><small><strong>Best seller product is the product that appears on the best seller section of the homepage</strong></small></p>
                <form method="post" action="{{url("admin/updatebestseller")}}" enctype="multipart/form-data">
                    @csrf
                <label>Select Best Seller Product</label>
                <select name="product_id" class="form-control">
                <option value="{{$best_seller->promoted_product_id}}">{{ucwords($promoted_product->name)}}</option>
                @foreach($products as $product)
                @if($product->id != $best_seller->promoted_product_id)
                <option value="{{$product->id}}">{{ucwords($product->name)}}</option>
                @endif
                @endforeach
                </select>
                <br />

                <label>Best Seller Image</label>
                @if($best_seller->promotion_image != null)
                <p><img src="{{asset("storage/promotion/$best_seller->promotion_image")}}" style="width:400px;height:300px;" /></p>
                @endif
                <input type="file" name="promotion_image" class='form-control' />

                <br />

                <label>Best Seller Heading</label>
                <input type="text" name="promotion_heading" class="form-control" value="{{$best_seller->promotion_heading}}" />

                <br />
                <label>Best Seller Content</label>
                <textarea class='form-control' name="promotion_content">{{$best_seller->promotion_content}}</textarea>
                <br />

                <input type="submit" name="update_best_seller" class="btn btn-sm btn-primary" value="Update" />
                </form>
             

           <!--end of content-->
   
       </div>
      </div>


 @include("layouts.admin_footer")
@endsection