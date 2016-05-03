<?php

namespace Controller;

use Controller\AppController as AppController;
use core\lib\CurlStatic as CurlStatic;
use \core\Exception\BusinessException as BusinessException;

/**
 * Description of Pages
 *
 * @author bruno.blauzius
 */
class Pages extends AppController {

    private $Cadastro;
    public $layout = 'layout_site';

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->layout = 'pagina_inicial';
        $this->set('title_for_layout', 'Home');
        $this->render();
    }


}
