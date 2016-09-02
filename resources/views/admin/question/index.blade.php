@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        
      <table class="table buffer-down">
        <thead>
          <tr>
            <th class="col-xs-1">Set ID</th>
            <th class="col-xs-2">Chapter</th>
            <th class="col-xs-6">Question</th>
            <th class="col-xs-2">Choices</th>
            <th class="col-xs-1">Options</th>
          </tr>
        </thead> 
        
        <tbody> 
          @forelse ($questions as $question)
              <tr>
                <td>{{ $question->questionsets->id }}</td>
                <td>{{ $question->questionsets->chapter->chapter }}</td>
                <td>{!! $question->information() !!}</td>
                <td>
                  @foreach ($question->choices as $choice)
                    <span class="{{ $choice->id == $choice->question->choices[0]->id ? 'text-success' : 'text-danger' }}">{{ $choice->choice }}</span><br>
                  @endforeach
                </td>
                <td>
                  {!! Form::open(['route' => ['admin.question.destroy', $question->id], 'method' => 'delete']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-link pull-right']) !!}
                  {!! Form::close() !!}
                </td>
              </tr> 
          @empty
            <tr>
              <td colspan="4" class="text-center">No questions to show</td>
            </tr>
          @endforelse
          
        </tbody> 
      </table>
    
      <div class="text-center">{{ $questions->links() }}</div>

    </div>
  </div>
@endsection
