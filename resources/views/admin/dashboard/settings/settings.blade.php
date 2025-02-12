@extends("layouts.admin_header")
@section("content")
@include("layouts.admin_navigation")
<div class="card shadow mb-4">
    <div class="card-header py-3">
   <h6 class="m-0 font-weight-bold text-success" style="display:flex;align-items:center;justify-content:space-between;"><span>{{ucwords($settings->name)}} settings
    </span> </h6>
   </div>
       
       <div class="card-body">
           <div class="card-body">
               @if(Session::get("success"))
                <div class="alert alert-success">
                 <strong class="text-success">{{Session::get("success")}}</strong>
                </div>
                @endif
                <!--content-->

                <form method="post" action="{{route('admin.updatesettings')}}" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                <div class="col-md-6">
                    <label>Site Name</label>
                    <input type="text" name="name" class="form-control" value="{{$settings->name}}" required/>
                    <br />
                    <label>Phone No</label>
                    <input type="tel" name="phone" class="form-control" value="{{$settings->phone}}" required/>
                    <br />

                    <label>Whatsapp No</label>
                    <input type="tel" name="whatsapp" class="form-control" value="{{$settings->whatsapp}}" required/>

                    <br />

                    <label>Instagram page(optional)</label>
                    <input type="text" name="instagram" class="form-control" value="{{$settings->instagram}}"/>
                    <br />

                    @if($settings->logo != null || $settings->logo != "")
                    <img src="{{asset("storage/logo/$settings->logo")}}" style="width:50px;height:50px;" />
                    <br />
                    @endif
                    <input type="file" name="logo" class="form-control" />
                </div>

                <div class="col-md-6">
                    <label>Site Email</label>
                    <input type="email" name="email" class="form-control" value="{{$settings->email}}" required/>
                    <br />
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" value="{{$settings->address}}" required/>
                    <br />

                    <label>Facebook page(optional)</label>
                    <input type="text" name="facebook" class="form-control" value="{{$settings->facebook}}"/>
                    <br />

                    <label>Twitter (optional)</label>
                    <input type="text" name="twitter" class="form-control" value="{{$settings->twitter}}"/>

                    <br />
                    <label>About</label>
                    <textarea name="about" class='form-control'>{{$settings->about}}</textarea>
                    <br />
                    <input type="hidden" name="settings_id" value="{{$settings->id}}" />
                    <input type="submit" name="update_settings_btn" value="Update" class="btn btn-sm btn-primary" />
                </div>

                </div>

                </form>
             

           <!--end of content-->
   
       </div>
      </div>


 @include("layouts.admin_footer")
@endsection