<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Purchases | UNI CBB</title>
<link rel="shortcut icon" type="image/png" href="InventoryManagerImages/Icons/0.png">
<link href="inventoryManagerStyles.css" rel="stylesheet">
</head>
<body>
<?php
		//Connect to DB
		include('../connect.php');
	
		$query = "SELECT itemImage, description, unitCost, itemQuantity, purchaser, purchaseDate FROM Items WHERE ID >=89 ORDER BY purchaseDate";
		$result = mysqli_query($con, $query);
	
		echo "<h1>Purchase History | Items</h1>";
	
		//Main Menu
		echo "<a href='viewApparelPurchases.php'><button class='button'>Apparel</button></a>";
		echo "<a href='viewItemPurchases.php'><button class='button'>Items</button></a>";echo "<a href='viewMktgMaterialPurchases.php'><button class='button'>Printed Material</button></a>";
		echo "<a href='../inventoryIndex.php'><button class='button'>Back</button></a>";
		
		echo "<br>";
		echo "<br>";
	
		//Display Data
		echo "<table class='applyFont' id='tblexportData' cellspacing='0' cellpadding='0'>";
			echo "<tr>";
				echo "<th></th>";
				echo "<th>ITEM</th>";
				echo "<th>COST</th>";
				echo "<th>QUANTITY</th>";
				echo "<th>PURCHASER</th>";
				echo "<th>DATE</th>";
			echo "</tr>";
	
		while($row=mysqli_fetch_array($result)) {
			echo "<tr>";
				echo "<td align='center' width='9%'><img src='/InventoryManager/InventoryManagerImages/Items/{$row['itemImage']}' width='115' height='125' style='display:block'></td>";
				echo "<td align='center' width='25%'>{$row['description']}</td>";
				echo "<td align='center' width='10%'>{$row['unitCost']}</td>";
				echo "<td align='center' width='10%'>{$row['itemQuantity']}</td>";
				echo "<td align='center' width='20%'>{$row['purchaser']}</td>";
				echo "<td align='center'>{$row['purchaseDate']}</td>";
			echo "</tr>";
		}
		echo "</table>";
		
		echo "<br>";
		echo "<a href='../inventoryIndex.php'><button class='button'>Back</button></a>";
	
		//Error Handling
		if($result) {
			echo "";
		} else {
 			if (mysqli_connect_errno()){
				die("Unsuccessful connection to database: " . mysqli_connect_error());
			}
		}
?>
</body>
	<!--Table Filter Plug-In-->
	<script src="ddtf.js"></script>
	<script>
		//Table Filtering
		jQuery('.applyFont').ddTableFilter();
	</script>
</html>