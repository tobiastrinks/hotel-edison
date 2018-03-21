function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
} 

function scroll_top(){
	
	var hoehe = window.innerHeight;
	document.getElementById('wrapper').style.paddingTop = hoehe + 'px';
	
	$('#content_left').css("minHeight", window.innerHeight+100+"px");
	
	$('html, body').stop().animate({ scrollTop: (hoehe-115)}, 1000, function(){
		document.getElementById('wrapper').style.paddingTop = 115+"px";
		$('html, body').stop().animate({ scrollTop: 0}, 0);
	});
	
}
function nav_relative(cookie_nav_bottom) {
	
	//scrollen links/rechts
	var left_pos = $(window).scrollLeft();
	
	if(left_pos != 0){
		$("#nav").css("left", -left_pos);
		if(cookie_nav_bottom == "open")
			$("#nav_bottom").css("left", -left_pos);
	}
	else{
		if($("#nav").css("left") != "0")
			$("#nav").css("left", 0);
		if(cookie_nav_bottom == "open")
			$("#nav_bottom").css("left", 0);
	}
	
}


$(document).ready(function() {
	
	var cookie_nav_bottom = "open";
	
	/*nav_lang*/
	$("#nav_lang").click(function(){
	
		cms_change_lang( $(this).find(".nav_lang_button").attr("data-lang") );
	});
	
	/*open nav_bottom*/
	if(getCookie("nav_bottom") != "")
		cookie_nav_bottom = getCookie("nav_bottom");
	
	if(cookie_nav_bottom == "open"){
		$("#nav_bottom_open").fadeOut(0);
		$("#nav_bottom").animate({"left": 0}, 500);
		$("#wrapper").css("padding-bottom", $("#nav_bottom").height() + "px");
	}
	else{
		$("#nav_bottom_open").fadeIn(0);
		$("#wrapper").css("padding-bottom", "0px");
	}
	
	$(window).on("scroll", function(){
		nav_relative(cookie_nav_bottom);
	});
	
	
	$(".nav_bottom_page:first-child").click(function(){
		$("#nav_bottom").animate({"left": "100%"}, 500, function(){
			$("#nav_bottom_open").fadeIn(500);
		});
		$("#wrapper").css("padding-bottom", 0);
		document.cookie = "nav_bottom=closed;";
		cookie_nav_bottom = "closed";
	});
	$("#nav_bottom_open").click(function(){
		$("#nav_bottom_open").fadeOut(0);
		$("#nav_bottom").animate({"left": 0}, 500);
		$("#wrapper").css("padding-bottom", $("#nav_bottom").height() + "px");
		document.cookie = "nav_bottom=open;";
		cookie_nav_bottom = "open";
	});

	$("#telefon").hover(function (){
		$("#telefon_box").stop().fadeIn(300);
	},
	function(){
		$("#telefon_box").stop().fadeOut(300);
	});
	$("#anfrage").hover(function (){
		$("#anfrage_box").stop().fadeIn(300);
	},
	function(){
		$("#anfrage_box").stop().fadeOut(300);
	});

});