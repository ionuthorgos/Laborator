<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
	$connection = mysqli_connect("localhost","root","","tema1-lab-14");
	$query = "INSERT INTO ordors(fullname,product,quantity) 
	VALUES 
	('".$_POST["fullname"]."',
	'".$_POST["product"]."',
	".$_POST["quantity"].")";
	
	mysqli_query($connection,$query);
	mysqli_close($connection);
}
