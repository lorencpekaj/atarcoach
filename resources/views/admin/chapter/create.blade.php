@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-offset-1 col-md-9">
        
      {!! Form::open(['route' => 'admin.chapter.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
        
        <!-- Select a subject -->
        <div class="form-group">
          {!! Form::label('subject', 'Select subject', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-9">
            {!! Form::select('subjectId', $subjects, null, ['class' => 'form-control', 'id' => 'subject']) !!}
          </div>
        </div>
        
        <!-- chapter name -->
        <div class="form-group">
          {!! Form::label('chapter', 'Chapter name', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-9">
            {!! Form::text('chapter', null, ['class' => 'form-control', 'id' => 'chapter', 'placeholder' => 'Chapter']) !!}
          </div>
        </div>
        
        <!-- display order -->
        <div class="form-group">
          {!! Form::label('sort', 'Display order position', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-9">
            {!! Form::number('sort', 0, ['class' => 'form-control', 'id' => 'sort', 'min' => 0]) !!}
          </div>
        </div>
        
        <!-- Submit -->
        <div class="row">
          <div class="col-sm-offset-9 col-sm-3">
            {!! Form::submit('Create Chapter', ['class' => 'btn btn-primary btn-block']) !!}
          </div>
        </div>
                    
      {!! Form::close() !!}
    


    </div>
  </div>
@endsection
