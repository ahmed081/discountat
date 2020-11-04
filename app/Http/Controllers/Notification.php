<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Notification extends Controller
{
    //
    public function notifications(Request $request)
    {
        $user = $request->user();
        $notifications = $user->notifications();
        return response()->json($notifications);
    }

}
