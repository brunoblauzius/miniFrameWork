<footer>		
    <div class="menu-rodape-bg">
        <div class="container">				
            <!-- menu -->
            <div id="menu">
                <div class="abrir_menu">
                    <span>
                        <?= View\Helpers\Html::img('logo-dark.png', array('alt' => 'Site seguro', 'class' => 'max'))?> 
                        <i class="fa fa-align-justify"></i>
                    </span>
                </div>  
                    <div class="menu_aberto">
                        <div id="navigator">
                            <ul class="nav">
                                <li class="title">Menu</li>
                                <li><a class="menu-ativo" href="<?= core\Router::url()?>" class="menu-ativo">Home</a></li>
                                <li><a href="<?= core\Router::url(array('Pages', 'como-funciona'))?>">Como funciona</a></li>
                                <li><a href="<?= core\Router::url(array('Pages', 'modelos-de-relatorio'))?>">Modelos de relatórios</a></li>
                                <li><a href="https://www.checkmeucarro.com.br/FAQ/phpmyfaq/" target="_blank"  title="">Faq</a></li>              
                                <li><a href="<?= core\Router::url(array('Pages', 'contato'))?>" title="">Contato</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- menu fim -->				
            </div>			
        </div>		
        <div class="container rodape">			
            <div class="quatro-colunas">
                <!-- logo -->
                <div class="logo-mobile">Check<span>Meu</span>Carro</div>
                <div class="line-logo"></div>
                <!-- logo fim -->
                <p class="pp-rodape">
                    O Relatório CheckMeuCarro é um sistema único de procedência veicular e perícia digital de veículo em tempo real que, com apenas um clique, verifica a VIDA completa de qualquer automóvel em todo o território nacional.
                </p>			
            </div>
            <div class="quatro-colunas">
                <h2>41 3068-1800</h2>
                <p>
                    Nextel: 112*91710 <br />
                    CNPJ: 05.321.101.0001-88
                </p>
                <h3>Onde estamos</h3>
                <p>Rua Presidente Faria, 51 5° andar  <br />
                    Centro Curitiba PR - CEP 80020-290</p>
                </div>
                <div class="quatro-colunas">
                   <!-- widget facebook -->
                   <div id="fb-root"></div>
                   <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) return;
                          js = d.createElement(s); js.id = id;
                          js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5";
                          fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                   </script>
                   <div class="fb-page" data-href="https://www.facebook.com/CheckMeuCarro/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/CheckMeuCarro/"><a href="https://www.facebook.com/CheckMeuCarro/">CheckMeuCarro</a></blockquote></div>
                   </div>
                  <!-- widget facebook -->
              </div>	
              <div class="quatro-colunas">
                <ul>
                    <li>
                        <i class="fa fa-caret-right"></i>
                        <a class="link-padrao" href="<?= core\Router::url('Pages/contato')?>">Seja um representante</a>
                    </li>
                    <li class="site-seguro">                            
                        <?= View\Helpers\Html::img('site-seguro.png', array('alt' => 'Site seguro', 'class' => 'max'))?>                            
                    </li>
                </ul>
            </div>			
        </div>
        <div class="rodape-bg-amarelo">2016 - Check Meu Carro - Todos os direitos reservados</div>
    </footer>