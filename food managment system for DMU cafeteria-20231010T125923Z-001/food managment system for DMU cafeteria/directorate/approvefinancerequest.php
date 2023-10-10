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
	if(isset($_REQUEST['update']))
	{
		$uid=$_REQUEST['userid'];
		/*$request="select * from financerequest where status='A' and rid='$uid'";
		while($roe=mysql_fetch_array($request))
		{
			$item=$roe['importitem'];
			$quant=$roe['quantity'];
			$price1=$roe['tprice'];
		}*/
		
		
		$result=mysqli_query($conn,"update financerequest set status='approve'  where rid='$uid'");
		   
		if($result){
			
		$qa="INSERT INTO userview(date,time,user_id,fname,lname,photo,activity) VALUES('$dat','$tim','$id','$fname','$sname','$img','Approve finance request')";
	$query1=mysqli_query($conn,$qa);
	echo '<script type="text/javascript">
	alert(" seccesfully approved")</script>';
	}
else
	
{
	
echo '<script type="text/javascript">
	alert("try again!")</script>'.mysqli_error();	
}
}

if(isset($_REQUEST['reject']))
	{
		$uid=$_REQUEST['userid'];
	
		
		
		$result=mysqli_query($conn,"update financerequest set status='reject'  where rid='$uid'");
		   
		if($result){
			
		$qa="INSERT INTO userview(date,time,userid,fname,lname,photo,activity) VALUES('$dat','$tim','$id','$fname','$sname','$img','reject finance request')";
	$query1=mysql_query($qa);
	echo '<script type="text/javascript">
	alert(" seccesfully rejected")</script>';
	}
else
	
{
	
echo '<script type="text/javascript">
	alert("try again!")</script>'.mysql_error();	
}
}

	
	$userid=$_REQUEST['userid'];
	$result=mysqli_query($conn,"select * from financerequest where rid='$userid' ")or die(mysql_error());  
	$row=mysqli_fetch_array($result);
	
	?>
	<div class="form-style-10">
	<h2> Finance Request </h2>
<form action="" method="post">
 <div class="inner-wrap">


 <label>rid:<input type="text" name="userid" value="<?php echo $row['rid'];?>" readonly></label> 
<label>Sender Id:<input type="text" name="senderid" value="<?php echo $row['senderid'];?>"></label
	<label>Quantity:<input type="text" name="quantity" value="<?php echo $row['quantity'];?>"></label>
<label>Import Item:<input type="text" name="item" value="<?php echo $row['importitem'];?>"></label>

<label>Total Price:<input type="text" name="tprice" value="<?php echo $row['totalprice'];?>"></label>





<?php
	}
	?>
	</select></div>
    <div class="button-section">
    <input type="submit" value="Approve" name="update">
    <input type="submit" value="Reject" name="reject">
    
    
</div>
</form>
	
</body>
</html>