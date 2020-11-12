<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messages_categories extends Model
{
    use HasFactory;
    protected $table = 'messages_categories';
    protected $hidden = ["created_at","updated_at","availability"];

    function init($name,$name_ar){
        $this->name = $name;
        $this->name_ar = $name_ar;
    }

    function edit($name,$name_ar){
        $this->name = $name;
        $this->name_ar = $name_ar;
    }
    public function get_all()
    {
        return messages_categories::where('availability',1)->get();
    }
}
