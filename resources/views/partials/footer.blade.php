<!-- core js -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/vue.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(){
   var menu = $('.mob-menu');
   var menuIcon = $('.ico');
     $('.mob-nav-item a').click(function(){
        if(menu.is(':visible')){
          $('.mob-menu').fadeOut();
          menuIcon.addClass('glyphicon-menu-hamburger').fadeIn();
          menuIcon.removeClass('glyphicon-remove');
        }else{
          $('.mob-menu').fadeIn();
          menuIcon.removeClass('glyphicon-menu-hamburger');
          menuIcon.addClass('glyphicon-remove');
        }
    });
 });
</script>

<!-- Sweet Alert -->
<script src="{{ asset('js/sweetalert-dev.js') }}"></script>
@include('sweet::alert')
