<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        dd(1);
        // Here you can implement the logic for the app dashboard
        return view('app.index');
    }
}
