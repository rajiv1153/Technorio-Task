<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\movies;
use App\Models\User;


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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $movies= Movies::orderBy('created_at','DESC')->get();
        return view('home',compact('movies'));
    }
    public function adminHome()
    {
        $movies= Movies::orderBy('created_at','DESC')->get();
        return view('admin',compact('movies'));
    }

    public function getUsers()
    {
        $users= User::orderBy('created_at','DESC')->get();
        return view('users',compact('users'));
    }

}
