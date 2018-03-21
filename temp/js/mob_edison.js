$(document).ready(function() {
    $('#img_slideshow').find("img").eq(0).load(function () {
        $('#img_slideshow').lightSlider({
            adaptiveHeight: false,
            item:1,
            slideMargin:0,
            loop:true,
            auto: true,
            pause: 4000
        });
    });
	
	$("#nav_open").click(function(){
		
		var nav_items = $("#nav_items");
		
		if(nav_items.attr("class") == "closed"){
			nav_items.slideDown(300);
			nav_items.attr("class", "open");
		}
		else{
			nav_items.slideUp(300);
			nav_items.attr("class", "closed");
		}
	});
	
	$(".nav_2_header").click(function(){
		
		var nav_content = $("#nav_2_content");
		
		if(nav_content.attr("class") == "closed"){
			nav_content.slideDown(300);
			nav_content.attr("class", "open");
		}
		else{
			nav_content.slideUp(300);
			nav_content.attr("class", "closed");
		}
	});
	
	$("#nav_change_lang").click(function(){
		
		cms_change_lang($(this).find(".flag-icon").attr("data-lang"));
	});
	
});