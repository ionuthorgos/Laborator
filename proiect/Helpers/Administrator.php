<?php

Class Administrator {

	public static function check(){
		if (array_key_exists("user", $_COOKIE)){
			
			$administrator = $_SESSION["connected"]["admin"];
			if ($administrator==1){
				return TRUE;
			} else { return FALSE; }
		} else { return FALSE; }
	}

}