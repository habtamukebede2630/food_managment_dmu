<?php
error_reporting(0);
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");

?>
<html>
<head>
<title>Request to finance </title>
<link rel="Stylesheet" type="text/css" href="../css/stylesheet.css">

</head>
<center>
<style>
.padder{
	margin-top:200px;
	margin-bottom:200px;

}
</style>
<div class="padder">
<body>


	
	<?php
include("../connection.php");
if(isset($_SESSION['user']['username'])&&isset($_SESSION['user']['password'])&&isset($_SESSION['user']['role']))
	{
		$username=$_SESSION['user']['username'];
		$password=$_SESSION['user']['password'];
		$role=$_SESSION['user']['role'];
		
		$query1=mysqli_query($conn,"select * from user WHERE user_id='$username'");
		while($query2=mysqli_fetch_array($query1))
{ 
$id=$query2['user_id'];
$fname=$query2['fname'];
$sname=$query2['sname'];
$img=$query2['photo'];
$role=$query2['role'];
}

}
	
		$date=Date('Y/m/d');
	$dattee=Date('l',strtotime($date));
?>
<form action="" method="post">
<table border="1" width="650px">
	<tr>
		<th>Item name</th>
		<th>Quantity </th>	
		<th>Total Price</th>
	</tr>
	<?php
	$querys=mysqli_query($conn,"select *from financerequest");
	  while($rows=mysqli_fetch_array($querys)){
	$importitem=$rows['importitem'];
   
	}

	?>

<?php
$req=mysqli_query($conn,"select * from incomingfood where supplayer='$role'") or die(mysql_error()) ;
while($fech=mysqli_fetch_array($req))
{
	$item=$fech['itemname'];
	$quanq=$fech['quantity'];
	$toprice=$fech['tprice'];
	$scale=$fech['scale'];
	echo "<tr><td>".$item."</td><td>".$quanq."&nbsp;&nbsp;&nbsp;&nbsp;".$scale."</td><td>".$toprice."&nbsp;&nbsp;&nbsp;"." Birr</td></tr>";
	
		
}


	
if(isset($_POST['submit']))
	{
		if($item===$importitem){
			echo '<script type="text/javascript">
		alert(" already requested")</script>';
	
		}
		elseif($item!==$importitem)
		{
	$req=mysqli_query($conn,"select * from incomingfood where supplayer='$role'") or die(mysql_error()) ;
	while($fech=mysqli_fetch_array($req))
	{
	$item=$fech['itemname'];
	$quanq=$fech['quantity'];
	$toprice=$fech['tprice'];
	$iddd=$fech['id'];
	

	$sql=mysqli_query($conn,"insert into financerequest(senderid,importitem,itemid,quantity,totalprice,status)values('$id','$item','$iddd','$quanq','$toprice','A')")or die(mysqli_error()); 
	
	
	
	echo '<script type="text/javascript">
	alert(" succesfully requested")</script>';
}
}

else{
	echo '<script type="text/javascript">
	alert(" no")</script>';
}

	}
?>
<tr><td><input type="submit"  name="submit" value="Request" ><input type="reset" value="Reset"></td></tr>

</table>

</form>



</body>
</center>
</div>
</html>
<?php
include("../footer.php");
?>


