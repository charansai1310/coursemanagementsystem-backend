<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        return Enrollment::all();
    }

    public function show(Enrollment $Enrollment)
    {
        return $Enrollment;
    }

    public function courses(Enrollment $Enrollment)
    {
        return $Enrollment->courses();
    }

    public function store(Request $request)
    {
        $Enrollment = Enrollment::create($request->all());

        return response()->json($Enrollment, 201);
    }

    public function update(Request $request, Enrollment $Enrollment)
    {
        $Enrollment->update($request->all());

        return response()->json($Enrollment, 200);
    }

    public function delete(Enrollment $Enrollment)
    {
        $Enrollment->delete();

        return response()->json(null, 204);
    }
}
