<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use Alert;

use App\Http\Requests;

use App\Subject;

use App\Exam;

use App\QuestionSet;

class ExamController extends Controller
{
    static $examStoreRules = [
        "subject_id"    => "required|integer|exists:subjects,id",
        "chapter_id"    => "required|integer|exists:chapters,id",
        "questions"     => "required|integer|min:1|max:20",
        "title"         => "required|max:32"
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

        $userSubjects = Subject::whereIn('id', $user->subjects())->get();
        

        return view('exam.create')  ->with('appHeading', 'Create an exam')
                                    ->with('appSubheading', 'Pick your choices and get started')
                                    
                                    ->with('user', $user)
                                    ->with('userSubjects', $userSubjects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), static::$examStoreRules);

        // TODO: Error handling
        if ($validator->fails()) {
 			Alert::error("Error", "Couldn't create exam")->persistent('Close');
 			return var_dump($validator->errors());
            // return redirect()->route('admin.chapter.create')->withErrors($validator)->withInput();
        }
        
        $exam = new Exam;
        
        $exam->user_id = \Auth::user()->id;
        $exam->title = e($request->title);
        
        // Fetch all questions where chapter id = ...
        
        //I want to select all QuestionSet until SUM(QuestionSet->Questions) < 10
        $questionSets = QuestionSet::whereChapterId($request->chapter_id)
        
                                    ->withCount('questions')
                                    
                                    ->get();
        
        // Randomize question sets
        $questionSets = $questionSets->shuffle();
        
        // Order all question sets by the number of questions they have (highest to lowest)
        $questionSets = $questionSets->sortBy('questions_count')->values();
        
        // Amount total questions to this variable    
        $totalQuestions = 0;
        
        // Check each question set and total the number of questions
        foreach ($questionSets as $index => $questionSet)
        {
            // Cut every question set after we reach a number of questions
            if ($totalQuestions >= $request->questions)
            {
                $questionSets->splice($index);
                break;
            }
            
            // Total the number of questions
            $totalQuestions += $questionSet->questions_count;
        }
        
        // Fill in the question set ids
        $exam->question_sets = $questionSets->lists('id');
        
        // None are completed
        $exam->question_sets_completed = json_encode([]);
        
        $exam->save();

 		Alert::success("Created as \"{$exam->title}\", try your best!", "Exam created");
        return redirect()->route('exam.show', $exam->id);
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
