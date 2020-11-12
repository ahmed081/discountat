<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $hidden = ["id_ads","created_at","updated_at","id"];

    public function init($image,$id_ads)
    {
        $this->image  =  $image;
        $this->id_ads  =  $id_ads;
        # code...
    }
    public function edit($image,$id_ads)
    {
        $this->image  =  $image;
        $this->id_ads  =  $id_ads;
        # code...
    }
    
    public function get_one($id)
    {
        return Banner::where('id',$id)
        ->first();
    }

    public function get_ads_banner($ads_id)
    {
        return Banner::where('id_ads',$ads_id)
        ->get();
    }
    public function get_ads_one_banner($ads_id)
    {
        return Banner::where('id_ads',$ads_id)
        ->first();
    }
}
