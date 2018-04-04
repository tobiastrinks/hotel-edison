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

    var gaProperty = 'UA-50984323-1';

    ga('create', gaProperty, 'auto');
    ga('set', 'anonymizeIp', true);
    ga('send', 'pageview');

    // Disable tracking if the opt-out cookie exists.
    var disableStr = 'ga-disable-' + gaProperty;
    if (document.cookie.indexOf(disableStr + '=true') > -1) {
        window[disableStr] = true;
    }

    // Opt-out function
    function gaOptout() {
        alert('Google Analytics wurde deaktiviert');
        document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
        window[disableStr] = true;
    }
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
	$active_page = false;

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
							"Doppelzimmer Comfort Plus",
							"Junior Appartement",
							"Senior Appartement",
							"Panorama Suite");

	$zimmervar		= array("doppel_classic",
							"doppel_classic_plus",
							"doppel_comfort",
							"doppel_comfort_plus",
							"junior_app",
							"senior_app",
							"suite");

	$zimmernew      = array(0,
                            0,
                            1,
                            1,
                            0,
                            0,
                            0);

	$preis_jahr	= array("2018");

	//array number
	$preis_jahr_standard = 0;
	$preis_kurzurlaub = 0;

	$kosten_hp	= array(22);


	//Doppelzimmer Classic

		$doppel_classic_1 	= array(40);
		$doppel_classic_1a	= array(46.5);

		$doppel_classic_2 	= array(47);
		$doppel_classic_2a	= array(52);

		$doppel_classic_3 	= array(57);
		$doppel_classic_3a	= array(67);

		$doppel_classic_4 	= array(61);
		$doppel_classic_4a	= array(74);

		$doppel_classic_5a 	= array(261);
		$doppel_classic_6a	= array(308);
		$doppel_classic_7a	= array(476);

	//Doppelzimmer Classic Plus

		$doppel_classic_plus_1 		= array(42);
		$doppel_classic_plus_1a		= array(49.5);

		$doppel_classic_plus_2 		= array(51);
		$doppel_classic_plus_2a		= array(57);

		$doppel_classic_plus_3 		= array(62);
		$doppel_classic_plus_3a		= array(72);

		$doppel_classic_plus_4 		= array(69);
		$doppel_classic_plus_4a		= array(79);

		$doppel_classic_plus_5a 	= array(276);
		$doppel_classic_plus_6a		= array(320);
		$doppel_classic_plus_7a		= array(496);


	//Doppelzimmer Comfort

		$doppel_comfort_1 	= array(49);
		$doppel_comfort_1a	= array(53);

		$doppel_comfort_2 	= array(57);
		$doppel_comfort_2a	= array(63);

		$doppel_comfort_3 	= array(71);
		$doppel_comfort_3a	= array(78);

		$doppel_comfort_4 	= array(77);
		$doppel_comfort_4a	= array(85);

		$doppel_comfort_5a 	= array(294);
		$doppel_comfort_6a	= array(348);
		$doppel_comfort_7a	= array(516);


	//Doppelzimmer Comfort Plus

		$doppel_comfort_plus_1 	= array(51);
		$doppel_comfort_plus_1a	= array(55);

		$doppel_comfort_plus_2 	= array(59);
		$doppel_comfort_plus_2a	= array(65);

		$doppel_comfort_plus_3 	= array(73);
		$doppel_comfort_plus_3a	= array(80);

		$doppel_comfort_plus_4 	= array(79);
		$doppel_comfort_plus_4a	= array(87);

		$doppel_comfort_plus_5a = array(297);
		$doppel_comfort_plus_6a	= array(356);
		$doppel_comfort_plus_7a	= array(524);


	//Junior Appartement

		$junior_app_1 		= array(55);
		$junior_app_1a		= array(69);

		$junior_app_2 		= array(62);
		$junior_app_2a		= array(76);

		$junior_app_3 		= array(80);
		$junior_app_3a		= array(83);

		$junior_app_4 		= array(86);
		$junior_app_4a		= array(100);

		$junior_app_5a 		= array(336);
		$junior_app_6a		= array(408);
		$junior_app_7a		= array(576);


	//Senior Appartement

		$senior_app_1 		= array(59);
		$senior_app_1a		= array(69);

		$senior_app_2 		= array(67);
		$senior_app_2a		= array(76);

		$senior_app_3 		= array(84);
		$senior_app_3a		= array(83);

		$senior_app_4 		= array(90);
		$senior_app_4a		= array(100);

		$senior_app_5a 		= array(336);
		$senior_app_6a		= array(408);
		$senior_app_7a		= array(576);


	//Panorama Suite

		$suite_1 		= array(72);
		$suite_1a		= array(75);

		$suite_2 		= array(80);
		$suite_2a		= array(83);

		$suite_3 		= array(94);
		$suite_3a		= array(95);

		$suite_4 		= array(104);
		$suite_4a		= array(118);

		$suite_5a 		= array(393);
		$suite_6a		= array(472);
		$suite_7a		= array(640);



	//-- ARRANGEMENTS UND FEIERTAGSANGEBOTE --//

		$anzahl_arr		= 4; //für Trennung zw Arr und Feiertagsangeboten

		$reihenfolge 	= array("4", "3", "2", "1", "5", "6", "7");

		$visibility		= array(1, 1, 1, 1, 1, 1, 1);

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

								"0",
								"0",
								"1"); /* 1 -> für Folgejahr gültig */

		$dauer			= array("2",
								"3",
								"4",
								"7",

								"3",
								"4",
								"4");


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
									"Salut 2019");

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

									"30.03.2018",
									"23.12.2018",
									"30.12.2018");

			$buchbarkeit_s	= array("Jan., Feb., Nov., Dez.",
									"Mär., Apr., Okt.",
									"Mai, Jun., Sep.",
									"Jul., Aug.",

									"30.03.2018",
									"23.12.2018",
									"30.12.2018");

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
									<li><strong>".$dauer[4]." Übernachtungen</strong></li>
									<li>Ostercocktail</li>
									<li>EDISON Frühstücksbuffet</li>
									<li>Karfreitagsmenü</li>
									<li>Osterfestmenü</li>
									<li>Schlemmerbuffet</li>
									<li class='li_leer'></li>
									<li class='li_leer'></li>",

									"<li><strong>".$dauer[5]." Übernachtungen</strong></li>
									<li>EDISON Frühstücksbuffet</li>
									<li>Begrüßungsmenü</li>
									<li>Kaffeegedeck mit weihnachtlicher Musik</li>
									<li>Glühweingutschein</li>
									<li>Festliches Weihnachtsmenü</li>
									<li>Schlemmerbuffet</li>
									<li>Sauna frei</li>",

									"<li><strong>".$dauer[6]." Übernachtungen<br />(Donnerstag bis Sonntag<br />oder Freitag bis Montag)</strong></li>
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
									"Salut 2019");

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

									"30.03.2018",
									"23.12.2017",
									"30.12.2017");

			$buchbarkeit_s	= array("jan., feb., nov., dec.",
									"mar., apr., oct.",
									"may, jun., sep.",
									"jul., aug.",

									"30.03.2018",
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
									<li><strong>".$dauer[4]." overnight stays</strong></li>
									<li>eastercocktail</li>
									<li>EDISON breakfast buffet</li>
									<li>'Karfreitagsmenü' (dinner)</li>
									<li>Easter menu</li>
									<li>'Schlemmerbuffet'</li>
									<li class='li_leer'></li>
									<li class='li_leer'></li>",

									"<li><strong>".$dauer[5]." overnight stays</strong></li>
									<li>EDISON breakfast buffet</li>
									<li>welcoming-menu</li>
									<li>coffee and cake with Christmassy music</li>
									<li>'Glühwein'-voucher</li>
									<li>Christmas menu</li>
									<li>'Schlemmerbuffet'</li>
									<li>Sauna for free</li>",

									"<li><strong>".$dauer[6]." overnight stays<br />(thursday to sunday<br />or friday to monday)</strong></li>
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
