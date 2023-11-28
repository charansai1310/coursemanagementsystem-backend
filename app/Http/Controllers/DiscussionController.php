<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function index()
    {
        return Discussion::all();
    }

    public function show(Discussion $Discussion)
    {
        $Discussion['messages'] = $Discussion->messages();
        return $Discussion;
    }

    public function store(Request $request)
    {
        $Discussion = Discussion::create($request->all());

        return response()->json($Discussion, 201);
    }

    public function update(Request $request, Discussion $Discussion)
    {
        $Discussion->update($request->all());

        return response()->json($Discussion, 200);
    }

    public function delete(Discussion $Discussion)
    {
        $Discussion->delete();

        return response()->json(null, 204);
    }
}
