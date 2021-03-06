<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class users extends Model
{
    use HasFactory,HasApiTokens;
    protected $hidden = ['password',"availability","type","created_at","updated_at"];
    protected $table = 'users';
    function init($full_name , $email,$password,$availability,$type,$free_ads_count) {
        $this->full_name = $full_name;
        $this->email = $email;
        $this->password = $password;
        $this->availability = $availability;
        $this->type = $type;
        $this->free_ads_count = $free_ads_count;
    }
    public function get_all()
    {
        return users::all();
    }
    public function get_by_id($id)
    {
        return users::where("id",$id)->first();
    }
    public function get_brands()
    {
        return brands::where("user_id",$this->id)->get();
    }
    public function get_ads()
    {
        return Ads::join("brands","brands.id","ads.brand_id")
        ->where("user_id",$this->id)
        ->get();
    }
    public function get_subs(Type $var = null)
    {
        return Subscription::where("user_id",$this->id);
    }
    public function notifications()
    {
        $subs = Subscription::where('user_id',$this->id)->get();
        $notifications = array();
        $date= new Carbon();
        foreach ($subs as $sub) {
            $end_at=new Carbon($sub->end_at);

            if( $date->greaterThan($end_at))
            {
                $notif = [
                    "alias"=>"END_SUB",
                    "title"=>"End of subscription",
                    "title_ar"=>'نهاية الاشتراك',
                    "date"=>$sub->end_at,
                    "description"=>"Please note that your ad has expired, please renew your subscription",
                    "description_ar"=>"يرجى العلم انه تم انتهاء مدة اعلانك، يرجى تجديد اشتراكك"
                ];
                array_push($notifications,$notif);
            }
            $notif = [
                "alias"=>"ACTIVE_SUB",
                "title"=>"Activate the subscription",
                "title_ar"=>'تفعيل الاشتراك',
                "date"=>$sub->start_at,
                "description"=>"Congratulations, a one-year subscription has been activated",
                "description_ar"=>"مبروك تم تفعيل إشتراك لمدة سنة"
            ];
            array_push($notifications,$notif);
        }
        return $notifications;
    }

    
}
