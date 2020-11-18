<?php

namespace App\Http\Controllers;

use App\Models\categories as Categories;
use App\Models\brands as Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class brandsController extends Controller
{
    //

    /* 
        @request_type = GET
        @route : /brands
        @params : 
        @Autorisation : Barier token
    */
    function get_all_brands(Request $request)
    {
        $user = $request->user();
        $brands = Brands::where("user_id",$user->id)
        ->where("availability",1)->get();
        foreach ($brands as $brand) {
            $category = Categories::where("id",$brand->category_id)->first();
            $brand->category = $category;
        }
        return response()->json($brands);
    }

    /* 
        @request_type = GET
        @route : /brands/{id}
        @params : 
        @Autorisation : Barier token
    */
    public function get_one(Request $request,$id)
    {
        $validator = Validator::make(["id"=>$id], [
            'id' => 'required|integer'
        ]);
        if ($validator->fails()) {
            throw ValidationException::withMessages([
                'message' => ['The provided credentials are incorrect.'],
            ]);
        }
        
        $brand = Brands::where("id",$id)->where("availability",1)->first();
        if(!$brand)
            throw ValidationException::withMessages([
                'message' => ['The provided credentials are incorrect.'],
            ]);
        $category = Categories::where("id",$brand->category_id)->first();
        $brand->category = $category;
        return $brand;
    }

    /* 
        @request_type = POST
        @route : /brands/add
        @params : 
            {
                "name":"name",
                "mobile":"mobile",
                "web_site":"web_site",
                "address":"address",
                "geolocalisation":"geolocalisation",
                "category_d":"category_id",
            }
        @Autorisation : Barier token
    */
    public function add_brand(Request $request)
    {
        $validateData = $request->validate([
                "name"=>"required|string",
                "mobile"=>"required|string",
                "web_site"=>"required|string",
                "address"=>"required|string",
                "geolocalisation"=>"required|string",
                "category_id"=>"required|integer",
            
        ]);
        $user = $request->user();
        $brand = new Brands();
            
        $brand->init($request->name,1,$request->mobile,$request->mobile,$request->address,$request->geolocalisation,$request->category_id,$user->id); 
        $brand->save();
        
        
        return $brand;
    }
/* 
        @request_type = PUT
        @route : /brands/edit/{id}
        @params : 
            {
                "name":"name",
                "mobile":"mobile",
                "web_site"=>"web_site",
                "address":"address",
                "geolocalisation":"geolocalisation",
                "category_d":"category_id",
            }
        @Autorisation : Barier token
    */
    public function edit_brand(Request $request,$id)
    {
        $validateData = $request->validate([
                "name"=>"required|string",
                "mobile"=>"required|string",
                "web_site"=>"required|string",
                "address"=>"required|string",
                "geolocalisation"=>"required|string",
                "category_id"=>"required|integer",
        ]);
        $user = $request->user();
        $brand = Brands::where("id",$id)->where("user_id",$user->id)->first();
        
        $brand->edit($request->name,1,$request->mobile,$request->web_site,$request->address,$request->geolocalisation,$request->category_id,$user->id); 
        $brand->save();
        
        
        return response()->json($brand);
    }
  
  
    function web_get_all (){
        $brands = Brands::join('categories','categories.id',"brands.category_id")
        ->join('ads',"ads.brand_id","brands.id")
        ->select('brands.*',DB::raw('categories.name as category_name, categories.name_ar as category_name_ar, count(*) as ads_count'))
        ->groupBy("brands.id")
        ->get();
        $categories = Categories::where("availability",1)->get();
    
    
        return view("brands.brands")->with("data",[
                "brands"=>$brands,
                "categories"=>$categories
        ]);
    }

    function web_update(Request $request,$id){
        $brand = Brands::where('id',$id)->first();
        DB::beginTransaction();
        try {
            $brand->name = $request->name ;
            $brand->category_id = $request->category_id;
            $brand->mobile = $request->mobile;
            $brand->web_site = $request->web_site;
            $brand->address = $request->address;
            if($request->has("availability"))
                $brand->availability = 1;
            else 
                $brand->availability = 0;
            $brand->save();
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
        }
        
        return redirect(URL::previous());
    }

    function enable (Request $request , $id){
        $brand = Brands::where('id',$id)->first();
        $brand->availability = 1;
        $brand->save();
        return redirect("/brands");
    }
    function desable (Request $request , $id){
        $brand = Brands::where('id',$id)->first();
        $brand->availability = 0;
        $brand->save();
        return redirect("/brands");
    }
}
