<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\QuestionSet;

class ApiQuestionController extends Controller
{
    public function show($id) {
        
        $questionSet = QuestionSet::find($id);
        
        return response()->json($questionSet);
    }
    
    public function update(Request $request, $id) {
        
        $questionSet = QuestionSet::findOrFail($id);
        
        try
        {
            $questionSet->information = $request->information;
            $questionSet->save();
            
            return response()->json($questionSet);
        }
        catch (Exception $e)
        {
            // error
            return App::abort(403);
        }
    }
}
