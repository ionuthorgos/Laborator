<?php

class UsersController extends Controller {
	private $usersRepository;

	public function __construct(){
		$this->usersRepository=new UsersRepository();
	}

	public function defaultAction(){

	}

	public function newAction(){
		include "Views/Users/new.php";
		if (array_key_exists("errors", $_SESSION)){
			unset($_SESSION["errors"]);			
		}
		if (array_key_exists("user", $_SESSION)){
			unset($_SESSION["user"]);			
		}

	}

	public function createAction(){
	if ($_SERVER["REQUEST_METHOD"]=="POST"){
			$validation = true;

			$errors = array();
			$requiredFields = array("firstname","lastname","emailaddress","password");

			foreach ($requiredFields as $field){
				if (trim($_POST[$field])==""){
					array_push($errors,"Field $field is required.");
					$validation = false;
				}
			}

			if ($_POST["password"]!=""){
				if ($_POST["password2"]==""){
					array_push($errors,"You need to confirm your password.");
					$validation = false;
				} else if (strlen($_POST["password"])<8){
					array_push($errors,"Your password must have at least 8 characters.");
					$validation = false;
				} else if ($_POST["password"] != $_POST["password2"]){
					array_push($errors,"Your passwords don't match.");
					$validation = false;
				}
			}

			$user = array();
			$sessionFields = array("firstname","lastname","birthdate","address","zip","city","country","phone","emailaddress");
			foreach($sessionFields as $field){
				if($_POST[$field]!=""){
					$user[$field] = $_POST[$field];
				}
			}

			if ($validation){
				$user = new Users(NULL,trim($_POST["firstname"]),trim($_POST["lastname"]),0,trim($_POST["birthdate"]),trim($_POST["address"]),trim($_POST["zip"]),trim($_POST["city"]),trim($_POST["country"]),trim($_POST["phone"]),trim($_POST["emailaddress"]),md5($_POST["password"]));
				$result = Users::insert($user);
				include "Views/Users/create.php";
			} else {
				$_SESSION["errors"] = $errors;
				$_SESSION["user"]   = $user;
				header("Location: index.php?C=Users&A=new");	
			}
		} else {
			header("Location: index.php?C=Users&A=new");
		}
	}

	public function loginAction(){
		include "Views/Users/login.php";
		if (array_key_exists("errors", $_SESSION)){
			unset($_SESSION["errors"]);			
		}
		if (array_key_exists("user", $_SESSION)){
			unset($_SESSION["user"]);			
		}
	}

	public function connectAction(){
		if($_SERVER["REQUEST_METHOD"]=="POST"){
			$validation = true;

			$errors = array();
			$requiredFields = array("emailaddress","password");

			foreach ($requiredFields as $field){
				if (trim($_POST[$field])==""){
					array_push($errors,"Field $field is required.");
					$validation = false;
				}
			}

			$user = array();
			$sessionFields = array("emailaddress");
			foreach($sessionFields as $field){
				if($_POST[$field]!=""){
					$user[$field] = $_POST[$field];
				}
			}
			if ($validation){
				$result = Users::checkCredentials(trim($_POST["emailaddress"]),md5($_POST["password"]));
			}
			if ($result){
				$result->password = "";
				$_SESSION["connected"] = (array)$result;
				setcookie("user",$result->id,time()+3600);
				header("Location: index.php?C=Default&A=default");
			} else {
				$_SESSION["errors"] = $errors;
				$_SESSION["user"]   = $user;
				header("Location: index.php?C=Users&A=login");	
			}
		} else {
			header("Location: index.php?C=Users&A=login");
		}
	}

	public function disconnectAction(){
		
		if(array_key_exists("user",$_COOKIE)){
			setcookie("user",NULL,time()-3600);
		}
		if(array_key_exists("connected", $_SESSION)){
			unset($_SESSION["connected"]);
			header("Location: index.php");
		}
	}

	public static function loginStatus(){
		include "Views/Users/loginStatus.php";
	}
	
	public function showAction(){
		if (array_key_exists("user", $_COOKIE)){
			if (array_key_exists("ID", $_GET)){
				if (is_numeric($_GET["ID"])){
					$user = Users::show($_GET["ID"]);
					if(!user){
						header("Location: index.php?C=Default&A=page404");
					}
				} else{
					header("Location: index.php?C=Default&A=page404");
				}
			} else{
				$user = Users::show($_COOKIE["user"]);
			}
			include "Views/Users/show.php";
		} else{
			header("Location: index.php?C=Users&A=login");
		}
	}
	
		public function editAction(){
		
			
		if (!array_key_exists("users-update-values", $_SESSION)){
			
			$_SESSION["users-update-values"]= (array)$this->usersRepository->show($_COOKIE["user"]);
		}
		
		include "Views/Users/edit.php";	
		
		if (array_key_exists("users-update-errors", $_SESSION)){
			unset($_SESSION["users-update-errors"]);			
		}
		if (array_key_exists("users-update-values", $_SESSION)){
			unset($_SESSION["users-update-values"]);			
		}
		
	}
	
	
	public function updateAction(){
		if ($_SERVER["REQUEST_METHOD"]=="POST"){
			$validation = true;

			$errors = array();
			$requiredFields = array("firstname","lastname","emailaddress");

			foreach ($requiredFields as $field){
				if (trim($_POST[$field])==""){
					array_push($errors,"Field $field is required.");
					$validation = false;
				}
			}

			$values = array();
			$sessionFields = array("firstname","lastname","birthdate","address","zip","city","country","phone","emailaddress");
			foreach($sessionFields as $field){
				if($_POST[$field]!=""){
					$values[$field] = $_POST[$field];
				}
			}

			if ($validation){
				$user = new Users($_COOKIE["user"],trim($_POST["firstname"]),trim($_POST["lastname"]),NULL,trim($_POST["birthdate"]),trim($_POST["address"]),trim($_POST["zip"]),trim($_POST["city"]),trim($_POST["country"]),trim($_POST["phone"]),trim($_POST["emailaddress"]),NULL);
				$result = $this->usersRepository->edit($user);
				$_SESSION["user"]=(array)$user;
				header("Location: index.php");	
			} else {
				$_SESSION["users-update-errors"] = $errors;
				$_SESSION["users-update-values"] = $values;
				header("Location: index.php?C=Users&A=edit");	
			}
		} else {
			header("Location: index.php?C=Users&A=login");
		}
	}
}