<?php

namespace App\Http\Controllers;

use App\Models\ads as Ads;
use App\Models\ads_duration as Ads_duration;
use App\Models\ads_view;
use App\Models\Banner;
use App\Models\brands;
use App\Models\categories;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AdsController extends Controller
{
    //
    /* 
        @request_type = GET
        @route : /category/ads/{id_ads}
        @params : 
        @Autorisation : Barier token
    */
    public function get_one(Request $request ,$id_ads)
    {
        $validator = Validator::make(["id_ads"=>$id_ads], [
            'id_ads' => 'required|integer'
        ]);
        if ($validator->fails()) {
            throw ValidationException::withMessages([
                'message' => ['The provided credentials are incorrect.'],
            ]);
        }
        $ads = Ads::where("ads.id",$id_ads)->join("brands","brands.id","ads.brand_id")->select("ads.*")->first();
        //return $ads;
        $brand = brands::where("id",$ads->brand_id)->first();
        $category = categories::where("id",$brand->category_id)->first();
        $banner = Banner::where("id_ads",$ads->id)->get();
        $ads->banner = $banner;
        
        return response()->json([
            "ads"=>$ads,
            "ads_category"=>$category,
        ]);
    }   
    /* 
        @request_type = POST
        @route : /category/ads/add
        @params : 
            {
                "title":"title",
                "description":"descritpion",
                "start_at":"start_at",
                "end_at":"end_at",
                "brand_id":"bran_id"
            }
        @Autorisation : Barier token
    */
    public function add_ads(Request $request )
    {
        // to do 
        /* 
            paiement required
            banner
        */
        $user = $request->user();
        $validateData = $request->validate([
                "title"=>"required|string",
                "description"=>"required|string",
                "start_at"=>"required|string",
                "end_at"=>"required|string",
                "brand_id"=>"required|integer",
                "banner"=>"required"
        ]);
        if(!$request->hasFile("banner"))
        {
            return "not image";
        }
        
        $user = $request->user();
        $brand = brands::where("id",$request->brand_id)->where("user_id",$user->id)->first();
        if(!$brand)
            return response()->json([
                "message"=> "Unauthenticated."
            ],401);
        if($user->free_ads_count>0)
        {
            $ads = new Ads;
            $ads->init($request->title,$request->descritpion,0,1,$request->brand_id);
            $ads->save();
            foreach ($request->file("banner") as $file) {

                $banner = new Banner();
                $file->move(public_path().'/files/', $file->getClientOriginalName());
                $url = url('/files/'.$file->getClientOriginalName());
                $banner->init($url,$ads->id);
                $banner->save();
            }
            $ads_duration = new Ads_duration();
            $ads_duration->init($ads->id,1,$request->start_at,$request->end_at,0);
            $ads_duration->save();
            $user->free_ads_count = $user->free_ads_count-1;
            $user->save();
            return response()->json($ads);
        }
        else return response()->json([
                "message"=> "payment required!!."
            ],401);
    }
    /* 
        @request_type = PUT
        @route : /category/ads/edit/{id_ads}
        @params : 
            {
                "title":"title",
                "description":"descritpion",
                "brand_id":"bran_id"
            }
        @Autorisation : Barier token
    */
    public function edit_ads(Request $request ,$id_ads)
    {
        // to do 
        /* 
            paiement required
        */
        $validator = Validator::make(["id_ads"=>$id_ads], [
            'id_ads' => 'required|integer'
        ]);
        if ($validator->fails()) {
            throw ValidationException::withMessages([
                'message' => ['The provided credentials are incorrect.'],
            ]);
        }
        $validateData = $request->validate([
            "title"=>"required|string",
            "description"=>"required|string",
            "brand_id"=>"required|integer"
        ]);
        $user = $request->user();
        $ads = Ads::where("ads.id",$id_ads)->join("brands","ads.brand_id","=","brands.id")->where("brands.user_id",$user->id)->select("ads.*")->first();
        if(!$ads)
            return response()->json([
                "message"=> "Unauthenticated."
            ],402);
        $ads->edit($request->title,$request->descritpion,0,1,$request->brand_id);
        $ads->save();
        return $ads;
    }
    /* 
        @request_type = GET
        @route : /category/{id_category}/ads
        @params : 
        @Autorisation : Barier token
    */
    public function get_ads_by_category(Request $request ,$id_category)
    {
        $validator = Validator::make(["id_category"=>$id_category], [
            'id_category' => 'required|integer'
        ]);
        if ($validator->fails()) {
            throw ValidationException::withMessages([
                'message' => ['The provided credentials are incorrect.'],
            ]);
        }
        $ads = DB::table('brands')
        ->where("category_id",$id_category)
        ->join('categories', 'brands.category_id', '=', 'categories.id')
        ->join('ads', 'brands.id', '=', 'ads.brand_id')
        ->select('ads.id','ads.title','ads.description','ads.view_count','ads.id', 'categories.name', 'categories.name_ar')
        ->get();
        foreach ($ads as $a) {
            $ads_duration = Ads_duration::where("ads_id",$a->id)->orderBy('created_at', 'desc')->first();
            $banner = Banner::where("id_ads",$a->id)->get();
            $a->start_at = $ads_duration->start_at;
            $a->end_at = $ads_duration->start_at;
            $a->banner = $banner;
            
        } 
        return $ads;
    }
    /* 
        @request_type = DELETE
        @route : /category/ads/delete/{id_ads}
        @params : 
        @Autorisation : Barier token
    */
    public function delete_ads(Request $request ,$id_ads)
    {
        $validator = Validator::make(["id_ads"=>$id_ads], [
            'id_ads' => 'required|integer'
        ]);
        if ($validator->fails()) {
            throw ValidationException::withMessages([
                'message' => ['The provided credentials are incorrect.'],
            ]);
        }
        $ads = ads::where('id',$id_ads)->first();
        if(!$ads)
            throw ValidationException::withMessages([
                'message' => ['The provided credentials are incorrect.'],
            ]);
        $ads->availavility = 0;
        $ads->save();
        return $ads;
    }
    /* 
        @request_type = PUT
        @route : /ads/{id_ads}/view/add
        @params :
        @Autorisation : Barier token
    */
    public function view_ads(Request $request ,$id_ads)
    {
        $user = $request->user();
        $ads = Ads::where("id",$id_ads)->first();
        $ads_view = new ads_view();
        $ads_view->init(intval($id_ads),intval($user->id));
        if($ads_view->save())
        {
            $ads->view_count = $ads->view_count+1;
            $ads->save();
            $ads_view->view_count = $ads->view_count;
            return $ads_view;
        }
        
    }
    /* 
        @request_type = GET
        @route : /ads/{id_ads}/view
        @params :
        @Autorisation : Barier token
    */
    public function ads_view(Request $request ,$id_ads)
    {
        $views = Ads::where("id",$id_ads)->select('view_count',"id")->first();
        return $views;
    }
}
