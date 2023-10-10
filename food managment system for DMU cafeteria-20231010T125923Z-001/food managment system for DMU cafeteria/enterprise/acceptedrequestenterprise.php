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
            margin-top:250px;
			margin-bottom:250px;
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

$result=mysqli_query($conn,"select * from financerequest WHERE status='accept' and senderid='enterprise'");
echo "<p><h3>Request which has been Accepted<h3></p>
	<table border=1 width=520>
	<th align=center width=50> Import item</th>
	<th align=center width=50>Totalprice</th>
	<th align=senter width=150>Information</th></tr>";
		while($row=mysqli_fetch_array($result))
		{
	echo "<tr>
	<td align=center>".$row['importitem']."</td>
	<td align=center>".$row['totalprice']."</td>
	<td>your request has been accepted </td><tr>";
		}
		echo "</table>";
	
	
    
?>
  </div>
  </td>
  <td width="100" height="50">
  <div id="sideright">

</body>
</center>
</div>
</html>
<?php
include("../footer.php")
?>