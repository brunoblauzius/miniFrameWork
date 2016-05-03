<?php

namespace core\Exception;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BusinessException
 *
 * @author bruno.blauzius
 */
class BusinessException extends \Exception {
    //put your code here
    
    public function __construct($message, $code = 0, $previous = NULL) {
        parent::__construct($message, $code, $previous);        
    }
    
    
    public function getBusinessMessage(){
        return $this->getMessage();
    }
    
    public function getBusinessCode(){
        return $this->getCode();
    }
    
    public function getNotPermission( $class ){      
        $class->set( 'mensagem', $this->getMessage() );
        if( $this->getCode() == 112)
        {
            die( $class->render(array('controller' => 'Erros', 'view' => 'notPermisson')) );
        } 
        else if( $this->getCode() == Enum::COD_FUNCIONARIO_SEM_PARAMETROS )
        {
            die( $class->render(array('controller' => 'Erros', 'view' => 'funcionarioSemParametros')) );
        } 
        else 
        {
            die( $class->render(array('controller' => 'Erros', 'view' => 'areaTeste')) );
        }
    }
    
    /**
     * @todo metodo que redireciona de acordo com o erro;
     * @param objetct $class
     */
    public function notSessionStarted( $class ){
        if ($this->getCode() == 1) {
            $class->redirect(array('pages', 'escolha-a-quantidade'));
        }
        if ($this->getCode() == 2) {
            $class->redirect(array('pages', 'cadastro'));
        }
    }
    
    public function getLimitExceded( $idCss ){
        return json_encode(array(
            'funcao' => "infoErro( '" . $this->getMessage() . "' , '{$idCss}' );",
        ));
    }
    
}
