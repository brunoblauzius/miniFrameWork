<section class="bg-black" id="parallax-container">
	<div class="container text-center">		
		<div class="sg-logo-404 parallax" data-speed-x="10" data-speed-y="40">
			<div class="logo">Check<span>Meu</span>Carro</div>
			<div class="line-logo"></div>
		</div>
		<div class="parallax" data-speed-x="10" data-speed-y="40">
			<?= View\Helpers\Html::img('img-404.png', array('alt' => 'Página não encontrada!', 'class' => 'img-404'))?>
		</div>
		<div class="txt-404">
			<h2>Página não encontrada!</h2>
			<a href="<?= \core\Router::url('Pages')?>">< Voltar</a>
		</div>
	</div>	
</section>
<section class="bg-amarelo"></section>


<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js'></script>

<script>
	
$( document ).ready(function() {
    
	$(function(){				
				
        /*
          Author: Chrysto Panayotov ( info@bassta.bg )
          For GreenSock forums user azuki
          License : http://bassta.bg/license/
          
        */
  
				var $parallaxContainer 	  = $("#parallax-container"); //our container
				var $parallaxItems		    = $parallaxContainer.find(".parallax");  //elements
				var fixer				          = 0.0008;		//experiment with the value
				
				$(document).on("mousemove", function(event){					
							
					var pageX =  event.pageX - ($parallaxContainer.width() * 0.5);  //get the mouseX - negative on left, positive on right
					var pageY =  event.pageY - ($parallaxContainer.height() * 0.5); //same here, get the y. use console.log(pageY) to see the values
					
          //here we move each item
					$parallaxItems.each(function(){
						
						var item 	= $(this);
						var speedX	= item.data("speed-x");  				
						var speedY	= item.data("speed-y");
						
            /*TweenLite.to(item, 0.5, {
							x: (item.position().left + pageX * speedX )*fixer,    //calculate the new X based on mouse position * speed 
							y: (item.position().top + pageY * speedY)*fixer
						});*/
            
            //or use set - not so smooth, but better performance
            TweenLite.set(item, {
							x: (item.position().left + pageX * speedX )*fixer,
							y: (item.position().top + pageY * speedY)*fixer
						});
						
					});
				});				
			});

});



	
</script>

