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
        
        // Displaying all chapters one by one and sorting them by descending order
        $chapters = Chapter::whereSubjectId($id)->orderBy('sort', 'desc')->get();
        
        return response()->json($chapters);
    }
}
