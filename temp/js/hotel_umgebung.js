function elements_relative(){
	
	var content_breite = $("#content_left").width();
	
	/* BILDFORMAT 2:1 */
	var dia_hoehe = (content_breite*0.71)*0.45;
	
	$("#diashow_img").css("width", content_breite*0.71).css("height", dia_hoehe);
	$("#diashow_img img").css("width", content_breite*0.71).css("height", "auto");
	
	$(".yt_video, .yt_video iframe").css("width", content_breite*0.71).css("height", content_breite*0.71*0.5625);
	
}

function nav2_relative(){
	
	var breite 		= $("body").width();
	var font_size;
	
	if(breite < 1400){
		font_size =  "22px";
	}
	else if(breite > 1400){
		font_size = "24px";
	}
	else if(breite > 1700){
		font_size = "27px";
	}
	
	$("#nav2 li a").css("fontSize", font_size);
}



//////////////////////////


$(document).ready(function() {
	
	elements_relative();
	nav2_relative();
	
	var hoehe = window.innerHeight;
	
	$('#content_left').css("minHeight", hoehe+100+"px");
	
	
	$("#diashow_img").cycle({ 
		prev:   '#button_left', 
		fx:      'fade', 
		next:   '#button_right', 
		slideResize: 0,
		timeout: 6000
	});
	
	
	/* nav2 */
	var nav2_active = $("#nav2 a.active");
	
	if(nav2_active.next("ul").hasClass("nav2_unterordner")){
		nav2_active.next("ul").slideDown(500);
	}
	
	if(nav2_active.parents("ul").hasClass("nav2_unterordner")){
	
		nav2_active.parents("ul").css("display", "block");
		nav2_active.parents("ul").parent("li").children("a").css("fontWeight", "bold");
	}
	
	
	/* Wetterapp aktivieren */
	if ($('#weatherWidget').length > 0)
		$("#weatherWidget").append("<div serviceid='weatherWidgetBlock'></div>");
	
	
});

$(window).on('resize', function(){
	elements_relative();
	nav2_relative();
});