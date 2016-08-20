@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        
      <!-- Select a subject -->
      <div class="form-group">
        {!! Form::select('subjectId', $subjects, null, ['class' => 'form-control input-lg', 'id' => 'subject']) !!}
      </div>
    
      <!-- Select a subject -->
      <div class="form-group">
        {!! Form::select('subjectId', $subjects, null, ['class' => 'form-control input-lg', 'id' => 'subject']) !!}
      </div>
    
    
      <h1>TODO...</h1>

    

    </div>
  </div>
@endsection
