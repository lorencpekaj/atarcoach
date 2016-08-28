<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    // Returns an array of question sets
    public function questionSetsArray() {
        return json_decode($this->question_sets, true);
    }
    
    // Returns an array of completed question sets
    public function completedQuestionSetsArray() {
        return array_map('intval', array_keys(json_decode($this->question_sets_completed, true)));
    }
    
    public function completed() {
        return count(self::questionSetsArray()) == count(self::completedQuestionSetsArray());
    }
    
    /*
     * Returns number of questions in the exam
     * @params 
     *      boolean $completedSetsOnly 
     *      Returns number of completed or uncompleted questions of an exam
    */
    public function totalQuestions($completedSetsOnly = false) {
        $questionSets = QuestionSet::whereIn('id', $completedSetsOnly ? self::completedQuestionSetsArray() : self::questionSetsArray())
        
                                    ->withCount('questions')->get();
                                    
        return $questionSets->sum('questions_count');
    }
}
