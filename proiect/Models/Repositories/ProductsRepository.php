<?php 

Class ProductsRepository extends Repository {

	public function findAll($limit,$offset){
		$query = "SELECT * FROM products LIMIT $limit OFFSET $offset";
		$result = $this->database->query($query);

		$temporary = array();
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$object = new Products($row["id"],$row["name"],$row["description"],$row["price"]);
			foreach($object as $key => $value){
				$object->$key = $row[$key];
			}
			array_push($temporary,$object);
		}
		return $temporary;
	}

	public function countByFilters(){
		$query = "SELECT * FROM products";
		$result = $this->database->query($query);
		return mysqli_num_rows($result);
	}

	public function findByFilters($filters){
		$query = "SELECT * FROM products";
		if (count($filters)>0){
			$query .= " WHERE ";
		}
		$clauses = array();
		if(array_key_exists("text", $filters)){
			$clauses[] = " name LIKE '%$filters[text]%' OR description LIKE '%$filters[text]%'";
		}
		$range = array(
			1 => array("min"=>0,"max"=>100),
			2 => array("min"=>100,"max"=>200)
		);
		if(array_key_exists("pricerange", $filters)){
			$clauses[] = "price > ".$range[$filters["pricerange"]]["min"]." AND price < ".$range[$filters["pricerange"]]["max"];
		}
		if (count($clauses)>1){
			foreach ($clauses as $key => $value){
				$clauses[$key] = "(".$value.")";
			}
		}
		$query .= implode(" AND ",$clauses);
		var_dump($query);
		$result = $this->database->query($query);

		$temporary = array();
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$object = new Products();
			foreach($object as $key => $value){
				$object->$key = $row[$key];
			}
			array_push($temporary,$object);
		}
		return $temporary;
	}
	public function lastid(){
		$query = "SELECT * FROM products ORDER BY id DESC LIMIT 1";
		$result = $this->database->query($query);
		while($row = $result->fetch_assoc()){
			$id = $row["id"];
		}
		return $id;
	}
}