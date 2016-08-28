<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionSet extends Model
{
	protected $table = 'questions_sets';
	
	public function questions() {
	    return $this->hasMany('App\Question', 'question_set_id');
	}
	
	public function information() {
		// TODO: markdown parser
		return $this->information;
	}
    
}
