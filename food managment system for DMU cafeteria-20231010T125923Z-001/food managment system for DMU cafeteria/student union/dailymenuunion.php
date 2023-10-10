<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");
?>
<?php
$date=Date('Y/m/d');
$dattee=Date('l',strtotime($date));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <center>
</head>
<style>
    .padder{
        margin-top:200px;
        margin-bottom:100px;

    }
</style>
<div class="padder">
<?php
$fetchday=mysqli_query($conn,"select *from foodscale where day='$dattee'");
if($fetchday){
$row=mysqli_fetch_array($fetchday);
$dater=$row['day'];
}
?>

<body>
<h2>Food itemes Availiable at stores on <?php echo$dater;?></h2>
<table border="1" width="500px" bgcolor="#cdd7dc">
<th>Number</th><th>Itemname</th><th>Daily expenditure</th>

    		
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
	$date=Date('Y/m/d');
	$dattee=Date('l',strtotime($date));
$result=mysqli_query($conn,"select * from foodscale WHERE day='$dattee'");


		while($row=mysqli_fetch_array($result))
		{
	echo "<tr>
	<td align=left>".$row['no']."</td>
	<td align=left>".$row['itemname']."</td>
	<td align=left>".$row['dailyexpenditure']."</td>
	<tr>";
		}
		echo "</table>";

	
    
?>
</table>
    
</body>
</div>
</center>
</html>
<?php
include("../footer.php");
?>