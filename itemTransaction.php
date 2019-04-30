<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Item Transaction</title>
<link rel="shortcut icon" type="image/png" href="InventoryManagerImages/Icons/0.png">
<link href="inventoryManagerStyles.css" rel="stylesheet">
</head>
<body>
	<?php
		//Connect to DB
		include('../connect.php');
		
    	$query = "SELECT * FROM `Items` WHERE `isActive` = 'Active'";
		$result = mysqli_query($con, $query);

			echo "<h1>Record Transaction | Items</h1>";
			
			echo "<a href='../inventoryIndex.php'><button class='button'>Back</button></a>";
				
		//Display Data
		echo "<table class='applyFont' cellspacing='0' cellpadding='0'>";
			echo "<tr>";
				echo "<th></th>";
				echo "<th>ITEM</th>";
				echo "<th>COST</th>";
				echo "<th>RECORD TRANSACTION</th>";
			echo "</tr>";
		
		while($row=mysqli_fetch_array($result)) {
			echo "<tr>";
				echo "<td align='center' width='9%'><img src='/InventoryManager/InventoryManagerImages/Items/{$row['itemImage']}' width='115' height='125' style='display:block'></td>";
				echo "<td align='center' width='30%'>{$row['description']}</td>";
				echo "<td align='center' width='30%'>$ {$row['unitCost']}</td>";
				echo "<td align='center'><a href='recordItemTransaction.php?ID={$row['ID']}'><img src='/InventoryManager/InventoryManagerImages/Icons/couple-of-arrows-changing-places.png' title='Record an update to inventory'></td>";
			echo "</tr>";
		}
	?>
</body>
	<!--jQuery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!--Table Filter Plug-In-->
	<script src="ddtf.js"></script>
	<script>
		//Table Filtering
		jQuery('.applyFont').ddTableFilter();
	</script>
</html>