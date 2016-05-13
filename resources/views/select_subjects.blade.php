@extends ('layouts.app')

@section ('content')

<div class="row">
    <div class="col-md-12" id="subject-selection">

    	{!! Form::open(['url' => '/subject/select', 'method' => 'POST']) !!}
	        <div class="form-group">
	       		<h2>Select your VCE subjects</h2>
	        </div>

	        <div class="form-group">
	        	{!! Form::select('subjects[]', $subjects->lists('subject', 'id'), 0, ['class' => 'list-group', 'multiple']) !!}
	        </div>

	        <div class="form-group">
	        	{!! Form::submit('Select subjects', ['class' => 'btn btn-primary btn-md pull-right']) !!}
	        </div>
    	{!! Form::close() !!}


    </div>
</div>

@endsection

@section ('scripts')
<script src="https://cdn.jsdelivr.net/bootstrap.listgroup/1.1.2/listgroup.min.js"></script>
<script src="{{ asset('js/sweetalert-dev.js') }}"></script>

<script type="text/javascript">
	var apiUrlPrefix = '/atarcoach/public/';

	var vueInstance = new Vue({
	  el: '#subject-selection',
	  data: {
	    subjects: [],
	    selected: []
	  },
	  methods: {
	  	create: function (subject) {
	  		if (!this.isSelected(subject)) {
	  			this.selected.push(subject);
	  		} else {
	  			this.selected.splice(subject);
	  		}
	  	},
	  	isSelected: function (subject) {
	  		return this.selected.indexOf(subject) >= 0;
	  	}
	  },
	  ready: function () {
        this.$http.get(apiUrlPrefix + 'api/subjects', function (subjects) {
            this.$set('subjects', subjects);
        });
	  }
	})

</script>

@endsection
