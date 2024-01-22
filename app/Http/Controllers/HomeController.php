<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
    }

    function admin(){
        echo "admin Page";
        return view('admin.pages.dashboard');
    }

    function manager(){
        echo "manager Page";
    }

    function user(){
        echo "User PAge";
    }
}
