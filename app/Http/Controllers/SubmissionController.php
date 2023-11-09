<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use App\Traits\Upload;

class SubmissionController extends Controller
{
    use Upload;//add this trait

    public function store(Request $request)
    {
        $path = $this->UploadFile($request->file('file'), 'submissions');
        $data = $request->all();
        $data['file'] = $path;
        $submission = Submission::create($data);
        return response()->json($submission, 201);
    }

    public function show(Submission $submission)
    {
        return $submission;
    }

    public function update(Request $request, Submission $submission)
    {
        $path = $this->UploadFile($request->file('file'), 'submissions');
        $data = $request->all();
        $data['file'] = $path;
        $submission->update($data);

        return response()->json($submission, 200);
    }

    public function delete(Submission $submission)
    {
        $submission->delete();

        return response()->json(null, 204);
    }
}
