<?php
include("Helpers/Autoload.php");

define("TEMPLATE",false);

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



