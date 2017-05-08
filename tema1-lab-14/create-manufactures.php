<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$connection = mysqli_connect("localhost","root","","tema1-lab-14");
		$query = "INSERT INTO manufactures(name) VALUES ('".addslashes($_POST["name"])."')";
		mysqli_query($connection,$query);
		mysqli_close($connection);
	}
?>
<meta http-equiv=”refresh” content="5" />