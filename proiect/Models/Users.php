<?php

class Users {

	public $id;
	public $firstname;
	public $lastname;
	public $admin;
	public $birthdate;
	public $address;
	public $zip;
	public $city;
	public $country;
	public $phone;
	public $emailaddress;
	public $password;

	public function __construct($id,$firstname,$lastname,$admin,$birthdate,$address,$zip,$city,$country,$phone,$emailaddress,$password){

		$this->id = $id;
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->admin = $admin;
		$this->birthdate = $birthdate;
		$this->address = $address;
		$this->zip = $zip;
		$this->city = $city;
		$this->country = $country;
		$this->phone = $phone;
		$this->emailaddress = $emailaddress;
		$this->password = $password;

	}

	/*public static function insert($user){
		$keys = array();
		$values = array();
		foreach ($user as $key => $value){
			if($key!="id"){
				array_push($keys,$key);
				array_push($values,'"'.$value.'"');
			}
		}
		//$query = "INSERT INTO users (".implode(",",$keys).") VALUES (".implode(",",$values).");";
		$database = new Database();
		return $database->query($query);
	}*/

	public static function checkCredentials($emailaddress,$password){
		$query = "SELECT * FROM users WHERE emailaddress LIKE \"$emailaddress\" AND password LIKE \"$password\";";
		$database = new Database();
		$result = $database->query($query);
		if(mysqli_num_rows($result)){
			$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$user = new Users($result["id"],$result["firstname"],$result["lastname"],$result["admin"],$result["birthdate"],$result["address"],$result["zip"],$result["city"],$result["country"],$result["phone"],$result["emailaddress"],$result["password"]);
			return $user;
		} else {
			return NULL;
		}
	}
}