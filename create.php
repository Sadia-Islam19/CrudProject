<?php 
include 'inc/header.php';
include "config.php"; 
include "dbcon.php"; 
?>

<?php
	$db = new Database();
	if(isset($_POST['submit']))
{
 $name  = mysqli_real_escape_string($db->con, $_POST['name']);
 $description  = mysqli_real_escape_string($db->con, $_POST['des']);
 $quantity = mysqli_real_escape_string($db->con, $_POST['quantity']);
 $price = mysqli_real_escape_string($db->con, $_POST['price']);
 $expire_date = mysqli_real_escape_string($db->con, $_POST['expire_date']);
 
 if($name == '' || $description == '' || $quantity == '' || $price == '' || $expire_date == '' )
 {
	$error = "Field must not be Empty !!";
 } 
 else 
 {
  $query = "INSERT INTO product(name,description,quantity,price,expire_date) 
  Values('$name','$description','$quantity','$price','$expire_date')";
  $create = $db->insert($query);
 }
}	
?>

<?php
	if(isset($error))
		echo "<span style='color:red'>".$error."</span>";
?>


<form action ="create.php" method ="post">
<table>
	<tr>
		<td>Name</td> 
		<td><input type="text" name="name" placeholder="Please enter name"/></td> 
	</tr>
	<tr>
		<td>Description</td> 
		<td><input type="text" name="des" placeholder="Please enter description"/></td> 
	</tr>
	<tr>
		<td>Quantity</td> 
		<td><input type="number" name="quantity" placeholder="Please enter number"/></td> 
	</tr>
	<tr>
		<td>Price</td> 
		<td><input type="number" name="price" placeholder="Please enter price"/></td> 
	</tr>
	<tr>
		<td>Expire_date</td> 
		<td><input type="date" name="expire_date" placeholder="Please enter date"/></td> 
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" name="submit" value="Submit"/>
			<input type="reset" value="Cancel"/>
		</td>
	</tr>
	
	
</table>
</form>


<a href="index.php">Go Back</a>

<?php include 'inc/footer.php'; ?>