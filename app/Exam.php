<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Exam extends Model
{

	public function questions() {

		return $this->belongsToMany('App\Question', 'exam_question');
	}

	public function students() {

		return $this->belongsToMany('App\User', 'exam_user');
	}
    
}
