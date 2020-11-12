<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brands extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $hidden = ["user_id","category_id","availability","created_at","updated_at"];

    function init($name,$availability,$mobile,$web_site,$address,$geolocalisation,$category_id,$user_id){
        $this->name = $name;
        $this->availability = $availability;
        $this->mobile = $mobile;
        $this->web_site = $web_site;
        $this->address = $address;
        $this->geolocalisation = $geolocalisation;
        $this->user_id = $user_id;
        $this->category_id = $category_id;
    }

    function edit($name,$availability,$mobile,$web_site,$address,$geolocalisation,$category_id,$user_id){
        $this->name = $name;
        $this->availability = $availability;
        $this->mobile = $mobile;
        $this->web_site = $web_site;
        $this->address = $address;
        $this->geolocalisation = $geolocalisation;
        $this->user_id = $user_id;
        $this->category_id = $category_id;
    }

    public function get_one($id)
    {
        return brands::where('id',$id)->where('availability',1)->first();
    }

    public function get_user_brands($user_id)
    {
        return brands::where('user_id',$user_id)->where('availability',1)->first();
    } 
}
