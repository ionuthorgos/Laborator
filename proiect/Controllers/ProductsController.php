<?php

class ProductsController extends Controller{
	private $productsRepository;
	
	public function __construct(){
		$this->productsRepository = new ProductsRepository();
	}
	public function defaultAction(){
		
	}
	public function listAction(){
		$itemsPerPage = 2;
		if(array_key_exists("P", $_GET)){
			$page = intval($_GET["P"]);
		} else{
			$page = 1;
		}
		$offset = ($page-1)*$itemsPerPage;
	
	$products = $this->productsRepository->findAll($itemsPerPage,$offset);
		$numberOfProducts = $this->productsRepository->countByFilters();
		$numberOfPages = ceil($numberOfProducts/$itemsPerPage);
		include "Views/Products/list.php";
	}
	public function newAction(){
		include "Views/Products/new.php";
		
	}
	public function createAction(){
	if ($_SERVER["REQUEST_METHOD"]=="POST"){
			$validation = true;

			$errors = array();
			$requiredFields = array("name","description","price");

			foreach ($requiredFields as $field){
				if (trim($_POST[$field])==""){
					array_push($errors,"Field $field is required.");
					$validation = false;
				}
			}

			$user = array();
			$sessionFields = array("name","description","price");
			foreach($sessionFields as $field){
				if($_POST[$field]!=""){
					$user[$field] = $_POST[$field];
				}
			}

			if ($validation){
				$product = new Products(NULL,trim($_POST["name"]),trim($_POST["description"]),trim($_POST["price"]));
				$result = $this->productsRepository->insert($product);
				$id = $this->productsRepository->lastid();
				if($result){
					$rootpath = "Resources/Public/Uploads/Products";
					$rootpath = explode("/",$rootpath);
					$filepath = "";
					foreach($rootpath as $temporary){
						if($filepath==""){
							$filepath = $temporary;
						} else {
							$filepath .= "/".$temporary;
						}
						if(!file_exists($filepath)){
							mkdir($filepath);
						}
					}
					$filename =$id.".jpg"; 
					
			       	if(array_key_exists("picture", $_FILES)){
						
						if ($_FILES["picture"]["error"]==0){
							$destination = $filepath."/".$filename;
							if (move_uploaded_file($_FILES["picture"]["tmp_name"], $destination)){
								?>  <?php 
							}
						}
					}
				}
				include "Views/Products/create.php";
			} else {
				$_SESSION["errors"] = $errors;
				$_SESSION["user"]   = $user;
				header("Location: index.php?C=Products&A=new");	
			}
		} else {
			header("Location: index.php?C=Products&A=new");
		}
	}

/*	$view = new View();
		$view->set("products",$products);
		$view->set("numberOfPages",$numberOfPages);
		$view->set("page",$page);
		$view->render(__METHOD__);
	}*/
}