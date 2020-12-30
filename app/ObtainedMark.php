<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ObtainedMark extends Model
{
    
    public function exam() {

    	return $this->hasOne('App\Exam', 'id', 'exam_id');
    }

    public function user() {

    	return $this->hasOne('App\User', 'id', 'user_id');
    }
}
