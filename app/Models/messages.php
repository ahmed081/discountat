<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $hidden = ["created_at","updated_at"];

    function init($user_id,$message,$category_id){
        $this->user_id = $user_id;
        $this->message = $message;
        $this->category_id = $category_id;
    }

    function edit($user_id,$message,$category_id){
        $this->user_id = $user_id;
        $this->message = $message;
        $this->category_id = $category_id;
    }
}
