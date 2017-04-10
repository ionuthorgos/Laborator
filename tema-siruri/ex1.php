<?php

$text =  "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";

$text = str_replace(array(",","."),"",$text);		
$d = explode(" ", $text);

foreach($d as $value){
	if($value[0] == "d"){
		
	} elseif($value[0] == "a"){
		
		echo strtoupper($value). " ";
		
	}else{
		
		echo $value. " ";
	}
}
