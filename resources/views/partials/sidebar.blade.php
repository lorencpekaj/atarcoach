<!-- Sidebar -->
<div class="sidebar sidebar-left sidebar-light sidebar-visible-md-up si-si-3 ls-top-navbar-xs-up sidebar-transparent-md" id="sidebarLeft" data-scrollable>

	<div class="sidebar-heading">Home</div>

	<ul class="sidebar-menu">
		<li class="sidebar-menu-item{% if (slug === 'browse-courses') %} active{% endif %}">
			<a class="sidebar-menu-button" href="browse-courses.html">
				<i class="sidebar-menu-icon material-icons">search</i> Browse Courses
			</a>
		</li>
		<li class="sidebar-menu-item{% if (slug === 'view-course') %} active{% endif %}">
			<a class="sidebar-menu-button" href="view-course.html">
				<i class="sidebar-menu-icon material-icons">import_contacts</i> View Course
			</a>
		</li>
		<li class="sidebar-menu-item{% if (slug === 'take-course') %} active{% endif %}">
			<a class="sidebar-menu-button" href="take-course.html">
				<i class="sidebar-menu-icon material-icons">class</i> Take Course
				<span class="sidebar-menu-label label label-default">PRO</span>
			</a>
		</li>
		<li class="sidebar-menu-item{% if (slug === 'take-quiz') %} active{% endif %}">
			<a class="sidebar-menu-button" href="take-quiz.html">
				<i class="sidebar-menu-icon material-icons">dvr</i> Take a Quiz
			</a>
		</li>
		<li class="sidebar-menu-item{% if (slug === 'quiz-results') %} active{% endif %}">
			<a class="sidebar-menu-button" href="quiz-results.html">
				<i class="sidebar-menu-icon material-icons">poll</i> Quiz Results
			</a>
		</li>
		<li class="sidebar-menu-item{% if (slug === 'account-edit') %} active{% endif %}">
			<a class="sidebar-menu-button" href="account-edit.html">
				<i class="sidebar-menu-icon material-icons">account_box</i> Edit Account
			</a>
		</li>
		<li class="sidebar-menu-item{% if (slug === 'my-courses') %} active{% endif %}">
			<a class="sidebar-menu-button" href="my-courses.html">
				<i class="sidebar-menu-icon material-icons">school</i> My Courses
			</a>
		</li>
		<li class="sidebar-menu-item{% if (slug === 'chat') %} active{% endif %}">
			<a class="sidebar-menu-button" href="chat.html">
				<i class="sidebar-menu-icon material-icons">comment</i> Messages
				<span class="sidebar-menu-label label label-default">2</span>
			</a>
		</li>
		<li class="sidebar-menu-item{% if (slug === 'billing') %} active{% endif %}">
			<a class="sidebar-menu-button" href="billing.html">
				<i class="sidebar-menu-icon material-icons">monetization_on</i> Billing
				<span class="sidebar-menu-label label label-default">$25</span>
			</a>
		</li>
		<li class="sidebar-menu-item">
			<a class="sidebar-menu-button" href="{{ url('/logout') }}">
				<i class="sidebar-menu-icon material-icons">lock_open</i> Logout
			</a>
		</li>
	</ul>

	@if ($user->is_admin)
		<div class="sidebar-heading text-danger">Admin</div>

		<ul class="sidebar-menu">
			<li class="sidebar-menu-item">
		        <a class="sidebar-menu-button" href="instructor-courses.html">
		          <i class="sidebar-menu-icon material-icons">import_contacts</i> Subject Manager
		        </a>
	      	</li>
	  	</ul>
	@endif

</div>
<!-- // END Sidebar -->
