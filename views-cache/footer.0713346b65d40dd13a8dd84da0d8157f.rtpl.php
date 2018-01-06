<?php if(!class_exists('Rain\Tpl')){exit;}?> 

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="/res/master/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/res/master/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/res/master/dist/js/adminlte.min.js"></script>
<!-- MASKED INPUT PLUGIN -->
<script src="/js/maskedinput.js"></script>

<script>
  
  jQuery(function($){  
   $("#user_cel").mask("(99) 99999-9999");
   $("#user_cep").mask("99.999-999");
  
});

</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>