<?php

session_start();

header('Content-Type: text/html; charset=utf-8');


/**
 * forçando o sistema a sempre entrar sem WWW
 */
if( stripos('www', $_SERVER['HTTP_HOST']) !== false )
{
    header('Location: ' . str_replace(array('www.', 'WWW.'), NULL, $_SERVER['HTTP_HOST']));
}


/**
 * avisos de erro do sistema
 */
//error_reporting( E_ALL );
//ini_set( "display_errors", true );


/**
 * loader de namespace do sistema
 */
require_once 'core/SplClassLoader.php';


/**
 * constantes de do servidor
 */
define('DS', DIRECTORY_SEPARATOR);
define('WWW', "http://" . $_SERVER['HTTP_HOST']);
define('REQUEST_URI', $_SERVER['REQUEST_URI']);
define('ROOT', dirname(__FILE__));


/**
 * Autoloader
 * responsavel por fazer o loader de classes no sistema
 */
spl_autoload_register(
 function ($pClassName) {  
        $classLoader = new SplClassLoader(NULL, ROOT);
        $classLoader->register();
        $classLoader->loadClass( $pClassName );  
  }
);


$router = new core\Router();
$router();

