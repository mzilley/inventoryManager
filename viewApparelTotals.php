<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Total Inventory</title>
<link rel="shortcut icon" type="image/png" href="InventoryManagerImages/Icons/0.png">
<link href="inventoryManagerStyles.css" rel="stylesheet">
</head>
<body>
	<?php
		//Connect to DB
		include('../connect.php');
		$ID = $_GET["ID"];

    	$query = "SELECT `apparelImage`, (SUM(xsQuantity + sQuantity + mQuantity + lQuantity + xlQuantity + xxlQuantity + xxxlQuantity)) AS total FROM `Apparel` WHERE `ID` = '$ID'";
		$result = mysqli_query($con, $query);
	
		echo "<h1>Total Inventory</h1>";
	
		echo "<a href='viewApparel.php'><button class='button'>Back</button></a>";
	
		echo "<table class='applyFont' id='tblexportData' cellspacing='0' cellpadding='0'>";
			echo "<tr>";
				echo "<th>TOTAL</th>";
				echo "<th></th>";
			echo "<tr>";
	
	while($row=mysqli_fetch_array($result)) {
			echo "<tr>";
				echo "<td align='center'>{$row['total']}</td>";
				echo "<td width='9%'><img src='/InventoryManager/InventoryManagerImages/Apparel/{$row['apparelImage']}' width='115' height='125' style='display:block'></td>";
			echo "</tr>";
	}
		echo "</table>";
	
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
</html>