<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ListItem;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    //This should return the view that is the home list with all the logic.
    //If we are signed in, and we go to the main page, show us our list,
    //otherwise, show us the actual index.
    public function index()
    {
        if(Auth::check()){
            $user_id = auth()->user()->id;
            // $user = User::find($user_id);
            $listItemsOfUser = ListItem::where('user_id', $user_id)->orderBy('priority','item_desc')->get();
            return view('home')->with('items', $listItemsOfUser);
        } else {
            return view('todoapp.index');
        }
    }
}
