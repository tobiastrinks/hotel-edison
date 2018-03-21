var slider = 0;

function zimmer_oeffnen(dtItem) {
    reset_zimmernav();

    var this_dd = dtItem.next("dd");

    var dd_active = $("dd.active");

    if(this_dd.attr("class") == "closed"){

        $("dt").css("border-radius", "10px");
        dd_active.stop().slideUp(500);
        $("dt").find(".sonne").stop().fadeOut(300);
        dd_active.attr("class", "closed");

        $(this).css("border-radius", "10px 10px 0 0");
        this_dd.stop().slideDown(500);
        $(this).find(".sonne").stop().fadeIn(300);
        this_dd.attr("class", "active");

        if(slider != 0)
            slider.destroy();

        slider = this_dd.find('.zimmerbilder').lightSlider({
            adaptiveHeight:true,
            item:1,
            slideMargin:0,
            loop:true
        });

    }
    else{
        $("dt").find(".sonne").stop().fadeOut(300);
        $("dt").css("border-radius", "10px");
        dd_active.stop().slideUp(500);
        dd_active.attr("class", "closed");
    }
}
function reset_zimmernav(){
	
	$(".zimmer_info").css("display", "none");
	$(".zimmerbilder").show(0);
	
}

function dialog_close(){
	$(".grau").remove();
	$( "#buchungsinformationen" ).dialog( "close" );
}

$(document).ready(function() {

	$(".zimmer_head").click(function(){
		zimmer_oeffnen($(this))
	});

	var activeZimmer = $(".zimmer_head.active");
	if (activeZimmer.length) {
        activeZimmer.next("dd").find(".zimmerbilder").find("img").eq(0).load(function () {
            zimmer_oeffnen(activeZimmer)
        });
    }
	
	$(".zimmer_nav_button").click(function(){
		
		if($(this).hasClass("active") == false){
			
			var this_class = $(this).attr("data-content");
			this_class = this_class.replace('_button','');
			
			if(this_class == "zimmerbilder"){
				
				var this_dd = $("dd.active");
				
				if(slider != 0)
					slider.destroy();
				
				slider = 	this_dd.find('.zimmerbilder').lightSlider({
								adaptiveHeight:true,
								item:1,
								slideMargin:0,
								loop:true
							});
			}
			
			$(".zimmer_info").css("display", "none");
			$("."+this_class).fadeIn(500);
			
			$(".zimmer_nav_button").removeClass("active");
			$(this).addClass("active");
		}
	});
	
	
	$(".buchungsinformationen_button").click(function(){
		
		var dialog_title;
		
		if(glob_cms_lang == "ger")
			dialog_title = "Buchungsinformationen";
		if(glob_cms_lang == "eng")
			dialog_title = "booking informations";
		
		$("body").append("<div class='grau'> </div>");
		
		$( "#buchungsinformationen" ).dialog({
			dialogClass: "no-close",
			closeOnEscape: false,
			title: dialog_title,
			position: {my: "center", at: "left", of: $("#wrapper")},
			collision:'none',
			width:"100%"
		});
		
	});
	
	$(".jahr span").click(function(){
		
		if($(this).hasClass("active") == false){
			
			var jahr = $(this).attr("data-jahr");
			
			$(".jahr span").removeClass("active");
			$(".jahr span[data-jahr='"+jahr+"']").addClass("active");
			
			var preise = $(".preisfeld");
			preise.hide();
			preise.removeClass("active");
			
			$(".preisfeld[data-jahr='"+jahr+"']").addClass("active").show();
		}
	});
});