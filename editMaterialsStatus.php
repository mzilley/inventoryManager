<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Status | Printed Material</title>
<link rel="shortcut icon" type="image/png" href="InventoryManagerImages/Icons/0.png">
<link href="inventoryManagerStyles.css" rel="stylesheet">
</head>
<body>
	<h1>Edit Status | Printed Material</h1>
	<table>
		<tr>
			<td class="applyFont" align="right">
				<form action="editMaterialsStatus.php" method="POST">
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
				<a href='viewMarketingMaterials.php'><button class='button'>Back</button></a>
			</td>
		</tr>
	</table>
</body>

<?php
	
	if(isset($_POST['update'])) {
		//Connect to DB
   		$hostname = "mysql4.uni.edu";
   		$username = "business";
   		$password = "HwHudY5JJYIZLPRy";
   		$dbName = "business_business";
		
   		$con = mysqli_connect($hostname, $username, $password, $dbName);
			
		//Get Value From User
		$isActive = $_POST["isActive"];
		$ID = $_POST["ID"];
			
		//Query to Update Data
		$query = "UPDATE `Marketing_Material` SET `isActive`='$isActive' WHERE ID='$ID'";
		$result = mysqli_query($con, $query);
		
		//Check if Query Was Successful
		if($result) {
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