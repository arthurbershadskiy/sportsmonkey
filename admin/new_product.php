<?php include 'header.php'; ?>
      <div class="top-bar">
        <h1>Store</h1>
        <div class="breadcrumbs"><a href="index.php">Homepage</a> / <a href="store.php">Store</a> / <a href="new_product.php">New Product</a>
        </div>
      </div>
      <br />
      <div class="select-bar">
        
      </div>
      
      <div style="background-color:#EEEEEE;height:200px;width:600px;float:left;text-align:center;">
			<h3><center>Insert Item into Inventory</center></h3>
			<form action="process_product.php" method="post">
		
				<b>SKU</b><input type="text" name="sku" size="15"><br />
				
				<b>Category</b><input type="text" name="category" size="15">
				
				<b>Team</b><input type="text" name="team" size="15"><br />
				
				<br>
				
				<b>Size </b>
                <select name="size">
					<option label="Choose Size">Choose Size</option>
					<option value="Small">Small</option>
					<option value="Medium">Medium</option>
					<option value="Large">Large</option>
					<option value="X-Large">X-Large</option>
					<option value="XX-Large">XX-Large</option>
				</select>
				
				<tab><tab>
				<b>Quantity </b><input type="INT" name="qty" size="2"><br />
				<br />						
				<input type="reset">
				<input type="submit" name="submit" value="Insert Item"/><br />			
			</form>
		</div>
    </div>
    
<?php include 'footer.php'; ?>