<?php

namespace App\Http\Controllers;

use App\Models\ads as Ads;
use App\Models\ads_view;
use App\Models\Banner;
use App\Models\brands;
use App\Models\categories;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
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
        $ads = (new Ads())->get_one($id_ads);
        
        $brand = (new brands())->get_one($ads->brand_id);
        
        $category = (new categories())->get_one($ads->brand_id);
        $banner = (new Banner())->get_ads_banner($ads->id);
        $recommandation =(new Ads())->recommandation($brand->user_id) ;
        
        $ads->banner = $banner;
        foreach ($recommandation as $rec ) {
            $banner = (new Banner())->get_ads_one_banner($rec->id);
            $rec->image = $banner->image;
        }
        return response()->json([
            "ads"=>$ads,
            "ads_category"=>$category,
            "recommandation"=>$recommandation
        ]);
    }   
    /* 
        @request_type = POST
        @route : /category/ads/add
        @params : 
            {
                "title":"title",
                "description":"description",
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
                "start_at"=>"required|date",
                "end_at"=>"date",
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
            DB::beginTransaction();
            try {
                $ads = new Ads;
                $start_at = new Carbon($request->start_at);
                $end_at = (new Carbon($start_at))->addMonth();
                if($request->has("end_at"))
                    $end_at = new Carbon($request->end_at);
                $ads->init($request->title,$request->description,0,1,$request->brand_id,$start_at,$end_at,0);
                $ads->description = $request->description;
                $ads->save();
                foreach ($request->file("banner") as $file) {

                    $banner = new Banner();
                    $file->move(public_path().'/files/', $file->getClientOriginalName());
                    $url = url('/files/'.$file->getClientOriginalName());
                    $banner->init($url,$ads->id);
                    $banner->save();
                }
                $user->free_ads_count = $user->free_ads_count-1;
                $user->save();
                DB::commit();
                return response()->json($ads);
            } catch (\Exception $th) {
                DB::rollBack();
                return response()->json([
                    "message"=> "Internal Server Error!!."
                ],500);
            }
            
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
                "description":"description",
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
            "brand_id"=>"required|integer",
            "start_at" => "required|date",
            "end_at" => "required|date",
        ]);
        $user = $request->user();
        $ads = Ads::where("ads.id",$id_ads)->join("brands","ads.brand_id","=","brands.id")->where("brands.user_id",$user->id)->select("ads.*")->first();
        if(!$ads)
            return response()->json([
                "message"=> "Unauthenticated."
            ],402);
        $ads->edit(
                $request->title,
                $request->description,
                $ads->view_count,
                $ads->availability,
                $request->brand_id,
                $request->start_at,
                $request->end_at,
                $ads->price
        );
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
        if($validator->fails()) {
            throw ValidationException::withMessages([
                'message' => ['The provided credentials are incorrect.'],
            ]);
        }
        $ads = (new Ads())->ads_by_category($id_category);
        foreach ($ads as $a) {
            $banner = Banner::where("id_ads",$a->id)->get();
            $a->banner = $banner;
        } 
        return $ads;
    }
    /* 
        @request_type = GET
        @route : /ads
        @params : 
        @Autorisation : Barier token
    */
    public function get_all_ads(Request $request)
    {
        $user = $request->user();
        $ads = (new Ads())->get_all($user->id);
        foreach ($ads as $a) {

            $a->image = (new Banner())->get_ads_one_banner($a->id)->image;

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


    function web_get_all(){
        $brands = Brands::join('categories','categories.id',"brands.category_id")
        ->join('ads',"ads.brand_id","brands.id")
        ->select('brands.*',DB::raw('categories.name as category_name, categories.name_ar as category_name_ar, count(*) as ads_count'))
        ->groupBy("brands.id")
        ->get();
        $ads = Brands::join('ads',"ads.brand_id","brands.id")
            ->select('ads.*','brands.name','brands.address','brands.mobile','brands.web_site')
            ->get();
        foreach ($ads as $a ) {
                $date = Carbon::now();
                $end_at = new Carbon($a->end_at);
                if($date->lessThanOrEqualTo($end_at))
                    $a->status = 1;
                else $a->status = 0;
            }
        return view("ads.ads")->with("data",[
            "brands"=>$brands,
            "ads"=>$ads
        ]);
    }

    function desable (Request $request , $id){
        $ads = Ads::where('id',$id)->first();
        $ads->availability = 0;
        $ads->save();
        return redirect(URL::previous());
    }
 
    function enable (Request $request , $id){
        $ads = Ads::where('id',$id)->first();
        $ads->availability = 1;
        $ads->save();
        return redirect(URL::previous());
    }
    function web_update (Request $request,$id){
        $ads = Ads::where('id',$id)->first();
        DB::beginTransaction();
       // return $request;
        try {
            $ads->title = $request->title ;
            $start_at = new Carbon((new Carbon($ads->start_at))->toDateString());
            $end_at = new Carbon((new Carbon($ads->end_at))->toDateString());
            if((new Carbon($start_at))->greaterThan(Carbon::now()))
                if((new Carbon($request->end_at))->greaterThan(new Carbon($request->start_at)))
                {
                    $ads->start_at = new Carbon($request->start_at);
                }
                    
    
            if((new Carbon($end_at))->greaterThan(Carbon::now()))
                if((new Carbon($request->end_at))->greaterThan(new Carbon($request->start_at)))
                {
                    $ads->end_at = new Carbon($request->end_at);
                }
                    
            $ads->brand_id = $request->brand_id;
            $ads->description = $request->description;
            if($request->has("availability"))
                $ads->availability = 1;
            else 
                $ads->availability = 0;
            $ads->save();
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
        }
        
        return redirect(URL::previous());
    }


}
