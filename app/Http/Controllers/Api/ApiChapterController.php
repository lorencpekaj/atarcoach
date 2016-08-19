<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;

use Alert;

use App\Subject;

use App\Chapter;

class ApiChapterController extends Controller
{
    public function show($id) {
        
        $chapters = Chapter::whereSubjectId($id)->get();
        
        return response()->json($chapters);
    }
}
