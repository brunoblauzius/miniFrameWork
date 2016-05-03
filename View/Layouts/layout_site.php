<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title><?= $title_for_layout?></title>
  <meta name="viewport" content= "width=device-width" >
  <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
  <?php 
            /**
             * rederização de arquivos css no sistema
             */
            foreach ($this->css as $css):
            	$css .= '.css';
            ?>
            <link rel="stylesheet" href=" <?= $this->url(array('View','webroot', 'css', $css))?>">
          <?php endforeach;?>
          
          <?php 
            /**
             * rederização de arquivos js no sistema
             */
            foreach ($this->js as $js):
            	$js .= '.js';
            ?>
            <script type="text/javascript" src="<?= $this->url(array('View','webroot', 'js', $js))?>"></script>
          <?php endforeach;?>

          <script>
           var web_root = '<?= \core\Router::url() ;?>';
           var valor_consulta = '<?= (core\lib\Enum::VALOR_CONSULTA)?>';
         </script>

         <title>CheckMeuCarro</title>
       </head>
       <body>
        <section id="sg-loader"> 
         <div class="loader-in">
           <div id="loader" class="loader-70"></div>
         </div>
       </section> 
       <header></header>
       <section class="bg-all-2">
        <div class="container">			
         <section class="sg-blocos-topo">
          <div class="col-md-4">
           <div class="bloco-logo">
            <a href="<?= $this->url();?>">
             <div class="logo">Check<span>Meu</span>Carro</div>
             <div class="line-logo"></div>
           </a>
         </div> 
       </div>
       <div class="col-md-4"></div>
       <div class="col-md-4">					
         <div class="bloco-topo-dir login">
          <div class="col-md-5 no-pdd txt-login">Faça seu login</div>
          <div class="col-md-7 txt-facebook text-right no-pdd">
           <a href="#">
            Entrar com o Facebook 
            <i class="fa fa-facebook icone-face"></i>
          </a>
        </div>
        <div class="clearfix"></div>
        <section class="sg-form-login">
          <form action="<?= core\Router::url(array('Webservices','logar'));?>" method="post" id="LoginForm">
            <div class="ipt-esq">
              <input placeholder="Seu cpf ou email" class="" type="text" name="Login[email]">
            </div>
            <div class="ipt-meio">
              <input class="" placeholder="Sua senha" type="password" name="Login[senha]">
            </div>
            <div class="ipt-dir">
              <button class="bt-ok-login">OK</button>
            </div>
          </form>
        </section>
        <div class="clearfix"></div>
        <div class="txt-login-dir">
         <a href="<?= core\Router::url('minha-conta/esqueciSenha')?>" target="_blank">
          <i class="fa fa-caret-right"></i> 
          Esqueci minha senha
        </a>
        <a href="<?= core\Router::url(array('pages', 'cadastro'))?>">
          <i class="fa fa-caret-right"></i> 
          Criar conta
        </a>
      </div>
    </div> 
  </div>
</section>
<div class="clearfix"></div>
</div>
</section>

<div class="clearfix"></div>
<!-- corpo do site -->
<section class="meio-internas">  
 <?php echo $this->getContent()?> 		
</section>
<!-- fim corpo do site -->
<div class="clearfix"></div>

<!-- modal relatório -->
<div class="modal fade md-rel" id="modal-relatorio" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"> 
      <div class="iframe-desktop">
        <iframe src="https://sistemasx.com.br/ws/cmcpj/v2/consultaHTMLCodigo.php?codigo=73004123.08629546.24135360.94788167" frameborder="0" allowfullscreen></iframe>
      </div>            
      <!-- -->
    </div>
  </div>
</div>
<!-- modal relatório -->

<?= core\Render::element('footer');?>

</body>
</html>