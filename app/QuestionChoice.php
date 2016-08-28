<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionChoice extends Model
{
    protected $table = 'question_choices';
    
    protected $fillable = ['choices'];
    
	public function question() {
	    return $this->belongsTo('App\Question');
	}
	
	public function choice() {
	    // markdown/latex formatting
	    return $this->choice;
	}
}
