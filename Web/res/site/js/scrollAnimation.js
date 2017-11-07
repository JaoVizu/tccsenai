// Debounce do Lodash - para segurar a animação
debounce = function(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};

(function () {
var $target = $('.anime'),
    animationClass = 'anime-start animated pulse',
    offset = $(window).height() * 3/4;

function animeScroll () {
    //valor do topo do documento ate onde esta o scroll
    var documentTop = $(document).scrollTop();

    $target.each(function() {
        var itemTop = $(this).offset().top;//distancia entre o topo e cada item

        if(documentTop > itemTop - offset) {
            $(this).addClass(animationClass);
        }else {
            //$(this).removeClass(animationClass);
        }
    });
}

animeScroll();

$(document).scroll(debounce(function (){
    animeScroll();
}, 200));

}());

//FUNÇAO PARA SCROLL SUAVE - link interno
// indentificar clique no menu
//verificar o item que foi clicado e fazer referencia ao alvo
//verificar a distancia entre o alvo e o topo
//animar o scroll ate o alvo
(function () {

    $('nav .nav-link').click(function(e) {
        //e.preventDefault();//prevenindo função padrao
        var id = $(this).attr('href'), //attr puxa o atributo
            targetOffset = $(id).offset().top; //distancia entre elemento e topo
            
        
        $('html, body').animate({
            scrollTop: targetOffset - 100
        }, 700);
    });

}());
