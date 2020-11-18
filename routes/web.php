<?php

use App\Http\Controllers\AdsController;
use App\Http\Controllers\brandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\UsersController;
use App\Models\users as Users;
use App\Models\device as Device;
use App\Models\type as Type;
use App\Models\brands as Brands;
use App\Models\categories as Categories;
use App\Models\ads as Ads;
use App\Models\ads_duration as Ads_duration;
use App\Models\ads_view as Ads_view;
use App\Models\Banner;
use App\Models\messages;
use App\Models\messages_categories;
use App\Models\Subscription;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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
Route::get('/login', function (){
    return view("account.login");
});
Route::get('/dashboard', function (){
    return view("dashboard.dashboard");
});
Route::get('/users', [UsersController::class,"web_all_users"]);
Route::post('/users/desable/{id}', [UsersController::class,'desable']);
Route::post('/users/enable/{id}', [UsersController::class,'enable']);
Route::post('/users/resetpassword/{id}',[UsersController::class,'resetpassword'] );
Route::post('/users/update/{id}', [UsersController::class,'update']);
Route::get('/users/{id}', [UsersController::class,'web_get_one']);
Route::get('/moderators', [ModeratorController::class,'get_all']);
Route::post('/moderators/add', [ModeratorController::class,'add']);
Route::get('/moderators/{id}', [ModeratorController::class,'get_one']);
Route::get('/brands', [brandsController::class,'web_get_all']);
Route::post('/brands/update/{id}',[brandsController::class,'web_update'] );
Route::post('/brands/desable/{id}',[brandsController::class,'desable'] );
Route::post('/brands/enable/{id}',[brandsController::class,'enable']);


Route::get('/categories', [CategoriesController::class,'web_get_all']);
Route::post('/categories/desable/{id}', [CategoriesController::class,'desable'] );
Route::post('/categories/enable/{id}',  [CategoriesController::class,'enable']);
Route::post('/categories/update/{id}', [CategoriesController::class,'update'] );
Route::post('/categories/add',  [CategoriesController::class,'add']);
Route::get('/ads', [AdsController::class,'web_get_all']);
Route::post('/ads/desable/{id}',[AdsController::class,'desable']);
Route::post('/ads/enable/{id}', [AdsController::class,'enable']);
Route::post('/ads/update/{id}', [AdsController::class,'web_update']);
Route::get('/Paiements', function (){
    return view("Paiements.Paiements");
});

Route::get('/init', function () {

    $type= new Type();
    $type->init("user");
    $type->save();
    $type= new Type();
    $type->init("admin");
    $type->save();
    $type= new Type();
    $type->init("moderator");
    $type->save();
    $device = new Device();
    $device->init("Android");
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
        $cat->init(1,$category,"https://icon-library.com/images/category-icon/category-icon-6.jpg");
        $cat->save();
    }
    $users = array(
        ["ahmed el assimi","assimi33.y@gmail.com","123456789",1,1,1,0,null],
        ["omar el assimi","omar@gmail.com","123456789",1,1,1,0,null],
        ["amine el assimi","amine@gmail.com","123456789",1,1,1,0,null],
    );
    //add one Admin
    $u = new Users;
    $u->init("Adam Daif","adam.daif@outlook.com",Hash::make(123456789),1,2,1000);
    $u->image= "https://www.w3schools.com/howto/img_avatar.png";
    $u->save();
    //add users
    foreach($users as $user)
    {
        $u = new Users;
        $u->init($user[0],$user[1],Hash::make($user[2]),$user[3],$user[5],500);
        $u->image= "https://www.w3schools.com/howto/img_avatar.png";
        $u->save();
        
    }
    //add  moderators
    $i=0;
    foreach($users as $user)
    {
        $u = new Users;
        $u->init($user[0],"moderator".$i."@gmail.com",Hash::make($user[2]),$user[3],3,500);
        $u->image= "https://www.w3schools.com/howto/img_avatar.png";
        $u->save();
        $i++;
        
    }

    $users = Users::where("type",1)->get();
    //add subs
    foreach($users as $user)
    {
       
        $sub = new Subscription();
        $sub->init((new Carbon()),(new Carbon())->addYear(),$user->id);
        $user->free_ads_count=$user->free_ads_count+12;
        $user->save();
        $sub->save();
    }   
    //add message categories

    $message_categories = [
        [
            "name"=>"Billing department",
            "name_ar"=>"قسم الفواتير"
        ],
        [
            "name"=>"Technical problem",
            "name_ar"=>"مشكلة تقنية"
        ],
        [
            "name"=>"Suggestion",
            "name_ar"=>"اقتراح",
        ],
    ];
    foreach ($message_categories as $message_category) {
        $cat = new messages_categories();
        $cat->init($message_category["name"],$message_category["name_ar"]);
        $cat->save();
    }
    //add message
    foreach($users as $user)
    {
       
        $message = new messages();
        $message->init($user->id,"message from user ".$user->id,0);
        $message->save();
    } 
    

    //add brands
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
            $date = Carbon::now();
            $next_month = Carbon::now()->addMonth();
            $ads->init("ads ".$brand->name,"description ads ".$brand->name,0,1,$brand->id,$date,$next_month,0);
            $ads->save();
            foreach($images as $img){
                $banner = new Banner();
                $url = url('/files/'.$img);
                $banner->init($url,$ads->id);
                $banner->save();
            }
            
            $user->free_ads_count = $user->free_ads_count-1;
            $user->save();
            
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
