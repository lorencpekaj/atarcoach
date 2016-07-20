<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Subject;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('forceSubject', ['except' => ['selectSubjects', 'index']]);
    }


    /**
     * Show the application dashboard or index if unauthenticated.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }
    
    /**
     * Show the application dashboard if authenticated.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $user = \Auth::user();

        $userSubjects = Subject::all();

        return view('dashboard')->with('user', $user)
                           ->with('userSubjects', $userSubjects);
    }
}
