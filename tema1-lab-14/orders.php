<?php
	$connection= mysqli_connect("localhost","root","","tema1-lab-14");
	$query = "SELECT * FROM products";
	$result = mysqli_query($connection,$query);
	mysqli_close($connection);
?>
<form method="POST" action="create-orders.php">
<input type="text" name="fullname" placeholder="fullname">
<select name="product"> 
	<?php while ($line = mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>
	<option value="<?php echo $line["id"] ?>">
				   <?php echo $line["name"]?>
				   <?php echo $line["price"]?>
				   
	</option>
	<?php } ?>
?>
</select>
<input type="text" name="quantity" placeholder="quantity"/>
<input type="submit"/>
</form>