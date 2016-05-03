<?php

namespace Controller;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AppController extends \core\Controller{
    
    
    
    public function __construct() {
        parent::__construct();
        
        $this->js = array(
            'jquery-1.12.0.min',            
            'bootstrap.min',
             'menu-responsivo',
            'jquery.easing',
            'ajaxForm',
            'jquery.mask',
            'funcoes',
            'scripts',           
            'newModal',
            'carregando-geral',
            'versao-premium',
            'versao-basica',
            'placa-search'
        );
        
        $this->css = array(
            'bootstrap.min',
            'estilo',
            'font-awesome.min',
            'modal',
            //'media',
            'menu-responsivo',
            'loader',
            'versao-premium',
        );
    }
    
    
    
    protected function verificaCompra(){
        if (!isset($_SESSION['Compra'])) {
            throw new \core\Exception\BusinessException('Sua compra ainda não foi criada', 1);
        }
    }
    
    protected function verificaCadastro(){
        if (!isset($_SESSION['Cadastro'])) {
            throw new \core\Exception\BusinessException('', 2);
        }
    }
    
}