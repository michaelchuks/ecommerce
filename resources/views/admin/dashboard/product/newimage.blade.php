@extends("layouts.admin_header")
@section("content")
@include("layouts.admin_navigation")
<div class="card shadow mb-4">
    <div class="card-header py-3">
   <h6 class="m-0 font-weight-bold text-success" style="display:flex;align-items:center;justify-content:space-between;"><span>Add {{ucwords($product->name)}} image
    </span> <a href="{{url("admin/productimages/$product->id")}}" class="btn btn-sm btn-success">back to Imgaes</a> </h6>
   </div>
       
       <div class="card-body">
           <div class="card-body">
               @if(Session::get("success"))
                <div class="alert alert-success">
                 <strong class="text-success">{{Session::get("success")}}</strong>
                </div>
                @endif
                <!--content-->
                <form method="post" action="{{route('product.savenewimage')}}" enctype="multipart/form-data">
                    @csrf
                    <label>Select Image</label>
                    <input type="file" name="image" class="form-control" required />
                    <input type="hidden" name="product_id" value="{{$product->id}}" />
                    <br />

                    <input type="submit" name="save_image_btn" class="btn btn-sm btn-primary" value="Save Image" />

                </form>
             

           <!--end of content-->
   
       </div>
      </div>


 @include("layouts.admin_footer")
@endsection