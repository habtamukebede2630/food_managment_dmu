<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");
?>
<?php
$data=date("d/m/Y")
?>
	
	<?php
$dat=date("Y/m/d");
$tim=date("h:i:sa");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../css/forms.css">
<body>
<?php
	
	if(isset($_SESSION['user']['username'])&&isset($_SESSION['user']['password']))
    {

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

}
	
	if(isset($_REQUEST['update']))
	{
		
		
	$uid=$_REQUEST['userid'];
		$fn=$_REQUEST['senderid'];
		$result=mysqli_query($conn,"update materiallack set status='accept' WHERE  rid='$uid'");  
		if($result)
		{
	$qa="INSERT INTO userview(date,time,userid,fname,lname,photo,activity) VALUES('$dat','$tim','$id','$fname','$sname','$img','accept material lack request')";
	$query1=mysqli_query($conn,$qa);
	echo '<script type="text/javascript">
	alert(" secces")</script>';
	}
else
	
{
	
echo '<script type="text/javascript">
	alert("try again!")</script>'.mysql_error();	
}
	}
	
	
	
	if(isset($_REQUEST['re']))
	{
		
		
	$uid=$_REQUEST['userid'];
		$fn=$_REQUEST['senderid'];
		$result=mysql_query($conn,"update materiallack set status='reject' WHERE  rid='$uid'");  
		if($result)
		{
	$qa="INSERT INTO userview(date,time,user_id,fname,lname,photo,activity) VALUES('$dat','$tim','$id','$fname','$sname','$img','reject material lack request')";
	$query1=mysqli_query($conn,$qa);
	echo '<script type="text/javascript">
	alert(" secces")</script>';
	}
else
	
{
	
echo '<script type="text/javascript">
	alert("try again!")</script>'.mysqli_error();	
}
	}
	
	
	
	
	
	$userid=$_REQUEST['userid'];
	$result=mysqli_query($conn,"select * from materiallack where rid='$userid' ")or die(mysql_error());  
	$row=mysqli_fetch_array($result);
	?>
	<div class="form-style-10">
	<h2>Accept or reject the request</h2>
	
	<form action="" method="">
	<div class="inner-wrap">
	<label>rid:<input type="text" name="userid" value="<?php echo $row['rid'];?>" readonly></label>
	<label>Sender Id:<input type="text" name="senderid" value="<?php echo $row['senderid'];?>"></label>
	<label>Kind:<input type="text" name="kind" value="<?php echo $row['kind'];?>"></label>
	<label>Quantity:<input type="text" name="quantity" value="<?php echo $row['quantity'];?>"></label>
	
	</div>
	
	
	<?php
	}
	?>
	</select>
    <div class="button-section">
	<label><input type="submit" value="Accept Request" name="update"></label><label><input type="submit" value="Reject Request" name="re"></label>
	</div></form>

</body>
</html>