<!DOCTYPE>
<html>
	<head>
	
	</head>
	<body>
		<?php
				if (array_key_exists("type", $_GET)){
					$path = "page/".$_GET["type"].".php";
				
					if (file_exists($path)){
						include $path;
					} else {
						
						echo '<meta http-equiv="refresh" content="0; url=../index.php" />';
					}					
				}
			?>
		
		<a href="form.php" > First link</a>
		<a href="form.php" > Second link</a>
	</body>
</html>