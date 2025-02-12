@extends("layouts.admin_header")
@section("content")
@include("layouts.admin_navigation")
<div class="card shadow mb-4">
    <div class="card-header py-3">
   <h6 class="m-0 font-weight-bold text-success" style="display:flex;align-items:center;justify-content:space-between;"><span>{{ucwords($product->name)}}
    </span> <a href="{{url("admin/editproduct/$product->id")}}" class="btn btn-sm btn-success">Edit</a> 
    <a href="{{url("admin/productimages/$product->id")}}" class="btn btn-sm btn-primary">View Images</a>
</h6>
   </div>
       
       <div class="card-body">
           <div class="card-body">
               @if(Session::get("success"))
                <div class="alert alert-success">
                 <strong class="text-success">{{Session::get("success")}}</strong>
                </div>
                @endif
                <!--content-->
                 <div class="row">
                <div class='col-md-6'>
                <p>Name : {{ucwords($product->name)}}</p>
                <p>Product Category: {{ucwords($product->category)}}</p>
                <p><img src="{{asset("storage/productimages/$product->image")}}" style="height:200px;width:200px;" />
                @if($product->color != "" || $product->color != null)
                <p>Colors Available : {{ucwords($product->color)}}
                @endif
                @if($product->size != "" || $product->size != null)
                <p>Sizes Available : {{$product->size}}
                @endif
                </div>

                <div class='col-md-6'>
                    @if($product->video != null || $product->video != "")
                    <video width="320" height="240" controls>
                        <source src="{{asset("storage/productvideos/$product->video")}}" type="video/mp4">
                      
                        Your browser does not support the video tag.
                      </video>
                       @endif
                      <p>Quantity Available : {{$product->quantity}} psc</p>
                      <p>Price : <strong>N{{$product->price}}</strong></p>
                      @if($product->discount != 0 || $product->discount != "")
                      <P>Discount {{$product->discount}}%</P>
                      @endif
                       @if($product->is_promoted == true)
                       <p>is promoted : true</p>
                       @else
                       <p>is promoted : false</p>
                      @endif
                 
                </div>

                <p>Product Description</p>
                <p>{{ucwords($product->description)}}</p>

                </div>
             

           <!--end of content-->
   
       </div>
      </div>


 @include("layouts.admin_footer")
@endsection