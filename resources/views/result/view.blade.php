@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                        <thead>
                          <tr>
                            @if(\Route::currentRouteName() == 'result.list')
                            <th scope="col">ID</th>
                            @else
                            <th scope="col">Student Name</th>
                            @endif
                            <th scope="col">Exam</th>
                            <th scope="col">Obt Marks</th>
                            <th scope="col">Total Marks</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $result)
                          <tr>
                            @if(\Route::currentRouteName() == 'result.list')
                            <th scope="row">{{ $result->id }}</th>
                            @else
                            <th scope="row">{{ $result->user->name }}</th>
                            @endif
                            <td>{{ $result->exam->title }}</td>
                            <td>{{ $result->obtained_marks }}</td>
                            <td>{{ $result->total_marks }}</td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
