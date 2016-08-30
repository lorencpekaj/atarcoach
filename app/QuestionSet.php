<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use GrahamCampbell\Markdown\Facades\Markdown;

class QuestionSet extends Model
{
	protected $table = 'questions_sets';
	
	public function questions() {
	    return $this->hasMany('App\Question', 'question_set_id');
	}
	
	public function chapter() {
	    return $this->belongsTo('App\Chapter', 'chapter_id');
	}
	
	public function information() {
		return Markdown::convertToHtml($this->information);
	}
    
}
