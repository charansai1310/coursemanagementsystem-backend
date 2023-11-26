<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        return Feedback::all();
    }

    public function show(Feedback $Feedback)
    {
        return $Feedback;
    }

    public function store(Request $request)
    {
        $Feedback = Feedback::create($request->all());

        return response()->json($Feedback, 201);
    }

    public function update(Request $request, Feedback $Feedback)
    {
        $Feedback->update($request->all());

        return response()->json($Feedback, 200);
    }

    public function delete(Feedback $Feedback)
    {
        $Feedback->delete();

        return response()->json(null, 204);
    }
}
