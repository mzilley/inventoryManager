<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Record Apparel Transaction</title>
<link href="inventoryManagerStyles.css" rel="stylesheet">
</head>
	<h1>Record Apparel Transaction</h1>
	<p>To record a transaction, enter the quantity removed from inventory for each size. The quantity will be updated in the current inventory and the transaction will be recorded in the transaction history. You do not need to fill in each field, only the ones you are changing the quantity of.</p>
	
	<table>
		<tr>
			<td class="applyFont" align="right">
				<form action="recordApparelTransaction.php" method="POST">
				<input type="hidden" name="ID" value=<?php echo $_GET["ID"];?>>
				XS QUANTITY:</td>
			<td><input type="number" name="xsQuantityTaken" min='0' value='0'></td>
			</td>
			<td class="applyFont" align="right">S QUANTITY:
			<input type="number" name="sQuantityTaken" min='0' value='0'></td>
		</tr>
		<tr>
			<td class="applyFont" align="right">M QUANTITY:</td>
			<td><input type="number" name="mQuantityTaken" min='0' value='0'</td>
			<td class="applyFont" align="right">L QUANTITY: 
			<input type="number" name="lQuantityTaken" min='0' value='0'</td>
		</tr>
		<tr>
			<td class="applyFont" align="right">XL QUANTITY:</td>
			<td><input type="number" name="xlQuantityTaken" min='0' value='0'td>
			<td class="applyFont" align="right">XXL QUANTITY: 
			<input type="number" name="xxlQuantityTaken" min='0' value='0'</td>
		</tr>
		<tr>
			<td class="applyFont" align="right">XXXL QUANTITY:</td>
			<td><input type="number" name="xxxlQuantityTaken" min='0' value='0'</td>
			<td class="applyFont" align="right">TYPE:
			<input type="radio" name="type" value="Gift"> Gift<br>
			<input type="radio" name="type" value="Paid">Paid
			</td>
		</tr>
		<tr>
			<td class="applyFont" align="right">REQUESTOR:</td>
			<td class="applyFont"><input type="text" name="personWhoTook"</td>	
			<td class="applyFont" align="right">DATE:
			<input type="date" id="date" name="date"</td>		
		</tr>
		<tr>
			<td class="applyFont" align="right">PURPOSE:</td>
			<td class="applyFont"><input type="text" name="personReceiving"</td>	
		</tr>
			<td>
				<input type="submit" name="update" value="Record Transaction" class="submitBtn">
				</form>
				<a href='apparelTransaction.php'><button class='button'>Back</button></a>
			</td>
		</tr>
	</table>

	<?php

		include('../connect.php');
		$ID = $_GET["ID"];

		$query2 = "SELECT * FROM `Apparel` WHERE ID = '$ID'";
		$result2 = mysqli_query($con, $query2);

		echo "<table class='applyFont' cellspacing='0' cellpadding='0'>";
			echo "<tr>";
				echo "<th></th>";
				echo "<th>M/W</th>";
				echo "<th>BRAND</th>";
				echo "<th>XS</th>";
				echo "<th>S</th>";
				echo "<th>M</th>";
				echo "<th>L</th>";
				echo "<th>XL</th>";
				echo "<th>XXL</th>";
				echo "<th>XXXL</th>";
			echo "</tr>";

		while($row=mysqli_fetch_array($result2)) {
			echo "<tr>";
				echo "<td align='center' width='9%'>";
					echo "<img src='/InventoryManager/InventoryManagerImages/Apparel/{$row['apparelImage']}' width='115' height='125' style='display:block'>";
				echo "</td>";
				echo "<td align='center'>";
					echo $row['manWomanUnisex'];
				echo "</td>";
				echo "<td align='center'>";
					echo $row['brand'];
				echo "</td>";
				echo "<td align='center' width='10%'>{$row['xsQuantity']}</td>";
				echo "<td align='center' width='10%'>{$row['sQuantity']}</td>";
				echo "<td align='center' width='10%'>{$row['mQuantity']}</td>";
				echo "<td align='center' width='10%'>{$row['lQuantity']}</td>";
				echo "<td align='center' width='10%'>{$row['xlQuantity']}</td>";
				echo "<td align='center' width='10%'>{$row['xxlQuantity']}</td>";
				echo "<td align='center' width='10%'>{$row['xxxlQuantity']}</td>";
			echo "</tr>";
		echo "</table>";
		}

		if(isset($_POST['update'])) {
		//Connect to DB
   		$hostname = "mysql4.uni.edu";
   		$username = "business";
   		$password = "HwHudY5JJYIZLPRy";
   		$dbName = "business_business";
		
   		$con = mysqli_connect($hostname, $username, $password, $dbName);
			
		//Current Inventory Values
		$xsQuantity = $_POST["xsQuantity"];
		$sQuantity = $_POST["sQuantity"];
		$mQuantity = $_POST["mQuantity"];
		$lQuantity = $_POST["lQuantity"];
		$xlQuantity = $_POST["xlQuantity"];
		$xxxlQuantity = $_POST["xxlQuantity"];
		$xxxlQuantity = $_POST["xxxlQuantity"];
			
		//Get Value From User
		$xsQuantityTaken = $_POST["xsQuantityTaken"];
		$sQuantityTaken = $_POST["sQuantityTaken"];
		$mQuantityTaken = $_POST["mQuantityTaken"];
		$lQuantityTaken = $_POST["lQuantityTaken"];
		$xlQuantityTaken = $_POST["xlQuantityTaken"];
		$xxlQuantityTaken = $_POST["xxlQuantityTaken"];
		$xxxlQuantityTaken = $_POST["xxxlQuantityTaken"];
		$ID = $_POST["ID"];
		
		//Query to Update Data	
		$query = "UPDATE Apparel LEFT JOIN Apparel_Sales ON Apparel.ID = Apparel_Sales.ID SET Apparel.xsQuantity = (Apparel.xsQuantity - '$xsQuantityTaken'), Apparel.sQuantity = (Apparel.sQuantity - '$sQuantityTaken'), Apparel.mQuantity = (Apparel.mQuantity - '$mQuantityTaken'), Apparel.lQuantity = (Apparel.lQuantity - '$lQuantityTaken'), Apparel.xlQuantity = (Apparel.xlQuantity - '$xlQuantityTaken'), Apparel.xxlQuantity = (Apparel.xxlQuantity - '$xxlQuantityTaken'), Apparel.xxxlQuantity = (Apparel.xxxlQuantity - '$xxxlQuantityTaken') WHERE Apparel.ID='$ID'";
		$result = mysqli_query($con, $query);
		
		//Check if Query Was Successful
		if($result) {
			echo "<p style=font-family:'Roboto Condensed', sans-serif><Apparel quantity has been updated</p>";
		} else {;
			echo "<p style=font-family:'Roboto Condensed', sans-serif>Error updating the quantity of the marketing material.</p>" . mysqli_error();
		}	
			
		//Define POST Variables
		$personWhoTook = $_POST['personWhoTook'];
		$personReceiving = $_POST['personReceiving'];	
		$type = $_POST['type'];
		$date = $_POST['date'];
		$ID = $_POST['ID'];
			
		//Query to Append 
		$query3 = "INSERT INTO `Apparel_Sales` (`personWhoTook`, `personReceiving`, `type`, `date`, `xsQuantityTaken`, `sQuantityTaken`, `mQuantityTaken`, `lQuantityTaken`, `xlQuantityTaken`, `xxlQuantityTaken`, `xxxlQuantityTaken`, `ID`) VALUES ('$personWhoTook', '$personReceiving', '$type', '$date', '$xsQuantityTaken', '$sQuantityTaken', '$mQuantityTaken', '$lQuantityTaken', '$xlQuantityTaken', '$xxlQuantityTaken', '$xxxlQuantityTaken', '$ID')";
		$result3 = mysqli_query($con, $query3);
			
		//Check if Query Was Successful
		if($result3) {
			echo "";
		} else {
			echo "<p style=font-family:'Roboto Condensed', sans-serif>Error adding data into sales records.</p>" . mysqli_error();
		}	
		}
	?>
<body>
</body>
	<!--Javascript-->
	<script type="text/javascript">		
		//Prevents "Confirm Form Resubmission" pop-up, preventing the possibility of a double submission
		if (window.history.replaceState) {
  		window.history.replaceState(null, null, window.location.href);
		}
		
		document.getElementById('date').valueAsDate = new Date();
	</script>

	
</html>