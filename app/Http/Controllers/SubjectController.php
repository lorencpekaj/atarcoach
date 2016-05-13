<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Subject;

class SubjectController extends Controller
{
    public function index()
    {
    	return response()->json(Subject::all());
    }
}
