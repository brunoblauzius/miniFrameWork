 function loaderSpinner() {
    $(document).ready(function() {
        var loader = $('.carrega-geral');
var wHeight = $(window).height();
var wWidth = $(window).width();
var i = 0;

loader.css({
    top: 15,
    left: 0,
 })
      
  do{
    loader.animate({
      width: i
    },10)
    i+=3;
  } while(i <= 400)
  if(i === 402){
    loader.animate({
      left: 0,
      width: '100%'
    })
    loader.animate({
      top: '0',
      height: '0'
    })
  }      
      setTimeout(function(){
        $('#conteudo-carregando').fadeIn(600);
        (loader).hide();
      },2500);
    });
}

loaderSpinner();