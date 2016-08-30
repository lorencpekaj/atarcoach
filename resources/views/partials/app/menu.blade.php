<button type="button" class="btn {{ $menuStyle or "btn-atar" }} pull-right" data-toggle="modal" data-target=".bs-example-modal-sm">Menu</button>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="buffer-down text-center"><h3>Menu</h3></div>
      <div class="list-group">
          <a href="{{ url('/') }}" class="list-group-item">Homepage</a>
          <a href="{{ route('exam.create') }}" class="list-group-item">Create an exam</a>
          <a href="{{ route('usersubject.index') }}" class="list-group-item">Change VCE subjects</a>
          <a href="{{ url('/logout') }}" class="list-group-item">Logout</a>
      </div>
      
      <p class="text-muted text-center buffer-down"><small>AtarCoach &copy; {{ date("Y") }}</small></p>
    </div>
  </div>
</div>