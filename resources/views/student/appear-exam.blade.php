@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">              
                <div class="card-header">{{ __('Create Exam') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form id="answer_form" method="post" action="{{ route('answer.submit', ['id' => $exam->id]) }}">    
                        @csrf
                        @foreach($exam->questions as $question)
                        <div class="form-group">
                            <label for="exam_title">Question {{ $question->id }}:</label>
                            <p>{{ $question->question }}</p>
                            <input type="hidden" class="question_id" value="{{ $question->id }}">
                        </div>
                        <div class="form-group">
                            <label for="correct_answer">Select correct answer:</label>
                            <select class="form-control selected_answer">
                                <option value="option_1">{{ $question->option_1 }}</option>
                                <option value="option_2">{{ $question->option_2 }}</option>
                                <option value="option_3">{{ $question->option_3 }}</option>
                                <option value="option_4">{{ $question->option_4 }}</option>
                            </select>
                        </div>
                        @endforeach
                        <input type="hidden" id="all_answers" name="all_answers" value="">
                        <button type="submit" id="answer_submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection