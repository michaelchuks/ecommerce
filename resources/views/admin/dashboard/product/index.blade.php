@extends("layouts.admin_header")
@section("content")
@include("layouts.admin_navigation")
<div class="card shadow mb-4">
    <div class="card-header py-3">
   <h6 class="m-0 font-weight-bold text-success" style="display:flex;align-items:center;justify-content:space-between;"><span>Product List
    </span> 
    <a href="{{route('product.create')}}" class="btn btn-sm btn-success">Add Product</a> 
    <input type="text" name="product" placeholder="Search Product by name" id="product" onkeyup="searchProduct()" />
</h6>
   </div>
       
       <div class="card-body">
           <div class="card-body">
               @if(Session::get("success"))
                <div class="alert alert-success">
                 <strong class="text-success">{{Session::get("success")}}</strong>
                </div>

                <!--content-->
               @endif

               @if(Session::get("error"))
               <div class="alert alert-danger">
                <strong class="text-danger">{{Session::get("danger")}}</strong>
               </div>

               <!--content-->
              @endif
               @if(count($products) == 0)
               <strong class="text-danger">No Products added yet</strong>
           
               @else

           <div class="table-responsive" id="deposits-content">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <p><small><strong>Note : Promoted products are products that appears on the face page of the website</strong></small></p>
           <thead>
               <tr><th>Name</th><th>Image</th><th>Price</th><th>Quantity Available</th><th>Status</th><th>Promotion</th><th></th><th></th><th></th><th></th></tr>
           </thead>
           <tbody id="tbody">
             @foreach($products as $product)
           <tr><td>{{ucwords($product->name)}}</td>
               <td><img src="{{asset("storage/productimages/$product->image")}}" style="height:100px;width:120px"/></td>
               <td>N{{$product->price}}</td><td>{{$product->quantity}}</td>
               <td>
                @if($product->status == "available")
                <strong class="text-success">Available</strong>
                @else
                <strong class="text-danger">Out Of Stock</strong>
                @endif
               </td>
               <td>
                @if($product->is_promoted == true)
                <strong>Promoted</strong>
                @else
                <strong>Not Promoted</strong>
                @endif
               </td>
               <td>
                @if($product->is_promoted == false)
                <a href="{{url("admin/promoteproduct/$product->id")}}" class="btn btn-sm btn-info">Promote Product</a>
                @else
                <a href="{{url("admin/promoteproduct/$product->id")}}" class="btn btn-sm btn-warning">Disable Promotion</a>
                @endif
               </td>
               <td><a href="{{url("admin/product/$product->id")}}" class="btn btn-sm btn-primary">View</a></td> 
               <td><a href="{{url("admin/editproduct/$product->id")}}" class="btn btn-sm btn-success">Edit</a></td> 
               <td>
                <form method="post" action="{{url("product.delete")}}">
                    @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}" />
                <input type="submit" name="delete_product_btn" class="btn btn-sm btn-danger" value="Delete" onclick="confirm('are you sure you want to delete this product')" />
                </td> 
             @endforeach
           </tbody>
           </table>
           <br />
   
        
           </div>
           <br />
           {{$products->links()}}
           @endif

           <!--end of content-->
   
       </div>
      </div>

      <script>
        function searchProduct(){
            var product = document.getElementById("product");
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    document.getElementById('tbody').innerHTML = this.responseText;
                }
            }

            xhttp.open("GET","searchproduct?product="+product,true);
            xhttp.send();
        }
        </script>


 @include("layouts.admin_footer")
@endsection