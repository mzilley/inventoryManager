<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Status | Apparel</title>
<link rel="shortcut icon" type="image/png" href="InventoryManagerImages/Icons/0.png">
<link href="inventoryManagerStyles.css" rel="stylesheet">
</head>
<body>
	<h1>Edit Status | Apparel</h1>
	<table>
		<tr>
			<td class="applyFont" align="right">
				<form action="editStatus.php" method="POST">
				STATUS: 
			</td>
			<td>
				<select name="isActive" style=width:100%; required>
							<option name="Inactive">Inactive</option>
							<option name="Active">Active</option>
					</select>
				<input type="hidden" name="ID" value=<?php echo $_GET["ID"];?>>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="update" value="Update Status" class="submitBtn">
				</form>
				<a href='viewApparel.php'><button class='button'>Back</button></a>
			</td>
		</tr>
	</table>
</body>

<?php
	
	if(isset($_POST['update'])) {
		//Connect to DB
   		$hostname = "****";
   		$username = "****";
   		$password = "****";
   		$dbName = "****";
		
   		$con = mysqli_connect($hostname, $username, $password, $dbName);
			
		//Get Value From User
		$isActive = $_POST["isActive"];
		$ID = $_POST["ID"];
			
		//Query to Update Data
		$query = "UPDATE `Apparel` SET `isActive`='$isActive' WHERE ID='$ID'";
		$result = mysqli_query($con, $query);
		
		//Check if Query Was Successful
		if($result) {
//			echo "<meta http-equiv='refresh' content='0;url='viewApparel.php'>";
			echo "<p style=font-family:'Roboto Condensed', sans-serif>Status updated to $isActive</p>";
		} else {;
			echo "<p style=font-family:'Roboto Condensed', sans-serif>Error updating the status of the item.</p>" . mysqli_error();
		}	
		//Disconnect From DB
		mysqli_close($con);
	}
?>

	<script type="text/javascript">		
		//Prevents "Confirm Form Resubmission" pop-up, preventing the possibility of a double submission
		if (window.history.replaceState) {
  		window.history.replaceState(null, null, window.location.href);
		}
	</script>
</html>
