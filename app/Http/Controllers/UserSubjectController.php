<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Alert;
use Validator;
use App\Subject;

class UserSubjectController extends Controller
{
    /**
     * Show the subject selection
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        $subjectData = Subject::all();

        return view('select_subjects')->with('user', $user)
                                      ->with('subjects', $subjectData);
    }

	/**
	 * Inserts user subjects
	 * @return void
	 */
    public function store(Request $request)
   	{
        $validator = Validator::make($request->all(), [
            'subjects' => 'required|array|min:4|max:6',
        ]);

        $validator->each('subjects', 'required|exists:subjects,id');

        if ($validator->fails()) {
 			Alert::error("Please ensure that you have between 4 and 5 subjects.", "Problem with subjects")->persistent('Close');
            return redirect()->route('usersubject.index')->withErrors($validator);
        }

        try
        {
	       	$user = $request->user();
	       	$user->subjects = implode(", ", $request->get('subjects'));
	       	$user->save();

 			Alert::success("You're now ready to practice your selected subjects!", "Thank you!");
            return redirect('/');
        }
        catch (\Exception $e)
        {
            return redirect('/subject/select')->withErrors('lol');
        }
   	}
}
