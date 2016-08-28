<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use GrahamCampbell\Markdown\Facades\Markdown;

class Question extends Model
{
	protected $table = 'questions';
	
	// Return question sets through a relationship
	public function questionsets() {
	    return $this->belongsTo('App\QuestionSet');
	}
	
	// Return choices through a relationship
	public function choices() {
		return $this->hasMany('App\QuestionChoice');
	}
	
	// Return formatted information
	public function information() {
		return Markdown::convertToHtml($this->information);
	}
}
