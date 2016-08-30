<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Subject;

use App\Exam;

use Carbon;

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
        // Get user object
        $user = \Auth::user();

        // Get all user exams and paginate 10 of them
        $exams = Exam::whereUserId($user->id)->orderBy('created_at', 'desc')->paginate(10);
    
        // Create the english timestamp into a variable 
        $englishExamDate = new Carbon\Carbon('26 October 2016');
        
        // Find days between english exam day and now
        $firstExamDate = Carbon\Carbon::now()->diffInDays($englishExamDate);
        
        // Render view
        return view('dashboard')->with('appHeading', "Welcome back, {$user->name}")
                                ->with('appSubheading', "Exams start in {$firstExamDate} days!")
                                ->with('user', $user)
                                ->with(compact('exams'));
    }
}
