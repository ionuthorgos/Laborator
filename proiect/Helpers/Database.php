<?php

class Database {

	private $connection;

	public function __construct(){
		$this->connection = mysqli_connect("localhost","root","","mvc-tutorial");
	}

	public function query($query){
		return mysqli_query($this->connection,$query);
	}

	public function __destruct(){
		mysqli_close($this->connection);
	}

}