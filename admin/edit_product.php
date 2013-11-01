<?php include 'header.php'; ?>
      <div class="top-bar">
        <h1>Store</h1>
        <div class="breadcrumbs"><a href="index.php">Homepage</a> / <a href="store.php">Store</a> / Update Product
        </div>
      </div>
      <br />
      <div class="select-bar">
        
      </div>
	  
      <?php if(($_GET['action'] == 'edit') && isset($_GET['itemID'])) 
	  {
		
		$editProduct = $_GET['itemID'];
	  
		$conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
	    $db_found = mysql_select_db(MYSQL_DB);
	  
		if ($db_found)  
		{		
			$query = "SELECT * FROM store WHERE itemID= '". $editProduct ."'";
			$result = mysql_query($query) or die('Query failed: '.mysql_error());
			$db_fields = mysql_fetch_assoc($result);
			
			print "<div style='background-color:#EEEEEE;height:200px;width:600px;float:left;text-align:center;'>";
			print "<h3><center>Update Inventory</center></h3><br />";
			print "<form action='update_product.php' method='post'>";
			print "<input type='hidden' name='itemID' value='".$db_fields['itemID']."'><br />";
			print "<b>SKU</b><br /><input type='text' name='sku' size='15' value={$db_fields['sku']}><br />";
			print "<b>Category</b><input type='text' name='category' size='15' value={$db_fields['category']}>";
			print "<b>Team</b><input type='text' name='team' size='15' value={$db_fields['team']}><br /><br />";
			
			print "<b>Size </b><select name='size'>";
			?>
				<option value='Small' <?php echo ($db_fields['size']=='Small')?'selected':'' ?>>Small</option>
				<option value='Medium' <?php echo ($db_fields['size']=='Medium')?'selected':'' ?>>Medium</option>
				<option value='Large' <?php echo ($db_fields['size']=='Large')?'selected':'' ?>>Large</option>
				<option value='X-Large' <?php echo ($db_fields['size']=='X-Large')?'selected':'' ?>>X-Large</option>
				<option value='XX-Large' <?php echo ($db_fields['size']=='XX-Large')?'selected':'' ?>>XX-Large</option>
            <?php
			print "</select>";
			
			print "<tab><tab>";
			print "<b>Quantity </b><input type='INT' name='qty' size='3' value={$db_fields['qty']}><br /><br />";
			
			print "<input type ='reset'>";
			print "<input type='submit' name='submit' value='Update Inventory'/><br />";
			
			print "</form>";
			print "</div>";
			
		}
		
    
	mysql_close($conn);
	  } ?>
    </div>
    
    
<?php include 'footer.php'; ?>