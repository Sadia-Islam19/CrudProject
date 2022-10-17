<?php 
include 'inc/header.php';
include "config.php"; 
include "dbcon.php"; 
?>

<?php
	$id = $_GET['id'];
	$db = new Database();
	$query ="SELECT * FROM product WHERE id=$id";
	$getData = $db->select($query)->fetch_assoc(); 



if(isset($_POST['submit']))
{
 $name  = mysqli_real_escape_string($db->con, $_POST['name']);
 $description = mysqli_real_escape_string($db->con, $_POST['des']);
 $quantity = mysqli_real_escape_string($db->con, $_POST['quantity']);
 $price = mysqli_real_escape_string($db->con, $_POST['price']);
 $expire_date = mysqli_real_escape_string($db->con, $_POST['exp_date']);
 if($name == '' || $description == '' || $quantity == '' || $price == '' || $expire_date == '')
 {
	$error = "Field must not be Empty !!";
 }
 else 
  {
  $query = "UPDATE product
  SET 
  name = '$name',
  description = '$description',
  quantity = '$quantity',
  price = '$price',
  expire_date = '$expire_date'
  WHERE id = $id";
  $update = $db->update($query);
 }
}
?>

<?php
	if(isset($_POST['delete']))
	{
		$query = "DELETE FROM product WHERE id=$id";
		$deleteData = $db->delete($query);
	}
?>


<?php
	if(isset($error))
		echo "<span style='color:red'>".$error."</span>";
?>



<form action ="update.php?id=<?php echo $id;?>" method ="post">
<table >
	<tr>
		<td>Name</td> 
		<td><input type="text" name="name" value="<?php echo $getData['name'] ?>"/></td> 
	</tr>
	<tr>
		<td>Description</td> 
		<td><input type="text" name="des" value="<?php echo $getData['description'] ?>"/></td> 
	</tr>
	<tr>
		<td>Quantity</td> 
		<td><input type="number" name="quantity" value="<?php echo $getData['quantity']?>"/></td> 
	</tr>
	<tr>
		<td>Price</td> 
		<td><input type="number" name="price" value="<?php echo $getData['price']?>"/></td> 
	</tr>
	<tr>
		<td>Expire_Date</td> 
		<td><input type="date" name="exp_date" value="<?php echo $getData['expire_date']?>"/></td> 
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" name="submit" value="Update"/>
			<input type="reset" value="Cancel"/>
			<input type="submit" name="delete" value="Delete"/>
		</td>
	</tr>
	

</table>
</form>

<a href="index.php">Go Back</a>

<?php include 'inc/footer.php'; ?>