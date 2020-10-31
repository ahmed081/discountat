<?php

namespace App\Http\Controllers;

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
}
