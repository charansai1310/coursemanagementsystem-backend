<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        return Announcement::all();
    }

    public function show(Announcement $Announcement)
    {
        return $Announcement;
    }

    public function store(Request $request)
    {
        $Announcement = Announcement::create($request->all());

        return response()->json($Announcement, 201);
    }

    public function update(Request $request, Announcement $Announcement)
    {
        $Announcement->update($request->all());

        return response()->json($Announcement, 200);
    }

    public function delete(Announcement $Announcement)
    {
        $Announcement->delete();

        return response()->json(null, 204);
    }
}
