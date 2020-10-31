<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class login extends Model
{
    use HasFactory;
    protected $table = 'login';
    function init($id_user , $id_device,$logged_out) {
        $this->id_user = $id_user;
        $this->id_device = $id_device;
        $this->logged_out=$logged_out;
    }


    
}
