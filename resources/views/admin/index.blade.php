@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-offset-3 col-md-6">
      
      <h3 class="rm-top">Chapters</h3>
      
      <div class="list-group">
        <a href="{{ route('admin.chapter.index') }}" class="list-group-item">View all chapters</a>
        <a href="{{ route('admin.chapter.create') }}" class="list-group-item">Create a chapter</a>
      </div>
      
      
      <h3 class="buffer-top">Questions</h3>
      
      <div class="list-group">
        <a href="{{ route('admin.chapter.create') }}" class="list-group-item">View questions</a>
        <a href="{{ route('admin.question.create') }}" class="list-group-item">Create a question</a>
      </div>
      
    </div>
    
</div>
@endsection
