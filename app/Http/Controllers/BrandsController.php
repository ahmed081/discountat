<?php

namespace App\Http\Controllers;

use App\Models\categories as Categories;
use App\Models\brands as Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return $brands;
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
        @request_type = POST
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
        $brand = Brands::where("id",$id->first)->where("user_id",$user->id);
        
        $brand->edit($request->name,1,$request->mobile,$request->web_site,$request->address,$request->geolocalisation,$request->category_id,$user->id); 
        $brand->save();
        
        
        return $brand;
    }
  
  
}
