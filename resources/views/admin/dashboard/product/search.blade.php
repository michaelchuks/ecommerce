@foreach($products as $product)
<tr><td>{{ucwords($product->name)}}</td>
    <td><img src="{{asset("storage/productimages/$product->image")}}" style="height:100px;width:120px"/></td>
    <td>N{{$product->price}}</td><td>{{$product->quantity}}</td>
    <td>
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