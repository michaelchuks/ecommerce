<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use App\Models\Orders;
use App\Models\Reviews;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function createAdmin(){
        $user = new User();
        $user->name = "admin";
        $user->email = "admin@gmail.com";
        $user->role = 'admin';
         $user->password = Hash::make("admin123");
        $user->save();
        dd("admin created");
    }


    public function index(){
        return view("admin.auth.index");
    }


    public function adminLogin(Request $request){
        if($request->has('admin_login_btn')){
          $request->validate([
            "email" => "required",
            "password" => "required"
          ]);
          $user = User::where("email","=",$request->email)->where('role',"=","admin")->first();
          if($user){
            if(Hash::check($request->password,$user->password)){
                if(session()->has("loggedAdmin")){
                    session()->pull("loggedAdmin");
                }
                session()->put("loggedAdmin",$user->id);
                return redirect()->to("admin/dashboard");
            }else{
                return redirect()->back()->with('error',"invalid login password");
            }
          }else{
            return redirect()->back()->with('error',"invalid login email");
          }
        }else{
            return redirect()->to("/");
        }
    }




    public function dashboard(){
        $total_products = Products::where('status',"=",'available')->count();
        $total_orders = Orders::count();
        $pending_orders = Orders::where("status","=","pending")->count();
        $delivered_orders = Orders::where("status","=","delivered")->count();
        $total_reviews = Reviews::count();
        $recent_orders = Orders::where("status","=","pending")->orderBy("id","desc")->limit(10)->get();
        return view("admin.dashboard.dashboard")->with("total_products",$total_products)
        ->with("total_orders",$total_orders)
        ->with("pending_orders",$pending_orders)
        ->with("delivered_orders",$delivered_orders)
        ->with("total_reviews",$total_reviews)
        ->with("recent_orders",$recent_orders);
    }


    public function logout(){
        session()->pull("loggedAdmin");
        return redirect()->to("/admin");
    }


}
