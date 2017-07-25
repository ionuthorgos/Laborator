<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1>Login</h1>
		<?php
			if (array_key_exists("errors", $_SESSION)){
				foreach ($_SESSION["errors"] as $error){
					echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
				}
			}
		?>
		<form method="POST" action="index.php?C=Users&A=connect">
			<div class="form-group">
				<label for="emailaddress">Email address</label>
				<input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="Email">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  			<div class="pull-right">
  				<button type="submit" class="btn btn-default">Submit</button>
  			</div>
		</form>
	</div>
</div>