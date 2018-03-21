function tagung_anfragen(){
	$("body").append("<div class='grau'> </div>");
	$( "#tagung_anfragen" ).dialog({
		dialogClass: "no-close",
		closeOnEscape: false,
		title: "Anfragen",
		position: {my: "center", at: "center", of: window},
		collision:'none',
		width:'450px'
	});
}
function dialog_close(){
	$(".grau").remove();
	$( "#tagung_anfragen" ).dialog( "close" );
}
function dialog_relative(){
	$center_pos = "left+"+(($("body").width()/2)-($("#tagung_anfragen").width()/2)-$(window).scrollLeft())+" top+"+(($(window).height()/2)-($("#tagung_anfragen").height()/2));
	$("#tagung_anfragen").dialog("option", "position", {my: $center_pos, at: "left top", of: window});
}

/////////////////////


$(window).on('resize', function(){
	elements_relative();
	dialog_relative();
});
$(window).on('scroll', function(){
	elements_relative();
	dialog_relative();
});