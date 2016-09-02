<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
	protected $table = 'chapters';
	
	public function questionSets() {
	    return $this->hasMany('App\QuestionSet');
	}
}
