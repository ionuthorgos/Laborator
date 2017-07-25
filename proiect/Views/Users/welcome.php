<h1>Welcome <?php echo $user["firstname"] ?></h1>
<?php if (Administrator::check()){ 
?> <!-- <img src="Resources/Public/ok.jpg" width="30" height="30"> --> <?php }
if (Administrator::check()){ 
	?><br />
	<center><a href="<?php "index.php?C=Users&A=new">?>" class="btn btn-primary btn-lg active" role="button">Add Team</a>
	<a href="<?php URL::show("Players","new")?>" class="btn btn-primary btn-lg active" role="button">Add Player</a></center><br /><?php 
}
?>
