

/* mascara form */

$(document).ready(function() {    
    $(function() {
     $('.date').mask('00/00/0000');
    $('.time').mask('00:00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('#cep').mask('00000-000');
    $('#cpf').mask('000.000.000-00');
    $('#telefone').mask('000000000');
    $('#ddd').mask('00');
    $('.phone').mask('0000-0000');
    $('.phone_with_ddd').mask('(00) 0000-0000');
    $('.ddd').mask('(00)');
    $('.mixed').mask('AAA 000-S0S');
    $('.ip_address').mask('099.099.099.099');
    $('.percent').mask('##0,00%', {reverse: true});
    $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
    $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});    
    $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});  
    $('.cpf').mask('000.000.000-00', {reverse: true});
  });

  if($('#quantidade').val() > 1 ){
      var valor = $('#quantidade').val() * parseFloat(valor_consulta);
      $('#valor-consulta').html( 'R$ ' + (number_format(valor, 2, ',', '.')) );
  }
    
});

/* fim mascara form */

// scroll barra flutuante

var barra = 0;

$(window).scroll(function () {
    
    var barra = $(this).scrollTop();
    
    if (barra > 380) {
       
       $(".barra-flutuante").slideUp('fast');
    } 

    else {
       
       $(".barra-flutuante").slideDown('fast');
    }
});


/**
* @todo funcao que envia as requisições em ajax do sistema
*/
$(document).on('click', 'form button', function(){
   var id = $(this).parents('form').attr('id');
   var button = $(this).parent('.form-group');
   //pre loader
   
   $('#sg-loader').fadeIn(500);
   
   // bind form using ajaxForm 
   $('#' + id ).ajaxForm({ 
       // dataType identifies the expected content type of the server response 
       dataType:  'json', 
       // success identifies the function to invoke when the server response 
       // has been received 
       success:   function (data){           
           tratarJSON(data);           
       }
   }); 
   //fim pre loader
   $(document).ajaxError(function() {
          $('#sg-loader').fadeOut(500);
   });

   $.ajaxSetup({
       async: true
   });
});

/**
 * FINALIZAR O PEDIDO
 */

$(document).on('click', '#btn-finalizar-pedido', function(){
    
        var cupom      = $('#cupom').val();
    
        $('#sg-loader').fadeIn(500);
    
        $.ajax({
            url: web_root + 'webservices/comprarCreditos',
            data:{
                cupom     : cupom,
            },
            type: 'post',
            dataType: 'json',
            success: function(data, textStatus, jqXHR) {
                tratarJSON( data );
            }
        }); 
      
        //fim pre loader
        $(document).ajaxError(function() {
               $('#sg-loader').fadeOut(500);
        });    
});


/**
 * QUANTIDADE E VALOR DO PRODUTO
 */
$(document).on('keyup', '#quantidade', function(){
    
    var quantidade = $(this).val();
    
    if( quantidade !== null || quantidade !== '')
    {
        
        var valor = quantidade * parseFloat(valor_consulta);
        $('#valor-consulta').html( 'R$ ' + (number_format(valor, 2, ',', '.')) );
        
    }   
    
});



/*
$(document).ready(function(){

  $("body").on("click", ".abre-modal-relatorio", function(){

    var ativo = null;

    function verifica(){
      ativo = $(".iframe-desktop:visible").size();

    if(ativo == 1){
      $("#sg-loader").hide();
    }

  }
    setInterval (verifica, 1);

  });

});
*/




