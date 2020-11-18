<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModeratorController extends Controller
{
    //
    function get_all(){
        $users = DB::table('users')->where("type",3)->get();
        
        return view("users.moderators")->with("data",[
            "moderators"=>$users
        ]);
    }

    function add (Request $request){
        $user = new users();
        DB::beginTransaction();
        try {
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->availability = 0;
            $user->type = 3;
            
    
            $user->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        
        return redirect("/moderators");
    }

    function get_one ($id){
    
        $moderator = DB::table('users')->where('id',$id)->first();
        return view("users.moderator_profile")->with("data",[
            "moderator"=>$moderator
        ]);
    }

    
}
