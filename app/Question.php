<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Question extends Model
{

	public function exams() {

		return $this->belongsToMany('App\Exam', 'exam_question');
	}
    
}
