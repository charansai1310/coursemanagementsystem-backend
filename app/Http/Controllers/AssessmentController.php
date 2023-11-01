<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function index()
    {
        return Assessment::all();
    }

    public function show(Assessment $Assessment)
    {
        return $Assessment;
    }

    public function store(Request $request)
    {
        $Assessment = Assessment::create($request->all());

        return response()->json($Assessment, 201);
    }

    public function update(Request $request, Assessment $Assessment)
    {
        $Assessment->update($request->all());

        return response()->json($Assessment, 200);
    }

    public function delete(Assessment $Assessment)
    {
        $Assessment->delete();

        return response()->json(null, 204);
    }
}
