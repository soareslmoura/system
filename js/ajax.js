



$.ajax({
   url:   'System.php',
   type:  'POST', // DECIDA SE USARÁ POST OU GET
   data:  {geraSenha(6, true, true, true)}, //CASO A FUNCAO RECEBA PARAMETROS, PASSE ELES AQUI
   error: function() {
         alert('Erro ao tentar ação!');
   },
   success: function(resposta) { 
         alert(resposta);
   },
   beforeSend: function() { //caso queira fazer algo entre o envio e o recebimento no server
   }
});