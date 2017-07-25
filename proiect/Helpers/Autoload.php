<?php

function __autoload($class){
	$folders = array(
		"Controllers",
		"Helpers",
		"Models",
		"Models/Repositories",
		"Views"
	);
	foreach($folders as $folder){
		$filePath = $folder."/".$class.".php";
		if(file_exists($filePath)){
			include $filePath;
		}
	}
}