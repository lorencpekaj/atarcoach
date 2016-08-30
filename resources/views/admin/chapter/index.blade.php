@extends('layouts.admin')

@section('content')
<div class="row" id="app">
    <div class="col-md-12">
   
      @foreach ($subjects as $subject)
      
        <div class="row buffer-down">
          <div class="col-xs-12">
            <h2>{{ $subject->subject }}</h2>
            
            @forelse ($subject->chapters as $chapter)
              <div class="row">
                <div class="col-md-9">
                  <h4>{{ $chapter->chapter }} <small class="text-muted">(Sort: {{ $chapter->sort }})</small></h4>
                </div>
                <div class="col-md-3">
                  {!! Form::open(['route' => ['admin.chapter.destroy', $chapter->id], 'method' => 'delete']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-link pull-right']) !!}
                  {!! Form::close() !!}
                </div>
              </div>
            @empty
            <h4><i>Nothing to show</i></h4>
            @endforelse
          </div>
        </div>
      
      @endforeach
    

    </div>
  </div>
@endsection