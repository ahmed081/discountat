<?php

namespace App\Models;

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


    
}
