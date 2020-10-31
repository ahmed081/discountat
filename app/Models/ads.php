<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ads extends Model
{
    use HasFactory;
    protected $table = 'ads';
    protected $hidden = ["brand_id","availability","created_at","updated_at"];

    function init($title,$description,$view_count,$availability,$brand_id)
    {
        $this->title = $title;
        $this->description = $description;
        $this->view_count = $view_count;
        $this->availability = $availability;
        $this->brand_id = $brand_id;
    }
    function edit($title,$description,$view_count,$availability,$brand_id)
    {
        $this->title = $title;
        $this->description = $description;
        $this->view_count = $view_count;
        $this->availability = $availability;
        $this->brand_id = $brand_id;
    }
}
