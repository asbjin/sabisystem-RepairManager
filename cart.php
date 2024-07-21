<?php
	if(isset($_POST['submit'])){
		
		foreach($_POST['quantity'] as $key => $val) {
			if($val==0) {
				unset($_SESSION['cart'][$key]);
				}else{
				$_SESSION['cart'][$key]['quantity']=$val;
			}
		}
		
	}
	
	if(isset($_POST['order'])) {
		//require_once('repairs.php');
	}
?>
<h1>View cart</h1>
<a href="chooseProducts.php?page=products">Go back to products page</a>
<form method="post" action="chooseProducts.php?page=cart">
	
    <table>
		
        <tr>
            <th>Stock#</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Items Price</th>
		</tr>
		
        <?php
			include 'dbconnect.php';
            $sql="SELECT * FROM stock WHERE stock_id IN (";
			
			foreach($_SESSION['cart'] as $id => $value) {	
				$sql .= $id .",";
			}
			
			//$sql[37] = ' ';  
			$sql=substr($sql, 0, -1) .") ORDER BY stock_id ASC";
			//$query=mysql_query($sql);
			
			$res = mysqli_query($conn, $sql);
			if (!$res) {
				printf("Nothing in the basket: %s\n", "Go back");
				exit();
			}
			
			$totalprice=0;
			while($row = mysqli_fetch_array($res)){
				$subtotal = $_SESSION['cart'][$row['stock_id']]['quantity']*$row['price'];
				$totalprice += $subtotal;
			?>
			<tr>
				<td><?php echo $row['description'] ?></td>
				<td><input type="text" name="quantity[<?php echo $row['stock_id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['stock_id']]['quantity'] ?>" /></td>
				<td><?php echo  '&euro;' .$row['price'] ?></td>
				<td><?php echo '&euro;' .$_SESSION['cart'][$row['stock_id']]['quantity']*$row['price'] ?></td>
			</tr>
			<?php
				
			}
		?>
		<tr>
			<td colspan="4">Total Price: <?php echo '&euro;'. $totalprice ?></td>
		</tr>
		
	</table>
    <br />
    <button type="submit" name="submit">Update Cart</button>
</form>
<br />
<p>To remove an item, set it's quantity to 0. </p>