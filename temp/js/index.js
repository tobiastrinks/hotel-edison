function elements_relative(){

	//vertical-align Beschreibungstext
	
	var hoehe_bilder	= $(".index_nav_img").height();
	var text			= $("#index_nav > .description_article");
	var hoehe_text		= text.children("div").height();
	
	text.css("height", hoehe_bilder+"px");
	text.children("div").css("margin-top", (hoehe_bilder-hoehe_text)/2 + "px");
	$("#wrapper_bg").css("height", window.innerHeight+"px");
}

function index_wrapper_paddingtop(){
	var breite = $("body").width();
	var hoehe_window = window.innerHeight;
	
	$("#wrapper").css("paddingTop", hoehe_window);
}

function home_dia_cycle () {
    $("#home_dia").cycle({
        prev:   '#home_dia_prev',
        fx:      'fade',
        next:   '#home_dia_next',
        slideResize: 0,
        timeout: 6000
    });
}

//////////////////////////////


$(document).ready(function() {
	index_wrapper_paddingtop();
	
	$(".index_nav_img").find("img").load (function () {
		elements_relative ();
	});

	var homeDiaImg = $("#home_dia").find("img");
	if(homeDiaImg.length){

	    // prioritize angebotImg before home_dia
        var angebotImg = $(".angebot-content-body-img").find("img");
        if (angebotImg.length) {

            var src = [];
            homeDiaImg.each(function(index, item){
                src.push($(item).attr("src"));
                $(item).attr("src", "");
            });

            angebotImg.load(function () {
                homeDiaImg.each(function(index, item){
                    $(item).attr("src", src[index]);
                });
                home_dia_cycle();
            });
        } else {
            home_dia_cycle();
        }
	}
	
	$(".index_nav_img_wrapper").hover(function(){

		$(this).find(".index_nav_descr").stop().fadeIn(300);
	},
	function(){
		
		$(this).find(".index_nav_descr").stop().fadeOut(300);
		
	});

	$("i[data-info='button_content'], .nav_bottom_page:first-child").click(function(){
		
		var hoehe_window = window.innerHeight;
		
		$('html, body').animate({scrollTop: (hoehe_window-115)}, 1000);
		$("#content_left").attr("class", "open");
		
	});
	$(window).on("resize", function(){
	
		elements_relative();
		index_wrapper_paddingtop();
	});
	
});
