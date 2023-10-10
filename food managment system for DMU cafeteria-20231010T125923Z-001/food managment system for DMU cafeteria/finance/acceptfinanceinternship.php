<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");

?><!DOCTYPE html>
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
	include("connection.php");
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
			
		$result=mysqli_query($conn,"update birr set status='accept'  where bid='$uid'"); 
		if($result){
			
		$qa="INSERT INTO userview(date,time,user_id,fname,lname,photo,activity) VALUES('$dat','$tim','$id','$fname','$sname','$img','Accept finance request')";
	$query1=mysqli_query($conn,$qa);
	echo '<script type="text/javascript">
	alert(" seccesfully accepted")</script>';
	}
else
	
{
	
echo '<script type="text/javascript">
	alert("try again!")</script>'.mysql_error();	
}
}	



if(isset($_REQUEST['reject']))
	{
		$uid=$_REQUEST['userid'];
		$result=mysqli_query("update birr set status='regect'  where bid='$uid'");   
		if($result){
			
		$qa="INSERT INTO userview(date,time,user_id,fname,lname,photo,activity) VALUES('$dat','$tim','$id','$fname','$sname','$img','regect finance request')";
	$query1=mysqli_query($conn,$qa);
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
	$result=mysqli_query($conn,"select * from birr where bid='$userid' ")or die(mysqli_error());  
	$row=mysqli_fetch_array($result);
	
	?>
	<div class="form-style-10">
    
    <h2> Finance Request</h2>
<form action="" method="post">
<div class="inner-wrap">
<label>Bid:</label><input type="text" name="userid" value="<?php echo $row['bid'];?>" readonly>
<label>Sender Id:</label>
	<input type="text" name="senderid" value="<?php echo $row['senderid'];?>"></td></tr>
<label>Name:</label>
<input type="text" name="quantity" value="<?php echo $row['name']; $row['fname'];?>"></td></tr>
<label>Number of student:</label>
<input type="text" name="item" value="<?php echo $row['student'];?>"></td></tr>
<label>Amount of birr:</label>
<input type="text" name="item" value="<?php echo $row['amount'];?>"></td></tr>
<label>Reason:</label>
<input type="text" name="tprice" value="<?php echo $row['fod'];?>"></td></tr>
<?php
	}
	?>

        <div class="button-section">
		<input type="submit" value="Accept" name="accept">
		<input type="submit" value="Reject" name="reject">
        </div>
       
        
        </div>
</form>

</div>
</body>
</html>