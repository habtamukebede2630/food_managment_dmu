<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");
?>
<?php
$queryid=mysqli_query($conn,"select *from incomingfood ");
if($queryid){
	$row=mysqli_fetch_array($queryid);
	$itemid=$row['id'];
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/forms.css">
</head>
<body>
<?php 
	$dat=date("Y/m/d");
	$tim=date("H:h:i:sa"); 
	?>
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
$fname=$query2['fname'];
$sname=$query2['sname'];
$img=$query2['photo'];
}
	if(isset($_REQUEST['accept']))
	{
		$uid=$_REQUEST['userid'];
			$ud=$_REQUEST['itemid'];
		$result=mysqli_query($conn,"update financerequest set status='accept'  where itemid='$ud'"); 
		$result=mysqli_query($conn,"update incomingfood set status='pay' where id='$ud'");    
		if($result){
			
		$qa="INSERT INTO userview(date,time,user_id,fname,lname,photo,activity) VALUES('$dat','$tim','$id','$fname','$sname','$img','Accept finance request')";
	$query1=mysqli_query($conn,$qa);
	echo '<script type="text/javascript">
	alert(" seccesfully accepted")</script>';
	}
else
	
{
	
echo '<script type="text/javascript">
	alert("try again!")</script>'.mysqli_error();	
}
}	



if(isset($_REQUEST['regect']))
	{
		$uid=$_REQUEST['userid'];
		$result=mysqli_query("update financerequest set status='reject'  where rid='$uid'");   
		if($result){
			
		$qa="INSERT INTO userview(date,time,userid,fname,lname,photo,activity) VALUES('$dat','$tim','$id','$fname','$sname','$img','regect finance request')";
	$query1=mysqli_query($qa);
	echo '<script type="text/javascript">
	alert(" seccesfully regect")</script>';
	}
else
	
{
	
echo '<script type="text/javascript">
	alert("try again!")</script>'.mysql_error();	
}
}	




	$userid=$_REQUEST['userid'];
	$result=mysqli_query($conn,"select * from financerequest where rid='$userid' ")or die(mysqli_error());  
	$row=mysqli_fetch_array($result);
	
	?>
	<div class="form-style-10">
    <h2> Finance Request </h2>
<form action="" method="post">
    <div class="inner-wrap">
<tr><td  align="left">rid:</td><td ><input type="text" name="userid" value="<?php echo $row['rid'];?>" readonly></td></tr>
<tr><td  align="left">Item ID:</td><td ><input type="text" name="itemid" value="<?php echo $row['itemid'];?>" readonly></td></tr>
<tr><td align="left">Sender Id:</td><td >
	<input type="text" name="senderid" value="<?php echo $row['senderid'];?>"></td></tr>
<tr><td  align="left">Quantity:</td><td >
<input type="text" name="quantity" value="<?php echo $row['quantity'];?>"></td></tr>
<tr><td  align="left">Import Item:</td><td >
<input type="text" name="item" value="<?php echo $row['importitem'];?>"></td></tr>
<tr><td  align="left">Total Price:</td><td >
<input type="text" name="tprice" value="<?php echo $row['totalprice'];?>"></td></tr>
<?php
	}
	?>
    </div>
	 <div class="button-section">
		<input type="submit" value="Accept" name="accept" > 
		
		<input type="submit" value="Reject" name="regect">
        </div>
	
</form>
	<?php 
	
?>
</body>
</html>