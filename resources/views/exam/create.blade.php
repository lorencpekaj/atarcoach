@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-offset-2 col-md-8">
        
      {!! Form::open(['route' => 'exam.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
        
        <!-- Select a subject -->
        <div class="form-group">
          {!! Form::label('subjects', 'Select subject', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-9">
            {!! Form::select('subjects', $userSubjects, null, ['class' => 'form-control', 'id' => 'subjects']) !!}
          </div>
        </div>
        
        <!-- TODO: check if subject selected has chapters using VUE -->
        <div class="form-group">
          {!! Form::label('chapters', 'Select chapter', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-9">
            {!! Form::select('chapters', $userSubjects, null, ['class' => 'form-control', 'id' => 'chapters']) !!}
          </div>
        </div>
        
        <!-- Specify number of questions -->
        <div class="form-group">
          {!! Form::label('questions', 'Questions', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-9">
            {!! Form::number('questions', 10, ['class' => 'form-control', 'id' => 'chapters', 'min' => '1']) !!}
          </div>
        </div>
        
        <!-- Options -->
        <div class="form-group">
          {!! Form::label('questions', 'Options', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-9">
            
            <div class="checkbox">
              <label>
                <input type="checkbox" value="">
                Ignore questions you have already done
              </label>
            </div>
            
          </div>
        </div>
        
        <!-- Submit -->
        <div class="row">
          <div class="col-sm-offset-9 col-sm-3">
            {!! Form::submit('Create Exam', ['class' => 'btn btn-primary btn-block']) !!}
          </div>
        </div>
                    
      {!! Form::close() !!}
    


    </div>
  </div>
@endsection
