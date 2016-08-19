@extends('layouts.app')

@section('content')
  
  
  <ul class="nav nav-tabs">
    @foreach ($userSubjects as $key => $subject)
        <li role="presentation" class="{{ $showSubject->id == $subject->id ? 'active' : '' }}"><a href="#">{{ $subject->subject }}</a></li>
    @endforeach
  </ul>
  
  <!-- content -->
  <div class="content">
    
    <div class="row buffer-top">
      
      <div class="col-sm-4">
        <h3 class="nm-top">Exam #1</h3>
        <p><h4 class="text-muted">1 out of 20 questions</h4></p>
      </div>
      
      <div class="col-sm-6 text-center">
        <h4 class="complete-progress">60%</h4>
        <small>PROGRESSING</small>
      </div>
      
      <div class="col-sm-2 text-center">
        <a href="#" class="btn btn-primary btn-sm continue-exam">Resume...</a>
        <p class="cancel-exam"><a href="#" class="small">End exam</a></p> 
      </div>
      
    </div>
    
    <div class="row buffer-top">
      
      <div class="col-sm-4">
        <h3 class="nm-top">Exam #1</h3>
        <p><h4 class="text-muted">20 out of 20 questions</h4></p>
      </div>
      
      <div class="col-sm-6 text-center">
        <h4 class="complete-progress">100%</h4>
        <small>COMPLETED</small>
      </div>
      
      <div class="col-sm-2 text-center">
         <p class="small text-muted nm-bottom">Exam Ended</p>
         <p class="small text-muted nm-top"><a href="#">View Results</a></p>
      </div>
      
      
    </div>
    
    <!-- -->
    <div class="row buffer-top">
      <div class="col-xs-12 text-center">
        <a href="#" class="btn btn-sm btn-primary">Create a quick examination</a>
      </div>
    </div>
    
  </div>
      
@endsection
