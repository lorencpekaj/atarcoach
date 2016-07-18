@extends ('layouts.auth')

@section ('content')

    <div class="container container-auth">

        <div class="row">
            <div class="col-xs-12 text-center">
                <div class="ac-icon atar-logo"></div>
                <h4>Select your VCE subjects</h4>
            </div>
        </div>

        <div class="row select-subject buffer-top">
		    {!! Form::open(['url' => '/subject/select', 'method' => 'POST']) !!}
	            <div class="col-md-offset-3 col-md-4 col-sm-offset-2 col-sm-6 col-xs-12">

			        <div class="form-group">
			        	{!! Form::select('subjects[]', $subjects->lists('subject', 'id'), 0, ['class' => 'list-group', 'multiple']) !!}
			        </div>

			        <div class="form-group">
			        	{!! Form::submit('Continue...', ['class' => 'btn btn-atar btn-block']) !!}
			        </div>

	            </div>
	            <div class="col-sm-2 hidden-xs">
			        {!! Form::submit('Continue...', ['class' => 'btn btn-success btn-fixed hidden-xs']) !!}
	            </div>
		    {!! Form::close() !!}
        </div>

    </div>

@endsection

@section ('scripts')
<script src="https://cdn.jsdelivr.net/bootstrap.listgroup/1.1.2/listgroup.min.js"></script>

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
