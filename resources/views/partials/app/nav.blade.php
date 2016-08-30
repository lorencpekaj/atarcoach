<nav class="header">
  
  <div class="container">
    
    <div class="row">
      <div class="col-md-3">
        <a href="{{ url('/') }}"><div class="atar-logo"></div></a>
      </div>
      
      <div class="col-md-9">
        @include ('partials/app/menu')
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12 text-center">
        <h2 class="app-heading"><strong>{{ $appHeading or "" }}</strong></h2>
        <h2><small>{{ $appSubheading or "" }}</small></h2>
      </div>
    </div>
    
  </div>
  
</nav>