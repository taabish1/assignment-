@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @php 
                    $routeName = \Route::currentRouteName(); 
                @endphp
                @if($routeName == 'student.create')
                <div class="card-header">{{ __('Create Student') }}</div>
                @else
                <div class="card-header">{{ __('Edit Student') }}</div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($routeName == 'student.create')
                    <form method="post" action="{{ route('student.save') }}">
                    @else
                    <form method="post" action="{{ route('student.update') }}">    
                    @endif
                        
                        @csrf
                        @if(isset($user))
                        <input type="hidden" value="{{ $user->id }}" name="id">
                        @endif
                        <div class="form-group">
                            <label for="name">Name:</label>
                            @if($routeName == 'student.create')
                            <input type="text" value="{{ old('name') }}" class="form-control" id="name" name="name">
                            @else
                            <input type="text" value="{{ $user->name }}" class="form-control" id="name" name="name">
                            @endif
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            @if($routeName == 'student.create')
                            <input type="email" class="form-control" value="{{ old('email')}}" id="email" name="email">
                            @else
                            <input type="email" class="form-control" value="{{ $user->email }}" id="email" name="email">
                            @endif
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            @if($routeName == 'student.create')
                            <input type="password" class="form-control" id="pwd" name="password">
                            @else
                            <input type="password" class="form-control" id="pwd" name="password" placeholder="Leave blank if u dnt wnt 2 change">
                            @endif
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>

@endsection