<?php
class UsersRepository extends Repository{
		public function show($id){
				$query = "SELECT * FROM users WHERE id=$id;";

				$result = $this->database->query($query);
				if(mysqli_num_rows($result)){
					$result = mysqli_fetch_array($result,MYSQLI_ASSOC);

					$object = new $this->model($result["id"],$result["firstname"],$result["lastname"],0,$result["birthdate"],$result["address"],$result["zip"],$result["city"],$result["country"],$result["phone"],$result["emailaddress"],$result["password"]);


					foreach($object as $key => $value){
						$object->$key = $result[$key];
					}
					return $object;
				} else {
					return NULL;
				}
			}
		public function edit($user){

		$statement = array();
		foreach ($user as $key => $value){
			if ($key!="id" && $value!=NULL){
				array_push($statement,"$key = '$value'");
			}
		}
		$query = "UPDATE users SET ".implode(", ",$statement)." WHERE id=".$user->id;
		return $this->database->query($query);
	}
	}