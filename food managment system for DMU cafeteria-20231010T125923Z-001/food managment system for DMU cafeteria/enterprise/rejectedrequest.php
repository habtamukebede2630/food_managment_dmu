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
    <center>
    <style>
        .padder{
            margin-top:100px;
			margin-bottom:100px;
        }
    </style>
</head>
<div class="padder">
    <body>


    <table border="0" width="" height="400"><tr><td width="100" height="50">
	
	</td>
	<td width="" height="50"><div id="Center">
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

$result=mysqli_query($conn,"select * from financerequest WHERE status='reject' and senderid='enterprise'");
echo "<p><h3>Request which has been rejected<h3></p>
	<table border=1 width=520>
	<th align=center width=50> Import item</th>
	<th align=center width=50>Totalprice</th>
	<th align=senter width=150>Information</th></tr>";
		while($row=mysqli_fetch_array($result))
		{
	echo "<tr>
	<td align=center>".$row['importitem']."</td>
	<td align=center>".$row['totalprice']."</td>
	<td>your request has been reject </td><tr>";
		}
		echo "</table>";
	
	
    
?>

    
</body>
</div>
</center>
</html>
<?php
include("../footer.php");
?>