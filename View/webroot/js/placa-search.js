$(document).ready(function() {  
    
    /**
     * @todo function que faz a pesquisa de placa!
     * @param {String} placa
     * @returns {Boolean}
     */
    
    function searchPlaca( placa ){
        
        $('#sg-loader').fadeIn(300);
        placa = placa.replace('-', '');
        
        try {
        
            if( placa === null || placa === "" )
            {
                throw 'Favor digitar uma placa para sua pesquisa!';
            }
            else if( placa.length < 7 )
            {
                throw 'A placa deve conter 7 digitos';
            }
            else 
            {
                redirect( web_root + 'Pages/teste-gratis?placa=' + placa.toUpperCase() );
            } 
            
        } catch ( erro ){
            modalAlert({
                message: erro,
                style: 'cor-vermelho',
                title : 'Caro Usuário',
                button: 'Fechar',
                time  : 5000,
                size  : 'md',
                before: "$('#sg-loader').fadeOut(300);",
                callback: null,
            });
        }
        finally{
            return false;
        }
    }


    $('#btn-placa-search').click(function(){
        searchPlaca( $('#placa-search').val() );
    });

    $('#placa-search').keypress(function( event ){
        if( event.which === 13 ){
            searchPlaca( $(this).val() );
        }
    });
    
    
    $('#placa-search').mask('ZZZ-0000',{'translation': {
        Z: {pattern: /[A-Za-z]/}  
    }});

});



