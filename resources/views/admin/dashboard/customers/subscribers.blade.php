@extends("layouts.admin_header")
@section("content")
@include("layouts.admin_navigation")
<div class="card shadow mb-4">
    <div class="card-header py-3">
   <h6 class="m-0 font-weight-bold text-success" style="display:flex;align-items:center;justify-content:space-between;"><span>Dropifypay Subadmins
    </span> @if(count($subscribers) != 0)<a href="{{route('admin.sendemail')}}" class="btn btn-sm btn-success">Broadcast Email</a>@endif</h6>
   </div>
       
       <div class="card-body">
           <div class="card-body">
               @if(Session::get("success"))
                <div class="alert alert-success">
                 <strong class="text-success">{{Session::get("success")}}</strong>
                </div>
                @endif
                <!--content-->

                @if(count($subscribers) == 0)
                <strong class="text-danger">No subscribers yet</strong>
                @else
                <div class="table-responsive">
                    <table class="table">
                        <thead><th>Email</th><th></th></thead>
                        <tbody>
                            @foreach($subscribers as $user)
                           <tr><td>{{$user->email}}</td><td><a href="{{url("admin/deletesubscriber/$user->id")}}" class="btn btn-sm btn-danger">Delete</a></td>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @endif

           <!--end of content-->
   
       </div>
      </div>


 @include("layouts.admin_footer")
@endsection