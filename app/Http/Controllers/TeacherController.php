<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Exam;
use App\ObtainedMark;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    
    public function studentCreate() {

    	return view('teacher.student-create');
    }

    public function listStudents() {

    	$students = User::whereRoleId('2')->get();

    	return view('teacher.student-list')->with(compact(['students']));
    }

    public function saveStudent(Request $request){

    	$request->validate([
    		'name'     => 'required|string|max:255',
    		'email'    => 'required|email|unique:users,email',
    		'password' => 'required'
    	]);

    	$user           = new User;
    	$user->name     = $request->name;
    	$user->email    = $request->email;
    	$user->role_id  = 2;
    	$user->avatar   = 'users/default.png';
    	$user->password = Hash::make($request->password);

    	$user->save();

    	return redirect()->route('student.list');
    }

    public function editStudent(Request $request, $id) {

    	$user = User::find($id);

    	return view('teacher.student-create')->with(compact(['user']));
    }

    public function updateStudent(Request $request) {

    	$request->validate([
    		'name'     => 'required|string|max:255',
    		'email'    => 'required|email',
    		//'password' => 'sometimes'
    	]);

    	$user = User::find($request->id);

    	$user->name = $request->name;
    	$user->email = $request->email;
    	if(!empty($request->password)) {

    		$user->password  = $request->password;
    	}

    	$user->save();

    	return redirect()->route('student.list');

    }

    public function questionCreate() {

    	return view('teacher.multiple-questions-create');
    }

    public function saveQuestion(Request $request) {

        $data = json_decode($request->data);

        foreach ($data as $key => $value) {
            

            try {

                $question                 = new Question;
                $question->question       = $value->question;
                $question->option_1       = $value->option_1;
                $question->option_2       = $value->option_2;
                $question->option_3       = $value->option_3;
                $question->option_4       = $value->option_4;
                $question->correct_answer = $value->answer;

                $question->save();
                
            } catch (\Exception $e) {
                
                $e->getMessage();
            }

        }

		/*$request->validate([
    		'question'       => 'required',
    		'option_1'       => 'required',
    		'option_2'       => 'required',
    		'option_3'       => 'required',
    		'option_4'       => 'required',
    		'correct_answer' => 'required',
    		'marks'          => 'required'
    	]); */  

    	return redirect()->route('question.create');	
    }

    public function examCreate() {

    	$questions = Question::all();

    	return view('teacher.exam-create')->with(compact(['questions']));
    }

    public function saveExam(Request $request){

    	//dd($request);

    	$request->validate([
    		'exam_title'       => 'required',
    	]);

    	$questionIds = json_decode($request->checked_questions);

    	if(count($questionIds) < 1) {

    		return back()->with(compact(['questionIds']));
    	}

    	$exam = new Exam;
    	$exam->title = $request->exam_title;
    	$exam->save();
    	$exam->questions()->sync($questionIds);


    	return redirect()->route('dashboard');
    }

    public function listExam() {

    	$exams = Exam::with('questions')->get();

    	return view('teacher.exam-list')->with(compact(['exams']));
    }

    public function assignExam() {

    	$exams = Exam::get();

    	$students = User::whereRoleId('2')->get();

    	return view('teacher.assign-exam')->with(compact(['exams', 'students']));
    }

    public function examAssign(Request $request) {

    	$userIds = json_decode($request->checked_user);

    	if(count($userIds) < 1) {

    		return back()->with(compact(['userIds']));
    	}

    	$exam = Exam::whereId($request->exam_id)->first();

    	$exam->students()->sync($userIds);

    	return redirect()->route('dashboard');
    }

    public function resultsList() {

    	$results = ObtainedMark::with(['exam', 'user'])->get();

    	return view('result.view')->with(compact(['results']));
    }
}
