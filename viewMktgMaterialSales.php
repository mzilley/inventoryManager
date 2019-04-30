<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Transactions | UNI CBB</title>
<link rel="shortcut icon" type="image/png" href="InventoryManagerImages/Icons/0.png">
<link href="inventoryManagerStyles.css" rel="stylesheet">
</head>
<body>
<?php
		//Connect to DB
		include('../connect.php');
	
		$query = "SELECT materialsImage, description, category, unitCost, quantityTook, personWhoTook, personReceiving, type, date FROM Marketing_Material, Marketing_Material_Sales WHERE Marketing_Material.ID = Marketing_Material_Sales.ID ORDER BY date";
		$result = mysqli_query($con, $query);
	
		echo "<h1>Transaction History | Printed Materials</h1>";
	
		//Main Menu
		echo "<a href='viewApparelSales.php'><button class='button'>Apparel</button></a>";
		echo "<a href='viewItemSales.php'><button class='button'>Items</button></a>";			echo "<a href='viewMktgMaterialSales.php'><button class='button'>Printed Material</button></a>";
		?>
		<button onClick ="$('#tblexportData').tableExport({type:'excel', separator:',', ignoreColumn: [0,13], escape:'false'});" title='Download an Excel report from the filtered or unfiltered data' class='button'>Download</button>
		<?php
		echo "<a href='../inventoryIndex.php'><button class='button'>Back</button></a>";
		
		echo "<br>";
		echo "<br>";
	
		//Display Data
		echo "<table class='applyFont' id='tblexportData' cellspacing='0' cellpadding='0'>";
			echo "<tr>";
				echo "<th></th>";
				echo "<th>DESCR.</th>";
				echo "<th>CATEGORY</th>";
				echo "<th>COST</th>";
				echo "<th>QUANTITY</th>";
				echo "<th>REQUESTOR</th>";
				echo "<th>PURPOSE</th>";
				echo "<th>TYPE</th>";
				echo "<th>DATE</th>";
			echo "</tr>";
	
		while($row=mysqli_fetch_array($result)) {
			echo "<tr>";
				echo "<td align='center' width='9%'><img src='/InventoryManager/InventoryManagerImages/MktgMaterials/{$row['materialsImage']}' width='115' height='125' style='display:block'></td>";
				echo "<td align='center' width='10%'>{$row['description']}</td>";
				echo "<td align='center' width='15%'>{$row['category']}</td>";
				echo "<td align='center' width='15%'>{$row['unitCost']}</td>";
				echo "<td align='center' width='8%'>{$row['quantityTook']}</td>";
				echo "<td align='center' width='10%'>{$row['personWhoTook']}</td>";
				echo "<td align='center' width='15%'>{$row['personReceiving']}</td>";
				echo "<td align='center' width='8%'>{$row['type']}</td>";
				echo "<td align='center' width='15%'>{$row['date']}</td>";
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
	<!--jQuery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!--Table Filter Plug-In-->
	<script src="ddtf.js"></script>
	<script>
		//Table Filtering
		jQuery('.applyFont').ddTableFilter();
	</script>
	<!--Javascript-->
	<script type="text/javascript">
		//Excel Export Function
		function exportToExcel(tblexportData, filename = 'ApparelInventoryReport'){
    		var downloadurl;
			var dataFileType = 'application/vnd.ms-excel';
			var tableSelect = document.getElementById(tblexportData);
    		var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');
    
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
</html>
	