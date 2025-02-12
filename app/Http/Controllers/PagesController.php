<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\AppContent;
use App\Models\Products;
use App\Models\Promotion;
use App\Models\Subscribers;
use App\Models\Reviews;
use App\Models\AppSettings;
use App\Models\Orders;
use App\Models\ProductImages;
use App\Mail\OrderEmail;
use Illuminate\Support\Facades\Mail;


class PagesController extends Controller
{
    
    public function home(){
        $content = AppContent::first();
        $best_seller = Promotion::first();
        $categories = Categories::get();
        return view("welcome")->with("content",$content)
        ->with("best_seller",$best_seller)
        ->with("categories",$categories);
    }


    public function products(){
        $products = Products::orderBy("rating","desc")->paginate(20);
        $categories = Categories::get();
        return view("products")->with("products",$products)->with("categories",$categories);
    }


    public function productSearch(Request $request){
        $products = Products::where("category","=",$category)->orderBy("rating","desc")->paginate(20);
        $categories = Categories::get();
        return view("product_search")->with("products",$products)->with("categories",$categories);
    }


    public function product($productid){
        $product = Products::find($productid);
        $images = ProductImages::where("product_id","=",$productid)->get();
        $related_products = Products::where("category","=",$product->category)->where("id","!=",$product->id)->get();
        $reviews = Reviews::where("product_id","=",$product->id)->orderBy("id","desc")->limit(4)->get();
        $total_reviews = Reviews::where("product_id","=",$product->id)->count();
        $categories = Categories::get();
        return view("product")->with("product",$product)->with("images",$images)->with("related_products",$related_products)
        ->with("reviews",$reviews)->with("total_reviews",$total_reviews)->with("categories",$categories);
    }


    public function saveReview(Request $request){
        $review = new Reviews();
        $review->product_id = $request->product_id;
        $review->name = $request->Name;
        $review->email = $request->email;
        $review->review = $request->review;
        $review->save();
        return redirect()->back();
    }

    public function productOrder(Request $request){
        $product = Products::find($request->product_id);
        session()->put("product",$product);
        session()->put("quantity",$request->quantity);
        return redirect()->to("/orderdetails");
    }


    public function orderDetails(){
     if(!session()->has("product")){
        return redirect()->to("/products");
     }else{
        $product = session()->get("product");
        $quantity = session()->get("quantity");
        return view("product_order")->with("product",$product)->with("quantity",$quantity);
      }
    }


    public function deliveryDetails(){
        if(!session()->has("product")){
            return redirect()->to("/products");
        }
        $product = session()->get("product");
        $quantity = session()->get("quantity");
        return view("delivery_details")->with("product",$product)->with("quantity",$quantity);;
    }


    public function placeOrder(Request $request){
        if(!session()->has("product")){
            return redirect()->to("/products");
        }else{
 
        $product = session()->get("product");
        $quantity = session()->get("quantity");
        $data = strtotime(date("Y-m-d"));
        $week = date("W", $data);
        $day = date("d",$data);
        mail("michaelchuks40@gmail.com","Order","$request->name has made an order of $quantity of $product->name, please login and check");
        Mail::to($requesy->email)->send(new OrderEmail($request->name,$product->product_name,$quantity,$request->price,$request->total_price));

        $order = new Orders();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->state = $request->state;
        $order->city = $request->city;
        $order->address = $request->address;
        $order->product_id = $product->id;
        $order->quantity = $quantity;
        $order->amount = $request->price;
        $order->total_amount = $request->total_price;
        $order->note = $request->note;
        $order->day = $day;
        $order->week = $week;
        $order->month = date("F");
        $order->year = date("Y");
        $order->save();
        session()->pull("product");
        session()->pull("quantity");
        return redirect()->to("/ordersuccess");

        }
    }


    public function orderSuccess(){
      return view("order_success");
    }

    public function about(){
        $settings = AppSettings::first();
        return view("about")->with("settings",$settings);
    }

    public function contact(){
        $settings = AppSettings::first();
        return view("contact")->with("settings",$settings);
    }


    public function processContact(Request $request){
        $settings = AppSettings::first();
       // mail($settings->email,$request->subject,$request->message);
        return redirect()->back()->with('success',"email sent successfully");
    }
}
