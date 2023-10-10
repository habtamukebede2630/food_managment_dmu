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
    }
</style>
<div class="padder">
<body>
<?php
	$date=Date('Y/m/d');
	$dattee=Date('l',strtotime($date));
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
$result=mysqli_query($conn,"select * from punish");


echo "<p><h3><center>Punish Student list<h3></p>
	<table border=1  width=750>
	<th align=left width=90> Student Id</th>
	<th align=left width=180>Student Name</th>
	<th align=left width=50>Sex</th>
	<th align=left width=130>Departement</th>
	<th align=left width=50>Class Year</th>
	<th align=left width=50>Acadamic Year</th>
	<th align=left width=130>Reason</th>
	<th align=left width=50>Delete</th>
	</tr>";
		while($row=mysqli_fetch_array($result))
		{
	echo "<tr>
	<td align=left>".$row['studid']."</td>
	<td align=left>".$row['name']."</td>
	<td align=left>".$row['sex']."</td>
	<td align=left>".$row['dept']."</td>
	<td align=left>".$row['cyear']."</td>
	<td align=left>".$row['acyear']."</td>
	
	<td align=left>".$row['reason']."</td>
	<td><a href=updatepunishment.php?regid=".$row['rid']."><img src='../images/del.png' width=30px></a></td><tr>";
		}
		echo "</table>";
	
	
    
?>

</body>
</div>
</html>