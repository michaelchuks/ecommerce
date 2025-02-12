<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/createadmin",[AuthController::class,"createAdmin"]);

Route::get('/', [PagesController::class,"home"]);
Route::get("/products",[PagesController::class,"products"]);
Route::post("/productsearch",[PagesController::class,"productSearch"]);
Route::get("/product/{productid}",[PagesController::class,"product"]);
Route::post("/savereview",[PagesController::class,'saveReview']);
Route::post("/productorder",[PagesController::class,"productOrder"]);
Route::get("/orderdetails",[PagesController::class,"orderDetails"]);
Route::get("/deliverydetails",[PagesController::class,"deliveryDetails"]);
Route::post("/placeorder",[PagesController::class,"placeOrder"]);
Route::get("/ordersuccess",[PagesController::class,"orderSuccess"]);
Route::get("/about",[PagesController::class,"about"]);
Route::get("/contact",[PagesController::class,"contact"]);
Route::post("/processcontact",[PagesController::class,"processContact"]);


Route::prefix("admin")->group(function(){
    Route::get("/",[AuthController::class,'index'])->name("admin.index");
    Route::post("/adminlogin",[AuthController::class,"adminLogin"])->name('admin.login');
    Route::middleware("loggedAdmin")->group(function(){
   Route::get("/logout",[AuthController::class,"logout"]);
   Route::get("/dashboard",[AuthController::class,"dashboard"])->name("admin.dashboard");

   //admin product routes
   Route::get("/products",[ProductController::class,"index"])->name("product.index");
   Route::get("/searchproduct",[ProductController::class,"searchProduct"]);
   Route::get("/newproduct",[ProductController::class,"create"])->name("product.create");
   Route::post("/saveproduct",[ProductController::class,"store"])->name("product.store");
   Route::get("/product/{productid}",[ProductController::class,"show"])->name("product.show");
   Route::get("/editproduct/{productid}",[ProductController::class,"edit"]);
   Route::post("/updateproduct",[ProductController::class,"update"])->name("product.update");
   Route::get("/productimages/{productid}",[ProductController::class,"productimages"])->name("product.images");
   Route::get("/newimage/{productId}",[ProductController::class,"productNewImage"])->name("product.newimage");
   Route::post("/saveimage",[ProductController::class,"saveProductImage"])->name("product.savenewimage");
   Route::post("/deleteproductimage",[ProductController::class,"deleteImage"])->name("product.deleteimage");
   Route::get("/promoteproduct/{productid}",[ProductController::class,"promoteProduct"])->name("product.promote");


     //admin settings route
     Route::get("/settings",[SettingsController::class,"settings"])->name("admin.settings");
     Route::post("/updatesettings",[SettingsController::class,"updateSettings"])->name("admin.updatesettings");
     Route::get("/account",[SettingsController::class,"account"]);
     Route::post("/updateaccount",[SettingsController::class,"updateAccount"]);
     Route::get("/homepagecontent",[SettingsController::class,"homepageContent"]);
     Route::post("/updateheroimage",[SettingsController::class,"updateHeroImage"]);
     Route::post("/updatecontent",[SettingsController::class,"updateContent"]);
     Route::get("/bestseller",[SettingsController::class,"bestSeller"]);
     Route::post("/updatebestseller",[SettingsController::class,"updateBestSeller"]);

     Route::get("/subscribers",[CustomersController::class,"subscribers"]);
     Route::get("/deletesubscriber/{id}",[CustomersController::class,"deleteSubscriber"]);
     Route::get("/sendemail",[CustomersController::class,"sendEmail"])->name("admin.sendemail");
     Route::post("/broadcastemail",[CustomersController::class,"broadcastEmail"])->name("admin.broadcastemail");


     //orders
     Route::get("/pendingorders",[OrdersController::class,"pendingOrders"]);
     Route::get("/completedorders",[OrdersController::class,"completedOrders"]);
     Route::get("/todayorders",[OrdersController::class,"todayOrders"]);
     Route::get("/weekorders",[OrdersController::class,"weekOrders"]);
     Route::get("/monthorders",[OrdersController::class,"monthOrders"]);
     Route::get("/yearorders",[OrdersController::class,"yearOrders"]);
     Route::get("/confirmorder/{orderid}",[OrdersController::class,"confirmOrder"]);
     Route::post("/deleteorder",[OrdersController::class,"deleteOrder"]);
     Route::get("/order/{orderid}",[OrdersController::class,"order"]);
   
    });
});
