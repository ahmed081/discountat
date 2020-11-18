<?php

namespace App\Http\Controllers;

use App\Models\brands;
use App\Models\categories as Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /* 
        @request_type = GET
        @route : /categories
        @params :
        @Autorisation : Barier token
    */
    function get_all_categories(Request $request)
    {
        $categories = DB::table('brands')
        ->where("categories.availability",1)
        ->join('categories', 'brands.category_id', '=', 'categories.id')
        ->join('ads', 'brands.id', '=', 'ads.brand_id')
        ->select( 'categories.name', 'categories.name_ar','categories.id','categories.image_url',DB::raw('count(*) as ads_count'))
        ->groupBy('categories.id')
        ->get();
        
        return response()->json($categories);
    }
    /* 
        @request_type = GET
        @route : /categories/{id}
        @params :
        @Autorisation : Barier token
    */
    public function get_one(Request $request,$id)
    {
        $category = Categories::where("id",$id)->where("availability",1)->first();
        return $category;
    }
    function web_get_all (){
        $categories = Categories::all();
        //return $categories;
        foreach ($categories as $category) {
            $brand = brands::where('category_id',$category->id)
                    ->join("ads","ads.brand_id","brands.id")
                    ->select(DB::raw("count(*) as count"))
                    ->first();
            if($brand)
                $category->count =$brand->count;
            else 
                $category->count =0;
    
    
            
        }
        return view("categories.categories")->with("data",[
            "categories"=>$categories
        ]);
    }

    function desable (Request $request , $id){
        $category = Categories::where('id',$id)->first();
        $category->availability = 0;
        $category->save();
        return redirect("/categories");
    }

    function enable (Request $request , $id){
        $category = Categories::where('id',$id)->first();
        $category->availability = 1;
        $category->save();
        return redirect("/categories");
    }

    function update (Request $request , $id){
    
        $category = Categories::where('id',$id)->first();
        $file = $request->file("image_url");
        DB::beginTransaction();
        try{
            if($request->hasFile("image_url"))
            {
                $file_name =  $category->id.".".$file->getClientOriginalExtension();
                $file->move(public_path().'/files/', $file_name);
                $url = url('/files/'.$file_name);
                $category->image_url = $url;
                
            }
            if($request->has("availability"))
                $category->availability = 1;
            else 
                $category->availability = 0;
            $category->name = $request->name;
            $category->name_ar = $request->name_ar;
            $category->save();
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
        }
        return redirect("/categories");
    }

    function add(Request $request ){
    
        $category =  new Categories();
        $url = "https://icon-library.com/images/category-icon/category-icon-6.jpg";
        $file = $request->file("image_url");
        DB::beginTransaction();
        try{
            $category->init(1,$request->name,$url);
            $category->name_ar = $request->name_ar;
            $category->image_url = $url;
            $category->save();
    
            if($request->hasFile("image_url"))
            {
                $file_name =  $category->id.".".$file->getClientOriginalExtension();
                $file->move(public_path().'/files/', $file_name);
                $url = url('/files/'.$file_name);
                $category->image_url = $url;
                $category->save();
            }
    
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
        }
        return redirect("/categories");
    }
}
