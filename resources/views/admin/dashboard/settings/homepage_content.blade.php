@extends("layouts.admin_header")
@section("content")
@include("layouts.admin_navigation")
<div class="card shadow mb-4">
    <div class="card-header py-3">
   <h6 class="m-0 font-weight-bold text-success" style="display:flex;align-items:center;justify-content:space-between;"><span>Home Page Content
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

                <div class="table-responsive">
                    <table class="table">
                        <thead><tr><th></th><th></th><th></th></thead>
                            <tbody>
                    <tr><td>Slider 1</td>
                        <td>
                        @if($content != null && $content->slider1 != null)
                        <img src="{{asset("storage/content/$content->slider1")}}" style="height:200px;width:200px;" />
                        @endif
                        </td>

                        <td>
                            <form method="post" action="{{url("admin/updateheroimage")}}" enctype="multipart/form-data">
                                @csrf
                            <input type="file" name="slider1" class="form-control" required />
                         
                            <br />

                            <input type="submit" name="update_slider_image_btn" class="btn btn-sm btn-primary" value="Update" />
                            </form>
                        </td>
                    
                    </tr>


                    <tr><td>Slider 2</td>
                        <td>
                        @if($content != null && $content->slider2 != null)
                        <img src="{{asset("storage/content/$content->slider2")}}" style="height:200px;width:200px;" />
                        @endif
                        </td>

                        <td>
                            <form method="post" action="{{url("admin/updateheroimage")}}" enctype="multipart/form-data">
                                @csrf
                            <input type="file" name="slider2" class="form-control" required />
                           
                            <br />

                            <input type="submit" name="update_slider_image_btn" class="btn btn-sm btn-primary" value="Update" />
                            </form>
                        </td>
                    
                    </tr>



                    <tr><td>Slider 3</td>
                        <td>
                        @if($content != null && $content->slider3 != null)
                        <img src="{{asset("storage/content/$content->slider3")}}" style="height:200px;width:200px;" />
                        @endif
                        </td>

                        <td>
                            <form method="post" action="{{url("admin/updateheroimage")}}" enctype="multipart/form-data">
                                @csrf
                            <input type="file" name="slider3" class="form-control" required />
                         
                            <br />

                            <input type="submit" name="update_slider_image_btn" class="btn btn-sm btn-primary" value="Update" />
                            </form>
                        </td>
                    
                    </tr>


                    <tr><td>Slider 4</td>
                        <td>
                        @if($content != null && $content->slider4 != null)
                        <img src="{{asset("storage/content/$content->slider4")}}" style="height:200px;width:200px;" />
                        @endif
                        </td>

                        <td>
                            <form method="post" action="{{url("admin/updateheroimage")}}" enctype="multipart/form-data">
                                @csrf
                            <input type="file" name="slider4" class="form-control" required />
                          
                            <br />

                            <input type="submit" name="update_slider_image_btn" class="btn btn-sm btn-primary" value="Update" />
                            </form>
                        </td>
                    
                    </tr>

                    <tr>
                    <td>Hero Heading</td>
                    <td>
                        @if($content != null && $content->hero_heading != null)
                        {{$content->hero_heading}}
                        @endif
                    </td>
                    <td><form method="post" action="{{url("admin/updatecontent")}}">
                        @csrf
                        <input type="text" @if($content != null && $content->hero_heading != null)value="{{$content->hero_heading}}"@endif name="hero_heading" class="form-control" />
                         <br />
                        <input type="submit" name="update_content_btn" value="Update" class="btn btn-sm btn-primary" />
                    </form>
                    </tr>


                    <td>Hero Top</td>
                    <td>
                        @if($content != null && $content->hero_top != null)
                        {{$content->hero_top}}
                        @endif
                    </td>
                    <td><form method="post" action="{{url("admin/updatecontent")}}">
                        @csrf
                        <input type="text" @if($content != null && $content->hero_top != null)value="{{$content->hero_top}}"@endif name="hero_top" class="form-control" />
                        <br />
                        <input type="submit" name="update_content_btn" value="Update" class="btn btn-sm btn-primary" />
                    </form>
                    </tr>



                    <td>Hero Subtext</td>
                    <td>
                        @if($content != null && $content->hero_subtext != null)
                        {{$content->hero_subtext}}
                        @endif
                    </td>
                    <td><form method="post" action="{{url("admin/updatecontent")}}">
                        @csrf
                        <input type="text" @if($content != null && $content->hero_subtext != null)value="{{$content->hero_subtext}}"@endif name="hero_subtext" class="form-control" />
                         <br />
                        <input type="submit" name="update_content_btn" value="Update" class="btn btn-sm btn-primary" />
                        </form>
                    </tr>

                            </tbody>

                    </table>

                </div>
             

           <!--end of content-->
   
       </div>
      </div>


 @include("layouts.admin_footer")
@endsection