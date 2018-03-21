<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<meta name="robots" content="index,follow" />

<meta name="author" content="Sylvia Koppermann" />
<meta name="copyright" content="Astrotel Internetmarketing GmbH" />
<meta name="publisher" content="Astrotel Internetmarketing GmbH" />
<meta name="siteinfo" content="<?=$home_dir;?>robots.txt" />
<meta name="language" content="de" />

<link rel="alternate" hreflang="de" href="http://www.hotel-edison.de/" />
<link itemprop="url" href="http://www.hotel-edison.de/" />
<link rel="canonical" href="http://www.hotel-edison.de/" />
<link href="https://plus.google.com/b/116904582506891831777/+HoteledisonDeImOstseebadKühlungsbornMVP/" rel="publisher" />

<link rel="stylesheet" href="<?=$home_dir;?>temp/style/<?php if($device=="mobile") echo'mob_'; ?>style.css" />
<link rel="stylesheet" href="<?=$home_dir;?>temp/flag-icon-css-master/css/flag-icon.min.css" />

<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50984323-1', 'auto');
  ga('set', 'anonymizeIp', true);
  ga('send', 'pageview');

</script>

<script type="text/javascript" src="<?=$home_dir;?>cms/basic/jquery.js"></script>
<script type="text/javascript" src="<?=$home_dir;?>cms/basic/jqueryui.js"></script>

<?php
	if($device == "mobile"){
		?>
		<script type="text/javascript" src="<?=$home_dir;?>temp/lightslider/js/lightslider.js"></script>
		<link rel="stylesheet" href="<?=$home_dir;?>temp/lightslider/css/lightslider.css" />
		
		<?php
	}
	else{
		?>
		<script type="text/javascript" src="<?=$home_dir;?>temp/js/jquery.cycle.all.min.js"></script>
		<?php
	}
?>
<script type="text/javascript" src="<?=$home_dir;?>temp/js/<?php if($device=="mobile") echo'mob_'; ?>edison.js"></script>


<?php

/*	 	PREISE 
	
		1: 	Winter & Meer
			Jan., Feb., Nov., Dez.
			
		2:	Ahoi Kühlungsborn
			Mär., Apr., Okt.
			
		3:	Baltic Flair
			Mai, Jun., Sep.
			
		4:	Erlebnis Ostsee
			Jul., Aug.
		
		a:	mit Arr.-Vorteil
		
	min_a:	ab wie vielen Tagen erhält man den Arr.-Vorteil
*/

	//Preistabelle Zimmernamen
	$zimmername		= array("Doppelzimmer Classic",
							"Doppelzimmer Classic Plus",
							"Doppelzimmer Comfort",
							"Junior Appartement",
							"Senior Appartement",
							"Panorama Suite");
							
	$zimmervar		= array("doppel_classic",
							"doppel_classic_plus",
							"doppel_comfort",
							"junior_app",
							"senior_app",
							"suite");
	
	$preis_jahr	= array("2017", "2018");
	
	//array number
	$preis_jahr_standard = 0;
	$preis_kurzurlaub = 0;
	
	$kosten_hp	= array(21);
	
	
	//Doppelzimmer Classic
		
		$doppel_classic_1 	= array(39, 40);
		$doppel_classic_1a	= array(45.5, 46.5);
		
		$doppel_classic_2 	= array(46, 47);
		$doppel_classic_2a	= array(51, 52);
		
		$doppel_classic_3 	= array(56, 57);
		$doppel_classic_3a	= array(65, 67);
		
		$doppel_classic_4 	= array(60, 61);
		$doppel_classic_4a	= array(72, 74);
		
		$doppel_classic_5a 	= array(255);
		$doppel_classic_6a	= array(231);
		$doppel_classic_7a	= array(363);
	
	//Doppelzimmer Classic Plus

		$doppel_classic_plus_1 		= array(40, 42);
		$doppel_classic_plus_1a		= array(48.5);
		
		$doppel_classic_plus_2 		= array(49, 51);
		$doppel_classic_plus_2a		= array(56);
		
		$doppel_classic_plus_3 		= array(61, 62);
		$doppel_classic_plus_3a		= array(70);
		
		$doppel_classic_plus_4 		= array(67, 69);
		$doppel_classic_plus_4a		= array(77);
		
		$doppel_classic_plus_5a 	= array(270);
		$doppel_classic_plus_6a		= array(240);
		$doppel_classic_plus_7a		= array(378);
		
		
	//Doppelzimmer Comfort

		$doppel_comfort_1 	= array(47, 49);
		$doppel_comfort_1a	= array(50.5);
		
		$doppel_comfort_2 	= array(54, 57);
		$doppel_comfort_2a	= array(61);
		
		$doppel_comfort_3 	= array(68, 71);
		$doppel_comfort_3a	= array(75);
		
		$doppel_comfort_4 	= array(74, 77);
		$doppel_comfort_4a	= array(82);
		
		$doppel_comfort_5a 	= array(285);
		$doppel_comfort_6a	= array(261);
		$doppel_comfort_7a	= array(393);
		
		
	//Junior Appartement

		$junior_app_1 		= array(53, 55);
		$junior_app_1a		= array(67);
		
		$junior_app_2 		= array(60, 62);
		$junior_app_2a		= array(75);
		
		$junior_app_3 		= array(77, 80);
		$junior_app_3a		= array(80);
		
		$junior_app_4 		= array(83, 86);
		$junior_app_4a		= array(97);
		
		$junior_app_5a 		= array(291);
		$junior_app_6a		= array(291);
		$junior_app_7a		= array(423);
	
	
	//Senior Appartement

		$senior_app_1 		= array(58, 59);
		$senior_app_1a		= array(67);
		
		$senior_app_2 		= array(65, 67);
		$senior_app_2a		= array(75);
		
		$senior_app_3 		= array(82, 84);
		$senior_app_3a		= array(80);
		
		$senior_app_4 		= array(88, 90);
		$senior_app_4a		= array(97);
		
		$senior_app_5a 		= array(291);
		$senior_app_6a		= array(291);
		$senior_app_7a		= array(423);
		
		
	//Panorama Suite

		$suite_1 		= array(70, 72);
		$suite_1a		= array(71);
		
		$suite_2 		= array(76, 80);
		$suite_2a		= array(79);
		
		$suite_3 		= array(89, 94);
		$suite_3a		= array(91);
		
		$suite_4 		= array(97, 104);
		$suite_4a		= array(113);
		
		$suite_5a 		= array(306);
		$suite_6a		= array(306);
		$suite_7a		= array(438);
		
		
	
	//-- ARRANGEMENTS UND FEIERTAGSANGEBOTE --//
	
		$anzahl_arr		= 4; //für Trennung zw Arr und Feiertagsangeboten

		$reihenfolge 	= array("4", "3", "2", "1", "5", "6", "7");

		$visibility		= array(1, 1, 1, 1, 0, 1, 1);
		
		$img_name		= array("winter_meer",
								"ahoi_kuehlungsborn",
								"baltic_flair",
								"erlebnis_ostsee",
								
								"ostern",
								"weihnachten",
								"silvester");
								
		$preis_folgejahr= array("1",
								"1",
								"1",
								"1",
								
								"1",
								"1",
								"1"); /* 1 -> für Folgejahr gültig */

		$dauer			= array("2",
								"3",
								"4",
								"7",
								
								"3",
								"3",
								"3");
								

		$verlaengerbar	= array("1",
								"1",
								"1",
								"1",
								
								"0",
								"0",
								"0");
								
								
		$fixpreis		= array("0",
								"0",
								"0",
								"0",
								
								"1",
								"1",
								"1");
							
							
		$bg_farbe		= array("#00567c",
								"#1c8eb5",
								"#019fae",
								"#bca860",
								
								"#e3b000",
								"#006300",
								"#6f0000");
		
		if($_SESSION["cms_lang"] == "ger"){
			$monate			= array("Januar",
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
									"Dezember");
			
			$headline 		= array("Winter &amp; Meer",
									"Ahoi Kühlungsborn",
									"Baltic Flair",
									"Erlebnis Ostsee",
								
									"Frohe Ostern",
									"Ho Ho Ho",
									"Salut 2018");
			
			$anfrage_name 	= array("Ostern",
									"Weihnachten",
									"Silvester");
			
			$subheadline 	= array("Schneegestöber an der Ostsee",
									"Steife Brise an der Küste",
									"Zeit für Meer",
									"Ihre Urlaubsidee",
								
									"Den Frühling schnuppern",
									"Weihnachten an der Ostsee",
									"Silvesterparty an der Seebrücke");
									
			$buchbarkeit	= array("Januar, Februar, November, Dezember, außer an Feiertagen",
									"März, April, Oktober, außer an Feiertagen",
									"Mai, Juni, September, außer an Feiertagen",
									"Juli, August, außer an Feiertagen",
									
									"14.04.2017",
									"23.12.2017",
									"30.12.2017");
									
			$buchbarkeit_s	= array("Jan., Feb., Nov., Dez.",
									"Mär., Apr., Okt.",
									"Mai, Jun., Sep.",
									"Jul., Aug.",
									
									"14.04.2017",
									"23.12.2017",
									"30.12.2017");
			
			$beschreibung	= array("<li><strong>ab ".$dauer[0]." Übernachtungen</strong></li>
									<li>EDISON Frühstücksbuffet</li>
									<li>Halbpension</li>
									<li class='li_leer'></li>",

									"<li><strong>ab ".$dauer[1]." Übernachtungen</strong></li>
									<li>EDISON Frühstücksbuffet</li>
									<li>Vitamingruß</li>
									<li>Halbpension (3 Gang Menü)</li>",
									
									"<li><strong>ab ".$dauer[2]." Übernachtungen</strong></li>
									<li>Begrüßungssekt</li>
									<li>EDISON Frühstücksbuffet</li>
									<li>Halbpension (3 Gang Menü)</li>",
									
									"<li><strong>ab ".$dauer[3]." Übernachtungen</strong></li>
									<li>Begrüßungscocktail</li>
									<li>EDISON Frühstücksbuffet</li>
									<li>Halbpension (3 Gang Menü)</li>",
									
									
									"<li class='li_leer'></li>
									<li><strong>3 Übernachtungen</strong></li>
									<li>Ostercocktail</li>
									<li>EDISON Frühstücksbuffet</li>
									<li>Karfreitagsmenü</li>
									<li>Osterfestmenü</li>
									<li>Schlemmerbuffet</li>
									<li class='li_leer'></li>
									<li class='li_leer'></li>",
									
									"<li><strong>3 Übernachtungen</strong></li>
									<li>EDISON Frühstücksbuffet</li>
									<li>Begrüßungsmenü</li>
									<li>Kaffeegedeck mit weihnachtlicher Musik</li>
									<li>Glühweingutschein</li>
									<li>Festliches Weihnachtsmenü</li>
									<li>Schlemmerbuffet</li>
									<li>Sauna frei</li>",
									
									"<li><strong>3 Übernachtungen<br />(Donnerstag bis Sonntag<br />oder Freitag bis Montag)</strong></li>
									<li>Silvestercocktail</li>
									<li>EDISON Frühstücksbuffet</li>
									<li>Willkommensmenü</li>
									<li>Gala-Dinner ohne Silvesterfeier</li>
									<li>Katerfrühstück mit Sekt</li>
									<li>Neujahrsabendmenü</li>");
		}
		
		if($_SESSION["cms_lang"] == "eng"){
			$monate			= array("january",
									"february",
									"march",
									"april",
									"may",
									"june",
									"july",
									"august",
									"september",
									"october",
									"november",
									"december");
			
			$headline 		= array("Winter &amp; Meer",
									"Ahoi Kühlungsborn",
									"Baltic Flair",
									"Erlebnis Ostsee",
								
									"Frohe Ostern",
									"Ho Ho Ho",
									"Salut 2018");
			
			$anfrage_name 	= array("Easter",
									"Christmas",
									"New Year's Eve");
			
			$subheadline 	= array("Schneegestöber an der Ostsee",
									"Steife Brise an der Küste",
									"Zeit für Meer",
									"Ihre Urlaubsidee",
								
									"Den Frühling schnuppern",
									"Weihnachten an der Ostsee",
									"Silvesterparty an der Seebrücke");
									
			$buchbarkeit	= array("january, february, november, december, except on holidays",
									"march, april, october, except on holidays",
									"may, june, september, except on holidays",
									"july, august, except on holidays",
									
									"14.04.2017",
									"23.12.2017",
									"30.12.2017");
									
			$buchbarkeit_s	= array("jan., feb., nov., dec.",
									"mar., apr., oct.",
									"may, jun., sep.",
									"jul., aug.",
									
									"14.04.2017",
									"23.12.2017",
									"30.12.2017");
									
			$beschreibung	= array("<li><strong>at least ".$dauer[0]." overnight stays</strong></li>
									<li>EDISON breakfast buffet</li>
									<li>half-board</li>
									<li class='li_leer'></li>",

									"<li><strong>at least ".$dauer[1]." overnight stays</strong></li>
									<li>EDISON breakfast buffet</li>
									<li>'Vitamingruß'</li>
									<li>half-board (three course menu)</li>",
									
									"<li><strong>at least ".$dauer[2]." overnight stays</strong></li>
									<li>welcoming-sparkling-wine</li>
									<li>EDISON breakfast buffet</li>
									<li>half-board (three course menu)</li>",
									
									"<li><strong>at least ".$dauer[3]." overnight stays</strong></li>
									<li>welcoming-cocktail</li>
									<li>EDISON breakfast buffet</li>
									<li>half-board (three course menu)</li>",
									
									
									"<li class='li_leer'></li>
									<li><strong>3 overnight stays</strong></li>
									<li>eastercocktail</li>
									<li>EDISON breakfast buffet</li>
									<li>'Karfreitagsmenü' (dinner)</li>
									<li>Easter menu</li>
									<li>'Schlemmerbuffet'</li>
									<li class='li_leer'></li>
									<li class='li_leer'></li>",
									
									"<li><strong>3 overnight stays</strong></li>
									<li>EDISON breakfast buffet</li>
									<li>welcoming-menu</li>
									<li>coffee and cake with Christmassy music</li>
									<li>'Glühwein'-voucher</li>
									<li>Christmas menu</li>
									<li>'Schlemmerbuffet'</li>
									<li>Sauna for free</li>",
									
									"<li><strong>3 overnight stays<br />(thursday to sunday<br />or friday to monday)</strong></li>
									<li>silvestercocktail</li>
									<li>EDISON breakfast buffet</li>
									<li>welcoming-menu</li>
									<li>Gala-Dinner without New Year's Eve party</li>
									<li>'Katerfrühstück' (breakfast) with sparkling wine</li>
									<li>'Neujahrsabendmenü' (dinner)</li>");
		}
		
		
	function preis_format($preis){
		
		return number_format ( $preis , 2 , "," , "." );
	}
?>