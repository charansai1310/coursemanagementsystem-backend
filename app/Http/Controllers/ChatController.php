<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\ChatMessage;


class ChatController extends Controller
{
    public function sendMessage(Request $request, string $chatid)
    {
        $user = $request->user();
        $message = $request->input('message');

        event(new ChatMessage($user, $message, $chatid));

        return response()->json(['status' => 'Message sent!']);

    }
}
