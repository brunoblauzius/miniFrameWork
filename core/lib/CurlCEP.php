<?php

namespace core\lib;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Curl
 *
 * @author bruno.blauzius
 */
class CurlCEP {
    
    
    private $url = 'http://www.buscacep.correios.com.br/sistemas/buscacep/resultadoBuscaCepEndereco.cfm?t';
    
    private $_post = null;
    
    private $contador = 0;
    
    private $parametros;
    
    public $estados = array(
        "AC"=>"Acre",
        "AL"=>"Alagoas",
        "AP"=>"Amapá",
        "AM"=>"Amazonas",
        "BA"=>"Bahia",
        "CE"=>"Ceará",
        "DF"=>"Distrito Federal",
        "ES"=>"Espírito Santo",
        "GO"=>"Goiás",
        "MA"=>"Maranhão",
        "MT"=>"Mato Grosso",
        "MS"=>"Mato Grosso do Sul",
        "MG"=>"Minas Gerais",
        "PA"=>"Pará",
        "PB"=>"Paraíba",
        "PR"=>"Paraná",
        "PE"=>"Pernambuco",
        "PI"=>"Piauí",
        "RJ"=>"Rio de Janeiro",
        "RN"=>"Rio Grande do Norte",
        "RS"=>"Rio Grande do Sul",
        "RO"=>"Rondônia",
        "RR"=>"Roraima",
        "SC"=>"Santa Catarina",
        "SP"=>"São Paulo",
        "SE"=>"Sergipe",
        "TO"=>"Tocantins",
    );
    
    
    public function __construct( $valorDeBusca ) {
        $parametros = array(
            'relaxation' => utf8_decode( $valorDeBusca ),
            'Metodo' => 'listaLogradouro',
            'TipoConsulta' => 'relaxation',
            'StartRow' => 1,
            'EndRow' => 10,
            );

        $this->parametros = $parametros;
        $this->_post = http_build_query( $parametros , '&' );
    }
    
    public function consultaCep(){
        try {
            
            $this->isNull($this->parametros['relaxation']);
            
            $ch = curl_init();
            
            curl_setopt($ch, CURLOPT_URL , $this->url );
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION , TRUE );
            curl_setopt($ch, CURLOPT_AUTOREFERER , TRUE );
            curl_setopt($ch, CURLOPT_POST , TRUE );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER , TRUE );
            curl_setopt($ch, CURLOPT_POSTFIELDS ,  $this->_post );

            $page = curl_exec($ch);
            $domDocument = new \DOMDocument();
            $domDocument->loadHTML($page);
            $elemento = $domDocument->getElementsByTagName('tr');
            
            foreach ( $elemento as $node ){
                
                $array[] = ($node->nodeValue);
                
            }

            curl_close($ch);
            
            return json_encode( $this->geralista($array) );
            
        } catch (Exception $ex) {
            return json_encode(array(
                'erro' => TRUE,
                'mensagem' => $ex->getMessage(),
                'resultado' => NULL
            ));
        }
    }
    
    
    private function geralista( array $lista ){
        try{
            
            $novoArray = array();
            unset($lista[0]);
            
            foreach ($lista as $value) {
                $novoArray[] = $this->explodeCep($value);
            }
            return $this->retornaCeps($novoArray);
            //return $novoArray;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    
    private function explodeCep($cep){
        $ex = explode('  ' ,$cep);
        $newArray = array();
        foreach ($ex as $value) {
            $value = trim($value);
            $value = str_replace('&nbsp;', NULL,$value);
            if(!empty($value))
            {
                $newArray[] = $value;
            }
        }
        return $newArray;
    }
    

    private function retornaCeps( $oldArray = NULL ){
        try{
            
           
           if( !is_null($oldArray) ){
                $novoArray = array();
                foreach ($oldArray as $value) {
                    
                    $cidadeUf = explode('/', $value[2]);
                    
                    $novoArray[] = array(
                        'logradouro' => (($value[0])),
                        'bairro'     => (str_replace('&nbsp;', NULL,$value[1])),
                        'cidade'     => ($cidadeUf[0]),
                        'estado'     => $this->estados[strtoupper($cidadeUf[1])],
                        'uf'         => ($cidadeUf[1]),
                        'cep'        => ($value[3]),
                    );
                    
                }

                if( !empty($novoArray) ){
                    $novoArray = array(
                        'erro' => false,
                        'mensagem' => 'Sucesso',
                        'resultado' => $novoArray
                    );
                } else {
                    throw new Exception('Nenhum registro foi encontrado...');
                }
                
                return $novoArray;
            } 
        } catch (Exception $ex) {
            throw $ex;
        }
    }  
    
    public function isNull( $valor ){
        try{
            if(empty($valor)){
                throw new Exception('Cep está vazio favor informar!');
            }
            return true;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
}


