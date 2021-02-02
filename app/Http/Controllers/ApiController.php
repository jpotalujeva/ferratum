<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function createUser(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            'phone' => 'nullable|string',
        ]);

        if (!isset($validatedData['email']) || !isset($validatedData['name'])) {
            return response()->json([
                "message" => "Email and Name parameters are mandatory!"
            ], 400);
        }

        $user = new Event();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if ($request->get('phone')) {
            $user->phone = $request->get('phone');
        }
        $user->save();

        return response()->json([
            "message" => "user record created"
        ], 201);
    }

    public function getAllUsers()
    {
        $users = Event::get()->toJson(JSON_PRETTY_PRINT);
        return response($users, 200);
    }

    public function deleteUser ($id): JsonResponse
    {
        if (!Event::where('id', $id)->exists()) {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }

        $student = Event::find($id);
        $student->delete();

        return response()->json([
            "message" => "record deleted"
        ], 202);
    }
}
