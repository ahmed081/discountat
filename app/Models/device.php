<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class device extends Model
{
    use HasFactory;


    protected $table = 'device';


    function init($name) {
        $this->name = $name;
     }
}
