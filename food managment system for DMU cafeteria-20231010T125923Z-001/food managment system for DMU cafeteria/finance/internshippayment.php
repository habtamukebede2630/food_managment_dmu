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
            margin-top:200px;
			margin-bottom:200px;
        }
    </style>
</head>
<center>
<div class="padder">
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

$result=mysqli_query($conn,"select * from birr WHERE fod='internship' and status='request'");


echo "<p><h3>finace requestt<h3></p>
	<table border=1 >
	<tr><th align=center width=130>Sender Id</th>
	<th align=center width=130>Name</th>
	<th align=center width=130> Amount</th>
	<th align=center width=130> Number of student</th>
	<th align=center width=130>Reason</th>
	<th align=senter width=130>Accept </th></tr>";
		while($row=mysqli_fetch_array($result))
		{
	echo "<tr>
	<td align=center>".$row['senderid']."</td>
	<td align=center>".$row['name'].$row['fname']."</td>
	<td align=center>".$row['amount']."</td>	<td align=center>".$row['student']."</td>
	<td align=center>".$row['fod']."</td>
	<td><a href=acceptfinanceinternship.php?userid=".$row['bid']."><img src='../images/approve.jpg' width=30px></a></td><tr>";
		}
		echo "</table>";
	
	
    
?>
</div>

</body>
</center>
</html>
<?php
include("../footer.php");
?>