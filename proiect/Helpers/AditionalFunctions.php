<?php

function checkField($session,$field){
	if(array_key_exists($session, $_SESSION)){
		if(array_key_exists($field, $_SESSION[$session])){
			echo $_SESSION[$session][$field];
		}
	}
}