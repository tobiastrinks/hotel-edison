

////////////////////////////////


$(document).ready(function() {

	scroll_top();
	
	$(".arr_short_nav").click(function(){
		
		if($(this).attr("id") != "arr_short_nav_jahr"){
			
			$(".arr_short_nav").removeClass("active");
			$(this).addClass("active");
			
			var neu = $("#"+$(this).attr("data-info"));
			
			$(".kurzurlaub").fadeOut(0);
			neu.stop().fadeIn(300);
			
			if($(this).attr("data-info") == "arr")
				$("#preis_info, #arr_short_nav_jahr").show();
			else
				$("#preis_info, #arr_short_nav_jahr").hide();
		}
			
	});
	
	$(".arr_short_nav_element").click(function(){
		
		if($(this).hasClass("active") == false){
			
			var jahr = $(this).attr("data-jahr");
			
			$("#arr_short_nav_jahr span").removeClass("active");
			$("#arr_short_nav_jahr span[data-jahr='"+jahr+"']").addClass("active");
			
			var preise = $(".preise_ausgabe");
			preise.hide();
			preise.removeClass("active");
			
			$(".preise_ausgabe[data-jahr='"+jahr+"']").addClass("active").show();
		}
	});
	
	
	$(".preise p").click(function(){
	
		var preisart = $(this).attr("data-info");
		
		$(this).parent().children("p").hide(0);
		$(this).parent().children("p."+preisart).show(0);
		
		$(this).parent().children("table").fadeOut(0);
		$(this).parent().children("table."+preisart).fadeIn(300);
		
	});

});