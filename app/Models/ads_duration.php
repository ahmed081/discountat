<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ads_duration extends Model
{
    use HasFactory;
    protected $table = 'ads_duration';
    
    function init($ads_id,$is_free,$start_at,$end_at,$price) 
    {
        $this->ads_id=$ads_id;
        $this->is_free=$is_free;
        $this->start_at=$start_at;
        $this->end_at=$end_at;
        $this->price=$price;
    }   
}
