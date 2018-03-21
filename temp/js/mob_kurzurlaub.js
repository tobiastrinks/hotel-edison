$(document).ready(function(){
	
	$(".headline").click(function(){
		
		var next_open = $(this).next(".arr_content");
		var current_open = $(".arr_content[data-info='active']");
		
		if(next_open.attr("data-info") == "closed"){
			
			current_open.stop().slideUp(500);
			current_open.attr("data-info", "closed");
			
			next_open.stop().slideDown(500);
			next_open.attr("data-info", "active");
		}
		else{
			next_open.stop().slideUp(500);
			next_open.attr("data-info", "closed");
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
	
	$("#nav_kurzurlaub li").click(function(){
		
		var open_id = $(this).attr("data-info");
	
		if($("#"+open_id).attr("data-info") == "closed"){
			
			$(".kurzurlaub").hide(0);
			$(".kurzurlaub").attr("data-info", "closed");
			$("#nav_kurzurlaub li").css("font-weight", "normal");
			
			$("#"+open_id).fadeIn(300);
			$("#"+open_id).attr("data-info", "active");
			$("#nav_kurzurlaub li[data-info='"+open_id+"']").css("font-weight", "bold");
			
			if(open_id == "feiertag")
				$("#arr_short_nav_jahr").hide();
			else
				$("#arr_short_nav_jahr").show();
		}
	});
	
});