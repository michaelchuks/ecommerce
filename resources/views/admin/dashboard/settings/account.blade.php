@extends("layouts.admin_header")
@section("content")
@include("layouts.admin_navigation")
<div class="card shadow mb-4">
    <div class="card-header py-3">
   <h6 class="m-0 font-weight-bold text-success" style="display:flex;align-items:center;justify-content:space-between;"><span>Account Settings
    </span>  </h6>
   </div>
       
       <div class="card-body">
           <div class="card-body">
               @if(Session::get("success"))
                <div class="alert alert-success">
                 <strong class="text-success">{{Session::get("success")}}</strong>
                </div>
                @endif
                <!--content-->

                <form method="post" action="{{url("admin/updateaccount")}}">
                    @csrf
                <label>Email</label>
                <input type="email" name="email" class='form-control' value="{{$account->email}}" />
                <br />

                <label>New Password</label>
                <input type="text" name="password" class="form-control" />
                <br />

                <input type="submit" name="update_account_btn" value="Update Account" class="btn btn-sm btn-primary" />

                </form>
             

           <!--end of content-->
   
       </div>
      </div>


 @include("layouts.admin_footer")
@endsection