<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductImages;
use App\Models\Promotion;
use App\Models\Categories;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $products = Products::orderBy("id","desc")->paginate(20);
        return view('admin.dashboard.product.index')->with("products",$products);
    }

    public function searchProduct(Request $request){
        $search_term = $request->product;
        $products = Products::where("name","like","%{$search_term}%")->get();
        return view('admin.dashboard.product.search')->with("products",$products);
    }

    public function create(){
        $categories = Categories::get();
        return view('admin.dashboard.product.create')->with("categories",$categories);
    }

    public function store(Request $request){
        if($request->has("save_product_btn")){
            if($request->hasFile("image") && $request->file("image")->isValid()){
                $image = $request->file("image");
                $image_with_ext = $image->getClientOriginalName();
                $image_ext = $image->getClientOriginalExtension();
                $image_only = pathinfo($image_with_ext,PATHINFO_FILENAME);
                $image_to_store = $image_only . "_" . time() . "." . $image_ext;
                $storage_path = $image->storeAs("public/productimages",$image_to_store);
            }else{
                $image_to_store = "";
            }


            if($request->hasFile("video") && $request->file("video")->isValid()){
                $video = $request->file("video");
                $video_with_ext = $video->getClientOriginalName();
                $video_ext = $image->getClientOriginalExtension();
                $video_only = pathinfo($video_with_ext,PATHINFO_FILENAME);
                $video_to_store = $video_only . "_" . time() . "." . $video_ext;
                $storage_path = $video->storeAs("public/productvideos",$video_to_store);
            }else{
                $video_to_store = "";
            }

            if($request->filled("colors")){
                $colors = $request->colors;
            }else{
                $colors = null;
            }

            if($request->filled('sizes')){
                $sizes = $request->sizes;
            }else{
                $sizes = null;
            }

            if($request->filled("discount")){
                $discount = $request->discount;
            }else{
                $discount = 0;
            }


            $product = new Products();
            $product->name = $request->name;
            $product->category = $request->category;
            $product->description = $request->description;
            $product->image = $image_to_store;
            $product->video = $video_to_store;
            $product->quantity = $request->quantity;
            $product->color = $colors;
            $product->size = $request->sizes;
            $product->price = $request->price;
            $product->discount = $discount;
            $product->rating = 5;
            $product->save();

            $latest_product = Products::orderBy("id","desc")->first();

            return redirect()->to("admin/productimages/$latest_product->id")->with("success","Product added successfully");
        }else{
            return redirect()->to("/");
        }
    }







    public function productImages($productId){
        $product = Products::find($productId);
        $images = ProductImages::where("product_id","=",$productId)->get();
        return view("admin.dashboard.product.images")->with("product",$product)->with("images",$images);
    }


    public function productNewImage($productId){
        $product = Products::find($productId);
        return view("admin.dashboard.product.newimage")->with("product",$product);
    }


    public function saveProductImage(Request $request){
        if($request->has("save_image_btn")){
            if($request->hasFile("image") && $request->file("image")->isValid()){
                $image = $request->file("image");
                $image_with_ext = $image->getClientOriginalName();
                $image_ext = $image->getClientOriginalExtension();
                $image_only = pathinfo($image_with_ext,PATHINFO_FILENAME);
                $image_to_store = $image_only . "_" . time() . "." . $image_ext;
                $storage_path = $image->storeAs("public/productimages",$image_to_store);

                $new_image = new ProductImages();
                $new_image->product_id = $request->product_id;
                $new_image->image = $image_to_store;
                $new_image->save();
                return redirect()->to("admin/productimages/$request->product_id")->with("success","image added successfully");
            }
        }else{
            return redirect()->to("/");
        }
    }


    public function deleteImage(Request $request){
        $image = ProductImages::find($request->image_id);
        Storage::delete("public/productimages/$image->image");
        ProductImages::find($image->id)->delete();
        return redirect()->back()->with("success","image deleted successfully");
    }


    public function show($productid){
        $product = Products::find($productid);
        return view('admin.dashboard.product.show')->with("product",$product);
    }


    
    public function edit($productid){
        $categories = Categories::get();
        $product = Products::find($productid);
        return view('admin.dashboard.product.edit')->with("product",$product)->with("categories",$categories);
    }


    public function update(Request $request){
        if($request->has("update_product_btn")){
            $id = $request->product_id;
            $product = Products::find($id);
            if($request->filled("name")){
             Products::find($id)->update([
                "name" => $request->name
             ]);
            }

            if($request->hasFile("image") && $request->file("image")->isValid()){
                $image = $request->file("image");
                $image_with_ext = $image->getClientOriginalName();
                $image_ext = $image->getClientOriginalExtension();
                $image_only = pathinfo($image_with_ext,PATHINFO_FILENAME);
                $image_to_store = $image_only . "_" . time() . "." . $image_ext;
                $storage_path = $image->storeAs("public/productimages",$image_to_store);

                Storage::delete("public/productimages/$product->image");
                Product::find($id)->update([
                    "image" => $image_to_store
                ]); 
            }


            if($request->hasFile("video") && $request->file("video")->isValid()){
                $video = $request->file("video");
                $video_with_ext = $video->getClientOriginalName();
                $video_ext = $image->getClientOriginalExtension();
                $video_only = pathinfo($video_with_ext,PATHINFO_FILENAME);
                $video_to_store = $video_only . "_" . time() . "." . $video_ext;
                $storage_path = $video->storeAs("public/productvideos",$video_to_store);
              if($product->video != "" || $product->video != null){
                Storage::delete("public/productvideos/$product->video");
              }

              Product::find($id)->update([
                "video" => $video_to_store
            ]); 
                
            }



            if($request->filled("color")){
                Products::find($id)->update([
                   "color" => $request->color
                ]);
               }


               if($request->filled("quantity")){
                Products::find($id)->update([
                   "quantity" => $request->quantity
                ]);
               }


               if($request->filled("size")){
                Products::find($id)->update([
                   "size" => $request->size
                ]);
               }


               if($request->filled("price")){
                Products::find($id)->update([
                   "price" => $request->price
                ]);
               }


               if($request->filled("descrription")){
                Products::find($id)->update([
                   "description" => $request->description
                ]);
               }


               if($request->filled("discount")){
                Products::find($id)->update([
                   "discount" => $request->discount
                ]);
               }

            return redirect()->back()->with('success',"product dedtails updated successfully");

        }else{
            return redirect()->to("/");
        }
    }



    public function promoteProduct($productid){
        $product = Products::find($productid);
        if($product->is_promoted == true){
            Products::find($productid)->update([
                "is_promoted" => false
            ]);

            return redirect()->back()->with("success","product promotion disabled successfully");

        }else{
            $check_promotion = Products::where("category","=",$product->category)->where("is_promoted","=",true)->count();
            if($check_promotion == 5){
                return redirect()->back()->with("error","you have exceeded the number of promotions required for $product->category");
            }else{
                Products::find($productid)->update([
                    "is_promoted" => true
                ]);

                return redirect()->back()->with("success","product promotion enabled successfully");
            }
        }
    }


}
