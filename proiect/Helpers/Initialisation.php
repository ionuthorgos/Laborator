<?php

function initialisation(){
	if(array_key_exists("request", $_GET)){

		$temporary=explode("/", $_GET["request"]);
		
		if(array_key_exists(0, $temporary)){
			$_GET["C"]=$temporary[0];
		}
		if(array_key_exists(1, $temporary)){
			$_GET["A"]=$temporary[1];
		}
		if(array_key_exists(2, $temporary)){
			$_GET["ID"]=$temporary[2];
		}
	}
	if (array_key_exists("C", $_GET)){
		$controller = $_GET["C"]."Controller";
	} else {
		$controller = "DefaultController";
	}
	if (array_key_exists("A", $_GET)){
		$action = $_GET["A"]."Action";
	} else {
		$action = "defaultAction";
	}
	$object = new $controller();
	$object->$action();
}