@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">              
                <div class="card-header">{{ __('Exams List') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6 col-md-offset-3">
                    <div id="accordion">
                        @if($exam_lists->exams->isNotEmpty())
                        <div class="panel list-group">
                        <!-- panel class must be in -->
                            @foreach($exam_lists->exams as $exam)
                            <a href="#web_dev" data-parent="#accordion" data-toggle="collapse" class="list-group-item">
                                <h4>{{ $exam->title }}</h4>
                            </a>
                            <div class="collapse" id="web_dev">
                                <ul class="list-group-item-text">
                                    
                                    <a class="btn btn-sm btn-primary" href="{{ route('exam.appear', ['id' => $exam->id])  }}"><i class="far fa-edit"></i> Appear</a>
                                    
                                </ul>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="panel list-group">
                            No Exams Assigned.
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection