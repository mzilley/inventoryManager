<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Inactive Items | UNI CBB</title>
<link rel="shortcut icon" type="image/png" href="InventoryManagerImages/Icons/0.png">
<link href="inventoryManagerStyles.css" rel="stylesheet">
</head>
<?php
		//Connect to DB
		include('../connect.php');
		
    	$query = "SELECT * FROM `Items` WHERE `isActive` = 'Inactive'";
		$result = mysqli_query($con, $query);

			echo "<h1>Current Inventory | Inactive Items</h1>";
		//Main Menu
			?>
			<button onClick ="$('#tblexportData').tableExport({type:'excel', separator:',', ignoreColumn: [0,4], escape:'false'});" title='Download an Excel report from the filtered or unfiltered data' class='button'>Download</button>
			<?php
			echo "<a href='viewItems.php'><button class='button'>Back</button></a>";

			echo "<br>";
			echo "<br>";
	
		echo "<table class='applyFont' id='tblexportData'>";
			echo "<tr>";
				echo "<th>DESCRIPTION</th>";
				echo "<th>COST</th>";
				echo "<th>QTY. </th>";
				echo "<th>STATUS</th>";
				echo "<th>IMAGE</th>";
			echo "</tr>";
		while($row=mysqli_fetch_array($result)) {
			echo "<tr>";
				echo "<td align='center' width='160px'>{$row['description']}</td>";
				echo "<td align='center' width='80px'>$ {$row['unitCost']}</td>";
				echo "<td align='center' width='65px'>{$row['itemQuantity']}</td>";
				echo "<td align='center' width='80px'>{$row['isActive']}<br><a href='editItemStatus.php?ID={$row['ID']}'><img src='/InventoryManager/InventoryManagerImages/Icons/pencil-edit-button.png' title='Edit the status of the selected row'><br><a href='deleteApparel.php?delete={$row['ID']}'><img src='/InventoryManager/InventoryManagerImages/Icons/cross.png' title='Delete the selected row from inventory'></td>";				
				echo "<td align='center' width='110px'><img src='/InventoryManager/InventoryManagerImages/Items/{$row['itemImage']}' width='125' height='125' style='display:block'></td>";;
			echo "</tr>";
		}
		echo "</table>";
		echo "</form>";
		
		echo "<br>";
		echo "<a href='viewItems.php'><button class='button'>Back</button></a>";
	
		//Error Handling
		if($result) {
			echo "";
		} else {
 			if (mysqli_connect_errno()){
				die("Unsuccessful connection to database: " . mysqli_connect_error());
			}
		}
?>
	<!--Javascript-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!--Excel Export Plug-In-->
	<script src="tableExport.js"></script>
	<script src="jquery.base64.js"></script>
	<script>
		//Button Tooltips
		$(function() {
			$(document).tooltip();
			
		});
		
		//Table Filtering
		jQuery('.applyFont').ddTableFilter();
	</script>
	<script type="text/javascript">	
		//Prevents "Confirm Form Resubmission" pop-up, preventing the possibility of a double submission
		if (window.history.replaceState) {
  			window.history.replaceState(null, null, window.location.href);
		}
		
		//Excel Export Function
		function exportToExcel(tblexportData, filename = 'ApparelInventoryReport'){
    		var downloadurl;
			var dataFileType = 'application/vnd.ms-excel';
			var tableSelect = document.getElementById(tblexportData);
    		var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');
    
    	// Specify file name
    	filename = filename?filename+'.xls':'export_excel_data.xls';
    
    	downloadurl = document.createElement("a");
    
    	document.body.appendChild(downloadurl);
    
    	if(navigator.msSaveOrOpenBlob){
			var blob = new Blob(['\ufeff', tableHTMLData], {
            	type: dataFileType
        	});
        navigator.msSaveOrOpenBlob( blob, filename);
		}else{
			downloadurl.href = 'data:' + dataFileType + ', ' + tableHTMLData;
    
        	//Set the file name
        	downloadurl.download = filename;
        
        	downloadurl.click();
    		}
		}
	</script>
<body>
</body>
</html>