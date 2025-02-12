@extends("layouts.admin_header")
@section("content")
@include("layouts.admin_navigation")
<div class="card shadow mb-4">
    <div class="card-header py-3">
   <h6 class="m-0 font-weight-bold text-success" style="display:flex;align-items:center;justify-content:space-between;"><span>Update {{ucwords($product->name)}}
    </span> <a href="{{route('product.index')}}" class="btn btn-sm btn-success">Products</a> </h6>
   </div>
       
       <div class="card-body">
           <div class="card-body">
               @if(Session::get("success"))
                <div class="alert alert-success">
                 <strong class="text-success">{{Session::get("success")}}</strong>
                </div>
                @endif

                <!--content-->

                <form method="post" action="{{route('product.update')}}" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>Product Name</label>
                        <input type="text" name="name" class='form-control' value="{{ucwords($product->name)}}" />
                        <br />
                        <label>Product Image</label>
                        <input type="file" name="image" accept="image/*" class="form-control" />
                        <br />

                        <label>Colors Available(optional)</label>
                        <input type="text" name='colors' @if($product->color != "" || $product->color != null)value="{{$product->color}}"@endif class="form-control"/>
                        <br />

                        <label>Product Price(N)</label>
                        <input type="number" name="price" class="form-control" value="{{$product->price}}" />
                        <br />

                        <label>Product Description</label>
                        <textarea name="description" class="form-control">{{$product->description}}</textarea>

                       
                    </div>

                    <div class='col-md-6'>
                        <label>Select Category</label>
                        <select name="category" class='form-control'>
                            <option value="{{$product->category}}">{{ucwords($product->category)}}</option>
                            @foreach($categories as $category)
                            @if($category->category != $product->category)
                            <option value="{{$category->category}}">{{ucwords($category->category)}}</option>
                            @endif
                            @endforeach
                        </select>
                         <br />
                        <label>Product Video(optional)</label>
                        <input type="file" name="video" class='form-control' accept=".mp4, .avi"  />

                        <br />
                        <label>Sizes Available(optional)</label>
                        <input type="text" name='sizes' @if($product->size != null || $product->size != "")value="{{$product->size}}"@endif class="form-control"/>
                        <br />

                        <label>Discount(%) if any</label>
                        <input type="number" name="discount" @if($product->discount != 0 || $product->discount != "")value="{{$product->discount}}"@endif step='any' class="form-control" />
                        <br />
                        <label>Quantity Available</label>
                        <input type="number" name="quantity" class="form-control" value="{{$product->quantity}}"/>
                        <br />
                        <input type="hidden" name="product_id" value="{{$product->id}}" />
                        <input type="submit" name="update_product_btn" value="Update Product" class="btn btn-sm btn-primary" />
                    </div>
                </div>
                

                </form>
             

           <!--end of content-->
   
       </div>
      </div>


 @include("layouts.admin_footer")
@endsection