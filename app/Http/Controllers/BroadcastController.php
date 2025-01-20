<?php

namespace App\Http\Controllers;

use App\Events\BroadcastMessage;
use Illuminate\Http\Request;

class BroadcastController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        broadcast(new BroadcastMessage($message));
        return response()->json(['message' => 'Message broadcasted successfully']);
    }
}
