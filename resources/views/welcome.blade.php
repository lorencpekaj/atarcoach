@extends ('layouts.auth')

@section ('content')
  <header class="landing">
    <nav id="navbar">
      <ul class="container">
        <li class="nav-item brand"><div class="atar-logo"></div></li>
        <!--<li class="nav-item">PRICING</li>-->
        <!--<li class="nav-item">LEARN</li>-->

        <li class="nav-item">CONTINUE LEARNING</li>
        <li class="nav-item">SIGN UP</li>

        <li class="mob-nav-item"><a href="#"><i class="ico glyphicon glyphicon-menu-hamburger"></i></a></li>

        <div class="mob-menu row">
          <div class="">
            <div class="col-xs-3 mob">
              <h4>HOW IT WORKS</h4>
            </div>
              <div class="col-xs-3 mob">
              <h4>LEARN</h4>
            </div>
              <div class="col-xs-3 mob">
              <h4>PRICING</h4>
            </div>
          </div>
        </div>
      </ul>
    </nav>

    <div class="container">
      <div class="row text-center">
        <div class="col-xs-12 prompt">
          <h1>Breeze through your exams</h1>
          <h2>ATARCoach prepares you for your final exams in the best way possible</h2>

          <a href="/register" class="btn btn-lg btn-atar">Get started</a>
        </div>
      </div>

    </div>
  </header>

  <section class="why-atar skew-neg">

    <div class="container skew-pos">
      <div class="row buffer-down">
        <div class="col-xs-12">
          <h2 class="text-center">The benefits of atarcoach</h2>
        </div>
      </div>

      <div class="row text-center buffer-down">
        <div class="col-xs-12 col-sm-4">
          <i class="ac-icon large science"></i>
          <h3>Feedback on your results</h3>
          <p class="text-muted">Get personalised feedback on your quiz results, using our SmartResults system</p>
        </div>
        <div class="col-xs-12 col-sm-4">
          <i class="ac-icon large science"></i>
          <h3>Do better on your exams</h3>
          <p class="text-muted">Get personalised feedback on your quiz results, using our SmartResults system</p>
        </div>
        <div class="col-xs-12 col-sm-4">
          <i class="ac-icon large science"></i>
          <h3>Progressive learning</h3>
          <p class="text-muted">Get personalised feedback on your quiz results, using our SmartResults system</p>
        </div>
      </div>

      <div class="row buffer-up">
        <div class="col-xs-12">
          <h2 class="text-center"><p>How atarcoach works</p> <small>an overview on how to use our system</small></h2>
        </div>
      </div>

      <div class="row buffer-up">
        <div class="col-xs-12">

            <div class="container">
              <ul class="timeline">
                  <li class="timeline-inverted">
                    <div class="timeline-badge"><div class="dot"></div></div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h3 class="timeline-title">Sign up for free</h3>
                      </div>
                      <div class="timeline-body">
                        <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. </p>

                        <div class="timeline-btn"><a href="#" class="btn btn-warning text-center">Sign up here</a></div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="timeline-badge"><div class="dot"></div></div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <i class="ac-icon school"></i>
                        <h3 class="timeline-title">Access your questions</h3>
                      </div>
                      <div class="timeline-body">
                        <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis.</p>
                      </div>
                    </div>
                  </li>
                  <li class="timeline-inverted">
                    <div class="timeline-badge"><div class="dot"></div></div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <i class="ac-icon school-1"></i>
                        <h3 class="timeline-title">Practice makes perfect</h3>
                      </div>
                      <div class="timeline-body">
                        <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="timeline-badge"><div class="dot"></div></div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <i class="ac-icon diploma"></i>
                        <h3 class="timeline-title">Take your exam</h3>
                      </div>
                      <div class="timeline-body">
                        <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. </p>
                      </div>
                    </div>
                  </li>
              </ul>
          </div>

        </div>
      </div>

      <div class="row buffer-up">
        <div class="col-xs-12 text-center">
          <h3>Never get nervous before your exam again</h3><br>
          <a href="#" class="btn btn-lg btn-primary">Get started</a>
        </div>
      </div>

    </div>

  </section>

  <section class="subjects skew-neg">

    <div class="container skew-pos">

      <div class="row buffer-up">
        <div class="col-xs-12 text-center">
          <h2>What's available?</h2>

          <div class="row subject-list h3">
            <div class="col-sm-4">Further Mathematics</div>
            <div class="col-sm-4">Specialist Mathematics</div>
            <div class="col-sm-4">Physics</div>
          </div>

        </div>
      </div>

    </div>

  </section>

  <footer class="text-center">
    <div class="container">
        <p>&copy; Atarcoach 2016 &bullet; Made by students, for students. </p>
    </div>
  </footer>
@endsection
