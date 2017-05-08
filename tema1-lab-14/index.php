<!DOCTYPE html>
<?php
	$connection = mysqli_connect("localhost","root","","tema1-lab-14");
	$query = "SELECT * FROM ordors";
	$result = mysqli_query($connection,$query);
?>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<a class="btn btn-default" href="manufactures.php" >Manufactures</a>
			<a class="btn btn-default" href="products.php" >Products</a>
			<a class="btn btn-default" href="orders.php">Orders</a>
			<input class="btn btn-default" href="" type="submit" value="Submit">
		
			<table class="table table-striped">
				<thead>
					<td>ID</td>
					<td>fullname</td>
					<td>product</td>
					<td>quantity</td>
				</thead>
				<?php while($line=
				mysqli_fetch_array($result,MYSQLI_ASSOC) ) {?>
					<tr>
						<td><?php echo $line ["id"]?></td>
						<td><?php echo $line ["fullname"]?></td>
						<td><?php echo $line ["product"]?></td>
						<td><?php echo $line ["quantity"]?></td>
						<td><a href="delete.php">Delete</a></td>
					</tr>
				<?php } ?>
			</table>
		</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>