<?php if (array_key_exists("connected", $_SESSION)) { 
	
		//$user = $_SESSION["user"];
	if(Administrator::check()){
		echo "esti admin";
	}else{
		echo "nu merge";
	}		  
?>
Welcome <?php echo $_SESSION["connected"]["firstname"]." ".$_SESSION["connected"]["lastname"]; ?> | 
<a href="index.php?C=Users&A=edit">Edit Profile</a>|
<a href="index.php?C=Users&A=disconnect">Logout</a>
<?php } else { ?>
<a href="index.php?C=Users&A=login">Login</a>|
<a href="index.php?C=Users&A=new">Register</a>|

<?php } ?>
