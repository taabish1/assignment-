<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/login-by-role', 'CustomLoginController@login')->name('custom.login');

Route::get('/dashboard', 'CustomLoginController@dashboard')->name('dashboard')->middleware('auth');

Route::get('/login-student', function(){

	return view('auth.login-student');
})->name('login.student');

Route::middleware(['auth', 'auth.teacher'])->group(function () {

    Route::get('/student/create', 'TeacherController@studentCreate')->name('student.create');
    Route::get('/student/list', 'TeacherController@listStudents')->name('student.list');
    Route::get('/student/edit/{id}', 'TeacherController@editStudent')->name('student.edit');
    Route::post('/student/save', 'TeacherController@saveStudent')->name('student.save');
    Route::post('/student/update', 'TeacherController@updateStudent')->name('student.update');
    Route::get('/question/create', 'TeacherController@questionCreate')->name('question.create');
    Route::post('/question/save', 'TeacherController@saveQuestion')->name('question.save');
    Route::get('/exam/create', 'TeacherController@examCreate')->name('exam.create');
    Route::post('/exam/save', 'TeacherController@saveExam')->name('exam.save');
    Route::get('/exam/list', 'TeacherController@listExam')->name('exam.list');
    Route::get('/exam/assign', 'TeacherController@assignExam')->name('exam.assign');
    Route::post('/assign/exam', 'TeacherController@examAssign')->name('assign.exam');
    Route::get('/results/list', 'TeacherController@resultsList')->name('results.list');
});

Route::middleware(['auth', 'auth.student'])->group(function () {

	Route::get('exams/list', 'StudentController@listExam')->name('exam.list');
	Route::get('/appear/exam/{id}', 'StudentController@appearExam')->name('exam.appear');
	Route::post('/answer/submit/{id}', 'StudentController@answerSubmit')->name('answer.submit');
	Route::get('/result/list', 'StudentController@listResult')->name('result.list');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
