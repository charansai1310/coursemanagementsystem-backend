<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssessmentController extends Controller
{
    public function index()
    {
        return Assessment::all();
    }

    public function getAssesswithSub(string $courseid, string $userid, string $type){
        $q = 'SELECT
    c.id AS course_id,
    c.name AS course_name,
    a.id AS ass_id,
    a.name AS assignment_name,
    s.id,
    s.userid,
    s.file,
    s.score
FROM
    assessments a
JOIN courses c ON
    c.id = ? AND c.id = a.courseid
LEFT JOIN submissions s ON
    a.id = s.assid AND s.userid = ?
Where a.type = ?;
';
        $res = DB::select($q, [$courseid, $userid, $type]);
        return $res;
    }

    public function show(Assessment $Assessment)
    {
        return $Assessment;
    }

    public function getSubmissions(Assessment $Assessment)
    {
        return $Assessment->submissions()->get();
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
