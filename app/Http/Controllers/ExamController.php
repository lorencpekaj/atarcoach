<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use Alert;

use App\Http\Requests;

use App\Subject;

use App\Exam;

use App\QuestionSet;

use App\QuestionChoice;

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

        if ($validator->fails()) {
            $errorMessage = implode(' ', call_user_func_array('array_merge', $validator->errors()->toArray()));
 			Alert::error($errorMessage, "Couldn't create exam")->persistent('Close');
            return redirect()->back()->withInput();
        }
        
        $exam = new Exam;
        
        $exam->user_id = \Auth::user()->id;
        $exam->title = e($request->title);
        
        //I want to select all QuestionSet until SUM(QuestionSet->Questions) < 10
        $questionSets = QuestionSet::whereChapterId($request->chapter_id)
        
                                    ->withCount('questions')
                                    
                                    ->get();
                                    
        if ($questionSets->isEmpty()) {
 			Alert::error("Please try again later.", "No available questions!")->persistent('Close');
            return redirect()->route('exam.create')->withInput();
        }
        
        // Randomize question sets
        $questionSets = $questionSets->shuffle();
        
        // Quick sort all question sets by the number of questions they have (highest to lowest)
        // The exam generation process must happen as efficiently as possible.
        // We are choosing quick sort as it is the most time efficient.
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
    public function show($exam)
    {
        $user = \Auth::user();

        $exam = Exam::findOrFail($exam);
        
        // Question sets
        $questions = array_values(array_diff($exam->questionSetsArray(), $exam->completedQuestionSetsArray()));
        
        if (empty($questions)) {
            return redirect()->route('exam.results', $exam->id);
        }
        
        // Check if there are any question sets in the exam
        return redirect()->route('exam.question.show', [$exam->id, $questions[0]]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showQuestion($exam, $question) {
        $user = \Auth::user();

        $exam = Exam::findOrFail($exam);

        $questionSet = QuestionSet::findOrFail($question);
        
        $questionsComplete = number_format($exam->totalQuestions(true) / $exam->totalQuestions() * 100, 0);

        return view('exam.show')->with('appHeading', $exam->title)
                                ->with('appSubheading', "{$questionsComplete}% Complete")
                                
                                ->with('exam', $exam)
                                ->with('questionSet', $questionSet)
                                ->with('questions', $questionSet->questions)
                                    
                                ->with('user', $user);
    }
    
    public function completed($exam) {
        $user = \Auth::user();

        $exam = Exam::findOrFail($exam);

        $questionSet = QuestionSet::findOrFail($question);

        return view('exam.show')->with('appHeading', $exam->title)
                                ->with('appSubheading', 'Questions')
                                
                                ->with('exam', $exam)
                                ->with('questionSet', $questionSet)
                                ->with('questions', $questionSet->questions);
                                    
    }
    
    public function results($exam) {
        
        $exam = Exam::findOrFail($exam);
        
        // Get exam questions
        $questions = array_values(array_diff($exam->questionSetsArray(), $exam->completedQuestionSetsArray()));
        
        // Get user choices
        $completedQuestionChoices = array_values(json_decode($exam->question_sets_completed, true));
        
        if ($completedQuestionChoices == null) {
            \App::abort(404);
        }
        
        $questionChoicesArray = call_user_func_array('array_merge', $completedQuestionChoices);
        
        $questionChoices = QuestionChoice::whereIn('id', $questionChoicesArray)
                                         ->with(['question' => function ($foo) {
                                             $foo->with(['choices' => function ($bar) {
                                                 $bar->where('is_correct', true);
                                             }]);
                                         }])
                                         ->get();
        
        // Count correct questions
        $questionsCount = $questionChoices->count();
        
        // Check if the question even exists...
        if ( ! $questionsCount) {
 			Alert::error("This exam couldn't be shown due to erroneous questions.", "Exam Error")->persistent('Close');
            return redirect('/dashboard');
        }
        
        $correctQuestionsCount = 0;
        
        foreach ($questionChoices as $choice) {
            if ($choice->id == $choice->question->choices[0]->id) {
                $correctQuestionsCount ++;
            }
        }
                                         
        return view('exam.results')->with('appHeading', $exam->title)
                                   ->with('appSubheading', 'Exam Summary')
                                   ->with('percentageScore', number_format($correctQuestionsCount / $questionsCount * 100, 1))
                                   ->with(compact('questionChoices', 'correctChoices'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function progressQuestion(Request $request, $exam, $question) {
        $user = \Auth::user();

        $exam = Exam::findOrFail($exam);

        $questionSet = QuestionSet::findOrFail($question);
        
        // Get selected values
        $selectedChoices = $request->choice;
        
        // Get valid question ids
        $validQuestions = $questionSet->questions->lists('id');
        
        $questionChoices = QuestionChoice::whereIn('id', $selectedChoices)->whereIn('question_id', $validQuestions)->get();
        
        if (is_null($questionChoices)) {
 			Alert::error("This exam couldn't be shown due to erroneous question choices.", "Exam Error")->persistent('Close');
            return redirect('/dashboard');
        }
        
        // validate if question choice is valid question set
        if (count($request->choice) != $questionSet->questions->count()) {
 			Alert::error("Please complete the question set", "Cannot Continue")->persistent('Close');
            return redirect()->back();
        }
        
        // Create an empty question set array to store the choices
        $completedQuestionSet = json_decode($exam->question_sets_completed, true);
        
        // Save the choices to the empty question set array
        foreach ($questionChoices as $choice) {
            $completedQuestionSet[$questionSet->id][] = $choice->id;
        }
        
        // Save the choices to the database
        $exam->question_sets_completed = json_encode($completedQuestionSet);
        $exam->save();
        
        // Redirect to exam index, it will skip to next question.
        return redirect()->route('exam.show', $exam->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \Auth::user();

        $exam = Exam::findOrFail($id);
        
        // Check if the exam is the user's
        if ($exam->user_id != $user->id) {
            return \App::abort(403);
        }
        
        $exam->delete();
        
 		Alert::success("You have deleted an exam!", "Exam destroyed");
        return redirect('/dashboard');
    }
}
