<?php

namespace App\Http\Controllers;

use App\Models\device;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\login as Login;

class AuthController extends Controller
{
    public function login(Request $request){
        
        $validatedData = $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|max:30|min:8',
            "device" => "required|integer"
        ]);
        
        $user = users::where("email",$request->email)->where("availability",1)->first();
        
        $device = device::where("id",$request->device)->first();
       
        if (!$device || !$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $login = new Login();
        $login->init($user->id,$device->id,false);
        if($login->save())
            return response()->json(["user_token"=>$user->createToken($device->name)->plainTextToken]);
            
    }

    public function logout(Request $request){
        $user = $request->user();
        $login= Login::where("id_user",$user->id)->first();
        $login->logged_out = true;
        $login->save();
        $request->user()->currentAccessToken()->delete();
        return $user;
    }

    public function signup(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|max:30|min:8',
            "device" => "required|integer",
            "full_name"=>"required|string|max:80"
        ]);
        $user = new users;
        $user->init(
            $request->full_name,
            $request->email,
            Hash::make($request->password),
            0,
            1,
            0,
        );
        $device = device::where('id',$request->device)->first();
        if(!$device || !$user->save())
        {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return $user;
    }
}
