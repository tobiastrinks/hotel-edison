<?php
	//umleitung bei 'filename.html/'
	if(substr($_SERVER["REQUEST_URI"], -1-(strlen($filename)) ) == $filename."/"){
		header('Location: ../'.$filename);
		exit();
	}
?>
<!DOCTYPE html>

<?php 
	//desktop/mobile dir > dbconnect.php
	
	$cms_dir = $home_dir."cms/";
	$temp_basic_dir = $home_dir."temp/media/basic/";
	
	include($cms_dir."dbconnect.php");
	
	function startsWith($haystack, $needle) {
		return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
	}
	function endsWith($haystack, $needle) {
		return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
	}
	
	$full_filename = basename($_SERVER["REQUEST_URI"]);
	
	$cms_server_protocol = explode("/", strtolower($_SERVER["SERVER_PROTOCOL"]));
	$cms_server_protocol = $cms_server_protocol[0];
	$cms_server_protocol .= (empty($_SERVER["HTTPS"]) ? "": ($_SERVER["HTTPS"]=='on') ? "s": "")."://";
	
	$cms_ergebnis = $mysqli->query("SELECT * FROM page WHERE filename='". $filename ."' AND device='".$device."' AND project_id='".$project_id."'");
	
	if(mysqli_num_rows($cms_ergebnis) > 0){ 
		while($cms_row = $cms_ergebnis->fetch_assoc()){
?>

<html lang="de">
	
	<head itemscope itemtype="http://schema.org/WebSite">
		
		<?php
			$error404 = false;
		?>
		
		<meta charset="utf-8" />
		
		<title itemprop='name'><?=$cms_row["title"]; ?></title>
		
		<link rel="apple-touch-icon" sizes="57x57" href="<?=$home_dir;?>temp/fav/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?=$home_dir;?>temp/fav/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?=$home_dir;?>temp/fav/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?=$home_dir;?>temp/fav/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?=$home_dir;?>temp/fav/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?=$home_dir;?>temp/fav/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?=$home_dir;?>temp/fav/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?=$home_dir;?>temp/fav/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?=$home_dir;?>temp/fav/apple-icon-180x180.png">
		
		<link rel="icon" type="image/png" sizes="192x192"  href="<?=$home_dir;?>temp/fav/android-icon-192x192.png">

		<link rel="icon" type="image/png" sizes="32x32" href="<?=$home_dir;?>temp/fav/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?=$home_dir;?>temp/fav/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?=$home_dir;?>temp/fav/favicon-16x16.png">
		
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?=$home_dir;?>temp/fav/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		
		<meta name="keywords" content="<?=$cms_row["meta_keywords"]; ?>" />
		<meta name="description" content="<?=$cms_row["meta_descr"]; ?>" />
		
		<?php include($home_dir."temp/header.php"); ?>
		
		<link type="text/css" href="<?=$cms_dir;?>style/basic.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?=$home_dir;?>cms/basic/font_awesome/css/font-awesome.min.css" />
		
		<?php if($cms_row["device"] == "desktop"){ ?>
			<script type="text/javascript">var mobile_app = "<?php echo $cms_server_protocol.$_SERVER["HTTP_HOST"].$cms_mobile_dir; ?>index.html";</script>
			<script type="text/javascript" src="https://libraries.secure4all.de/astrotel.mobile_app.js"></script>
		
			<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php }
		else{
		?>
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<?php } ?>
		
		<script type="text/javascript">
			var glob_cms_filename 		= "<?=$filename; ?>";
			var glob_cms_full_filename 	= "<?=$full_filename; ?>";
			var glob_cms_pageid 		= "<?=$cms_row["ID"]; ?>";
			var glob_cms_device 		= "<?=$device; ?>";
			var glob_cms_home_dir 		= "<?=$home_dir; ?>";
			var glob_cms_desktop_dir 	= "<?=$cms_desktop_dir; ?>";
			var glob_cms_mobile_dir 	= "<?=$cms_mobile_dir; ?>";
			var glob_cms_lang 			= "<?=$_SESSION["cms_lang"]; ?>";
		</script>
		
		<script type="text/javascript" src="<?=$cms_dir;?>js/cover.js"></script>
		<script type="text/javascript" src="<?=$cms_dir;?>js/basic.js"></script>
		<script type="text/javascript" src="<?=$cms_dir;?>js/temp.js"></script>
		
		<?php
		
		$cms_login = "false";
		
		$cms_ergebnis2 = $mysqli->query("SELECT * FROM temp WHERE name='".$cms_row["temp"]."' AND project_id='".$project_id."'");
		
		while($cms_row2 = $cms_ergebnis2->fetch_assoc()){
			
			$css_filename 	= $cms_row2["css_filename"];
			if($css_filename != ""){
				$css_filename 	= explode(",", $css_filename);
				
				$css_count		= count( $css_filename );
				
				for($x=0; $x<$css_count; $x++){
					echo '<link type="text/css" href="'.$home_dir.'temp/style/'.$css_filename[$x].'" rel="stylesheet" />';
				}
			}
			
			$js_filename 	= $cms_row2["js_filename"];
			
			if($js_filename != ""){
				$js_filename 	= explode(",", $js_filename);
				
				$js_count		= count( $js_filename );
				
				for($x=0; $x<$js_count; $x++){
					echo '<script type="text/javascript" src="'.$home_dir.'temp/js/'.$js_filename[$x].'"></script>';
				}
			}
		}
		
		if($error404 === true){
			?>
			<script type="text/javascript">
				window.location = "index.html";
			</script>
			<?php
		}
		
		include($cms_dir."admin.php");
		
		?>
		
	</head>
	
	<body id="page<?=$cms_row["ID"]; ?>">
	
		<div id="loading"><?php
		
				if(is_file($home_dir."temp/loading.html"))
					include($home_dir."temp/loading.html");
		?></div>
		
		<?php
			//cms_widgets -> dont load page
			$load_page = "true";
		
			?>
			
			<?php
			include($home_dir."cms/img_op.php");
			
			//login
			if(isset($_GET["cms"])){
				if($_GET["cms"] == "login"){
					echo'<link type="text/css" href="'.$cms_dir.'style/cms.css" rel="stylesheet" media="screen" />';
					include($cms_dir."login.html");
					echo'<script type="text/javascript" src="'.$cms_dir.'js/login.js"></script>';
				}
			}
			//cms_include_files > end of body
			
			
			
			if($load_page == "true" AND $error404 != true){
			
				/* parent1 finden */
				
				$parent1	= $cms_row["ID"];
				$ebene 		= $cms_row["ebene"];
				
				while($ebene != 1){
					
					$cms_ergebnis_nav2 = $mysqli->query("SELECT * FROM page WHERE ID=".$parent1." AND project_id=".$project_id);
					
					while($cms_row_nav2 = $cms_ergebnis_nav2->fetch_assoc()){
					
						$parent1 = $cms_row_nav2["parent_page"];
						$ebene--;
					}
				}
				?>
				<div id="wrapper" class="<?=$device;?>">
				<?php
				/* TEMPLATE */
					
					$cms_ergebnis2 = $mysqli->query("SELECT * FROM temp WHERE name='".$cms_row["temp"]."' AND project_id='".$project_id."'");
			
					while($cms_row2 = $cms_ergebnis2->fetch_assoc()){
						
						
						//content Variablen aus Datenbank lesen -> für temp
							
							$cms_ergebnis3  = $mysqli->query("SELECT * FROM content WHERE page_id IN('-1','".$cms_row["ID"]."') AND (type IN ('img', 'img_dia') OR (type='text' AND lang='".$_SESSION["cms_lang"]."')) AND project_id=".$project_id);
			
							while($cms_row3 = $cms_ergebnis3->fetch_assoc()){
								
								${$cms_row3["position"]} = $cms_row3["text"];
								
								
								//img zusammensetzen
								if($cms_row3["type"] == "img"){
									$cms_ergebnis4 = $mysqli->query("SELECT * FROM media WHERE ID='".$cms_row3["media_id"]."' AND project_id=".$project_id);
									
									while($cms_row4 = $cms_ergebnis4->fetch_assoc()){
										${$cms_row3["position"]} = array("src"=>$home_dir."temp/media/".$cms_row4["src"], "alt"=>$cms_row4["alt"]);
									}
								}
								if($cms_row3["type"] == "img_dia"){
									$cms_ergebnis4 = $mysqli->query("SELECT * FROM media WHERE ID='".$cms_row3["media_id"]."' AND project_id=".$project_id);
									
									while($cms_row4 = $cms_ergebnis4->fetch_assoc()){
										${$cms_row3["position"].$cms_row3["img_dia_pos"]} = array("src"=>$home_dir."temp/media/".$cms_row4["src"], "alt"=>$cms_row4["alt"]);
									}
								}
							}
						
						function cms_load_img(&$element, $max_width, $max_height, $extra_attr){
							
							if($extra_attr == 0)
								$extra_attr = "";
							
							if(isset($element["src"])){
								
								$src = $element["src"];
								$alt = $element["alt"];
								
								$dimensions = img_op(["dimensions", $src]);
								$width 	= $dimensions[0];
								$height = $dimensions[1];
								
								$new_dim = img_op_max_dimensions($src, $max_width, $max_height);
								
								if(!$new_dim){
							
									echo '<img src="'.$src.'" alt="'.$alt.'" '.$extra_attr.'/>';
								}
								else{
									
									$new_width 	= $new_dim[0];
									$new_height = $new_dim[1];
									
									global $home_dir;
									$compressed_dir = $home_dir."temp/media/compressed";
									
									if(!is_dir($compressed_dir))
										mkdir($compressed_dir);
									
									$compressed_file = pathinfo( basename($src), PATHINFO_FILENAME )."_".$new_width."x".$new_height.".".pathinfo($src, PATHINFO_EXTENSION);
									$compressed_file = $compressed_dir."/".$compressed_file;
								
									if(!is_file($compressed_file)){
										
										if($max_width != 0 AND $max_height != 0){
											img_op(["crop", $src, $compressed_file, $new_width."x".$new_height]);
										}
										else{
											img_op(["resize", $src, $compressed_file, $new_width."x".$new_height]);
										}
									}
									
									echo '<img src="'.$compressed_file.'" alt="'.$alt.'" '.$extra_attr.'/>';
								}
							}
						}
						
						function cms_load_dia($dia_name, $max_width, $max_height){
							
							for($x=1; $x>0; $x++){
							
								global ${$dia_name.$x};
								
								if(isset( ${$dia_name.$x} )){
									
									cms_load_img( ${$dia_name.$x}, $max_width, $max_height, 0);
								}
								else{
									$x=-2;
								}
							}
						}
						
						function cms_load_clone($clone_class){
							global $mysqli, $project_id, $cms_login;
							
							if($cms_login == "true")
								return $mysqli->query("SELECT * FROM content_clone WHERE class='".$clone_class."' AND project_id='".$project_id."' ORDER BY position ASC");
							else
								return $mysqli->query("SELECT * FROM content_clone WHERE class='".$clone_class."' AND visibility='1' AND project_id='".$project_id."' ORDER BY position ASC");
						}
						
						include( $home_dir."temp/".$cms_row2["html_url"] );
					
					}
				?>
				</div>
				<?php
			}			
		
		
		if($cms_login == "true"){
		?>
			
			<div id="cms_black"></div>
			<div id="cms_goto_top" title="Nach oben"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
			
			<!-- content_clone -->
			<div class="hidden" style="display: none;">
				<div class="cms_clone_element_nav cms_element">
					<i class="fa fa-arrows cms_clone_element_nav_move" aria-hidden="true"></i><i class="fa fa-angle-left cms_clone_element_nav_sortable_buttons" aria-hidden="true"></i><i class="fa fa-angle-right cms_clone_element_nav_sortable_buttons" aria-hidden="true"></i><i class="fa cms_clone_element_nav_visibility" aria-hidden="true"></i><i class="fa fa-trash cms_clone_element_nav_remove" aria-hidden="true"></i>
				</div>
			</div>
			
			<!-- save_changes -->
			<div id="cms_save_onpage_changes" class="cms_element">
				<div class="cms_save_onpage_changes_element" id="cms_save_onpage_changes_submit"><i class="fa fa-check" aria-hidden="true"></i> Übernehmen</div>
				<div class="cms_save_onpage_changes_element" id="cms_save_onpage_changes_reset"><i class="fa fa-undo" aria-hidden="true"></i> Zurücksetzen</div>
				<div class="clear"></div>
			</div>
			
		<?php
			
			include($cms_dir."menu.html");
			include($cms_dir."inhalte_bearbeiten.html");
			include($cms_dir."seitenverwaltung.html");
		}
		?>
		
	</body>
	
</html>

<?php } //db - page 
	}
	else{
		echo "Das Projekt existiert nicht!";
	}?>