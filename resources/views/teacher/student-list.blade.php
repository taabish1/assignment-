@extends('layouts.app')

@section('content')

<div class="container">
  <h2>Students List</h2>
  <ul class="list-group">
  	@foreach($students as $student)
    <li class="list-group-item">
    	<div>
    		{{ $student->name }}
    	</div>
		<a class="btn btn-sm btn-primary" href="{{ route('student.edit', ['id' => $student->id]) }}"><i class="far fa-edit"></i> Edit</a>
    </li>
    @endforeach
  </ul>
</div>

@endsection