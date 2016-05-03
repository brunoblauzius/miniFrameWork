<?php

namespace core;

use core\Render as Render;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Router
 *
 * @author bruno.blauzius
 */
class Router extends Render{
    //put your code here
    
    
    public $request = null;
    
    public $controller;
    
    public $action;
    
    public $method;
    
    public $Session = null;
    
    public function __construct() {   

        $this->requestMethod = strtoupper( $_SERVER['REQUEST_METHOD'] );
       
        /**
         * controller
         */
        if(!isset($_GET['controller'])) 
        {
            $this->controller = 'Pages'; 
        } 
        else if(isset($_GET['controller']) && empty($_GET['controller'])) 
        {
            $this->controller = 'Pages'; 
        }
        else 
        {
            $this->controller = $_GET['controller'];
            //unset($_GET['controller']);
        }
        
        /**
         * action
         */
        if(isset( $_GET['action'] ) && empty($_GET['action'])) 
        {
            $this->method = 'index'; 
            $this->view       = $this->method;
        } 
        else if( isset( $_GET['action'] ) )
        {
            $this->method     = $this->RemoveUnderscoreAction($_GET['action']);
            $this->view       = $this->method;
            
        }
        else {
            $this->method = 'index'; 
            $this->view       = $this->method;
            unset($_GET['action']);
        }
        
        $this->Session = $_SESSION;
        
        $this->Controll($this->controller);
    }
    
    public function RemoveUnderscoreAction( $action, $haystack = '-' ){
        
        if(stripos( $haystack, $action ) === FALSE ){
            $explode = explode($haystack, $action);
            $i= 0;
            $newString = '';
            foreach ($explode as $string ){
                if( $i == 0 ){
                    $newString = $string;
                } else {
                    $newString .= ucfirst($string);
                }
                $i++;
                
            }
            return $newString;
        }
        return $action;
        
    }
    
    /**
     * @version 1.0
     * @todo metodo no qual invoco minha classe e o metodo a ser usado
     * @var string 
     */
    public final function __invoke() {
        try{
            
            /**
             * verifico se o arquivo exite
             */
            if( file_exists( 'Controller' . DS . $this->controller . '.php' ) ) {
                
                $this->controller = ('Controller' . '\\' . $this->controller);
                /**
                 * verifico se a classe existe dentro do arquivo
                 */
                if( class_exists($this->controller) )
                {
                    /**
                     * verifico se o metodo existe na classe
                     */
                    if( method_exists($this->controller, $this->method) )
                    {
                        call_user_func_array( array( new $this->controller, $this->method), array() );
                    } 
                    else 
                    {
                        throw new \core\Exception\PageException( "Pagina $this->view.php não encontrada", 404 );
                    }
                }
                else
                {
                    throw new \core\Exception\PageException( "Pagina $this->view.php não encontrada", 404 );
                }
            } 
            else 
            {
                throw new \core\Exception\PageException( "Arquivo $this->controller.php não encontrado", 404 );
            }
        } catch (\core\Exception\PageException $ex) {
            if( $ex->getCode() === 404 )
            {
                $ex->pageNotFound( $this );
            }
        }
    }
    
    /**
     * @version 1.0
     * @todo metodo que muda o nome da controller para que senha feita a verificação no invoke
     * @var string 
     */
    public function Controll(&$Classe){
        $Classe = ucfirst($Classe);
    }
    
    
    
    
}
