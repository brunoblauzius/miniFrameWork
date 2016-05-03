<?php

namespace core\Exception;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PageException
 *
 * @author bruno.blauzius
 */
class PageException extends \Exception{
    //put your code here
    
    public function __construct($message, $code =0, $previous = NULL) {
        parent::__construct($message, $code, $previous = NULL);
    }
    


    public final function pageNotFound( \core\Router $class ) {
        die($class->render(array('controller' => 'Erros', 'view' => '404' ), 'layout_not_found'));
    }
    
}
