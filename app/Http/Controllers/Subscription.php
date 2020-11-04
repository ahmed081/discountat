<?php

namespace App\Http\Controllers;

use App\Models\Subscription as ModelsSubscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Subscription extends Controller
{
    //
    public function subscribe(Request $request)
    {
        
        $user = $request->user();
        $subs= ModelsSubscription::where("user_id",$user->id)
        ->orderBy("end_at","desc")
        ->first();
        
        //return $subs;
        $end_at=new Carbon($subs->end_at);
        DB::beginTransaction();
        try{
            if((new Carbon())->greaterThan($end_at))
            {
                $now = new Carbon();
                $next_year = (new Carbon())->addYear();
                $sub = new ModelsSubscription();
                $sub->init($now,$next_year,$user->id);
                $user->free_ads_count=$user->free_ads_count+12;
                
                $user->save();
                $sub->save();
                
                DB::commit();
                
                return response()->json([
                    "message"=>"your subscription has been successfully passed!!"
                ]);
            }
            else 
                return response()->json([
                    "message"=>"failled to subscribe!!\nyou've already subscribed\nyour subscribtion will end the ".$subs->end_at."\ngood luck next year"
                ],402);

            }catch(\Exception $e){
                DB::rollBack();
            }
    }
}
