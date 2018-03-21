<?php
	if(!isset($php_fct_loaded)){
		$php_fct_loaded = true;
		
		function html_encode( $val ){
			
			$val_cache = false;
			
			if(!is_array($val)){
				$val_cache = $val;
				$val = [];
				$val[0] = $val_cache;
			}			
			
			foreach($val as $key => $value){
				if(is_string($value)){
					$val[$key] = htmlentities($value, ENT_QUOTES);
					$val[$key] = str_replace("~", "&#126;", $val[$key]);
					$val[$key] = str_replace("[", "&#91;", $val[$key]);
					$val[$key] = str_replace("]", "&#93;", $val[$key]);
					$val[$key] = str_replace("^", "&#94;", $val[$key]);
					$val[$key] = str_replace("°", "&deg;", $val[$key]);
				}
				else
					$val[$key] = $value;
			}
			
			if($val_cache){
				$val = $val[0];
			}
			
			return( $val );
		}
	}
?>