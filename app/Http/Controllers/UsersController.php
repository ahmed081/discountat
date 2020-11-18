<?php

namespace App\Http\Controllers;

use App\Models\brands;
use App\Models\categories;
use App\Models\Subscription;
use App\Models\users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

use Illuminate\Support\Str;

class UsersController extends Controller
{
    //
    /* 
        @request_type = put
        @route : /profile/editPDP
        @params :
        @Autorisation : Barier token
        */
    public function edit_pdp(Request $request)
    {
        
        
        //return $request;
        $validator = $request->validate( [
            'image' => 'required'
        ]);
        $user = $request->user();
        $file = $request->file("image");
        DB::beginTransaction();
        
        try {
            $file_name =  $user->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/files/', $file_name);
            $url = url('/files/'.$file_name);
            $user->image = $url;
            $user->save();
            DB::commit();
            return response()->json([
                "message"=> "updated"
            ]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json([
                "message"=> "Internal Server Error!!."
            ],500);

        }
        # code...
    }
    /* 
        @request_type = GET
        @route : /profile
        @params :
        @Autorisation : Barier token
    */
    public function get_current(Request $request)
    {
        # code...
        $user = $request->user();
        $user->created_date = ($user->created_at)->toDateTimeString();
        return response()->json($user);
    }

    /* 
        @request_type = PUT
        @route : /profile/edit
        @params : 
            {
                "full_name":"full_name",
                "email":"email",
                "password":"password"
            }
        @Autorisation : Barier token
    */
    public function edit_profile(Request $request)
    {
        # code...
        $request->validate([
                "full_name"=>"required|string",
                "email"=>"required|email",
                "password"=>"required|string|min:8"
        ]);
        $user = users::where("id",$request->user()->id)->first();
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->full_name = $request->full_name;
        $user->save();

        return $user;
    }

    /* 
        @request_type = post
        @route : /contact
        @params : 
            {
                "full_name":"full_name",
                "email":"email",
                "password":"password"
            }
        @Autorisation : Barier token
    */
    function web_all_users(){
        $users = DB::table('users')->where("type",1)->get();
        foreach($users as $user)
        {
            $ads_count = brands::where('user_id',$user->id)->join("ads","ads.brand_id","brands.id")->count();
            $user->ads_count =$ads_count; 
        }
        
        return view("users.users")->with("data",[
            "users"=>$users
        ]);
    }
    public function desable (Request $request , $id){
        $user = Users::where('id',$id)->first();
        $user->availability = 0;
        $user->save();
        $url = URL::previous();
        return redirect($url);
    }
    function enable(Request $request , $id){
        $user = Users::where('id',$id)->first();
        $user->availability = 1;
        $user->save();
        $url = URL::previous();
        return redirect($url);
    }
    function resetpassword(Request $request , $id){
        $user = Users::where('id',$id)->first();
        DB::beginTransaction();
        try {
            $password = Str::random(16);
            $user->password = Hash::make($password);
            $user->save();
            DB::commit();
            return view("users.reset_password")->with("data",[
                "password"=>$password,
                "user"=>$user
            ]);
        } catch (\Exception $e) {
            Db::rollBack();
        }
        
    }

    function update (Request $request , $id){
        $user = Users::where('id',$id)->first();
        $file = $request->file("image");
        DB::beginTransaction();
        try{
            if($request->hasFile("image"))
            {
                $file_name =  $user->id.".".$file->getClientOriginalExtension();
                $file->move(public_path().'/files/', $file_name);
                $url = url('/files/'.$file_name);
                $user->image = $url;
                $user->save();
                
            }
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->save();
            DB::commit();
            return redirect(URL::previous());
        }catch (\Exception $e){
            DB::rollBack();
        }
        
            
    }

    function web_get_one($id){
        $user = DB::table('users')->where('id',$id)->first();
        $subs = Subscription::where('user_id',$id)->get();
        foreach ($subs as $sub ) {
            $date = Carbon::now();
            $end_at = new Carbon($sub->end_at);
            if($date->lessThanOrEqualTo($end_at))
                $sub->status = 1;
            else $sub->status = 0;
        }
        $brands = Brands::where('user_id',$id)
        ->join('categories','categories.id',"brands.category_id")
        ->join('ads',"ads.brand_id","brands.id")
        ->select('brands.*',DB::raw('categories.name as category_name, categories.name_ar as category_name_ar, count(*) as ads_count'))
        ->groupBy("brands.id")
        ->get();
        $ads = Brands::where('user_id',$id)
        ->join('ads',"ads.brand_id","brands.id")
        ->select('ads.*','brands.name','brands.address','brands.mobile','brands.web_site')
        ->get();
        $categories = categories::where("availability",1)->get();
        foreach ($ads as $a ) {
            $date = Carbon::now();
            $end_at = new Carbon($a->end_at);
            if($date->lessThanOrEqualTo($end_at))
                $a->status = 1;
            else $a->status = 0;
        }
        /* return [
            "user"=>$user,
            "brands"=>$brands,
            "subs"=>$subs,
            "ads"=>$ads
        ]; */
        return view("users.user_profile")->with("data",[
            "user"=>$user,
            "brands"=>$brands,
            "subs"=>$subs,
            "ads"=>$ads,
            "categories"=>$categories
        ]);
    }
}
