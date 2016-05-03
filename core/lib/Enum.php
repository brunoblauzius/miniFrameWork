<?php

namespace core\lib;


/**
 * Description of Enum
 *
 * @author blauzius
 */
class Enum {
    //put your code here
    const VERIFICA_TERMO 	= 'O termo deve ser aceito para concluir seu cadastro';
    const VAZIO          	= 'Este campo é requirido';
    const EMAIL_INVALIDO        = 'Este e-mail é inválido...';
    const SENHA_NAO_CONFERE 	= 'Senha e confirmação de senha não conferem!';
    const USUARIO_CADASTRADO 	= 'Este e-mail já foi cadastrado para outro usuário em nosso sistema.';
    const VERIFICA_CPF_CNPJ 	= 'Usuário já cadastrado em nosso sistema...';
    const APENAS_DIGITOS 	= 'Insira apenas digitos...';
    const CONFIRMACAO_DE_EMAIL 	= 'E-mails digitados não são idênticos.';
    const DOCUMENTO_INVALIDO   	= 'Documento Inválido.';
    const MIN_LEGTH             = 'Este campo deve conter pelo menos 6 digitos';
    const CADASTRO_NAO_EFETUADO = 'Não foi possivel inserir seu cadastro em nosso sistema, por favor tente novamente mais tarde!';
    const FUNCIONARIO_OCUPADO   = 12;
    
    const VALOR_CONSULTA        = 24.90;
    
    const URL_ENVIO_EMAIL       = 'http://ws.bcitecnologia.com.br/homologacao/ServidorDeEmails/index.php';
    const URL_CONSULTA_GRATIS   = "https://www.sistemasx.com.br/ws/pessoa_fisica/v2/consulta_gratis";
    const URL_CADASTRO          = "https://www.sistemasx.com.br/ws/pessoa_fisica/v2/cadastro";
    const URL_VERIFICA_DOC      = "https://www.sistemasx.com.br/ws/pessoa_fisica/v2/verifica_documento";
    const URL_COMPRAR_CREDITOS  = "https://www.sistemasx.com.br/ws/pessoa_fisica/v2/comprar_creditos";
    const URL_LOGAR             = "https://www.sistemasx.com.br/ws/pessoa_fisica/v2/logar";
    const URL_DADOS_USUARIO     = "https://www.sistemasx.com.br/ws/pessoa_fisica/v2/dados_usuario";
    
    const URL_ENVIO_EMAIL_DESENV= 'http://ws.bcitecnologia.com.br/homologacao/ServidorDeEmails2/index.php';
    
}
