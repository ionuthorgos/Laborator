
<form method="POST" action="index.php?C=Users&A=update">
	<h1>Edit User</h1>
	<?php
		if (array_key_exists("errors", $_SESSION)){
			foreach ($_SESSION["errors"] as $error){
				echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
			}
		}
	?>
	<div class="row">
		<div class="col-md-6">
			<h3>Personal Information</h3>
			<div class="form-group">
				<label for="firstname">Firstname</label>
				<input name="firstname" type="text" class="form-control" id="firstname" placeholder="John" value="<?php echo checkField("users-update-values","firstname"); ?>">
			</div>
			<div class="form-group">
				<label for="lastname">Lastname</label>
				<input name="lastname" type="text" class="form-control" id="lastname" placeholder="Doe" value="<?php echo checkField("users-update-values","lastname"); ?>">
			</div>
			<div class="form-group">
				<label for="birthdate">Date of Birth</label>
				<input name="birthdate" type="text" class="form-control" id="birthdate" placeholder="31.12.1999" value="<?php echo checkField("users-update-values","birthdate"); ?>">
			</div>
		</div>
		<div class="col-md-6">
			<h3>Contact Information</h3>
			<div class="form-group">
				<label for="address">Address</label>
				<input name="address" type="text" class="form-control" id="address" placeholder="39, Oxford street" value="<?php echo checkField("users-update-values","address"); ?>">
			</div>
			<div class="form-group">
				<label for="zip">Zip Code</label>
				<input name="zip" type="text" class="form-control" id="zip" placeholder="AA112233" value="<?php echo checkField("users-update-values","zip"); ?>">
			</div>
			<div class="form-group">
				<label for="city">City</label>
				<input name="city" type="text" class="form-control" id="city" placeholder="London" value="<?php echo checkField("users-update-values","city"); ?>">
			</div>
			<div class="form-group">
				<label for="country">Country</label>
				<input name="country" type="text" class="form-control" id="country" placeholder="Great Britain" value="<?php echo checkField("users-update-values","country"); ?>">
			</div>
			<div class="form-group">
				<label for="phone">Phone Number</label>
				<input name="phone" type="text" class="form-control" id="phone" placeholder="0044123888888" value="<?php echo checkField("users-update-values","phone"); ?>">
			</div>
		</div>
	</div>
	<h3>Access Information</h3>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="emailaddress">Email Address</label>
				<input name="emailaddress" type="email" class="form-control" id="emailaddress" placeholder="username@domain.com" value="<?php echo checkField("users-update-values","emailaddress"); ?>">
			</div>
		</div>
		<div class="col-md-12">
			<div class="checkbox">
				<label>
					<input type="checkbox" name="agreement"> I agree the Terms and Conditions 
				</label>
			</div>
		</div>
	</div>

	<div class="pull-right">
		<button type="submit" class="btn btn-default">Edite User</button>
	</div>
</form>