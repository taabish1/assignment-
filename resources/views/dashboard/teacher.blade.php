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
                            <th scope="col">ID</th>
                            <th scope="col">List Name</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Students</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('student.list')}}"><i class="far fa-edit"></i> List</a>
                                <a class="btn btn-sm btn-success" href="{{ route('student.create') }}"><i class="far fa-edit"></i> Create</a>    
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Questions</td>
                            <td>
                                {{-- <a class="btn btn-sm btn-primary" href="#"><i class="far fa-edit"></i> List</a> --}}
                                <a class="btn btn-sm btn-success" href="{{ route('question.create') }}"><i class="far fa-edit"></i> Create</a>    
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Exams</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('exam.list') }}"><i class="far fa-edit"></i> List</a>
                                <a class="btn btn-sm btn-success" href="{{ route('exam.create') }}"><i class="far fa-edit"></i> Create</a>    
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">4</th>
                            <td>Assign Exams</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('exam.assign') }}"><i class="far fa-edit"></i> Go</a>    
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">5</th>
                            <td>View Results</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('results.list') }}"><i class="far fa-edit"></i> Go</a>    
                            </td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
