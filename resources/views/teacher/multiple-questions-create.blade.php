@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">              
                <div class="card-header">{{ __('Create Question') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form id="quest-create" method="post" action="{{ route('question.save') }}">    
                        @csrf
                        <div class="container" id="main-form-d">
                          <div class="row quest-row">
                            <div class="col">
                                <label for="question">Question:</label>
                                <input type="text" class="question form-control" id="question">
                            </div>
                            <div class="col">
                                <label for="option_1">Option 1:</label>
                                <input type="text" class="option_1 form-control" value="" id="option_1">
                            </div>
                            <div class="col">
                                <label for="option_1">Option 2:</label>
                                <input type="text" class="option_2 form-control" value="" id="option_1">
                            </div>
                            <div class="col">
                                <label for="option_1">Option 3:</label>
                                <input type="text" class="option_3 form-control" value="" id="option_1">
                            </div>
                            <div class="col">
                                <label for="option_1">Option 4:</label>
                                <input type="text" class="option_4 form-control" value="" id="option_1">
                            </div>
                            <div class="col">
                                <label for="correct_answer">Select:</label>
                                <select class="answer form-control" id="correct_answer" name="correct_answer">
                                    <option value="option_1">Option 1</option>
                                    <option value="option_2">Option 2</option>
                                    <option value="option_3">Option 3</option>
                                    <option value="option_4">Option 4</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="add-quest">Add</label>
                                <input value="Add" type="button" class="btn btn-sm btn-primary add-question" id="add-quest">
                            </div>
                          </div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="question">Question:</label>
                            <input type="text" value="{{ old('question') }}" class="form-control" id="question" name="question">
                            @error('question')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="option_1">Option 1:</label>
                            <input type="text" class="form-control" value="{{ old('option_1')}}" id="option_1" name="option_1">
                            @error('option_1')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="option_2">Option 2:</label>
                            <input type="text" class="form-control" value="{{ old('option_2')}}" id="option_2" name="option_2">
                            @error('option_2')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="option_3">Option 3:</label>
                            <input type="text" class="form-control" value="{{ old('option_3')}}" id="option_3" name="option_3">
                            @error('option_3')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="option_4">Option 4:</label>
                            <input type="text" class="form-control" value="{{ old('option_4')}}" id="option_4" name="option_4">
                            @error('option_4')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="correct_answer">Select correct answer:</label>
                            <select class="form-control" id="correct_answer" name="correct_answer">
                                <option value="option_1">Option 1</option>
                                <option value="option_2">Option 2</option>
                                <option value="option_3">Option 3</option>
                                <option value="option_4">Option 4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="marks">Marks:</label>
                            <input type="text" class="form-control" id="marks" name="marks">
                            @error('marks')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        <button type="button" id="save-question" class="btn btn-primary">Submit</button>
                        <input type="hidden" id="data" name="data" value="">
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>

@endsection