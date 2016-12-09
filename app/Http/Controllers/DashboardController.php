<?php

namespace Flommerce\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $id = Auth::id();

            $first_name = $user->first_name;

            return view('auth.dashboard', compact('first_name'));
        } else {
            return view('home');
        }
    }
}
