<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppSettings;
use App\Models\User;
use App\Models\AppContent;
use App\Models\Promotion;
use App\Models\Products;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function settings(){
        $settings = AppSettings::first();
        return view('admin.dashboard.settings.settings')->with("settings",$settings);
    }
  
  

    public function updateSettings(Request $request){
        if($request->has("update_settings_btn")){
            $id = $request->settings_id;
            $settings = AppSettings::first();

            if($request->filled("name")){
                AppSettings::find($id)->update([
                    "name" => $request->name
                ]
            );
            }


            if($request->hasFile("logo") && $request->file("logo")->isValid()){
                $image = $request->file("logo");
                $image_with_ext = $image->getClientOriginalName();
                $image_ext = $image->getClientOriginalExtension();
                $image_only = pathinfo($image_with_ext,PATHINFO_FILENAME);
                $image_to_store = $image_only . "_" . time() . "." . $image_ext;
                $storage_path = $image->storeAs("public/logo",$image_to_store);

                 if($settings->logo != "" || $settings->logo != null){
                    Storage::delete("public/logo/$settings->logo");
                 }
                AppSettings::find($id)->update([
                    "logo" => $image_to_store
                ]); 
            }


            if($request->filled("email")){
                AppSettings::find($id)->update([
                    "email" => $request->email
                ]
            );
            }


            if($request->filled("address")){
                AppSettings::find($id)->update([
                    "address" => $request->address
                ]
            );
            }


            if($request->filled("phone")){
                AppSettings::find($id)->update([
                    "phone" => $request->phone
                ]
            );
            }


            if($request->filled("whatsapp")){
                AppSettings::find($id)->update([
                    "whatsapp" => $request->whatsapp
                ]
            );
            }


            if($request->filled("facebook")){
                AppSettings::find($id)->update([
                    "facebook" => $request->facebook
                ]
            );
            }


            if($request->filled("about")){
                AppSettings::find($id)->update([
                    "about" => $request->about
                ]
            );
            }


            if($request->filled("instagram")){
                AppSettings::find($id)->update([
                    "instagram" => $request->instagram
                ]
            );
            }


            if($request->filled("twitter")){
                AppSettings::find($id)->update([
                    "twitter" => $request->twitter
                ]
            );
            }

            return redirect()->back()->with("success","Webiste settings updated successfully");

        }else{
            return redirect()->to("/");
        }
    }


    public function account(){
        $account = User::find(session()->get("loggedAdmin"));
        return view("admin.dashboard.settings.account")->with("account",$account);
    }

    public function updateAccount(Request $request){
        if($request->has("update_account_btn")){
            $id = session()->get("loggedAdmin");
            if($request->filled("email")){
                User::find($id)->update([
                    "email" => $request->email
                ]);
            }

            if($request->filled("password")){
                User::find($id)->update([
                    "password" => Hash::make($request->password)
                ]);
            }

            return redirect()->back()->with("success","account details updated successfully");

        }else{
            return redirect()->to("/");
        }
    }



    public function homepageContent(){
        $content = AppContent::first();
        return view("admin.dashboard.settings.homepage_content")->with("content",$content);
    }


    public function updateHeroImage(Request $request){
        if($request->has("update_slider_image_btn")){
            $content = AppContent::first();
            $id = $content->id;

            if($request->hasFile("slider1") && $request->file("slider1")->isValid()){
                $image = $request->file("slider1");
                $image_with_ext = $image->getClientOriginalName();
                $image_ext = $image->getClientOriginalExtension();
                $image_only = pathinfo($image_with_ext,PATHINFO_FILENAME);
                $image_to_store = $image_only . "_" . time() . "." . $image_ext;
                $storage_path = $image->storeAs("public/content",$image_to_store);
                
                if($content->slider1 != null){
                Storage::delete("public/content/$content->slider1");
                }
               AppContent::find($id)->update([
                    "slider1" => $image_to_store
                ]); 
            }



            if($request->hasFile("slider2") && $request->file("slider2")->isValid()){
                $image = $request->file("slider2");
                $image_with_ext = $image->getClientOriginalName();
                $image_ext = $image->getClientOriginalExtension();
                $image_only = pathinfo($image_with_ext,PATHINFO_FILENAME);
                $image_to_store = $image_only . "_" . time() . "." . $image_ext;
                $storage_path = $image->storeAs("public/content",$image_to_store);
                
                if($content->slider2 != null){
                Storage::delete("public/content/$content->slider2");
                }
               AppContent::find($id)->update([
                    "slider2" => $image_to_store
                ]); 
            }



            if($request->hasFile("slider3") && $request->file("slider3")->isValid()){
                $image = $request->file("slider3");
                $image_with_ext = $image->getClientOriginalName();
                $image_ext = $image->getClientOriginalExtension();
                $image_only = pathinfo($image_with_ext,PATHINFO_FILENAME);
                $image_to_store = $image_only . "_" . time() . "." . $image_ext;
                $storage_path = $image->storeAs("public/content",$image_to_store);
                
                if($content->slider3 != null){
                Storage::delete("public/content/$content->slider3");
                }
               AppContent::find($id)->update([
                    "slider3" => $image_to_store
                ]); 
            }


            if($request->hasFile("slider4") && $request->file("slider4")->isValid()){
                $image = $request->file("slider4");
                $image_with_ext = $image->getClientOriginalName();
                $image_ext = $image->getClientOriginalExtension();
                $image_only = pathinfo($image_with_ext,PATHINFO_FILENAME);
                $image_to_store = $image_only . "_" . time() . "." . $image_ext;
                $storage_path = $image->storeAs("public/content",$image_to_store);
                
                if($content->slider2 != null){
                Storage::delete("public/content/$content->slider4");
                }
               AppContent::find($id)->update([
                    "slider4" => $image_to_store
                ]); 
            }


            return redirect()->back()->with("success","App content updated successfully");
            
        }else{
            return redirect()->to("/");
        }
    }


    public function updateContent(Request $request){
        if($request->has("update_content_btn")){
            $content = AppContent::first();

            if($request->filled("hero_heading")){
                AppContent::find($content->id)->update([
                    "hero_heading" => $request->hero_heading
                ]);
            }


            if($request->filled("hero_top")){
                AppContent::find($content->id)->update([
                    "hero_top" => $request->hero_top
                ]);
            }


            if($request->filled("hero_subtext")){
                AppContent::find($content->id)->update([
                    "hero_subtext" => $request->hero_subtext
                ]);
            }

             return redirect()->back()->with("success","app content updated successfully");
        }else{
            return redirect()->to("/");
        }
    }


    public function bestSeller(){
        $products = Products::get();
        $best_seller = Promotion::first();
        return view('admin.dashboard.settings.best_seller')->with("best_seller",$best_seller)->with("products",$products);
    }

    public function updateBestSeller(Request $request){
         if($request->has("update_best_seller")){
           $best_seller = Promotion::first();
           $id = $best_seller->id;

            if($request->hasFile("promotion_image") && $request->file("promotion_image")->isValid()){
                $image = $request->file("promotion_image");
                $image_with_ext = $image->getClientOriginalName();
                $image_ext = $image->getClientOriginalExtension();
                $image_only = pathinfo($image_with_ext,PATHINFO_FILENAME);
                $image_to_store = $image_only . "_" . time() . "." . $image_ext;
                $storage_path = $image->storeAs("public/promotion",$image_to_store);
                
                if($best_seller->promotion_image != null){
                Storage::delete("public/promotion/$best_seller->promotion_image");
                }
               Promotion::find($id)->update([
                    "promotion_image" => $image_to_store
                ]); 
            }

               if($request->filled("promotion_heading")){
                Promotion::find($id)->update([
                    "promotion_heading" => $request->promotion_heading
                ]);
               }


               if($request->filled("promotion_content")){
                Promotion::find($id)->update([
                    "promotion_content" => $request->promotion_content
                ]);
               }

               Promotion::find($id)->update([
                "promoted_product_id" => $request->product_id
            ]);



            return redirect()->back()->with("success","best seller product updated successfully");



         }else{
            return redirect()->to("/");
         }
    }


}
