<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function user(Request $request)
    {
        return $request->user();
    }

    public function show(User $User)
    {
        return $User;
    }

    public function courses(User $User)
    {
        return $User->courses();
    }

    public function store(Request $request)
    {
        $User = User::create($request->all());

        return response()->json($User, 201);
    }

    public function update(Request $request, User $User)
    {
        $User->update($request->all());

        return response()->json($User, 200);
    }

    public function delete(User $User)
    {
        $User->delete();

        return response()->json(null, 204);
    }
}
