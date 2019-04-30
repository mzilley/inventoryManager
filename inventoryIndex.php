<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Inventory Manager | UNI CBA</title>
<link rel="shortcut icon" type="image/png" href="InventoryManager/InventoryManagerImages/Icons/0.png">
<link href="InventoryManager/inventoryManagerStyles.css" rel="stylesheet">
</head>
	
	<?php require_once("connect.php");
	?>
	
	<body>
			<table>
			<tr><td><h1>Inventory Manager </h1></td><td><img src="/InventoryManager/InventoryManagerImages/UNIBusinessCBAUNI-logo2.jpg"></td></tr>
			</table>
	
			<h4>Inventory</h4>
			<a href="InventoryManager/addInventoryMenu.php"><button class="button" title="Add apparel, items, and marketing materials to the current inventory">Add Inventory</button></a>
		
			<h4>Transactions</h4>
			<a href="InventoryManager/recordTransactionMenu.php"><button class="button" title="Record a change in inventory from a sale, gift, or other transaction">Record Sale or Gift</button></a>
		
			<h4>Views</h4>
			<a href="InventoryManager/viewApparel.php"><button class="button" title="View and sort current inventory">View Inventory</button></a>

			<a href="InventoryManager/viewSalesMenu.php"><button class="button" title="View and sort sales history">View Transactions</button></a>
			<a href="InventoryManager/viewPurchasesMenu.php"><button class="button" title="View and sort purchase history">View Purchases</button></a>
	
		<!--jQuery Tooltip-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
			$(function() {
				$(document).tooltip();
			});
		</script>
	</body>
</html>