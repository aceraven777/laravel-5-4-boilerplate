<?php

namespace App\Http\Controllers;

class UserOnlyController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user_only');
    }
}
