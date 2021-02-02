<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        return view('main', [
            'users' => Event::get()
        ]);
        $users = Event::get();
        var_dump($users);die();
        return response($users, 200);
    }
}
