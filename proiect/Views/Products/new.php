<form method="POST" action="index.php?C=Products&A=create" id="newproduct" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" id="name" placeholder="Product" name="name">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="image">Image:</label>
				<input type="file"  name="picture">
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="description">Description:</label>
				<textarea class="form-control" rows="5" id="description" name="description"></textarea>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="price">Price:</label>
				<div class="input-group">
					<div class="input-group-addon">EUR</div>
					<input type="text" class="form-control" id="price" name="price" placeholder="9.99">
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="pull-right">
				<button type="submit" class="btn btn-default">Create New Product</button>
			</div>
		</div>
		
	</div>
</form>