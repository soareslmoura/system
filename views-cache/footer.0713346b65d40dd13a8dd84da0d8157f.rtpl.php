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
<!-- DatetimePicker -->
<script src="/vendor/bootstrap-datetimepicker-master/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="/vendor/moment-develop/moment.js"></script>  
<script src="/vendor/bootstrap/js/transition.min.js"></script>
<script src="/vendor/bootstrap/js/collapse.js"></script>   

<!-- datepicker -->
<link rel="stylesheet" href="/vendor/jquery-ui-1.12.1/jquery-ui.css" />
<script src="/vendor/jquery-ui-1.12.1/jquery-ui.js"></script> 

<script>
  
  jQuery(function($){  
   $("#user_cel").mask("(99) 99999-9999");
   $("#user_cep").mask("99.999-999");
  
	});



  $(function(){

    $('#divG').hide();
    $('#divD').hide();
      
      $('#D').click(function(e) {
        $('#divD').show();
        $('#divG').hide();        
      });
      $('#G').click(function(e) {
        $('#divD').hide();
        $('#divG').show();        
      });
  }); 

  
  $(function(){

    $('#divGindividual').hide();
    $('#divDindividual').hide();
      
      $('#Dindividual').click(function(e) {
        $('#divDindividual').show();
        $('#divGindividual').hide();        
      });
      $('#Gindividual').click(function(e) {
        $('#divDindividual').hide();
        $('#divGindividual').show();        
      });
  });

  $(function() {
    $( "#validadegeral" ).datepicker({
    	dateFormat: 'dd/mm/yy',
    	showOtherMonths: true,
        selectOtherMonths: false,
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
    });
});

  $(function() {
    $( "#validadeindividual" ).datepicker({
    	dateFormat: 'dd/mm/yy ',
    	showOtherMonths: true,
        selectOtherMonths: false,
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
    });
}); 
    

</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>