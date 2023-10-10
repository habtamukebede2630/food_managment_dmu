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
<style>
    .padder{
        margin-top:200px;
        margin-bottom:100px;
    }
</style>
<body>
    <center>
    <div class="padder">
<h2>Food itemes Availiable at stores on <?php$dateee?></h2>
<table border="1" width="700px" bgcolor="#cdd7dc">
<th>Item Name</th><th>Quantity</th>

    <?php

    if(isset($_SESSION['user']['username'])&& isset($_SESSION['user']['password'])&& isset($_SESSION['user']['role'])){
      

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
    }
	?>
</table>
</center>
</body>
<?php 

?>
</div>
</html>
<?php
include("../footer.php");
?>