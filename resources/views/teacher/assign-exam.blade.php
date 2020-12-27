@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">              
                <div class="card-header">{{ __('Assign Exam') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form id="assign_form" method="post" action="{{ route('assign.exam') }}">    
                        @csrf
                        <div class="form-group">
                            <label for="correct_answer">Select exam:</label>
                            <select class="form-control" id="correct_answer" name="exam_id">
                                @foreach($exams as $exam)
                                <option value="{{ $exam->id }}">{{ $exam->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="checked_questions">Check Students:</label><br />
                            @foreach($students as $student)
                            <label><input class="chk-user" type="checkbox" value="{{ $student->id }}"> {{ $student->name }}</label><br />
                            @endforeach
                            <input type="hidden" id="checked_user" name="checked_user" value="">
                            @if(isset($userIds))
                            <span class="text-danger">Pls select 1 or more students</span>
                            @endif
                        </div>
                        <button id="assign_submit" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>

@endsection