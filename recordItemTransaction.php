<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Record Item Transactions</title>
<link href="inventoryManagerStyles.css" rel="stylesheet">
</head>
	<h1>Record Item Transaction</h1>
	<p>To record a transaction, edit the current quantity in the textbox below. The quantity will be updated in the current inventory and the transaction will be recorded in the transaction history.</p>
	
	<table>
		<tr>
			<td class="applyFont" align="right">
				<form action="recordItemTransaction.php" method="POST">
				<input type="hidden" name="ID" value=<?php echo $_GET["ID"];?>>
				QUANTITY:
			</td>
			<td><input type="number" name="quantityTook" min='0'></td>
		</tr>
		<tr>
			<td class="applyFont" align="right">REQUESTOR:</td>
			<td class="applyFont"><input type="text" name="personWhoTook"</td>
		</tr>
		<tr>
			<td class="applyFont" align="right">PURPOSE:</td>
			<td class="applyFont"><input type="text" name="personReceiving"</td>
		</tr>
		<tr>
			<td class="applyFont" align="right">TYPE:</td>
			<td class="applyFont">
			<input type="radio" name="type" value="Gift"> Gift<br>
			<input type="radio" name="type" value="Paid">Paid
			</td>
		</tr>
		<tr>
			<td class="applyFont" align="right">DATE:</td>
			<td class="applyFont"><input type="date" id="date" name="date"</td>
		</tr>
		<tr>
		<tr>
			<td>
				<input type="submit" name="update" value="Record Transaction" class="submitBtn">
				</form>
				<a href='itemTransaction.php'><button class='button'>Back</button></a>
			</td>
		</tr>
	</table>

	<?php

		include('../connect.php');
		$ID = $_GET["ID"];

		$query2 = "SELECT * FROM `Items` WHERE ID = '$ID'";
		$result2 = mysqli_query($con, $query2);

		echo "<table class='applyFont' cellspacing='0' cellpadding='0'>";
			echo "<tr>";
				echo "<th></th>";
				echo "<th>CURRENT QUANTITY</th>";
			echo "</tr>";

		while($row=mysqli_fetch_array($result2)) {
			echo "<tr>";
				echo "<td align='center'>";
					echo "<img src='/InventoryManager/InventoryManagerImages/Items/{$row['itemImage']}' width='115' height='125' style='display:block'>";
				echo "</td>";
				echo "<td align='center'>";
					echo $row['itemQuantity'];
				echo "</td>";
			echo "</tr>";
		echo "</table>";
		}

		if(isset($_POST['update'])) {
		//Connect to DB
   		$hostname = "****";
   		$username = "****";
   		$password = "****";
   		$dbName = "****";
		
   		$con = mysqli_connect($hostname, $username, $password, $dbName);
			
		//Get Value From User
		$itemQuantity = $_POST["itemQuantity"];
		$quantityTook = $_POST["quantityTook"];
		$ID = $_POST["ID"];
		
		//Query to Update Data
		$query = "UPDATE Items LEFT JOIN Sales ON Items.ID = Sales.ID SET Items.itemQuantity = (Items.itemQuantity - '$quantityTook') WHERE Items.ID='$ID'";
		$result = mysqli_query($con, $query);
		
		//Check if Query Was Successful
		if($result) {
			echo "<p style=font-family:'Roboto Condensed', sans-serif>Item quantity has been updated</p>";
		} else {;
			echo "<p style=font-family:'Roboto Condensed', sans-serif>Error updating the quantity of the item.</p>" . mysqli_error();
		}
			
		//Define POST Variables
		$personWhoTook = $_POST['personWhoTook'];
		$personReceiving = $_POST['personReceiving'];	
		$type = $_POST['type'];
		$date = $_POST['date'];
		$ID = $_POST['ID'];
			
		//Query to Append 
		$query3 = "INSERT INTO `Sales` (`quantityTook`, `personWhoTook`, `personReceiving`, `type`, `date`, `ID`) VALUES ('$quantityTook', '$personWhoTook', '$personReceiving', '$type', '$date', '$ID')";
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
