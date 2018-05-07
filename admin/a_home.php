<?php include "../header/header.php" ?>
<html>
<head>
	<title>Sopping Cart</title>
		<link rel="stylesheet" type="text/css" href="../admin/admin.css">
</head>
<body >
<center>
	<table>
		<tr>
			<td colspan="3">
				<table>
					<tr>
						<td>
							<fieldset>
								<legend><STRONG>Search Customers, admin , stuff</STRONG></legend>
									<select name="type" id="type" onchange="getData()">
										<option value="">Select Type</option>
										<option value="admin">Admin</option>
										<option value="stuff">Stuff</option>
										<option value="customer">Customer</option>
									</select>
							</fieldset>
						</td>
					</tr>
					<tr>
						<td>
							<div id='res'>
							</div>
						</td>
					</tr>
				</table>
				
			</td>
		</tr>
		<tr>
			<td>
				<fieldset>
					<legend><b>PRODUCTS</b></legend>
					<form action="crud_products.php" method="POST" class="formstyle">
						<table>
							<tr>
								<td><h3>To add Products:</h3></td><td><input type="submit" name="add_product" value="ADD"/></td>
							</tr>
							<tr>
								<td><h3>To remove Products:</h3></td><td><input type="submit" name="remove_product" value="REMOVE"/></td>
							</tr>
							<tr>
								<td><h3>To update Products:</h3></td><td><input type="submit" name="update_product" value="UPADTE"/></td>
							</tr>
							<tr>
								<td><h3>All Products:</h3></td><td><input type="submit" name="all_product" value="PRODUCTS"/></br></td>
							</tr>
						</table>
					</form>
				</fieldset>
			</td>
			<td>
				<fieldset>
					<legend><b>STUFF</b></legend>
					<form action="crud_stuff.php" method="POST" class="formstyle">
						<table>
							<tr>
								<td><h3>To add stuff:</h3></td><td><input type="submit" name="add_stuff" value="ADD"/></td>
							</tr>
							<tr>
								<td><h3>To remove stuff:</h3></td><td><input type="submit" name="remove_stuff" value="REMOVE"/></td>
							</tr>
							<tr>
								<td><h3>To update stuff:</h3></td><td><input type="submit" name="update_stuff" value="UPADTE"/></td>
							</tr>
							<tr>
								<td><h3>All stuff:</h3></td><td><input type="submit" name="all_stuff" value="STUFF"/></br></td>
							</tr>
						</table>
					</form>
				</fieldset>
			</td>
			<td>
				<fieldset>
					<legend><b>OFFERS & ADS</b></legend>
					<a href="../slider">Slider</a>
				</fieldset>
			</td>
		</tr>
		<tr>
			<td>
				<fieldset>
					<legend><b>ORDERS</b></legend>
					<form action="crud_orders.php" method="POST" class="formstyle">
						<table>
							<tr>
								<td><h3>To add orders:</h3></td><td><input type="submit" name="add_orders" value="ADD"/></td>
							</tr>
							<tr>
								<td><h3>To remove orders:</h3></td><td><input type="submit" name="remove_orders" value="REMOVE"/></td>
							</tr>
							<tr>
								<td><h3>To update orders:</h3></td><td><input type="submit" name="update_orders" value="UPADTE"/></td>
							</tr>
							<tr>
								<td><h3>All orders:</h3></td><td><input type="submit" name="all_orders" value="ORDERS"/></br></td>
							</tr>
						</table>
					</form>
				</fieldset>
			</td>
			<td>
				<fieldset>
					<legend><b>SUPPLIERS</b></legend>
					<form action="crud_suppliers.php" method="POST" class="formstyle">
						<table>
							<tr>
								<td><h3>To add suppliers:</h3></td><td><input type="submit" name="add_suppliers" value="ADD"/></td>
							</tr>
							<tr>
								<td><h3>To remove suppliers:</h3></td><td><input type="submit" name="remove_suppliers" value="REMOVE"/></td>
							</tr>
							<tr>
								<td><h3>To update suppliers:</h3></td><td><input type="submit" name="update_suppliers" value="UPADTE"/></td>
							</tr>
							<tr>
								<td><h3>All suppliers:</h3></td><td><input type="submit" name="all_orders" value="SUPPLIERS"/></br></td>
							</tr>
						</table>
					</form>
				</fieldset>
			</td>
			<td>
				<fieldset>
					<legend><b>CUSTOMER SERVICE</b></legend>
					<form action="cservice.php" method="POST" class="formstyle">
						<table>
							<tr>
								<td><h3>Customer's Complaints:</h3></td><td><input type="submit" name="complaints" value="VIEW"/></td>
							</tr>
							<tr>
								<td><h3>Customer's Suggestions:</h3></td><td><input type="submit" name="suggestions" value="VIEW"/></td>
							</tr>
							<tr>
								<td><h3>FAQs:</h3></td><td><input type="submit" name="faqs" value="VIEW"/></td>
							</tr>
							<tr>
								<td><h3>BROADCAST:</h3></td><td><input type="submit" name="broadcast" value="VIEW"/></td>
							</tr>
							
						</table>
					</form>
				</fieldset>
			</td>
		</tr>
	</table>
</center>
<script>
	function getData(){
		var type = document.getElementById('type').value;
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "../db/db.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("type="+type);
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			     document.getElementById("res").innerHTML = this.responseText;
			    }
			};
		}
</script>
</body>
</html>
<?php include "../footer/footer.php" ?>