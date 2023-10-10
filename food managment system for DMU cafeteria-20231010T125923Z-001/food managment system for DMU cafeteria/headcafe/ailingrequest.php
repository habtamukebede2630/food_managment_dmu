<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<style>
		.padder{
			margin-top:200px;
			margin-bottom:200px;
		}
	</style>
</head>
<div class="padder">
	<center>
<body>
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
$result=mysqli_query($conn,"select * from ailingstudent WHERE status='A'");


echo "<p><h4>Ailing Sudents list<h4></p>
	<table border=1 >
	
	<tr>
	<th align=center width=100>Sender ID</th>
	<th align=center width=100>Accadamic Year</th>
	<th align=center width=100> Name</th>
	<th align=center width=100>Age</th>
	<th align=center width=100>Sex</th>
	<th align=senter width=100>Student ID</th>
	<th align=center width=100> Departement</th>
		<th align=senter width=100>Recommendation</th>
		<th align=senter width=100>Accept</th>

	</tr>";
		while($row=mysqli_fetch_array($result))
		{
	echo "<tr>
	<td align=center>".$row['senderid']."</td>
	<td align=center>".$row['ayear']."</td>
	<td align=center>".$row['name']."</td>
	<td align=center>".$row['age']."</td>
	<td align=center>".$row['sex']."</td>
	<td align=center>".$row['studid']."</td>
	<td align=center>".$row['dept']."</td>
	<td align=center>".$row['recommendation']."</td>
	<td><a href=acceptailingstudent.php?userid=".$row['studid']."><img src='../images/logo.jpg' width=30px></a></td><tr>";
		}
		echo "</table>";
	
	
    
?>
</center>
</div>
</body>
</html>
<?php
include("../footer.php");
?>