<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
	$connection = mysqli_connect("localhost","root","","tema1-lab-14");
	$query = "INSERT INTO products
	(name,price,manufacture) 
	VALUES 
	('".$_POST["name"]."',
	'".$_POST["price"]."',
	".$_POST["manufacture"].")";
	mysqli_query($connection,$query);
	mysqli_close($connection);
}