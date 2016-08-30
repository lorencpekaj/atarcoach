@extends('layouts.admin')

@section ('header_scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endsection

@section('content')
<div class="row">
    <div class="col-md-offset-1 col-md-9">
        
      {!! Form::open(['route' => 'admin.question.store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'app']) !!}
        
        <!-- Select a subject -->
        <div class="form-group">
          {!! Form::label('subject', 'Select subject', ['class' => 'col-xs-3 control-label']) !!}
          <div class="col-xs-9">
            <select class="form-control" id="subject" name="subject_id" v-on:change="updateChapters" v-model="selectedChapter">
              <option value="" disabled selected>Select a subject</option>
              @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
              @endforeach
            </select>
          </div>
        </div>
        
        <!-- Select a chapter -->
        <div class="form-group">
          {!! Form::label('chapter', 'Chapter name', ['class' => 'col-xs-3 control-label']) !!}
          <div class="col-xs-9">
            <select class="form-control" name="chapter_id" id="chapterId" :disabled="subjects.length == 0">
              <option value="0" disabled selected>Select a chapter</option>
              <option v-for="subject in subjects" v-bind:value="subject.id">
                @{{ subject.chapter }}
              </option>
            </select>
          </div>
        </div>
        
        <!-- Textarea -->
        <div class="form-group">
          {!! Form::label('information', 'Question', ['class' => 'col-xs-3 control-label', 'id' => 'chapter']) !!}
          <div class="col-xs-9">
            {!! Form::textarea('information', null, ['placeholder' => 'Write your question here', 'style' => 'height: 300px']) !!}
          </div>
        </div>
        
        <hr>
        
        <div class="form-group">
          {!! Form::label('choice', 'Multiple choices', ['class' => 'col-xs-3 control-label', 'id' => 'chapter']) !!}
          <div class="col-xs-9">
            @for ($i = 1; $i != 5; $i++)
              <div style="padding-bottom: 10px">
                {!! Form::text('choice[]', null, ['class' => 'form-control', 'placeholder' => "Choice {$i}"]) !!}
              </div>
            @endfor
            <p class="text-muted">The first choice will be the solution.</p>
          </div>
        </div>
        
        <hr>
        
        <!-- Question set -->
        <div class="form-group">
          {!! Form::label('question_set', 'Question set', ['class' => 'col-xs-3 control-label', 'id' => 'question_set']) !!}
          <div class="col-xs-9">
            {!! Form::text('question_set', null, ['class' => 'form-control', 'placeholder' => 'Ignore if this question is unique', 'id' => 'question_set', 'v-on:change' => 'changeQuestionSet', 'v-model' => 'selectedQuestionSet']) !!}
          </div>
        </div>
        
        <!-- Textarea -->
        <div class="form-group" id="question-set" hidden>
          {!! Form::label('set_information', 'Question', ['class' => 'col-xs-3 control-label', 'id' => 'chapter']) !!}
          <div class="col-xs-9">
            {!! Form::textarea('set_information', null, ['placeholder' => 'Write your question here', 'style' => 'height: 300px', 'v-model' => 'questionSet', 'v-on:change' => 'updateQuestionSet']) !!}
          </div>
        </div>
        
        <!-- Submit -->
        <div class="row">
          <div class="col-xs-offset-9 col-xs-3">
            {!! Form::submit('Create question', ['class' => 'btn btn-primary btn-block']) !!}
          </div>
        </div>
                    
      {!! Form::close() !!}
    


    </div>
  </div>
@endsection

@section ('scripts')
<script type="text/javascript">
new Vue({
  
  el: '#app',
  data: {
    questionSet: null,
    selectedQuestionSet: null,
    selectedChapter: null,
    subjects: []
  },
  methods: {
    updateChapters: function (event) {
    
    
      // Retrieve json data related to chapter
      this.$http.get('/api/chapters/' + this.selectedChapter).then((response) => {
        
          this.$set('subjects', response.json())
          
          // Set the first chapter to be automatically selected
          if (this.subjects.length != 0) {
            $("#chapterId").val($("#chapter option:second").val());
          } else { 
            $("#chapterId").val(0);
          }
          
  
      }, (response) => {
        alert("Could not load chapters. Please reload page.");
      });
      
    },
    
    changeQuestionSet: function (event) {
      
      this.$http.get('/api/question_set/' + this.selectedQuestionSet).then((response) => {
        
        var questionSetData = response.json();
        
        // Check if value question set was found
        if (Object.keys(questionSetData).length === 0) {
          $('#question-set').hide();
          alert('Unable to identify question set.');
        } else {
          $('#question-set').show();
          this.$set('questionSet', questionSetData.information);
        }
        
      });
      
    },
    
    updateQuestionSet: function (event) { 
      // Whenever the textarea is changed, save the question set
      this.$http.get('/api/question_set/' + this.selectedQuestionSet + '/update?information=' + this.questionSet).then((response) => {
        alert('Question set has been saved!');
      });
    }
  }
})

</script>

<script>
var simplemde = new SimpleMDE();
</script>
@endsection