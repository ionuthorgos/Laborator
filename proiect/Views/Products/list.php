
<?php
if (TEMPLATE === true) {
?>
<a href="index.php?C=Products&A=new">New Product</a>
<div class="row productslist">
<?php
}
foreach($products as $product) { ?>
	<div class="col-sm-6 col-md-6">
	    <div class="thumbnail">
	      <div class="caption">
			  <div class="row">
			  	<div class="col-md-6" ;>
					<?php  $file="Resources/Public/Uploads/Products/".$product->id.".jpg";   //echo $file;  ?>
	        <center><img src='<?php echo $file ?>' height="200" width="200" ></center>
				  </div>
				 <div class="col-md-6">
					<h3><?php echo $product->name; ?></h3>
					<p><?php echo $product->description; ?></p>
					<p><b><?php echo $product->price; ?> &euro;</b></p>
					 
				 </div>
			  </div>
	      </div>
	    </div>
	  </div>
	
<?php } 
if (TEMPLATE === true) {
?>
</div>
<?php } ?>

<?php
if (TEMPLATE === true) {
?>
	<input type="hidden" id="page" value="<?php echo ($page+1) ?>" />
	<input type="hidden" id="numberOfPages" value="<?php echo $numberOfPages; ?>" />
<!-- <?php
	if($numberOfPages!=1 && $page==1){
		echo '<a href="#" id="showmore">Show More</a>';
	}
	if($numberOfPages>1){
?> -->
<nav id="pagination" aria-label="...">
	<ul class="pagination">
		<?php
			if ($page!=1){
				echo '<li><a href="index.php?C=Products&A=list&P=1">1</a></li>';
			}
			if (($page-2)>1){
				echo "<li><a>...</a></li>";
			}
			if(($page-1)!=1 && ($page-1)>0){
				echo '<li><a href="index.php?C=Products&A=list&P='.($page-1).'">'.($page-1).'</a></li>';	
			}
			echo '<li class="active"><a href="#">'.$page.'</a></li>';	
			if(($page+1)!=$numberOfPages && $page!=$numberOfPages){
				echo '<li><a href="index.php?C=Products&A=list&P='.($page+1).'">'.($page+1).'</a></li>';	
			}
			if (($page+2)<$numberOfPages){
				echo "<li><a>...</a></li>";
			}
			if($page!=$numberOfPages){
				echo '<li><a href="index.php?C=Products&A=list&P='.$numberOfPages.'">'.$numberOfPages.'</a></li>';	
			}
		?>
	</ul>
</nav>
<?php
	}

					   }
?>
