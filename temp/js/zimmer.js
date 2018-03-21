function elements_relative(){

	var scroll_pos = $(window).scrollTop();
	var zimmer_height = $("#zimmer").offset();
	var zimmer_height_bottom = zimmer_height.top + $("#zimmer").height();
	var bildhoehe = $(".zimmerbilder[data-info='open'] img").height();
	var breite = $("body").width();	
	
	
	var zimmerbilder = $(".zimmerbilder");
	
	$("dl").css("marginLeft", ($("body").width()*0.02)+"px");
	$("dl").css("width", ($("body").width()*0.45)+"px");
	$(".short_description").css("width", ($("body").width()*0.45)+"px");
	
	zimmerbilder.css("right", breite*0.02).css("width", breite*0.45).css("height", breite*0.45*0.7);
	
	$(".preistabelle").css("width", breite*0.45).css("right", breite*0.02);
	
	$("#button_left").css("left", breite*0.53-10);
	$("#button_right").css("left", breite*0.98-70);
	
	
	if($("body").width()*0.45 < 680){
	
		$("dl").css("width", ($("body").width()*0.9 - 680)+"px");
		
		$("#button_left").css("left", breite*0.98 - 690);
		$("#button_right").css("left", breite*0.98 - 70);
	}
	
	
	
	if(scroll_pos + 200 < zimmer_height.top){
	
		$("#button_left").css("top", (breite*0.45*0.70)*0.5 - 20);
		$("#button_right").css("top", (breite*0.45*0.70)*0.5 - 20);
		
		zimmerbilder.css("top", 0);
	}
	
	if(scroll_pos +200+bildhoehe > zimmer_height_bottom){
		
		$("#button_left").css("top", zimmer_height_bottom-bildhoehe-zimmer_height.top+(breite*0.45*0.70)*0.5 - 20);					
		$("#button_right").css("top", zimmer_height_bottom-bildhoehe-zimmer_height.top+(breite*0.45*0.70)*0.5 - 20);
		
		zimmerbilder.css("top", zimmer_height_bottom-bildhoehe-zimmer_height.top);
	
	}
	
	if(scroll_pos + 200 > zimmer_height.top && scroll_pos +200+bildhoehe < zimmer_height_bottom){
	
		var top = scroll_pos-zimmer_height.top+200;
	
		$("#button_left").css("top", top + (breite*0.45*0.70)*0.5 - 20);
		$("#button_right").css("top", top + (breite*0.45*0.70)*0.5 - 20);
		
		zimmerbilder.css("top", top);
	}
	
	if(bildhoehe > zimmer_height_bottom-zimmer_height.top){
		
		$("#button_left").css("top", (breite*0.45*0.70)*0.5 - 20);
		$("#button_right").css("top", (breite*0.45*0.70)*0.5 - 20);
		
		zimmerbilder.css("top", 0);
	}
	
	var preistabelle = $(".preistabelle");
	var preistabelle_pos = preistabelle.offset();
	var preistabelle_hoehe = $(".preistabelle[data-info='open']").height();
	var breite_zimmer = $("#zimmer").width();
	
	if(scroll_pos + 200 < zimmer_height.top){
		preistabelle.css("top", 0);
	}
	
	if(scroll_pos +200+preistabelle_hoehe > zimmer_height_bottom){
	
		preistabelle.css("top", zimmer_height_bottom-preistabelle_hoehe-zimmer_height.top);
	}
	
	if(scroll_pos + 200 > zimmer_height.top && scroll_pos +200+preistabelle_hoehe < zimmer_height_bottom){
		
		var top = scroll_pos-zimmer_height.top+200;
		
		preistabelle.css("top", top);
		
	}
	
	$("#buchungsinformationen_inner").css("max-height", window.innerHeight*0.7);
	
	var buchungsinformationen = $("#buchungsinformationen");
	if(buchungsinformationen.css("display") != "none"){
		$center_pos = "left+"+(($("body").width()/2)-(buchungsinformationen.width()/2)-$(window).scrollLeft())+" top+"+(($(window).height()/2)-(buchungsinformationen.height()/2));
		buchungsinformationen.dialog("option", "position", {my: $center_pos, at: "left top", of: window});
	}
	
}

function zimmer_laden(dt_element){
	
	var this_element = dt_element;
	var img_id = "#" + this_element.attr('data-info');
		
	if(this_element.children("a").attr("class") == "open"){
		zimmer_schliessen();
		$("#content_left").animate({ width:'60%' });
		$("#content_left").attr("class", "closed");
	}
	else{
		if($("#content_left").attr("class")!="open"){
			$("#content_left").animate({ width:'100%' });
			$("#content_left").attr("class", "open");
		}
		
		zimmer_schliessen();
		
		this_element.css("borderRadius", "10px 10px 0 0");
		this_element.next("dd").slideDown("fast");
		this_element.css("borderBottom", "1px solid #d2c57f");
		this_element.children("a").removeClass('closed').addClass("open");
		this_element.find(".sonne").css("display", "block");
		this_element.css("display", "block");
		$("#button_left").show(300);
		$("#button_right").show(300);
		
		$(img_id).attr("data-info", "open");
		$(img_id).show(300);
		
	}
}

function zimmer_oeffnen(){
	
	var hoehe = window.innerHeight;
	$('#wrapper').css("padding-top", hoehe + 'px');
	
	$('#content_left').css("minHeight", window.innerHeight+100+"px");
	
	
	$('html, body').stop().animate({ scrollTop: (hoehe-115)}, 1000, function(){
		
		document.getElementById('wrapper').style.paddingTop = 115+"px";
		$('html, body').stop().animate({ scrollTop: 0},0);

		var zimmer_item = $(".zimmer_head.active");
		if (!zimmer_item.length) {
            zimmer_item = $(".zimmer_head").eq(0);
		}
		zimmer_laden(zimmer_item);
	});
	
}
function zimmer_schliessen(){
	
	$('dd').stop().slideUp("fast");
	$('dt > a').removeClass('open').addClass("closed");
	$('dt').css("borderRadius", "10px");
	$('dt').css("border", "none");
	$('.sonne').css("display", "none");
	
	$(".zimmerbilder").hide(300);
	$(".zimmerbilder").attr("data-info", "closed");
	$("#button_left").stop().hide(300);
	$("#button_right").stop().hide(300);
	
	$(".preistabelle").attr("data-info", "closed");
	$(".preistabelle").stop().fadeOut(300);
	$(".zimmer_nav a").css("fontWeight", "normal");
	$(".grundriss_img").stop().fadeOut(300);
	$(".zimmer_descr_img").stop().fadeOut(300);
	
	$(".zimmerbilder").cycle(0);
}


function preistabelle_schliessen(){
	$(".zimmer_nav ul li").children("a").css("font-weight", "normal");
	$(".preistabelle").attr("data-info", "closed");
	$(".preistabelle").fadeOut(300);
	$(".zimmer_nav_img").stop().fadeOut(300);
	
	var kategorie = $("dt").children("a.open").parent("dt").attr("data-info");
	$("#button_left").stop().show(300);$("#button_right").stop().show(300);
	$("#"+kategorie).stop().show(300);
}
function buchungsinformationen(){
		
	$("body").append("<div class='grau'> </div>");
	
	var dialog_title;
		
	if(glob_cms_lang == "ger")
		dialog_title = "Buchungsinformationen";
	if(glob_cms_lang == "eng")
		dialog_title = "booking informations";
	
	$( "#buchungsinformationen" ).dialog({
		dialogClass: "no-close",
		closeOnEscape: false,
		title: dialog_title,
		position: {my: "center", at: "center", of: window},
		collision:'none',
		width:'1000px'
	});
	elements_relative();
}	
function dialog_close(){
	$(".grau").remove();
	
	$( "#buchungsinformationen" ).dialog( "close" );
}


////////////////////////////////////////////////////////////

$(document).ready(function() {
	
	
	elements_relative();
	zimmer_oeffnen();
	

	$(".zimmerbilder").cycle({ 
		prev:   '#button_left', 
		fx:      'fade', 
		next:   '#button_right', 
		timeout: 0
	});
	
	
	
	$("dt").click(function(){
		
		zimmer_laden($(this));
	});
	$("dt").hover(function(){
		$(".sonne", this).stop().fadeIn(200);
	},
	function(){
		if($("a", this).attr("class") != "open")
			$(".sonne", this).stop().fadeOut(200);
	});
	
	
	
	
	$(".grundriss_button").click(function(){
		
		$(".zimmer_nav ul li").children("a").css("font-weight", "normal");
		$(this).css("font-weight", "bold");
		
		if($(".grundriss_img").css("display") != "none"){
			$(".zimmer_nav_img").slideUp(300);
			$(this).css("font-weight", "normal");
		}
		else{
			
			if($(".zimmer_descr_img").css("display") != "none"){
				$(".zimmer_nav_img").fadeOut(0);
				$("dd").find(".grundriss_img").fadeIn(300);
			}
			else{
				$(".zimmer_nav_img").fadeOut(0);
				$("dd").find(".grundriss_img").slideDown(300);
			}
		}
	});
	
	
	
	$(".preise_button").click(function(){
		
		var id		= $(this).attr("data-info");
		var id_img 	= $(this).parent().parent().parent().parent().attr("data-info");
		
		$(".zimmer_nav ul li").children("a").css("font-weight", "normal");
		$(this).css("font-weight", "bold");
		
		if($("#"+id).css("display") == "none"){
			$(".zimmerbilder").slideUp(300);
			$("#button_left").fadeOut(300);$("#button_right").fadeOut(300);
			$(".preistabelle").attr("data-info", "closed");
			$(".preistabelle").fadeOut(300);
			
			$(".preistabelle tr").css("fontWeight", "normal");
			$("tr[data-info='"+id_img+"']").css("fontWeight", "bold");
			$("#"+id).attr("data-info", "open");
			$("#"+id).fadeIn(300);
		}
		else{
			if($(".grundriss_img").css("display") == "none"){
				preistabelle_schliessen();
				$(".zimmer_nav_img").slideUp(300);
			}
		}
		
		if($(".zimmer_descr_img").css("display") == "none"){
			
			if($(".grundriss_img").css("display") != "none"){
				$(".zimmer_nav_img").fadeOut(0);
				$("dd").children(".zimmer_descr_img").fadeIn(300);
			}
			else{
				$(".zimmer_nav_img").fadeOut(0);
				$("dd").children(".zimmer_descr_img").slideDown(300);
			}
		}
	});
	
	
	
	$("td[data-info='preistabelle_button']").click(function(){
		
		zimmer_schliessen();
		
		var dt_aktuell = $("dt[data-info='"+ $(this).parent().attr("data-info") +"']");
		
		$(dt_aktuell).css("borderRadius", "0 10px 0 0");
		$(dt_aktuell).next("dd").slideDown("fast");
		$(dt_aktuell).children("a").removeClass('closed').addClass("open");
		$(".sonne", dt_aktuell).css("display", "block");
		
		var tabelle_id = $(this).parents(".preistabelle").attr("id");
		
		$(".preistabelle tr").css("fontWeight", "normal");
		$("tr[data-info='"+ $(this).parent().attr("data-info") +"']").css("fontWeight", "bold");
		$("#"+tabelle_id).fadeIn(300);
		
		$(".preise_button[data-info='"+tabelle_id+"']").css("fontWeight", "bold");
		$(".zimmer_nav_img").fadeOut(0);
		$("dd").children(".zimmer_descr_img").fadeIn(300);
	});
	
	
	
	$(".preistabelle .jahr span").click(function(){
		
		if($(this).hasClass("active") == false){
			
			var jahr = $(this).attr("data-jahr");
			
			$(".preistabelle .jahr span").removeClass("active");
			$(".preistabelle .jahr span[data-jahr='"+jahr+"']").addClass("active");
			
			var preise = $(".preistabelle .preise");
			preise.hide();
			preise.removeClass("active");
			
			$(".preistabelle .preise[data-jahr='"+jahr+"']").addClass("active").show();
		}
	});
	
	
	$(window).on('resize', function(){
		elements_relative();
	});
	$(window).on('scroll', function(){
		elements_relative();
	});
	
});

