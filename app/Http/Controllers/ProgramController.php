<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        return Program::all();
    }

    public function show(Program $Program)
    {
        return $Program;
    }

    public function store(Request $request)
    {
        $Program = Program::create($request->all());

        return response()->json($Program, 201);
    }

    public function update(Request $request, Program $Program)
    {
        $Program->update($request->all());

        return response()->json($Program, 200);
    }

    public function delete(Program $Program)
    {
        $Program->delete();

        return response()->json(null, 204);
    }
}
