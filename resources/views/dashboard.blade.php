@extends('layouts.app')

@section('content')
  
  <div class="content">
    
    <div class="row buffer-down">
      <div class="col-md-12">
        <h2>Your recent exams</h2>
      </div>
    </div>
    
    @forelse ($exams as $exam)
      <div class="row buffer-top">
        
        <div class="col-sm-6">
          <h4 class="nm-top">{{ $exam->title }}</h4>
          <p>Updated {{ $exam->updated_at->diffForHumans() }}</p>
        </div>
        
        @if ($exam->completed())
          <div class="col-sm-4 text-center">
            <h4 class="complete-progress">100%</h4>
            <small>COMPLETED</small>
          </div>
          
          <div class="col-sm-2 text-center">
            <span class="text-muted"><a href="{{ route('exam.results', $exam->id) }}">View Results</a></a>
            {!! Form::open(['method' => 'delete', 'route' => ['exam.destroy', $exam->id]]) !!}
              <p class="cancel-exam">{!! Form::submit('Destroy exam', ['class' => 'small btn-link']) !!}</p>
            {!! Form::close() !!}
          </div>
        @else
          <div class="col-sm-4 text-center">
            <h4 class="complete-progress">{{ number_format($exam->totalQuestions(true) / $exam->totalQuestions() * 100, 0) }}%</h4>
            <small>PROGRESSING</small>
          </div>
          
          <div class="col-sm-2 text-center">
            <a href="{{ route('exam.show', $exam->id) }}" class="btn btn-primary btn-sm continue-exam">Resume...</a>
            {!! Form::open(['method' => 'delete', 'route' => ['exam.destroy', $exam->id]]) !!}
              <p class="cancel-exam">{!! Form::submit('Destroy exam', ['class' => 'small btn-link']) !!}</p>
            {!! Form::close() !!}
          </div>
        @endif
        
      </div>
    @empty
      <h4>There are no exams to show. <a href="{{ route('exam.create') }}">Create one?</a></h4>
    @endforelse
    
    <!-- Create another exam? -->
    <div class="row buffer-top">
      <div class="col-xs-12 text-center">
        {{ $exams->links() }}
      </div>
    </div>
    
  </div>
      
@endsection
