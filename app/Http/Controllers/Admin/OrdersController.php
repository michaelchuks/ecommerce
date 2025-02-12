<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Products;

class OrdersController extends Controller
{
    public function pendingOrders(){
        $orders = Orders::where("status","=","pending")->orderBy("id","desc")->paginate(20);
        return view("admin.dashboard.orders.pending_orders")->with("orders",$orders);
    }


    public function compeletedOrders(){
        $orders = Orders::where("status","=","completed")->orderBy("id","desc")->paginate(20);
        return view("admin.dashboard.orders.completed_orders")->with("orders",$orders);
    }


    public function todayOrders(){
        $data = strtotime(date("Y-m-d"));
        $day = date("d",$data);

        $orders = Orders::where("day","=",$day)->orderBy("id","desc")->paginate(20);
        return view("admin.dashboard.orders.orders")->with("orders",$orders);
    }


    public function weekOrders(){
        $data = strtotime(date("Y-m-d"));
        $week = date("W", $data);
        $orders = Orders::where("week","=",$week)->orderBy("id","desc")->paginate(20);
        return view("admin.dashboard.orders.orders")->with("orders",$orders);

    }


    public function monthOrders(){
        $month = date("F");
        $year = date("Y");
        $orders = Orders::where("month","=",$month)->orderBy("id","desc")->paginate(20);
        return view("admin.dashboard.orders.orders")->with("orders",$orders);
    }


    public function yearOrders(){
        $year = date("Y");
        $orders = Orders::where("year","=",$year)->orderBy("id","desc")->paginate(20);
        return view("admin.dashboard.orders.orders")->with("orders",$orders);
    }


    public function confirmOrder($orderId){
        $order = Orders::find($orderId);
        $product = Products::find($order->product_id);
        $new_quantity = $product->quantity - $order->quantity;
        if($new_quantity == 0 || $new_quantity < 0){
            Products::find($product->id)->update([
                "status" => "unavailabel"
            ]);
        }

        Orders::find($order->id)->update([
            "status" => "completed"
        ]);

        return redirect()->back()->with("success","order confirmed successfully");
    }



    public function deleteOrder(Request $request){
        if($request->has("delete_order_btn")){
            Order::find($request->order_id)->delete();
            return redirect()->back()->with("success","order deleted successfully");
        }else{
            return redirect()->to("/");
        }
    }


    public function order($orderId){
        $order = Orders::find($orderId);
        return view("admin.dashboard.orders.order")->with("order",$order);
    }
}
