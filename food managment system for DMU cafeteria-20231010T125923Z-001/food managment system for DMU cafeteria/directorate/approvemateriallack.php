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
    <title>Approve lack</title>
</head>
<link rel="stylesheet" href="../css/forms.css">
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
	if(isset($_REQUEST['update']))
	{
		$uid=$_REQUEST['userid'];
		$result=mysqli_query($conn,"update materiallack set status='approve' where rid='$uid'");  
		if($result){
			
		$qa="INSERT INTO userview(date,time,userid,fname,lname,photo,activity) VALUES('$dat','$tim','$id','$fname','$sname','$img','Approve material lack')";
	$query1=mysqli_query($conn,$qa);
	echo '<script type="text/javascript">
	alert(" succesfully approved")</script>';
	}
else
	
{
	
echo '<script type="text/javascript">
	alert("try again!")</script>'.mysql_error();	
}
}	if(isset($_REQUEST['reject']))
	{
		$uid=$_REQUEST['userid'];
		$result=mysqli_query($conn,"update materiallack set status='reject' where rid='$uid'");  
		if($result){
			
		$qa="INSERT INTO userview(date,time,user_id,fname,lname,photo,activity) VALUES('$dat','$tim','$id','$fname','$sname','$img','reject material lack')";
	$query1=mysqli_query($conn,$qa);
	echo '<script type="text/javascript">
	alert("You rejected request")</script>';
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
	<h2>Approve Material Lack Request</h2>
  <form action="" method="post">
<div class="inner-wrap">
	<label>Request ID:<input type="text" name="userid" value="<?php echo $row['rid'];?>" readonly></label> 
	<label>Sender Id:<input type="text" name="senderid" value="<?php echo $row['senderid'];?>"></label>
	
	<label>Kind:<input type="text" name="kind" value="<?php echo $row['kind'];?>"></label>
	<label>Quantity:<input type="text" name="quantity" value="<?php echo $row['quantity'];?>"></label>
	
		
	<?php
	}
	?>
	</select></div>
    <div class="button-section">
    <input type="submit" value="Approve" name="update" ><input type="submit" value="Reject" name="reject" >
    	</div>
    </form>
    </div>
    
</body>
</html>