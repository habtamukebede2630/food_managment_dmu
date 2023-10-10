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
</head>
<style>
    .tablestyle{
        margin-top:200px;
        margin-bottom:200px;
    }
</style>
<body>
    <div class="tablestyle">

  
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
$result=mysqli_query($conn,"select * from birr WHERE fod='For non-cafe'and status='request'");


echo "<center><p><h3>View payment request<h3></p>
	<table border=1 >
	<tr><th align=center width=130>Date</th>
	<th align=center width=130> Sender ID</th>
	<th align=center width=130>fname</th>
		<th align=center width=130>lname </th>
        <th align=center width=130> Student</th>
	<th align=senter width=130>Approve</th></tr>";
		while($row=mysqli_fetch_array($result))
		{
	echo "<tr>
	<td align=center>".$row['date']."</td>
	<td align=center>".$row['senderid']."</td>
	<td align=center>".$row['name']."</td>
	<td align=center>".$row['fname']."</td>
    <td align=center>".$row['student']."</td>
	<td><a href=approvenoncafefinance.php?userid=".$row['bid']."><img src='../images/Approve.jpg'  height=30px width=30px></a></td><tr>";
		}
		echo "</table></center>";
	
	
    
?>
  </div>
</body>
</html>
<?php
include("../footer.php");
?>