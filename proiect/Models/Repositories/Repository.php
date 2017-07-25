<?php

Abstract Class Repository {

	protected $database;
	protected $table;
	public function __construct(){
		$this->database = new Database();
		$this->table = strtolower(str_replace("Repository","",get_called_class()));
		$this->model = str_replace("Repository","",get_called_class());
	}
	public function insert($user){
		$keys = array();
		$values = array();
		foreach ($user as $key => $value){
			if($key!="id"){
				array_push($keys,$key);
				array_push($values,'"'.$value.'"');
			}
		}
		$query = "INSERT INTO $this->table (".implode(",",$keys).") VALUES (".implode(",",$values).");";
		return $this->database->query($query);
	}
}