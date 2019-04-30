<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Inventory | UNI CBB</title>
<link rel="shortcut icon" type="image/png" href="InventoryManagerImages/Icons/0.png">
<link href="inventoryManagerStyles.css" rel="stylesheet">
</head>
<body>
	
	<?php require_once("../connect.php");
	?>
	
			<h1>Add Inventory</h1>
	
			<p>When inventory is added, transactions will be recorded and inserted in the purchase history.</p>
			
			<a href="addNewApparel.php"><button class="button" title='Add apparel such as shirts, sweatshirts, polos, and jackets to the current inventory'>Add New Apparel</button></a>
			<a href="addNewItems.php"><button class="button" title="Add novelty items for giveaways, collateral, etc. to the current inventory">Add New Items</button></a>
			<a href="addNewMarketingMaterials.php"><button class="button" title="Add brochures and flyers for campus events to the current inventory">Add New Printed Material</button></a>
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