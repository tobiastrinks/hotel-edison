function elements_relative(){}
function anfrage_oeffnen(){
	

	var anfrage_head = $(".anfrage_head[data-info='buchungstyp']");
	
	anfrage_head.next("dd").slideDown("fast");
	anfrage_head.css("borderRadius", "10px 10px 0 0").css("display", "block");
	anfrage_head.children("a").removeClass('closed').addClass("open");
	anfrage_head.children(".sonne").css("display", "block");

	datepicker_function();
	
}
function datepicker_function(){
	$( ".datepicker" ).datepicker({
		inline: true,
		showOtherMonths: true,
		dateFormat: "dd.mm.yy"
	});
		
		
	$.datepicker.regional['de'] = {clearText: 'löschen', clearStatus: 'aktuelles Datum löschen',
	closeText: 'schließen', closeStatus: 'ohne Änderungen schließen',
	prevText: '<', prevStatus: 'letzten Monat zeigen',
	nextText: '>', nextStatus: 'nächsten Monat zeigen',
	currentText: 'heute', currentStatus: '',
	monthNames: ['Januar','Februar','März','April','Mai','Juni', 'Juli','August','September','Oktober','November','Dezember'],
	monthNamesShort: ['Jan','Feb','Mär','Apr','Mai','Jun', 'Jul','Aug','Sep','Okt','Nov','Dez'],
	monthStatus: 'anderen Monat anzeigen', yearStatus: 'anderes Jahr anzeigen',
	weekHeader: 'Wo', weekStatus: 'Woche des Monats',
	dayNames: ['Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag'],
	dayNamesShort: ['So','Mo','Di','Mi','Do','Fr','Sa'],
	dayNamesMin: ['So','Mo','Di','Mi','Do','Fr','Sa'],
	dayStatus: 'Setze DD als ersten Wochentag', dateStatus: 'Wähle D, M d',
	dateFormat: 'dd.mm.yy', firstDay: 1, 
	initStatus: 'Wähle ein Datum', isRTL: false};
	
	$.datepicker.setDefaults($.datepicker.regional['de']);
}

function weiter(){
	
	var this_element = $("dd:visible").last().prev("dt").attr("data-info");
	

	var weiter = false;
	
	if(this_element == "buchungstyp"){
		if($('input[type=radio][name=buchungstyp]:checked').val() != undefined){
			weiter = true;
		}
		
	}
	
	if(this_element == "reisezeitraum"){
	
		if($("dd[data-info='reisezeitraum'] #anreise").val() != 0){
			
			if($('input[type=radio][name=buchungstyp]:checked').val() == "arr")
				weiter=true;
			else{
				if($("dd[data-info='reisezeitraum'] #abreise").val() != 0)
					weiter=true;
			}
			
		}
		
	}
	
	if(this_element == "zimmertyp"){
		if($('input[type=radio][name=zimmertyp]:checked').val() != undefined){
			weiter = true;
		}
	}
	
	if(this_element == "reiseteilnehmer"){
		weiter = true;
	}
	
	if(this_element == "zusatzleistungen"){
		weiter = true;
	}
	
	if(this_element == "anmerkungen"){
		weiter = true;
	}

	if(weiter == true){
	
		for(var x=0; x<$("dt[data-info]").length; x++){
			if($("dt[data-info]").eq(x).attr("data-info") == this_element)
				var next_element = $("dt[data-info]").eq(x+1);
		}
	
		$("dd[data-info='"+this_element+"']").children(".weiter").hide(300);
		next_element.css("borderRadius", "10px 10px 0 0");
		next_element.next("dd").slideDown("fast");
		next_element.children("a").removeClass('closed').addClass("open");
		next_element.children(".sonne").css("display", "block");
	
	}
}

function reset_arr(){
	$("#abreise2").attr("value", "");
}
function reisezeitraum_change(){
		
	var anreise_datum = moment($("dd[data-info='reisezeitraum'] #anreise").val(), "DD.MM.YYYY");
		
		var anr_m = anreise_datum.format("M");
		var anr_d = anreise_datum.format("D");
		var arr_tage;
		
		var monate		= ["Januar",
							"Februar",
							"März",
							"April",
							"Mai",
							"Juni",
							"Juli",
							"August",
							"September",
							"Oktober",
							"November",
							"Dezember"];
							
		
		var open_id;
		var monat_wort = 0;
		
		if($("dd[data-info='reisezeitraum'] #anreise").val() != ""){
			for(var x=0; x >= 0; x++){
				
				var buchbarkeit = $(".buchbarkeit:eq("+x+")");
				if(buchbarkeit.text().length == 0){
					x=-2;
				}
				if(monat_wort == 0){
					
					monat_wort = 1;
					
					for(var y=0; y<12; y++){
						
						if(buchbarkeit.text().search(monate[y]) > -1){ //Monat als Wort im Arr vorhanden?
							monat_wort=0;
						}
						
						if(buchbarkeit.text().search(monate[y]) > -1  &&  anr_m == y+1){
							open_id = buchbarkeit.parent("span").parent("div").attr("id");//ID zuordnen
						}
					}
				}
				
				if(monat_wort == 1){ //Monat nicht als Wort
					
					var buchbarkeit_cache 	= buchbarkeit.text().replace("/","");
					var buchbarkeit_laenge 	= buchbarkeit_cache.length;
					
					for(var y=0; y<buchbarkeit_laenge; y=y+10){
						
						if(buchbarkeit_cache.substr(y, y+10) == anreise_datum.format("DD.MM.YYYY")){
							open_id = buchbarkeit.parent("span").parent("div").attr("id");//ID zuordnen
						}
					}
				}
			}
		
			$(".abreise_arr[data-info='info_arr'] h2").show(300);	
			
			if($(".abreise_arr").children("#"+open_id).css("display") == "none"){
				$(".abreise_arr[data-info='info_arr'] .info_arr_content").hide(300);
				$(".abreise_arr #"+open_id).show(300);
			}
			
		}
		
		arr_tage = $("#"+open_id).find(".dauer").text();
		arr_tage = parseInt( arr_tage );
		
		
		//Endtag berechnen
		var reisedauer = moment($("#abreise2").val(), "DD.MM.YYYY")-moment($("#anreise").val(), "DD.MM.YYYY");
		reisedauer = Math.round(reisedauer/86400000);
		
		if(reisedauer < arr_tage || $(".abreise_arr input").val() == 0){
			
			var abreise_datum = anreise_datum.add(arr_tage, "day").format("DD.MM.YYYY");
		
			if(abreise_datum != "Invalid date")
				$(".abreise_arr input").attr("value",abreise_datum);
			
			if(reisedauer < arr_tage)
				alert("Mindestbuchungsdauer: "+(reisedauer+1)+" Tage")
		}
		
		
		//Verlängerbarkeit
		var verlaengerbar = $("#"+open_id).find(".verlaengerbar").text();
		
		if(verlaengerbar == "1")
			$("#arr_verl").show(300);
		else
			$("#arr_verl").hide(300);
		
	
}
function zusammenfassung_aktualisieren(){
						
	var buchungstyp_id		= $('input[type=radio][name=buchungstyp]:checked').attr("id");
	var buchungstyp_text 	= $("label[for='"+buchungstyp_id+"']").text();
	
	var reisezeitraum_von	= $("input[type=text][name=anreise]").val();
	var reisezeitraum_bis;
	
	if(buchungstyp_id == "arr")
		reisezeitraum_bis 	= $(".abreise_arr input").val(); 
	else
		reisezeitraum_bis 	= $("#abreise_change input").val();
	
	
	var zimmertyp_id		= $('input[type=radio][name=zimmertyp]:checked').attr("id");
	var zimmertyp_text 		= $("label[for='"+zimmertyp_id+"']").text();
	
	
	var reiseteilnehmer_e		= $('select[id="erw"]').val();
	var reiseteilnehmer_e_text	= $("label[for='erw']").text();
	
	var reiseteilnehmer_k1		= $('select[id="kin_0_3"]').val();
	var reiseteilnehmer_k1_text	= $("label[for='kin_0_3']").text();
	
	var reiseteilnehmer_k2		= $('select[id="kin_4_6"]').val();
	var reiseteilnehmer_k2_text	= $("label[for='kin_4_6']").text();
	
	var reiseteilnehmer_k3		= $('select[id="kin_7_12"]').val();
	var reiseteilnehmer_k3_text	= $("label[for='kin_7_12']").text();
	
	var anmerkungen				= $("textarea[name=anmerkungen]").val();
	
	
	var zusatzleistungen_gar;
	if($('input[id=garage]').prop("checked") == true)
		zusatzleistungen_gar	= $("label[for='garage']").text();
	
	var zusatzleistungen_haustier;
	if($('input[id=haustier]').prop("checked") == true)
		zusatzleistungen_haustier	= $("label[for='haustier']").text();
	
	
	$("#zsf_buchungstyp").text(buchungstyp_text);
	
	$("#zsf_reisezeitraum").text("vom "+reisezeitraum_von+" bis zum "+reisezeitraum_bis);
	
	$("#zsf_zimmertyp").text(zimmertyp_text);
	
	
	$("#zsf_zusatzleistungen_erw").css("display", "block");
	$("#zsf_zusatzleistungen_erw").text(reiseteilnehmer_e + " " + reiseteilnehmer_e_text);
	
	if(reiseteilnehmer_k1 != "0"){
		$("#zsf_zusatzleistungen_kin_0_3").text(reiseteilnehmer_k1 + " " + reiseteilnehmer_k1_text);
		$("#zsf_zusatzleistungen_kin_0_3").css("display", "block");
	}
	else{
		$("#zsf_zusatzleistungen_kin_0_3").css("display", "none");
	}
	
	if(reiseteilnehmer_k2 != "0"){
		$("#zsf_zusatzleistungen_kin_4_6").text(reiseteilnehmer_k2 + " " + reiseteilnehmer_k2_text);
		$("#zsf_zusatzleistungen_kin_4_6").css("display", "block");
	}
	else{
		$("#zsf_zusatzleistungen_kin_4_6").css("display", "none");
	}
	
	if(reiseteilnehmer_k3 != "0"){
		$("#zsf_zusatzleistungen_kin_7_12").text(reiseteilnehmer_k3 + " " + reiseteilnehmer_k3_text);
		$("#zsf_zusatzleistungen_kin_7_12").css("display", "block");
	}
	else{
		$("#zsf_zusatzleistungen_kin_7_12").css("display", "none");
	}
	
	
	
	if(zusatzleistungen_gar == undefined && zusatzleistungen_haustier == undefined)
		$("#zsf_zusatzleistungen_keine").css("display", "block");
	else
		$("#zsf_zusatzleistungen_keine").css("display", "none");
	
	if(zusatzleistungen_gar != undefined){
		$("#zsf_zusatzleistungen_garage").css("display", "block");
		$("#zsf_zusatzleistungen_garage").text(zusatzleistungen_gar);
	}
	else{
		$("#zsf_zusatzleistungen_garage").css("display", "none");
	}
	
	if(zusatzleistungen_haustier != undefined){
		$("#zsf_zusatzleistungen_haustier").css("display", "block");
		$("#zsf_zusatzleistungen_haustier").text(zusatzleistungen_haustier);
	}
	else{
		$("#zsf_zusatzleistungen_haustier").css("display", "none");
	}
	
	
	if(anmerkungen != ""){
		$("#zsf_anmerkungen").text(anmerkungen);
	}
	else{
		$("#zsf_anmerkungen").text("keine");
	}
	
	
}



/////////////////////////////////////////////////////////////


$(document).ready(function() {
	elements_relative();
	anfrage_oeffnen();
	
	var slider = 0;
	
	//Reload on back button
	window.onpageshow = function(event) {
		if (event.persisted) {
			window.location.reload() 
		}
	};
	document.getElementById("form_anfrage").reset();
	
	
	//Formularvollständigkeit	
	var form = document.getElementById('form_anfrage'); // form has to have ID: <form id="formID">
	form.noValidate = true;
	form.addEventListener('submit', function(event) { // listen for form submitting
		if (!event.target.checkValidity()) {
			event.preventDefault(); // dismiss the default functionality
			alert('*Bitte füllen Sie alle markierten Felder aus.'); // error message
		}
	}, false);
		
	
	////// AUSFÜLLEN
	
	$(".weiter a").click(function(){
		weiter();
	});
	$("dt").click(function(){
		weiter();
	});
	$('input[type=radio][name=buchungstyp]').change(function() {
						
		
		//Wechsel von Arr zu HP -> Datumsübernahme
			if($('input[type=radio][name=buchungstyp]:checked').attr("id") != "arr"
			&& $(".abreise_arr input").attr("value") != undefined
			&& $("#abreise_change input").attr("value") == undefined){
				
				$("#abreise1").val($("#abreise2").attr("value"));
				
			}
		zusammenfassung_aktualisieren();
		
		
		if (this.value == 'arr') {
			$("#abreise_change").hide(300, function(){$(".abreise_arr").show(300);});
			
			$("#feiertag_info").show(300);
		}
		else{
			$(".abreise_arr").hide(300, function(){$("#abreise_change").show(300);});
			$("#feiertag_info").hide(300);
		}
		
		
		reisezeitraum_change();
	});
	
	
	$('input.datepicker').change(function() {
		
		
		if($('input[type=radio][name=buchungstyp]:checked').attr("id") != "arr")
			$(".abreise_arr input").attr("value", "");
		
		if($(this).attr("id") == "anreise"){
			reset_arr();
		}
			
		reisezeitraum_change();
		zusammenfassung_aktualisieren();
	});
	$(".feiertag_select").click(function(){
					
		var datum = $(this).text();
		datum = datum.replace(datum.slice(datum.indexOf(" bis "), datum.length) , "");
		
		$(".datepicker").datepicker('setDate', datum);
		
		reset_arr();
		reisezeitraum_change();
		zusammenfassung_aktualisieren();
	});
	$('#abreise_change input[type=text][name=abreise]').change(function() {
		zusammenfassung_aktualisieren();
	});
	$(".arr_verl_button").click(function(){
	
		var abreise_datum = moment($("dd[data-info='reisezeitraum'] #abreise2").val(), "DD.MM.YYYY");


		if($(this).attr("id") == "prev_verl"){
			abreise_datum = abreise_datum.add(-1, "day").format("DD.MM.YYYY");
		}
		if($(this).attr("id") == "next_verl"){
			abreise_datum = abreise_datum.add(1, "day").format("DD.MM.YYYY");
		}
		
		$(".abreise_arr input").attr("value",abreise_datum);
		
		
		reisezeitraum_change();
		
		zusammenfassung_aktualisieren();
	});
	
	
	
	$('input[type=radio][name=zimmertyp]').change(function() {
		
		zusammenfassung_aktualisieren();
		
		var img_id = $('input[type=radio][name=zimmertyp]:checked').val();
		
	
		$(".zimmerbilder").attr("data-info", "closed");
		
		$("#"+img_id).attr("data-info", "open");
		$("#"+img_id).show(0);
		
		if(slider != 0)
				slider.destroy();
			
		slider = 	$("#"+img_id).lightSlider({
						adaptiveHeight:true,
						item:1,
						slideMargin:0,
						loop:true
					});
		
		$(".zimmerbilder[data-info='closed']").hide(0);
		
	});
	
	$('select.reiseteilnehmer_input').change(function() {
		zusammenfassung_aktualisieren();
	});
	
	$('input.zusatzleistungen_input').change( function() {
		zusammenfassung_aktualisieren();
	});
	
	$("#anmerkungen").bind('input propertychange', function() {
	zusammenfassung_aktualisieren();
	});
		
		
	$(window).on('resize', function(){
		elements_relative();
	});
	$(window).scroll(function(){
		elements_relative();
	});
		
	

	
});





