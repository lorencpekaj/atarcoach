<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
	protected $table = 'subjects';
	public $timestamps = false;

	public function chapters() {
		return $this->hasMany('App\Chapter', 'subject_id')->orderBy('sort', 'asc');
	}
}
