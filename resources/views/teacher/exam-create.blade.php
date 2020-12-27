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
                    <form id="exam_form" method="post" action="{{ route('exam.save') }}">    
                        @csrf
                        <div class="form-group">
                            <label for="exam_title">Exam title:</label>
                            <input type="text" value="{{ old('exam_title') }}" class="form-control" id="exam_title" name="exam_title">
                            @error('exam_title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="checked_questions">Check Questions:</label><br />
                            @foreach($questions as $question)
                            <label><input class="chk-question" type="checkbox" value="{{ $question->id }}"> {{ $question->question }}</label><br />
                            @endforeach
                            <input type="hidden" id="checked_questions" name="checked_questions" value="">
                            @if(isset($questionIds))
                            <span class="text-danger">Pls select 1 or more question</span>
                            @endif
                        </div>
                        <button type="submit" id="exam_submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection