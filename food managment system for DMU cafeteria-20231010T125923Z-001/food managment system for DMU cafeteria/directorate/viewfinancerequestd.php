<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");

?>
<?php
$queryinc=mysqli_query($conn,"select *from incomingfood ");
if($queryinc){
$rows=mysqli_fetch_array($queryinc);
$scale=$rows['scale'];
}
?>
<html>
<head>
<title> view Finance request </title>
<center>
<div class="padder">
<body>
    <style>
        .padder{
            margin-top:200px;
        }
    </style>

		
	<?php

if(isset($_SESSION['username'])&&isset($_SESSION['password'])&&isset($_SESSION['role']))
	{
		$username=$_SESSION['username'];
		$password=$_SESSION['password'];
		$role=$_SESSION['role'];
		
		$query1=mysqli_query($conn,"select * from user WHERE userid='$username'");
		while($query2=mysqli_fetch_array($query1))
{ 
$id=$query2['userid'];
}

}
$result=mysqli_query($conn,"select * from financerequest WHERE status='A'");


echo "<p><h3>finace request<h3></p>
	<table border=1>
	<tr><th align=left width=130>Sender Id</th>
	
	<th align=left width=130>import item</th>
	<th align=left width=130> Quantity</th>
	<th align=left width=130>Total Price</th>
	<th align=senter width=30>Approve</th></tr>";
		while($row=mysqli_fetch_array($result))
		{
	echo "<tr>
	<td align=left>".$row['senderid']."</td>
	<td align=left>".$row['importitem']."</td>
	<td align=left>".$row['quantity']."</td>
	<td align=left>".$row['totalprice']."</td>
	<td><a href=approvefinancerequest.php?userid=".$row['rid']."><img src='../images/Approve.jpg' width=30px></a></td><tr>";
		}
		echo "</table>";
	
	
    
?>
  
</body>
    </center>
</div>
</html>
