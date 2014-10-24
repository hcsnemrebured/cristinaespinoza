var colCount = 0;
var colWidth = 0;
var margin = 0;
var windowWidth = 0;
var positionTop = 0;
var blocks = [];

$(function(){
	$(window).resize(setupBlocks);
});

function setupBlocks() {
	windowWidth = $(window).width();
	colWidth = $('.articulo_index').outerWidth();
	positionTop = 0;
	blocks = [];
	colCount = Math.floor(windowWidth/(colWidth));
	spaceLeft = (windowWidth - (colWidth*colCount))/2;
	for(var i=0;i<colCount;i++){
		blocks.push(margin);
	}
	positionBlocks();
}

function positionBlocks() {
	$('.articulo_index').each(function(){
		var min = Array.min(blocks);
		var index = $.inArray(min, blocks);
		var leftPos = (index*(colWidth));
		$(this).css({
			'visibility':'visible',
			'left':(leftPos+spaceLeft)+'px',
			'top':(min+positionTop) +'px'
		});
		blocks[index] = min+$(this).outerHeight();
	});
	var max = Array.max(blocks);
	$('#contenido_principal').css('height', max+60);
}



// Function to get the Min value in Array
Array.min = function(array) {
    return Math.min.apply(Math, array);
};
// Function to get the Max value in Array
Array.max = function( array ){
    return Math.max.apply( Math, array );
};