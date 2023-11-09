<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return Course::all();
    }

    public function show(Course $Course)
    {
        return $Course;
    }

    public function store(Request $request)
    {
        $Course = Course::create($request->all());

        return response()->json($Course, 201);
    }

    public function update(Request $request, Course $Course)
    {
        $Course->update($request->all());

        return response()->json($Course, 200);
    }

    public function delete(Course $Course)
    {
        $Course->delete();

        return response()->json(null, 204);
    }


    public function assessments(Course $course)
    {
        return $course->assessments()->get();
    }

    public function assessmentsByType($courseid, $asstype){
        return Course::find($courseid)->assessments()
            ->where('type', $asstype);
    }

    public function announcements(Course $course)
    {
        return $course->announcements();
    }

}
