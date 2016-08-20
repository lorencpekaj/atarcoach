<!-- core js -->
<script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/vue.js') }}"></script>
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>

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
