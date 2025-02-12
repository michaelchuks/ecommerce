@extends("layouts.admin_header")
@section("content")
@include("layouts.admin_navigation")
<div class="card shadow mb-4">
    <div class="card-header py-3">
<h6 class="m-0 font-weight-bold text-success" style="display:flex;align-items:center;justify-content:space-between;"><span>{{ucwords($product->name)}} Images
    </span> <a href="{{url("admin/newimage/$product->id")}}" class="btn btn-sm btn-success">Add More Images</a> </h6>
   </div>
       
       <div class="card-body">
           <div class="card-body">
               @if(Session::get("success"))
                <div class="alert alert-success">
                 <strong class="text-success">{{Session::get("success")}}</strong>
                </div>
                @endif
                <!--content-->
                @if(count($images) != 0)
                <div class="table-responsive">
                    <table class="table">
                     <thead>
                        <tr><th></th><th></th></tr>
                        <thead>
                            <tbody>
                                @foreach($images as $image)
                                <tr><td><img src="{{asset("storage/productimages/$image->image")}}" style="height:150px;width:100px" /></td>
                                    <td><form method="post" action="{{route('product.deleteimage')}}">
                                        @csrf
                                        <input type="hidden" name="image_id" value="{{$image->id}}" />
                                        <input type="submit" name="delete_image_btn" onclick="confirm('are you sure you want to delete image')" value="Delete" class="btn btn-sm btn-danger" />
                                        </form>
                                @endforeach

                            </tbody>

                    </table>

                </div>
                @else 
                 <strong class="text-danger">No Extra images added
                @endif
                <br />
                <br />
                <a href="{{url("admin/products")}}" class="btn btn-sm btn-danger">Back to products</a>
             

           <!--end of content-->
   
       </div>
      </div>


 @include("layouts.admin_footer")
@endsection