<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            
            $file->move(public_path().'/files/', $user->id.".".$file->getClientOriginalExtension());
            $url = url('/files/'.$user->id);
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
        return $request->user();
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
}
