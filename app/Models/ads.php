<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ads extends Model
{
    use HasFactory;
    protected $table = 'ads';
    protected $hidden = ["brand_id","availability","created_at","updated_at"];

    function init($title,$description,$view_count,$availability,$brand_id,$start_at,$end_at,$price)
    {
        $this->title = $title;
        $this->description = $description;
        $this->view_count = $view_count;
        $this->availability = $availability;
        $this->brand_id = $brand_id;
        $this->start_at = $start_at;
        $this->end_at = $end_at;
        $this->price = $price;
    }
    function edit($title,$description,$view_count,$availability,$brand_id,$start_at,$end_at,$price)
    {
        $this->title = $title;
        $this->description = $description;
        $this->view_count = $view_count;
        $this->availability = $availability;
        $this->brand_id = $brand_id;
        $this->start_at = $start_at;
        $this->end_at = $end_at;
        $this->price = $price;
    }

    public function get_one($id)
    {
        $date= Carbon::now();
        return ads::where("ads.id",$id)
            ->where('ads.availability',1)
            ->join('brands',"ads.brand_id","brands.id")
            ->where('ads.start_at',"<=",$date)
            ->where('ads.end_at',">=",$date)
            ->where('brands.availability',1)
            ->select("ads.*","brands.mobile","brands.web_site","brands.address","brands.geolocalisation")
            ->first();
    }
    public function get_all($id_user)
    {
        return brands::where("user_id",$id_user)
        ->join('ads',"ads.brand_id","brands.id")
        ->where('ads.availability',1)
        ->select("ads.*","brands.mobile","brands.web_site","brands.address","brands.geolocalisation")
        ->get();
        
    }

    public function ads_by_category($category_id)
    {
        $date= Carbon::now();
        return brands::where("category_id",$category_id)
        ->join('ads',"ads.brand_id","brands.id")
        ->where('ads.availability',1)
        ->where('ads.start_at',"<=",$date)
        ->where('ads.end_at',">=",$date)
        ->select("ads.*","brands.mobile","brands.web_site","brands.address","brands.geolocalisation",)
        ->get();
    }

    public function recommandation($user_id)
    {
        $date= Carbon::now();
        return Ads::join("brands","brands.id","ads.brand_id")
        ->where("brands.user_id",$user_id)
        ->where('ads.start_at',"<=",$date)
        ->where('ads.end_at',">=",$date)
        ->select("ads.*")
        ->get();
    }
}
