<?php @session_start();
	
	$servername	= "mariadb";
	$username	= "dbu_cms_edison";
	$password	= "Aku85i^7";
	$dbname		= "db_cms_hotel-edison_de_";
	
	$mysqli = new mysqli($servername, $username, $password, $dbname);
	
	
	/* check connection */
	
	if(mysqli_connect_errno()){
		echo 'dbconnect failed: '.mysqli_connect_error();
		exit();
	}
	
	/*set charset*/
	
	if( !$mysqli->set_charset("utf8") )
		echo 'set_charset failed: '.$mysqli->error; 
	
	//get project_id
	$cms_ergebnis = $mysqli->query("SELECT * FROM project WHERE domain='".$_SERVER["HTTP_HOST"]."' OR domain='www.".$_SERVER["HTTP_HOST"]."'");
	if(mysqli_num_rows($cms_ergebnis) > 0){
		while($cms_row = $cms_ergebnis->fetch_assoc()){
			$project_id = $cms_row["ID"];
		}
	}
	
	//desktop/mobile dir
	$cms_desktop_dir = "/";
	$cms_mobile_dir = "/mobile/";
	
	//language
	if(!isset($_SESSION["cms_lang"]))
		$_SESSION["cms_lang"] = "ger";
	
	// Mail server data
	$server_mail_host		= "smtp.1und1.de";
	$server_mail_imap_port	= 587;
	$server_mail_pop3_port	= 110;
	$server_mail_pop3_intv	= 30;
	$server_mail_username	= "hello@unigrow.de";
	$server_mail_password	= "pRNtRcsk_h17";
?>