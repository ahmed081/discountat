<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ads_view extends Model
{
    use HasFactory;
    protected $hidden = ["created_at","updated_at"];
    protected $table = 'ads_view';
    function init($id_ads,$id_user)
    {
        $this->id_ads=$id_ads;
        $this->id_user=$id_user;

    }
}
