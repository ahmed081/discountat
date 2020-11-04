<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table = 'subscription';
    protected $hidden = ["created_at","updated_at"];

    function init($start_at,$end_at,$user_id)
    {
        $this->end_at = $end_at;
        $this->start_at = $start_at;
        $this->user_id = $user_id;
    }
    function edit($start_at,$end_at,$user_id)
    {
        $this->title = $end_at;
        $this->start_at = $start_at;
        $this->user_id = $user_id;
    }
}
