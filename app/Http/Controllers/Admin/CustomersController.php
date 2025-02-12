<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscribers;

class CustomersController extends Controller
{
    //

  public function subscribers(){
    $subscribers = Subscribers::orderBy("id","desc")->paginate(20);
    return view("admin.dashboard.customers.subscribers")->with("subscribers",$subscribers);
  }

  public function deleteSubscriber($id){
    Subscribers::find($id)->delete();
    return redirect()->back()->with("success","subscriber deleted successfully");
  }
}
