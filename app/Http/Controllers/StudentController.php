<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Exam;
use App\ObtainedMark;

class StudentController extends Controller
{
    
    public function listExam() {

    	$user_id = auth()->user()->id;

    	$exam_lists = User::whereId($user_id)->with('exams')->first();

    	foreach ($exam_lists->exams as $key => $value) {
    		
    		$checkAppeared = ObtainedMark::whereUserId($user_id)
    								->whereExamId($value->id)
    								->get();

			if($checkAppeared->isNotEmpty()) {

				$exam_lists->exams->forget($key);
			}
    	}

    	return view('student.exam-list')->with(compact(['exam_lists']));
    }

    public function appearExam(Request $request, $id) {

    	$exam = Exam::whereId($id)->with('questions')->first();

    	$isAssigned = $exam->students->contains(auth()->user()->id);
    	
    	if(!$isAssigned) {

    		return redirect()->route('dashboard');
    	}

    	return view('student.appear-exam')->with(compact('exam'));
    }

    public function answerSubmit(Request $request, $id) {

    	$exam = Exam::whereId($id)->with('questions')->first();

    	$answers = json_decode($request->all_answers);

    	$total_marks = $obtained_marks = 0;

    	foreach ($answers as $key => $value) {

    		$current_question = $exam->questions->find($value[0]->question_id);
    		//dd();
    		if($value[1]->answer == $current_question->correct_answer){

    			$obtained_marks = (int)$obtained_marks + (int)$current_question->marks;
    		}

    		$total_marks = (int)$total_marks + (int)$current_question->marks;
    	}

    	$save_result                 = new ObtainedMark;
    	$save_result->user_id        = auth()->user()->id;
    	$save_result->exam_id        = $id;
    	$save_result->total_marks    = $total_marks;
    	$save_result->obtained_marks = $obtained_marks;

    	$save_result->save();

    	return redirect()->route('dashboard');
    }

    public function listResult() {

    	$user_id = auth()->user()->id;

    	$results = ObtainedMark::whereUserId($user_id)->with('exam')->get();

    	return view('result.view')->with(compact(['results']));
    }
}
