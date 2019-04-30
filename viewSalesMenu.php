<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Transactions | UNI CBB</title>
<link rel="shortcut icon" type="image/png" href="InventoryManagerImages/Icons/0.png">
<link href="inventoryManagerStyles.css" rel="stylesheet">
</head>
<body>
	
	<?php require_once("../connect.php");
	?>
	
			<h1>View Transactions</h1>
			
			<a href="viewApparelSales.php"><button class="button" title='View apparel sales history'>Apparel</button></a>
			<a href="viewItemSales.php"><button class="button" title="View item sales history">Items</button></a>
			<a href="viewMktgMaterialSales.php"><button class="button" title="View marketing material sales history">Printed Material</button></a>
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