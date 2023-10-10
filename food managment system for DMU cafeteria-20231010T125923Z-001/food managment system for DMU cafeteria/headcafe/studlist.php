
<?php
   include("../connection.php");
   session_start();
   if(empty($_SESSION['user'])){
	   header('location:../index.php');
	  }
   
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
		margin-top:180px;
		margin-bottom:100px;
	}
</style>
<body>
	<div class="padder">
<center>
<table border="1" width="250" height="auto">
	<tr>
	<td width="800" height="50" >
	<div id="Center">
	
	


   <?php
   if(isset($_SESSION['username'])&&isset($_SESSION['password'])&&isset($_SESSION['role']))
   {
	   $username=$_SESSION['username'];
	   $password=$_SESSION['password'];
	   $role=$_SESSION['role'];
	   
	   $query1=mysqli_query($conn,"select * from user WHERE user_id='$username'");
	   while($query2=mysqli_fetch_array($query1))
{
	$id=$query2['user_id'];
}
}
$result=mysqli_query($conn,"select * from student ");
echo "<p><h3><center>availiable Student list</center><h3></p>
     
	<table border=1 width=700 margin-top:100px >
	<tr>
	<th align=left width=40>Student id</th>
	<th align=left width=50> Name</th>
	<th align=left width=50>Sex</th>
	<th align=left width=90>Departement</th>
	<th align=left width=60>Class year</th>
	
	</tr>";
		while($row=mysqli_fetch_array($result))
		{
	echo "<tr>
	<td align=left>".$row['id']."</td>
	<td align=left>".$row['name']."</td>
	<td align=left>".$row['sex']."</td>
	<td align=left>".$row['dept']."</td>
	<td align=left>".$row['year']."</td>
	<tr>";
		}
		echo "</table>";
		
		
   ?>
   </center>
   </body>
   </div>
   <?php   include("../footer.php")?>
</html>
