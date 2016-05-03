

$(document).ready(function() {

    setTimeout(function(){  

     
      if( $('.sg-loader-prime-b').is(':visible') ){
          
          $('.sg-loader-prime-b').fadeOut(500);
      }
  

      $("#progress-a").fadeIn("fast");

    }, 4500);

    setTimeout(function(){  

      $("#progress-b").fadeIn("fast");

    }, 5500);


    setTimeout(function(){  

      $("#progress-c").fadeIn("fast");

    }, 6500);


    setTimeout(function(){  

      $("#progress-d").fadeIn("fast");

    }, 7500);


    setTimeout(function(){  

      $("#progress-e").fadeIn("fast");

    }, 8500);


    setTimeout(function(){  

      $("#progress-f").fadeIn("fast");

    }, 9500);

  });

  setTimeout(function(){  

       $( ".sg-botao-red-placas" ).fadeTo( "fast" , 1, function() {});

  },10800);

 setTimeout(function(){  

       $( ".sg-botao-green-placas" ).fadeTo( "fast" , 1, function() {});

  }, 11100);


//var bar = $('');
var p = $('p');

//var width = bar.attr('style');
//width = width.replace("width:", "");
//width = width.substr(0, width.length-1);


var interval;
var start = 0; 
//var end = parseInt(width);
var current = start;

var countUp = function() {
  current++;
  p.html(current + "%");
  
  if (current === end) {
    clearInterval(interval);
  }
};

