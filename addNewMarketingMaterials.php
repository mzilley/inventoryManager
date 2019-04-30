<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add New Printed Materials | UNI CBB</title>
<link rel="shortcut icon" type="image/png" href="InventoryManagerImages/Icons/0.png">
<link href="inventoryManagerStyles.css" rel="stylesheet">
</head>
<body>
	<?php
	//Add New Marketing Materials Form
		echo "<h1>Add New Printed Material</h1>";
		echo "<table>";
		echo "<form action='addNewMarketingMaterials.php' method='post' name='addMarketingMaterials' enctype='multipart/form-data'>";
	
			echo "<tr>";
				echo "<td class='applyFont' align='right'>";
					echo "DEPARTMENT: ";
				echo "</td>";
				echo "<td>";
					echo "<select name='department'>";
						echo "<option value='' disabled selected></option>";
						echo "<option value='Accounting'>Accounting</option>";
						echo "<option value='Business Administration'>Business Administration</option>";
						echo "<option value='Business Teaching'>Business Teaching</option>";
						echo "<option value='Economics'>Economics</option>";
						echo "<option value='Finance'>Finance</option>";
						echo "<option value='Human Resources'>Human Resources</option>";
						echo "<option value='International Business Minor'>International Business Minor</option>";
						echo "<option value='Marketing'>Marketing</option>";
						echo "<option value='MIS'>MIS</option>";
						echo "<option value='Oganizational Leadership'>Organizational Leadership</option>";
						echo "<option value='Real Estate'>Real Estate</option>";
						echo "<option value='Supply Chain'>Supply Chain</option>";
						echo "<option value='UNI Business'>UNI Business</option>";
					echo "</select>";
				echo "</td>";
				echo "</td>";
				echo "<td class='applyFont' align='right'>";
						echo "QUANTITY: ";
					echo "</td>";
					echo "<td>";
						echo "<input type='number' name='materialsQuantity' min = '0' value='0'>";
					echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='applyFont' align='right'>";
					echo "CATEGORY:<span style='color:#B22222'>*</span> ";
				echo "</td>";
				echo "<td>";
					echo "<select name='category' required>";
						echo "<option value='' disabled selected></option>";
						echo "<option value='Campus Visits'>Campus Visits</option>";
						echo "<option value='Get Ready for Business'>Get Ready for Business</option>";
						echo "<option value='Orientation'>Orientation</option>";
						echo "<option value='UNIBiz'>UNIBiz</option>";
						echo "<option value='UNI Business'>UNI Business</option>";
					echo "</select>";
				echo "</td>";
				echo "<td class='applyFont' align='right'>";
						echo "PURCHASER: ";
					echo "</td>";
					echo "<td>";
						echo "<input type='text' name='purchaser'>";
					echo "</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td class='applyFont' align='right'>";
					echo "TYPE:<span style='color:#B22222'>*</span> ";
				echo "</td>";
				echo "<td>";
					echo "<select name='description' required>";
						echo "<option value='' disabled selected></option>";
						echo "<option value='Brochure'>Brochure</option>";
						echo "<option value='Magazine'>Magazine</option>";
						echo "<option value='Folder'>Folder</option>";
					echo "</select>";
				echo "</td>";
				echo "<td class='applyFont' align='right'>";
						echo "PURCHASE DATE: ";
					echo "</td>";
					echo "<td>";
						echo "<input type='date' name='purchaseDate'>";
					echo "</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td class='applyFont' align='right'>";
						echo "UNIT COST: $ ";
					echo "</td>";
					echo "<td>";
						echo "<input type='text' name='unitCost' placeholder='0.00'>";
					echo "</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td></td>";
					echo "<td class='applyFont' align='right'>";
						echo "<input type='file' name='materialsImage' onchange='loadFile(event)' required>";
					echo "</td>";
					echo "<td>";
						echo "<img id='materialsImage' name='materialsImage' src='http://placehold.it/125/D1D1E6/D1D1E6?' width='125' height='125'>";
					echo "</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td>";
					echo "<input type='submit' class='submitBtn' id='submit' name='submit' value='Submit'>";
	
				echo "</form>";
	
						echo "<a href='addInventoryMenu.php'><button class='button'>Back</button></a>";
					echo "</td>";
				echo "</tr>";
		echo "</table>";
			
		//Connect to DB
		require_once("../connect.php");

		if(isset($_POST['submit'])) {
			//Define POST variables
			$category = $_POST["category"];
			$description = $_POST["description"];
			$unitCost = $_POST["unitCost"];
			$materialsQuantity = $_POST["materialsQuantity"];
			$purchaser = $_POST["purchaser"];
			$purchaseDate = $_POST["purchaseDate"];
			$materialsImage = $_FILES["materialsImage"]["name"];
			
			$fileName = $_FILES['fileName']['name'];
			$fileTmp = $_FILES['materialsImage']['tmp_name'];
			$fileError = $_FILES['materialsImage']['error'];
			$fileType = $_FILES['materialsImage']['type'];
	
			//Query to insert data into DB on form submission
			$query = "INSERT INTO `Marketing_Material` (`category`, `description`, `unitCost`, `materialsQuantity`, `materialsImage`, `purchaser`, `purchaseDate`) VALUES ('".mysqli_real_escape_string($con, $category)."', '".mysqli_real_escape_string($con,$description)."', '$unitCost', '$materialsQuantity', '$materialsImage', '$purchaser', '$purchaseDate')";
	
			
			//Check for Errors with File Upload
			if($query) {
					if($fileError === 0) {
						move_uploaded_file($_FILES['materialsImage']['tmp_name'], "InventoryManagerImages/MktgMaterials/$materialsImage");
						echo "";
					} else {
						echo "There was an error uploading your file. The record was still added to the database.";
					}
				}
			}
	
		//Verify successful database connection and query execution
		$result = mysqli_query($con, $query);
	
		//Error Handling
		if($result) {
			echo "<p style=font-family:'Roboto Condensed', sans-serif>Marketing material has been added</p>";
		} else {
 			if (mysqli_connect_errno()){
				die("Unsuccessful connection to database: " . mysqli_connect_error());
			}
		}
	?>
</body>
	<!--Javascript-->
	<script type="text/javascript">		
		//Prevents "Confirm Form Resubmission" pop-up, preventing the possibility of a double submission
		if (window.history.replaceState) {
  		window.history.replaceState(null, null, window.location.href);
		}
		
		//Image Preview in Form
  		var loadFile = function(event) {
    		var output = document.getElementById('materialsImage');
    		output.src = URL.createObjectURL(event.target.files[0]);
		}	
	</script>
</html>