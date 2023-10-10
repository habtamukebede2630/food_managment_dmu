<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<div class="padder">
<body>
<style>
		.padder{
			margin-top:150px;
			margin-bottom:200px;
		}
	</style>
<center>
	


</center>
</table><br>
<center>
<h2>Food itemes Availiable at stores on <?php$dateee?></h2>
<table border="1" width="500px" bgcolor="#cdd7dc">
<th>Item Name</th><th>Quantity</th>
<?php 
	$product1=0;
$as=0;
$sql=mysqli_query($conn,"select * from incomingfood");
while($row=mysqli_fetch_array($sql))
{
	$quantity=$row['quantity'];
	$item=$row['itemname'];
	$price=$row['sprice'];
	$scale=$row['scale'];
	
	
	
echo "<tr><td>".$item."</td><td>".$quantity.'&nbsp;&nbsp;&nbsp;'.$scale."</td></tr>";
	
}	
	?></table>
	</div>
</body>
</center>
</html>
<?php include("../footer.php");