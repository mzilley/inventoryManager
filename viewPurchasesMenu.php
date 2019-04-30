<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Sales | UNI CBB</title>
<link rel="shortcut icon" type="image/png" href="InventoryManagerImages/Icons/0.png">
<link href="inventoryManagerStyles.css" rel="stylesheet">
</head>
<body>
	
	<?php require_once("../connect.php");
	?>
	
			<h1>View Purchases</h1>
			
			<a href="viewApparelPurchases.php"><button class="button" title='View apparel purchase history'>Apparel</button></a>
			<a href="viewItemPurchases.php"><button class="button" title="View item purchase history">Items</button></a>
			<a href="viewMktgMaterialPurchases.php"><button class="button" title="View marketing material purchase history">Printed Material</button></a>
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