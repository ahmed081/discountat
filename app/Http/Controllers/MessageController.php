<?php

namespace App\Http\Controllers;

use App\Models\messages;
use App\Models\messages_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    //
    public function message_categories(Request $request)
    {
        $message_categories = (new messages_categories())->get_all();
        return response()->json($message_categories);
    }

    public function contact(Request $request)
    {
        $request->validate([
            "full_name"=>"string|required",
            "message_category_id"=>"integer|required",
            "message" => "string|required"
        ]);
        DB::beginTransaction();
        try {
            $user= $request->user();
            $message = new messages();
            $message->init($user->id,$request->message,$request->message_category_id);
            $message->save();
            return response()->json($request);
            DB::commit();
        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json([
                "message"=> "Internal Server Error!!."
            ],500);
        }
        
    }
}
