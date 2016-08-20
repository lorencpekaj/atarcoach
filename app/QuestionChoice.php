<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionChoice extends Model
{
    protected $table = 'question_choices';
    
    protected $fillable = ['choices'];
}
