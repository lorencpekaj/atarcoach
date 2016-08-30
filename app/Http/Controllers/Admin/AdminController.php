<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Subject;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        $userSubjects = Subject::whereIn('id', $user->subjects())->pluck('subject', 'id');
        

        return view('admin.index')  ->with('appHeading', 'Create an exam')
                                    ->with('appSubheading', 'Pick your choices and get started')
                                    
                                    ->with('user', $user)
                                    ->with('userSubjects', $userSubjects);
    }
}
