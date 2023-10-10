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
		margin-bottom:200px;
    }
</style>
<div class="padder">
    <center>
<body>
<?php
if(isset($_SESSION['user']['username'])&&isset($_SESSION['user']['password'])&&isset($_SESSION['user']['role']))
    {	$username=$_SESSION['user']['username'];
		$password=$_SESSION['user']['password'];
		$query1=mysqli_query($conn,"select * from user WHERE user_id='$username'");
		while($query2=mysqli_fetch_array($query1))
{ 
$id=$query2['user_id'];
}

}

$result=mysqli_query($conn,"select * from financerequest WHERE status='approve'");


echo "<p><h3>finace requestt<h3></p>
	<table border=1 >
	<tr><th align=center width=130>Sender Id</th>
	<th align=center width=130> Itemid</th>
	<th align=center width=130>import item</th>
	<th align=center width=130> Quantity</th>
	<th align=center width=130>Total Price</th>
	<th align=senter width=130>Accept </th></tr>";
		while($row=mysqli_fetch_array($result))
		{
	echo "<tr>
	<td align=center>".$row['senderid']."</td>
	<td align=center>".$row['itemid']."</td>
	<td align=center>".$row['importitem']."</td>
	<td align=center>".$row['quantity']."</td>
	<td align=center>".$row['totalprice']."</td>
	<td><a href=acceptfinancerequestfinance.php?userid=".$row['rid']."><img src='../images/approve.jpg' width=30px></a></td><tr>";
		}
		echo "</table>";
	
	
    
?>
    
</body>
    </center>
</div>
</html>
<?php
include("../footer.php");
?>