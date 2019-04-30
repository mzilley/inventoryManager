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
	
		$query = "SELECT apparelImage, manWomanUnisex, brand, purpose, unitCost, xsQuantity, sQuantity, mQuantity, lQuantity, xlQuantity, xxlQuantity, xxxlQuantity, purchaser, purchaseDate FROM Apparel WHERE ID >=672 ORDER BY purchaseDate";
		$result = mysqli_query($con, $query);
	
		echo "<h1>Purchase History | Apparel</h1>";
	
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
				echo "<th>M/W</th>";
				echo "<th>BRAND</th>";
				echo "<th>PURPOSE</th>";
				echo "<th>COST</th>";
				echo "<th>XS</th>";
				echo "<th>S</th>";
				echo "<th>M</th>";
				echo "<th>L</th>";
				echo "<th>XL</th>";
				echo "<th>XXL</th>";
				echo "<th>XXXL</th>";
				echo "<th>PURCHASER</th>";
				echo "<th>DATE</th>";
			echo "</tr>";
	
		while($row=mysqli_fetch_array($result)) {
			echo "<tr>";
				echo "<td align='center' width='9%'><img src='/InventoryManager/InventoryManagerImages/Apparel/{$row['apparelImage']}' width='115' height='125' style='display:block'></td>";
				echo "<td align='center' width='9%'>{$row['manWomanUnisex']}</td>";
				echo "<td align='center' width='9%'>{$row['brand']}</td>";
				echo "<td align='center' width='9%'>{$row['purpose']}</td>";
				echo "<td align='center' width='7%'>{$row['unitCost']}</td>";
				echo "<td align='center' width='4.5%'>{$row['xsQuantity']}</td>";
				echo "<td align='center' width='4.25%'>{$row['sQuantity']}</td>";
				echo "<td align='center' width='4.25%'>{$row['mQuantity']}</td>";
				echo "<td align='center' width='4.25%'>{$row['lQuantity']}</td>";
				echo "<td align='center' width='4.5%'>{$row['xlQuantity']}</td>";
				echo "<td align='center' width='4.75%'>{$row['xxlQuantity']}</td>";
				echo "<td align='center' width='4.75%'>{$row['xxxlQuantity']}</td>";
				echo "<td align='center' width='12%'>{$row['purchaser']}</td>";
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
