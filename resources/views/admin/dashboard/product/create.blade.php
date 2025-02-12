@extends("layouts.admin_header")
@section("content")
@include("layouts.admin_navigation")
<div class="card shadow mb-4">
    <div class="card-header py-3">
   <h6 class="m-0 font-weight-bold text-success" style="display:flex;align-items:center;justify-content:space-between;"><span>Add New Product
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

                <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>Product Name</label>
                        <input type="text" name="name" class='form-control' required />
                        <br />
                        <label>Product Image</label>
                        <input type="file" name="image" accept="image/*" class="form-control" required />
                        <br />

                        <label>Colors Available(optional)</label>
                        <input type="text" name='colors' class="form-control"/>
                        <br />

                        <label>Product Price(N)</label>
                        <input type="number" name="price" class="form-control" required />
                        <br />

                        <label>Product Description</label>
                        <textarea name="description" class="form-control" required></textarea>

                       
                    </div>

                    <div class='col-md-6'>
                        <label>Select Category</label>
                        <select name="category" class='form-control'>
                            @foreach($categories as $category)
                            <option value="{{$category->category}}">{{ucwords($category->category)}}</option>
                            @endforeach
                        </select>
                         <br />
                        <label>Product Video(optional)</label>
                        <input type="file" name="video" class='form-control' accept=".mp4, .avi"  />

                        <br />
                        <label>Sizes Available(optional)</label>
                        <input type="text" name='sizes' class="form-control"/>
                        <br />

                        <label>Discount(%) if any</label>
                        <input type="number" name="discount" step='any' class="form-control" />
                        <br />
                        <label>Quantity Available</label>
                        <input type="number" name="quantity" class="form-control" required />
                        <br />
                        <input type="submit" name="save_product_btn" value="Save Product" class="btn btn-sm btn-primary" />
                    </div>
                </div>
                

                </form>
             

           <!--end of content-->
   
       </div>
      </div>


 @include("layouts.admin_footer")
@endsection