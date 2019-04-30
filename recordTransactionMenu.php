<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Record Transaction | UNI CBB</title>
<link rel="shortcut icon" type="image/png" href="InventoryManagerImages/Icons/0.png">
<link href="inventoryManagerStyles.css" rel="stylesheet">
</head>
<body>
	
	<?php require_once("../connect.php");
	?>
	
			<h1>Record a Sale or Gift</h1>
			
			<a href="apparelTransaction.php"><button class="button" title='Record a reduction to inventory'>Apparel</button></a>
			<a href="itemTransaction.php"><button class="button" title="Record a reduction to inventory">Items</button></a>
			<a href="mktgMaterialTransaction.php"><button class="button" title="Record a reduction to inventory"> Printed Material</button></a>
			<br>
			<a href="../inventoryIndex.php"><button class="button">Back</button></a>

	<!--jQuery Tooltip-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(function() {
			$(document).tooltip();
		});
	</script>
</body>
</html>