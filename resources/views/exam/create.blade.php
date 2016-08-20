@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-offset-2 col-md-8">
        
      {!! Form::open(['route' => 'exam.store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'app']) !!}
        
        <!-- Select a subject -->
        <div class="form-group">
          {!! Form::label('subject', 'Select subject', ['class' => 'col-xs-3 control-label']) !!}
          <div class="col-xs-9">
            <select class="form-control" id="subject" name="subject_id" v-on:change="updateChapters" v-model="selectedSubject">
              <option value="" disabled selected>Select a subject</option>
              @foreach ($userSubjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
              @endforeach
            </select>
          </div>
        </div>
        
        <!-- Select a chapter -->
        <div class="form-group">
          {!! Form::label('chapter', 'Chapter name', ['class' => 'col-xs-3 control-label']) !!}
          <div class="col-xs-9">
            <select class="form-control" name="chapter_id" id="chapterId" :disabled="subjects.length == 0" v-on:change="modifyTitle" v-model="selectedChapter">
              <option value="0" disabled selected>Select a chapter</option>
              <option v-for="subject in subjects" v-bind:value="subject.id">
                @{{ subject.chapter }}
              </option>
            </select>
          </div>
        </div>
        
        <!-- Exam name -->
        <div class="form-group">
          {!! Form::label('title', 'Title', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-9">
            {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Exam Title']) !!}
          </div>
        </div>
        
        <!-- Specify number of questions -->
        <div class="form-group">
          {!! Form::label('questions', 'Questions', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-9">
            {!! Form::number('questions', 10, ['class' => 'form-control', 'min' => '1']) !!}
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

@section ('scripts')
<script type="text/javascript">
new Vue({
  
  ready() {

  },
  
  el: '#app',
  data: {
    selectedSubject: null,
    selectedChapter: null,
    subjects: []
  },
  methods: {
    updateChapters: function (event) {
      // Retrieve json data related to chapter
      this.$http.get('/api/chapters/' + this.selectedSubject).then((response) => {
        
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
    modifyTitle: function (event) {
      subjectName = $("#subject option[value='" + this.selectedSubject + "']").text().trim();
      chapterName = $("#chapterId option[value='" + this.selectedChapter + "']").text().trim();
      $('#title').val(subjectName + " " + chapterName + ' Exam');
    }
  }
})
</script>
@endsection