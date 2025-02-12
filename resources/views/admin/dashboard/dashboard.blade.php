@extends("layouts.admin_header")
@section("content")
@include("layouts.admin_navigation")

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Records</a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Products</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_products}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div>
                           Total Orders</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_orders}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


     <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                          Total Reviews</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_reviews}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-money fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                           Pending Orders</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pending_orders}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-money fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

  

</div>           

     

<div class="row">
<div class="col-md-12">

<div class="card">
    <div class="card-header">
        <h5>Recent Orders</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr><th>Name</th><th>Email</th><th>Phone</th><th>Product Ordered</th><th>Quantity</th><th>Total Amount</th><th>Status</th><th></th><th></th></tr>
                </thead>
                <tbody>
                    @foreach($recent_orders as $order)
                   <tr><td>{{$order->name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{ucwords($order->product->name)}}</td>
                    <td>{{$order->Quantity}}</td>
                    <td>N{{$order->total_amount}}</td>
                    <td>
                      @if($order->status == "pending")<strong class="text-danger">Pending</strong>
                      @else
                      <strong class="text-success">Delievered</strong>
                      @endif
                    </td>

                    <td><a href="{{url(admin/order/$order->id)}}" class="btn btn-sm btn-success">View</a></td>
                    <td>
                        <form method="post" action="{{url("admin/deleteorder")}}">
                            @csrf
                        <input type="hidden" name="order_id" value="{{$order->id}}" />

                        <input type="submit" name="delete_order_btn" value="Delete" onclick="confirm('are you sure you want to delete this order')" />
                        </form>
                    </td>
                
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
   

</div>
</div>




@include('layouts.admin_footer')
@endsection