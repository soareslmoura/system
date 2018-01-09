
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});


 jQuery(function($){  
   $("#user_cel").mask("(99) 99999-9999");
   $("#user_cep").mask("99.999-999");
  
    });



  $(function(){

    $('#share').hide();
    $('#ticket').hide();
      
      $('#porshare').click(function(e) {
        $('#share').show();
        $('#ticket').hide();        
      });
      $('#porticket').click(function(e) {
        $('#share').hide();
        $('#ticket').show();        
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
