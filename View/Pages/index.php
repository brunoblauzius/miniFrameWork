<h1>
    <span>Atenção!</span> 39% das placas pesquisadas diariamente em nosso site apontaram registros de <span>acidentes</span> e outros danos.
</h1>			
<section class="video-home">
    <button class="btn-video md-trigger" data-toggle="modal" data-target="#modal-home">
        <div class="video-home-fraude">
            <div class="sg-bt-play">
                <div class="bt-play">
                    <i class="fa fa-caret-right"></i>
                </div>
            </div>
            <?= View\Helpers\Html::img('img-fraude.jpg', array('alt' => 'Assista como evitar um fraude', 'class' => 'max'))?>
            
        </div>						
    </button>	
    <h1>
       Assista como evitar uma <span>fraude</span>
    </h1>
</section>


<!-- Modal -->
<div class="modal fade" id="modal-home" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <iframe width="100%" height="430" src="https://www.youtube.com/embed/LQWKeAeEdao" frameborder="0" allowfullscreen></iframe>
     <div class="line-border-all cor-laranja"></div>
    </div>
  </div>
</div>

<style>
  
::-webkit-scrollbar {
  width: 25px;
}

</style>