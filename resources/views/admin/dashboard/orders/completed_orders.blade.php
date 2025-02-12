@extends("layouts.admin_header")
@section("content")
@include("layouts.admin_navigation")
<div class="card shadow mb-4">
    <div class="card-header py-3">
   <h6 class="m-0 font-weight-bold text-success" style="display:flex;align-items:center;justify-content:space-between;"><span>Completed Orders
    </span></h6>
   </div>
       
       <div class="card-body">
           <div class="card-body">
               @if(Session::get("success"))
                <div class="alert alert-success">
                 <strong class="text-success">{{Session::get("success")}}</strong>
                </div>
                @endif
                <!--content-->
                @if(count($orders) == 0)
               <strong class="text-danger">No completed orders record yet</strong>
                @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr><th>Name</th><th>Product</th><th>Quantity</th><th>Price/Product</th><th>Total Amaount</th><th>Phone</th><th></th><th></th></tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                     <tr><td>{{$order->name}}</td>
                        <td>{{$order->product->name}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>&#8358;{{$order->amount}}</td>
                        <td>&#8358;{{$order->total_amount}}</td>
                        <td>{{$order->phone}}</td>
                        <td><a href="{{url("admin/order/$order->id")}}" class="btn btn-sm btn-success">View</td>
                            <td><form method="post" action="{{url("admin/deleteorder")}}">
                                @csrf
                                <input type="hidden" name="order_id" value="{{$order->id}}" />

                                <input onclick="confirm('are you sure you want to delete this order')" type="submit" name="delete_order_btn" value="Delete" class="btn btn-sm btn-danger">

                                </form></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br />
                {{$orders->links()}}
                @endif
             

           <!--end of content-->
   
       </div>
      </div>


 @include("layouts.admin_footer")
@endsection