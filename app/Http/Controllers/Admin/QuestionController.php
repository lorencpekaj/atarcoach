<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;

use Alert;

use App\Subject;

use App\Question;

use App\QuestionSet;

class QuestionController extends Controller
{
    static $questionStoreRules = [
        //{"_token":"yAJ4KPsYqNIztI2EShn6DdHCLUe9mv63B8dQ0LLU","subjectId":"1","chapter":"Balance Sheets","information":"\tMaxing\r\n\t** asd **","question_set":"1"}
        "subject_id"    => "required|integer|exists:subjects,id",
        "chapter_id"    => "required|integer|exists:chapters,id",
        "information"   => "required",
        "question_set"  => "integer|min:0|exists:questions_sets,id"
    ];
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \Auth::user();
        
        $subjects = Subject::get();

        return view('admin.question.create') ->with('appSubheading', 'Create a question for a subject')
                                            ->with('subjects', $subjects)
                                    
                                            ->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), static::$questionStoreRules);

        // TODO: Error handling
        if ($validator->fails()) {
 			Alert::error("Error", "Couldn't create question")->persistent('Close');
 			return var_dump($validator->errors());
            // return redirect()->route('admin.chapter.create')->withErrors($validator)->withInput();
        }

        try
        {
            // Create or use an existing question set
            if ($request->has('question_set')) {
                $questionSet = QuestionSet::findOrFail($request->question_set);
            } else {
                $questionSet = new QuestionSet;
                $questionSet->chapter_id = $request->chapter_id;
                $questionSet->save();
            }
            
            // Create the question
            $question = new Question;
            $question->type = 0; // TODO: short answer support, 0 = multiple choice
            $question->information = e($request->information);
            $question->question_set_id = $questionSet->id;
            
            $question->save();

 			Alert::success("You have created a new question!", "Question created");
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors('Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
