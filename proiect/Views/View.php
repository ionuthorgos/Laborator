<?php

Class View {

	private $variables = array();

	public function set($key,$value){
		if(!in_array($key,array("controller","action"))){
			$this->variables[$key] = $value;
		} else {
			echo "ERROR: '$key' is a protected keyword in Class View.";
			die();
		}
	}

	public function render($method){

		foreach($this->variables as $key => $value){
			$$key = $value;
		}
		$method = explode("::",$method);
		$controller = substr($method[0],0,-10);
		$action = substr($method[1],0,-6);

		foreach($this->variables as $key => $value){
			$$key = $value;
		}
		include "Views/$controller/$action.php";
	}


}