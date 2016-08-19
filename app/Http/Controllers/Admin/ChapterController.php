<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;

use Alert;

use App\Subject;

use App\Chapter;

class ChapterController extends Controller
{
    static $chapterStoreRules = [
        'subjectId' => 'required|integer|exists:subjects,id',
        'chapter' => 'required|string|min:1',
        'sort' => 'required|integer|min:0'
    ];
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::lists('subject', 'id');

        return view('admin.chapter.index')->with('appSubheading', 'Access chapters among subjects')
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
        
        $subjects = Subject::lists('subject', 'id');

        return view('admin.chapter.create') ->with('appSubheading', 'Create a chapter for a subject')
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
        $validator = Validator::make($request->all(), static::$chapterStoreRules);

        // TODO: Error handling
        if ($validator->fails()) {
 			Alert::error("Error", "Couldn't create chapter")->persistent('Close');
 			return var_dump($validator->errors());
            // return redirect()->route('admin.chapter.create')->withErrors($validator)->withInput();
        }

        try
        {
	       	$chapter = new Chapter;
	       	$chapter->subject_id = $request->get('subjectId');
	       	$chapter->chapter = e($request->get('chapter'));
	       	$chapter->sort = $request->get('sort');
	       	$chapter->save();

 			Alert::success("You have created a new chapter called \"{$chapter->chapter}\"", "Chapter created");
            return redirect()->route('admin.chapter.create');
        }
        catch (\Exception $e)
        {
            return redirect()->route('admin.chapter.create')->withErrors('Something went wrong!');
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
