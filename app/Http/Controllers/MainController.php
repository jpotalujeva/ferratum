<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main', [
            'users' => Event::get()
        ]);
    }
}
