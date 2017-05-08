<?php
$connection = mysqli_connect("localhost","root","","tema1-lab-14");
$query = "SELECT id,name FROM manufactures";
/*$query = "SELECT products.id as'id',products.name as 'name',manufactures.name as 'manufactures' FROM products
INNER JOIN manufactures
	on manufactures.id = products.manufactures
"*/
$manufactures = mysqli_query($connection,$query);
mysqli_close($connection);
?>
<html>
<form method="POST" action="create-products.php">
<input type="text" name="name" placeholder="Product">
<input type="text" name="price" placeholder="Price">
<select name="manufacture">
	<?php while ($line = mysqli_fetch_array($manufactures,MYSQLI_ASSOC)){ ?>
	<option value="<?php echo $line["id"] ?>">
				   <?php echo $line["name"]?>
	</option>
	<?php } ?>
</select>
<input type="submit">
</form>
</html>