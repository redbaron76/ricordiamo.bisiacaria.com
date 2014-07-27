//Equel cols
function eCol() {
	var lh = $('.col-left').height();
	var rh = $('.col-right').height();
	//if(lh>=rh) {
		///$('.col-right').css('height', lh);
	/*} else {
		$('.col-left').css('height', rh);
	}*/
}

//setFix
function setFixed() {
	
	var diff;
	$(window).scroll(function () {
		diff = $(window).scrollTop() - $(".col-right").parent().offset().top;
		if(diff>0) {
			$('#form-wrap').animate({top: diff},{queue: false, easing:'linear', duration: 500});
		} else {
			$('#form-wrap').animate({top: 0},{queue: false, easing:'linear', duration: 500});
		}		
	});	
	
}


//INFINITE SCROLL
function bottomScroll(item) {
	
	//Ottendo id dell'ultima riga visibile
	var last_id = $(item).last().attr("rel");
	//console.log(last_id);

	$(window).scroll(function () {
		
		/*console.log($(window).scrollTop());
		console.log($(window).height());
		console.log($("body").outerHeight());*/
		
		if($(window).scrollTop() + $(window).height() >= $("body").outerHeight() - 1) {
		  $.post("/ajax/more",{
			  id: last_id
		  },function(data) {			  
			$(data).hide().insertAfter(item+'[rel='+last_id+']').fadeIn(500, function() {
				//Set altezza
				//eCol();
			});				
			last_id = $(item).last().attr("rel");			 
		  });
		}
	});

}

$(function() {

	$.backstretch('/img/fullbody_bisia.jpg');
	$().UItoTop({ easingType: 'easeOutQuart' });
	//eCol();
	setFixed();
	bottomScroll('#rows-wrapper > div');
	$.trackPage('UA-522860-3');

});