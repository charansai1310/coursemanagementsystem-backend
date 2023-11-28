<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CourseController extends Controller
{
    public function index()
    {
        $q = 'SELECT
    c.id AS course_id,
    c.name AS course_name,
    Instructor.id AS instructor_id,
    Instructor.firstname AS instructor_firstname,
    Instructor.lastname AS instructor_lastname
FROM
    courses c
JOIN
    users AS Instructor ON c.instructorid = Instructor.id;';
        $courses = DB::select($q);
        return $courses;
    }

    public function show(Course $Course)
    {
//        $responseData = [
//            $Course,
//            "assessments" => $Course->assessments()->get()
//        ];
        $Course['assessments'] = $Course->assessments()->get();
        return response()->json($Course);
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

    public function assessmentsByType(Request $request ,Course $course, String $asstype){
        $user = $request->user();
        return $course->assessments()->where('type', $asstype)->get();
//            ->join('submissions', 'submissions.assid', '=', 'assessments.id')
//            ->where('userid', $user['id'])->get();
    }

    public function announcements(Course $course)
    {
        return $course->announcements();
    }

}
