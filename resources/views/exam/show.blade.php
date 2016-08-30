@extends('layouts.app')

@section('content')
<div id="app">
  {!! Form::open(['route' => ['exam.question.progress', $exam->id, $questionSet->id], 'method' => 'POST']) !!}
  
    @if (is_null($questionSet->information) == false)
      <div class="text-center">
        <p><h3>{!! $questionSet->information() !!}</h3></p>
        <hr>
      </div>
    @endif
    
    @foreach ($questions as $questionIndex => $question)
      <fieldset class="buffer-down">
        <div class="buffer-down text-center">
          <p><h4>{!! $question->information() !!}</h4></p>
        </div>
        
        <div class="form-group">
          @foreach ($question->choices->shuffle() as $choice)
            <div class="radio">
              <label>{!! Form::radio("choice[{$questionIndex}]", $choice->id) !!} {{ $choice->choice }}</label>
            </div>
          @endforeach
        </div>
      </fieldset>
      @endforeach
    
    <div class="form-group text-center">
      {!! Form::submit('Continue', ['class' => 'btn btn-lg btn-primary']) !!}
    </div>
    
  {!! Form::close() !!}
</div>
@endsection