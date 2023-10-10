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
    <title>purchse material lack</title>
	<style>
		.padder{
			margin-top:200px;

		}
	</style>
</head><center>

<body>
	<div class="padder">
<?php

if(isset($_SESSION['user']['username'])&&isset($_SESSION['user']['password'])&&isset($_SESSION['user']['role']))
	{
		$username=$_SESSION['user']['username'];
		$password=$_SESSION['user']['password'];
		$role=$_SESSION['user']['role'];
		
		$query1=mysqli_query($conn,"select * from user WHERE user_id='$username'");
		while($query2=mysqli_fetch_array($query1))
{ 
$id=$query2['user_id'];
}

}
$result=mysqli_query($conn,"select * from materiallack WHERE status='approve'");


echo "<p><h3>Requested materials list<h3></p>
	<table border=1 >
	<tr><th align=center width=130>Sender Id</th>
	<th align=center width=130> Quantity</th>
	<th align=center width=130>Kind</th>
	<th align=center width=130>Moodel</th>
	<th align=center width=130>Item Name</th>
	<th align=senter width=130>Accept</th></tr>";
		while($row=mysqli_fetch_array($result))
		{
	echo "<tr>
	<td align=center>".$row['senderid']."</td>
	<td align=center>".$row['quantity']."</td>
	<td align=center>".$row['kind']."</td>
	<td align=center>".$row['model']."</td>
	<td align=center>".$row['itemname']."</td>
	<td><a href=acceptmateriallackpurchase.php?userid=".$row['rid']."><img src='../images/logo.jpg' width=30px></a></td><tr>";
		}
		echo "</table>";
	
	
    
?>
</div>
</body>
</center>
</html>