@extends('layouts.app')

@section('content')
<div class="row buffer-down">
  <div class="col-md-12">
    <div class="text-center">
      <h2>You've scored <strong>{{ $percentageScore }}%</strong></h2>
      <h4 class="text-muted">Practice makes perfect.</h4>
    </div>
  </div>
</div>

<div class="row">
  
  <div class="col-md-12">
    
    <table class="table buffer-down">
      <caption>This exam was out of {{ $questionChoices->count() }} questions.</caption> 
      <thead>
        <tr>
          <th>Question</th>
          <th>Correct answer</th>
          <th>Your answer</th>
        </tr>
      </thead> 
      
      <tbody> 
        @foreach ($questionChoices as $choice)
            <tr>
              <td>{!! $choice->question->information() !!}</td>
              <td>{{ $choice->question->choices[0]->choice() }}</td>
              <td><div class="{{ $choice->id == $choice->question->choices[0]->id ? 'text-success' : 'text-danger' }}">{{ $choice->choice() }}</div></td>
            </tr> 
        @endforeach
      </tbody> 
    </table>
    
    <div class="buffer-top text-center">
      <a href="{{ route('exam.create') }}" class="btn btn-primary">Create another exam?</a>
    </div>
  </div>
  
</div>
@endsection