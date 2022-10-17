<?php 
include 'inc/header.php';
include "config.php"; 
include "dbcon.php"; 
?>

<?php
	$db = new Database();
	$query ="SELECT * FROM product";
	$read = $db->select($query); 
?>

<?php
	if(isset($_GET['msg']))
		echo "<span style='color:green'>".$_GET['msg']."</span>";
?>



<h3><?php echo "Product List"; ?></h3>
<table class= "tblone">
	<tr>
		<th width="7%">Serial</th>
		<th width="15%">Name</th> 
		<th width="17%">Description</th>
		<th width="14%">Quantity</th>
		<th width="14%">Price</th>
		<th width="15%">Expire_Date</th>
		<th width="14%">Action</th>
	</tr>
	<?php if($read){?>
	<?php 
	$i=1;
	while($row = $read->fetch_assoc()){

	?>
	<tr>
	<td><?php echo $i++ ?></td>
	<td><?php echo $row["name"];?></td>
	<td><?php echo $row["description"];?></td>
	<td><?php echo $row["quantity"];?></td>
	<td><?php echo $row["price"];?></td>
	<td><?php echo $row["expire_date"];?></td>
	<td><a href="update.php?id=<?php echo $row['id']; ?>">Edit</a></td>
	</tr>
	<?php }?>
	<?php } else {?>
		<p>Data is not available !!</p>
	<?php }?>
	
</table>

<a href="create.php">Insert New</a>

<?php include 'inc/footer.php'; ?>