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

use App\QuestionChoice;

class QuestionController extends Controller
{
    static $questionStoreRules = [
        "subject_id"    => "required|integer|exists:subjects,id",
        "chapter_id"    => "required|integer|exists:chapters,id",
        "information"   => "required",
        "choice"        => "required|array|min:4|max:4", // Ensure max and min of 4 choices
        "choice.*"      => "required", // Need something in all choices
        "question_set"  => "integer|min:0|exists:questions_sets,id"
    ];
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::lists('subject', 'id');

        return view('admin.question.index')->with('appSubheading', 'Access chapters among subjects')
                                          ->with('subjects', $subjects);
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
            
            // Insert all question choices into the database
            foreach ($request->choice as $id => $choice) {
                $questionChoice[] = ["question_id" => $question->id, "choice" => e($choice), "is_correct" => ($id == 0)];
            }
            
            QuestionChoice::insert($questionChoice);

            // Redirect user back with success!
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
