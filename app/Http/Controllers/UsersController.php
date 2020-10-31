<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
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
}
