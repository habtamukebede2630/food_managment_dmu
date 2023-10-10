<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");

?>
<?php
$queryselector=mysqli_query($conn,"select *from incomingfood");
if($queryselector){
	$row=mysqli_fetch_array($queryselector);
	$stat=$row['status'];
}

?>



<html>
<head>
<title>Request to finance </title>
<link rel="Stylesheet" type="text/css" href="setting.css">
<style>
    .padder{
        margin-top:300px;
		margin-bottom:200px;
    }
</style>
</head>
<center>
    <div class="padder">

    
<body>



	<?php
//include("connection.php");
if(isset($_SESSION['user']['username'])&&isset($_SESSION['user']['password'])&&isset($_SESSION['user']['role']))
	{
		$username=$_SESSION['user']['username'];
		$password=$_SESSION['user']['password'];
		$role=$_SESSION['user']['role'];
		
		$query1=mysqli_query($conn,"select * from user WHERE user_id='$username'");
		while($query2=mysqli_fetch_array($query1))
{ 
	$role=$query2['role'];
$id=$query2['user_id'];
$fname=$query2['fname'];
$sname=$query2['sname'];
$img=$query2['photo'];
}

}
	
		$date=Date('Y/m/d');
	$dattee=Date('l',strtotime($date));
?>
<form action="" method="post">
<table border="1" width="450px">
	<tr>
		<th>Item name</th>
		<th>Quantity </th>	
		<th>Total Price</th>
		<th>ID</th>
	</tr>
	

<?php
$req=mysqli_query($conn,"select * from incomingfood where supplayer='$role' and status='notpay' ") or die(mysqli_error()) ;
while($fech=mysqli_fetch_array($req))
{
	$item=$fech['itemname'];
	$quanq=$fech['quantity'];
	$toprice=$fech['tprice'];
	$identification=$fech['id'];

	echo "<tr><td>".$item."</td><td>".$quanq."</td><td>".$toprice." </td><td>".$identification."</td></tr>";
	
		
}


	
if(isset($_POST['submit']))
	{
		$finance=mysqli_query($conn,"select *from financerequest ");
		$count=mysqli_num_rows($finance);
		if($count>0){
			echo '<script type="text/javascript">
		alert(" already requested")</script>';

	
		}
		else{
	$req=mysqli_query($conn,"select * from incomingfood where supplayer='$role'") or die(mysql_error()) ;
	while($fech=mysqli_fetch_array($req))
	{
	$item=$fech['itemname'];
	$quanq=$fech['quantity'];
	$toprice=$fech['tprice'];
	$iddd=$fech['id'];
	
	
$sql=mysqli_query($conn,"insert into financerequest(senderid,importitem,itemid,quantity,totalprice,status)values('$id','$item','$iddd','$quanq','$toprice','A')")or die(mysqli_error()); 
   $update=mysqli_query($conn,"update incomingfood set status='pending' where itemname='$item'");

	

    

	 if($sql>0)
{
	echo '<script type="text/javascript">
	alert(" succesfully request")</script>';
}
else{
	echo '<script type="text/javascript">
	alert(" no")</script>';
}
	}}	}
?>
<tr><td><input type="submit"  name="submit" value="Request" ><input type="reset" value="Reset"></td></tr>

</table>

</form>

</div>
 </div>
  </td>
  <td width="1" height="50">
	<div id="sideright">


</body>
</div>
</center>
</html>
<?php
include("../footer.php");

?>


