<?php

namespace App\Http\Controllers;

use App\Models\ads;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class Statistic extends Controller
{
    public function dashboard(Request $request){
        /* 
            TO DO 
            ads count 
            expired ads count
            active ads count 
            available ads count 
            details
        */
        
            $user=$request->user();
            $all_ads_count = ads::join("brands","brands.id","ads.brand_id")
                ->leftJoin('ads_duration',"ads_duration.ads_id","ads.id")
                ->where("brands.user_id",$user->id)
                ->select(DB::raw('count(*) as count'))
                ->first();
            $expaired_ads = ads::join("brands","brands.id","ads.brand_id")
                ->leftJoin('ads_duration',"ads_duration.ads_id","ads.id")
                ->where("brands.user_id",$user->id)
                ->where('ads.availability',0)
                ->select(DB::raw('count(*) as count'))
                ->first();
            $availeble_ads = ads::join("brands","brands.id","ads.brand_id")
                ->leftJoin('ads_duration',"ads_duration.ads_id","ads.id")
                ->where("brands.user_id",$user->id)
                ->where('ads.availability',1)
                ->select(DB::raw('count(*) as count'))
                ->first();
            $available_ads_count = $user->free_ads_count;
            return response()->json(
                [
                    "all_ads_count"=>$all_ads_count->count,
                    "expaired_ads_count"=>$expaired_ads->count+$availeble_ads->count,
                    "current_ads_count"=>$availeble_ads->count,
                    "available_ads_count"=>$available_ads_count,
                    "details"=>$user->notifications()
                ]
            );
    }

    public function statistic(Request $request,$feature,$ads_id)
    {
        
        # code...
        //$user =$request->user();
        //$ads= ads::where("id",$ads_id)->join('brands',"brands.id","ads.brand_id")->where("brands.user_id",$user->id)->first();
        /* if(!$ads)
            throw ValidationException::withMessages([
                'message' => ['The provided credentials are incorrect.'],
            ]); */
        $feature_statistic = array();
        $today = Carbon::now();
        //return $today->hour+1;
        switch (strtolower($feature)) {
            case 'hours':
                $today_first =  new Carbon((new Carbon(date("m.d.y")))->toDateString());
                for($i=1;$i<=$today->hour+1;$i++)
                    $feature_statistic[$i] = [
                        "views_count"=>0,
                        "$feature"=>$i-1,
                        "percentage"=>0
                    ];
                $last_hour = $feature_statistic[count($feature_statistic)-1]["hours"];
                $today_first_m = (new Carbon((new Carbon(date("m.d.y")))->toDateString()))->addMinutes(-60);
                $ads=Ads::where("ads.id",$ads_id."")
                    ->join('ads_view',"ads.id","ads_view.id_ads")
                    ->select(DB::raw("(hour(ads_view.created_at)  )as hour, count(*) as count,ads_view.created_at as date"))
                    ->where("ads_view.created_at",">=","$today_first")
                    ->where("ads_view.created_at","<","$today")
                    ->groupBy("hour")->get();
                $total_views =Ads::where("ads.id",$ads_id)
                            ->join('ads_view',"ads.id","ads_view.id_ads")
                            ->select(DB::raw("(hour(ads_view.created_at)+1) as hour, count(*) as count,ads_view.created_at as date"))
                            ->where("ads_view.created_at",">","$today_first")
                            ->where("ads_view.created_at","<=","$today")
                            ->first()->count;
                if(count($feature_statistic) === 0)
                    $moyenne = 0;
                else 
                    $moyenne = $total_views/count($feature_statistic);
                
                foreach ($ads as $a) {
                    $feature_statistic[($a->hour+1).""]["views_count"] =$a->count;
                    $x = $a->count<$moyenne?(-1)*$a->count:$a->count;
                    $y = $total_views ;
                    if($y===0)
                        $feature_statistic[($a->hour+1).""]  ["percentage"] = 0;
                    else
                        $feature_statistic[($a->hour+1).""]  ["percentage"] = number_format(($x)*100/$y, 2, '.', '');
                
                }   
                
                return response()->json(array_values($feature_statistic))  ;
                break;
            case 'days':

                $monday = Carbon::now()->startOfWeek();
                $today =  (new Carbon(Carbon::now()->toDateString()))->addDay()->addSeconds(-1);
                
                for($i=0;$i<$today->dayOfWeekIso;$i++)
                {
                    //echo $today->dayOfWeekIso;
                    $feature_statistic["".($i+1)] = [
                        "views_count"=>0,
                        "$feature"=> (new Carbon((new Carbon(date("m.d.y")))->toDateString()))->addDays($i)->toDateString(),
                        "percentage"=>0];
                }
                
                $ads=Ads::where("ads.id",$ads_id."")
                    ->join('ads_view',"ads.id","ads_view.id_ads")
                    ->select(DB::raw("(day(ads_view.created_at)+1) as day, count(*) as count,ads_view.created_at as date"))
                    ->where("ads_view.created_at",">=","$monday")
                    ->where("ads_view.created_at","<=","$today")
                    ->groupBy("day")->get();
                $total_views =Ads::where("ads.id",$ads_id)
                    ->join('ads_view',"ads.id","ads_view.id_ads")
                    ->select(DB::raw("(day(ads_view.created_at)+1) as day, count(*) as count,ads_view.created_at as date"))
                    ->where("ads_view.created_at",">=","$monday")
                    ->where("ads_view.created_at","<=","$today")
                    ->first()->count;
                if(count($feature_statistic) === 0)
                    $moyenne = 0;
                else 
                    $moyenne = $total_views/count($feature_statistic);
                foreach ($ads as $a) {
                    $feature_statistic[(new Carbon($a->created_at))->dayOfWeekIso.""]  ["views_count"] = $a->count;
                    
                    $x = $a->count<$moyenne?(-1)*$a->count:$a->count;
                    $y = $total_views ;
                    if($y===0)
                        $feature_statistic[(new Carbon($a->created_at))->dayOfWeekIso.""]  ["percentage"] = 0;
                    else
                        $feature_statistic[(new Carbon($a->created_at))->dayOfWeekIso.""]  ["percentage"] = number_format(($x)*100/$y, 2, '.', '');
                } 
                return  response()->json(array_values($feature_statistic)) ;

                break;
            case 'months':
                # code...
                $january = new Carbon(Carbon::now()->startOfYear());
                
                $today =  Carbon::now();
                for($i=0;$i<$today->month;$i++)
                {
                    $feature_statistic["".($i+1)] = [
                        "views_count"=>0,
                        "$feature"=> (new Carbon((new Carbon($january))->toDateString()))->addMonth($i)->toDateString(),
                        "percentage"=>0];
                } 
                $ads=Ads::where("ads.id",$ads_id."")
                    ->join('ads_view',"ads.id","ads_view.id_ads")
                    ->select(DB::raw("month(ads_view.created_at) as month, count(*) as count,ads_view.created_at as date"))
                    ->where("ads_view.created_at",">=","$january")
                    ->where("ads_view.created_at","<=","$today")
                    ->groupBy("month")->get();
                $total_views =Ads::where("ads.id",$ads_id)
                    ->join('ads_view',"ads.id","ads_view.id_ads")
                    ->select(DB::raw("month(ads_view.created_at) as month, count(*) as count,ads_view.created_at as date"))
                    ->where("ads_view.created_at",">=","$january")
                    ->where("ads_view.created_at","<=","$today")
                    ->first()->count;
                if(count($feature_statistic) === 0)
                    $moyenne = 0;
                else 
                    $moyenne = $total_views/count($feature_statistic);
                foreach ($ads as $a) {
                    $feature_statistic[(new Carbon($a->created_at))->month.""]  ["views_count"] = $a->count;
                    $x = $a->count<$moyenne?(-1)*$a->count:$a->count;
                    $y = $total_views ;
                    if($y===0)
                        $feature_statistic[(new Carbon($a->created_at))->month.""]  ["percentage"] = 0;
                    else
                        $feature_statistic[(new Carbon($a->created_at))->month.""]  ["percentage"] = number_format(($x)*100/$y, 2, '.', '');
                } 
                return  response()->json(array_values($feature_statistic)) ;

                break;
            
            default:
                # code...
                return response()->json([],404);
                break;
        }
    }

}
