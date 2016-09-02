@extends ('layouts.auth')

@section ('content')
  <header class="landing">
    <nav id="navbar">
      <ul class="container">
        <li class="nav-item brand"><div class="atar-logo"></div></li>
        
        <!-- TODO: fix navbar -->

        <li class="nav-item"><a href="/login">CONTINUE LEARNING</a></li>
        <li class="nav-item"><a href="/register">SIGN UP</a></li>

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
          <h3>Review your results</h3>
          <p class="text-muted">See what you're getting wrong with particular chapters and work to address them.</p>
        </div>
        <div class="col-xs-12 col-sm-4">
          <i class="ac-icon large science"></i>
          <h3>Do better on your exams</h3>
          <p class="text-muted">Practice equations from random VCAA examinations and prepare yourself for all questions.</p>
        </div>
        <div class="col-xs-12 col-sm-4">
          <i class="ac-icon large science"></i>
          <h3>Progressive learning</h3>
          <p class="text-muted">Target specific chapters among your subjects and identify weaknesses early and easily.</p>
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
                        <p>ATARCoach has always been a free service for students that has been developed by students to enhance their learning.</p>

                        <!--<div class="timeline-btn"><a href="/register" class="btn btn-warning text-center" style="z-index:99999;display:block;width:108px;height:32px;">Sign up here</a></div>-->
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="timeline-badge"><div class="dot"></div></div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <i class="ac-icon school"></i>
                        <h3 class="timeline-title">Review your subjects</h3>
                      </div>
                      <div class="timeline-body">
                        <p>Practice exams from different subjects and identify your strengths and weaknesses of each chapter easily.</p>
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
                        <p>Practice an unlimited number of times and continously make improvements with subjects that require attention effectively.</p>
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
                        <p>Choose the number of questions you want to do and complete an exam in the most fashionable and easiest way possible.</p>
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
          <a href="/register" class="btn btn-lg btn-primary">Get started</a>
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
            @forelse ($subjects as $subject)
            <div class="col-sm-6">{{ $subject->subject }}</div>
            @empty
            <div class="col-sm-12">Nothing to show :(</div>
            @endforelse
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
