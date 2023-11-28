<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index()
    {
        return Message::all();
    }

    public function show(Message $Message)
    {
        $Message['user'] = $Message->user();
        return $Message;
    }

    public function getMessagesByDiscussion(string $dissid)
    {
        $messages = Message::query()->where('dissid', '=', intval($dissid))->get();
        return $messages;
    }

    public function store(Request $request)
    {
        $Message = Message::create($request->all());

        return response()->json($Message, 201);
    }

    public function update(Request $request, Message $Message)
    {
        $Message->update($request->all());

        return response()->json($Message, 200);
    }

    public function delete(Message $Message)
    {
        $Message->delete();

        return response()->json(null, 204);
    }
}
