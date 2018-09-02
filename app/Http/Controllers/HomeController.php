<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ListItem;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    //This should return the view that is the home list with all the logic
    public function index()
    {
        return view('home');
    }
}
