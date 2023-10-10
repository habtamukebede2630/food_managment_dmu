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
    <style>
        .padder{
            margin-top:100px;
        }
    </style>
</head>
<div class="padder">
    <center>
<body>
<?php 
	$dat=date("Y/m/d");
	$tim=date("H:h:i:sa"); 
	?>

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
$fname=$query2['fname'];
$sname=$query2['sname'];
$img=$query2['photo'];
}

}
	?>
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

$result=mysqli_query($conn,"select * from materiallack WHERE status='accept' and senderid='foodstore'");
?>
<div class=form-style-10>
<?php
echo "<p><h3>Request which has been Accepted<h3></p>

	<table border=1>
	<th bgcolor=#9fe8f4 width=80> Item name</th>
	<th bgcolor=#9fe8f4 width=80> Quantity</th>
	<th bgcolor=#9fe8f4 width=90>Kind</th>
	<th bgcolor=#9fe8f4 width=80>Moodel</th>
	<th bgcolor=#9fe8f4 width=230>Information</th></tr>";
		while($row=mysqli_fetch_array($result))
		{
	echo "<tr>
	<td align=left>".$row['itemname']."</td>
	<td align=left>".$row['quantity']."</td>
	<td align=left>".$row['kind']."</td>
	<td align=left>".$row['model']."</td>
	<td>your request has been accepted </td><tr>";
		}
		echo "</table>";
	?>
</div>	
</body>
</center>
</html>