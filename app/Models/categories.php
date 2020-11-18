<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $hidden = ["created_at","updated_at"];
    
    protected $table = 'categories';
    function init($availability , $name,$image_url) {
        $this->availability = $availability;
        $this->name = $name;
        $this->image_url = $image_url;
    }

    public function get_one($id)
    {
        return categories::where('id',$id)
        ->where('availability',1)
        ->first();
    }
}
