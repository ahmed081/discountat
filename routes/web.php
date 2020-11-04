<?php

use App\Models\users as Users;
use App\Models\device as Device;
use App\Models\type as Type;
use App\Models\brands as Brands;
use App\Models\categories as Categories;
use App\Models\ads as Ads;
use App\Models\ads_duration as Ads_duration;
use App\Models\ads_view as Ads_view;
use App\Models\Banner;
use App\Models\Subscription;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function (){
    return view("welcome");
});
Route::get('/init', function () {

    $type= new Type();
    $type->init("user");
    $type->save();
    $type= new Type();
    $type->init("admin");

    $type->save();

    $device = new Device();
    $device->init("android");
    $device->save();
    $device = new Device();
    $device->init("IOS");

    $device->save();

    $categories = ["cat 1",
                    "cat 2",
                    "cat 3",
                    "cat 4",
                    "cat 5"
                    ];
    foreach($categories as $category)
    {
        $cat = new Categories();
        $cat->init(1,$category,"url");
        $cat->save();
    }
    $users = array(
        ["ahmed el assimi","assimi33.y@gmail.com","123456789",1,1,1,0,null],
        ["omar el assimi","omar@gmail.com","123456789",1,1,1,0,null],
        ["amine el assimi","amine@gmail.com","123456789",1,1,1,0,null],
    );
    foreach($users as $user)
    {
        $u = new Users;
        $u->init($user[0],$user[1],Hash::make($user[2]),$user[3],$user[5],$user[6]);
        $u->save();
        
    }

    $users = Users::all();
    
    foreach($users as $user)
    {
       
        $sub = new Subscription();
        $sub->init((new Carbon()),(new Carbon())->addYear(),$user->id);
        $user->free_ads_count=$user->free_ads_count+12;
        $user->save();
        $sub->save();
    }   
    $categories = Categories::all();
    $i = 0;
    foreach($categories as $category)
    {
        foreach($users as $user)
        {
           
            $brand = new Brands();
            $brand->init("brand ".$i."user ".$user->id,1,"0648095086","http://"."brand".$i."user".$user->id.".exemple.com","bni melal",'{}',$category->id,$user->id);
            $i++;
            $brand->save();
        }
    }
    // add free ads
    $brands = Brands::all();
    $images=["5d22ef90427541fa228abe8f01378f22.png","8ce4a712f354e2f762238bcd83ae8f72.png","bb8a84cef313a3ae832514385d9454e5.png"];
    foreach($brands as $brand)
    {
        $user = Users::where("id",$brand->user_id)->first();
        if($user->free_ads_count>0){
            $ads = new Ads;
            $ads->init("ads ".$brand->name,"description ads ".$brand->name,0,1,$brand->id);
            $ads_periode = new Ads_duration;
            $ads->save();
            foreach ($images as $image) {
                $banner = new Banner();
                $url = url('/files/'.$image);
                $banner->init($url,$ads->id);
                $banner->save();
            }
            $date = Carbon::now();
            $next_month = Carbon::now()->addMonth();
            $ads_periode->init($ads->id,1,$date,$next_month,0);
            $ads_periode->save();
            $user->free_ads_count = $user->free_ads_count-1;
            $user->save();
            $brand->save();
            
        }
        
        
        
    }

    //add views
    $ads = Ads::all();
    foreach($ads as $a)
    {
        
        foreach($users as $user)
        {
            $ads_view = new Ads_view();
            $ads_view->init($a->id,$user->id);
            $ads_view->save();
            $a->view_count = $a->view_count+1;
            $a->save();
        }
    }

    return "ahmed";


});
