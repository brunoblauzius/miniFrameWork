function buscarCepLogradouro( cep ){
    if( cep !== null || cep !== '' ){
    
        $('#tbody-dados').empty();
        $('#resultados-cep').hide();
        removeLoader();
        min_loader('#modal-body');
        
        
        $.ajax({
            url: web_root + 'webservices/cep',
            data:{
                cep: cep,
            },
            type: 'post',
            dataType: 'json',
            success: function(data, textStatus, jqXHR) {

                if( data.erro === false){

                    var consulta = data.resultado;
                    var elemento = '';

                    $.each(data.resultado, function(key, value){

                         elemento += '<tr>';
                         elemento += '<td>'+value.logradouro+' , '+value.cidade+' , '+value.bairro+', '+value.uf+'</td>';
                         elemento += '<td>'+value.cep+'</td>';
                         elemento += '<td>'+
                                        '<span style="color:#FFF; font-size: 18px; cursor:pointer;" data-cep="'+value.cep+'" data-logradouro="'+value.logradouro+'" data-cidade="'+value.cidade+'" data-bairro="'+value.bairro+'" data-uf="'+value.uf+'"  class="add-cep"><i class="fa fa-plus-circle"></i></span>'+
                                     '</td>';
                         elemento += '</tr>';
                    });

                    removeLoader();
                    $('#resultados-cep').show();
                    $( elemento ).appendTo( '#tbody-dados' );
                    

                } else {
                    removeLoader();
                    $('#tbody-dados').empty();
                    $('#resultados-cep').show();
                    var elemento = '<tr>\n\
                                    <td colspan="3">'+data.mensagem+'</td>\n\
                                    </tr';
                    $( elemento ).appendTo( '#tbody-dados' );
                }
            }
        }); 
    }
}

$(document).ready(function(){
    
    $('#cep').change(function(){
        
        var cep = $(this).val();
        
        if( cep !== null || cep !== '' ){
            $.ajax({
                url: web_root + 'webservices/cep',
                data:{
                    cep: cep,
                },
                type: 'post',
                dataType: 'json',
                success: function(data, textStatus, jqXHR) {
                    
                    if( data.erro === false){
                        
                        var consulta = data.resultado[0];
                        
                        $('#logradouro').val(consulta.logradouro );
                        $('#cidade').val(consulta.cidade );
                        $('#bairro').val(consulta.bairro );
                        $('#uf').val(consulta.uf );
                        
                        $('.btn-cep').hide(100);
                        $('#dados-endereco').show(300);
                        
                    } 
                }
            }); 
        }
    });
    
    
    $('#btn-consultar-cep').click(function (){
        var cep = $('#campo-busca-cep').val();
        buscarCepLogradouro( cep );
    });
    
    $('#campo-busca-cep').keypress(function ( event ){
        var cep = $(this).val();
        if( event.which === 13 ){
            buscarCepLogradouro( cep );
        }
    });
    
    
    $(document).on('click','.add-cep', function(){
       
        var logradouro = $(this).data('logradouro');
        var uf = $(this).data('uf');
        var cidade = $(this).data('cidade');
        var bairro = $(this).data('bairro');
        var cep = $(this).data('cep');
        
        $('#logradouro').val(logradouro );
        $('#cidade').val(cidade );
        $('#bairro').val(bairro);
        $('#uf').val(uf);
        $('#cep').val(cep);
        
        $('.btn-cep').hide(100);
        $('#dados-endereco').show(300);
        $('#resultados-cep').hide();
        $('#tbody-dados').empty();
        $('#ModalBuscaCep').modal('hide');
        
    });
    
    
    $('#cpf').change(function(){
       var documento = $(this).val();
       $this = $(this);
       
       if( documento !== null && documento !== ''){
           
           $.ajax({
                url: web_root + 'webservices/consultaDocumento',
                data:{
                    cpf: documento,
                },
                type: 'post',
                dataType: 'json',
                success: function(data, textStatus, jqXHR) {
                    
                    if( data.erro === false)
                    {                    
                        $('#CadastroAddForm').find('input, button, select').attr('disabled', false);
                    }  
                    else
                    {
                        
                         modalAlert({
                             title  : 'Erro no Formulário',
                             message: data.mensagem,
                             callback: null,
                             before  : null,
                             button  : 'Fechar'
                         });
                         
                     }
                }
            }); 
           
       }
       
    });
    
});

