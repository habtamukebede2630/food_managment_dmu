<?php

include("../connection.php");
session_start();
include("header.php");
include("navbar.php");
?>
<html>
<head>
	<link rel="stylesheet" href="../css/forms.css">
<?php
$dat=date('d/m/Y');
?>
<title>veiw requested student</title>
<style>
	.padder{
		margin-top:200px;
	}
</style>

</head>
<div class="padder">
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
			$result=mysqli_query($conn,"update ailingstudent set status='accept' where studid='$uid'");  
		if($result){
			
		$qa="INSERT INTO userview(date,time,user_id,fname,lname,photo,activity) VALUES('$dat','$tim','$id','$fname','$sname','$img','accept ailing student')";
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



if(isset($_REQUEST['reject']))
	{
		$uid=$_REQUEST['userid'];
			$result=mysqli_query("update ailingstudent set status='reject' where aid='$uid'");  
		if($result){
			
		$qa="INSERT INTO userview(date,time,userid,fname,lname,photo,activity) VALUES('$dat','$tim','$id','$fname','$sname','$img','accept ailing student')";
	$query1=mysqli_query($qa);
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
	$result=mysqli_query($conn,"select * from ailingstudent where studid='$userid' ")or die(mysqli_error());  
	$row=mysqli_fetch_array($result);
	}
	$iddd=$row['studid'];
	?>




<div class="form-style-10">
<form action="" method="post">
<h2>accept or reject ailing students</h2>
	<div class="inner-wrap">
	


<tr><td  align="left">Aid:</td><td><input type="text" name="userid" required="" value="<?php echo $row['studid'];?>"></td></tr>
<tr><td  align="left">Acadamic Year:</td><td >
<input type="text" name="cname" value="<?php echo $row['ayear'];?>"></td></tr>
<tr><td  align="left">Name:</td><td >
<input type="text" name="name" value="<?php echo $row['name'];?>"></td></tr>
<tr><td  align="left">Age:</td><td >
<input type="text"name="age" value="<?php echo $row['age'];?>"></td></tr>
<tr><td  align="left">Student ID:</td><td >
<input type="text"name="studid" value="<?php echo $row['studid'];?>"></td></tr>
<tr><td  align="left">Sex: </td><td>
<input type="text" name="sex" value="<?php echo $row['sex'];?>"></td> <br/></tr> 
<tr><td  align="left">Departement:</td><td>
<input type="text" name="dept" value="<?php echo $row['dept'];?>"></td> <br/></tr> 
<tr><td  align="left">Diagnosis:</td><td>
<input type="text" name="dig" value="<?php echo $row['diagnosis'];?>"></td></tr>
<tr><td  align="left">Sick Leave:</td><td >
<input type="text" name="slevel" value="<?php echo $row['sicklevel'];?>"></td></tr>
 <label>Recomendation:</label>
<input type="text" style="height: auto;width: auto;"  name="comment" value="<?php echo $row['recommendation'];?>">
</div>
<input type="submit" name="update" value="Accept">
<input type="submit" value="reset" name="reject">
</td></tr>
</table>
</form>
  </div>
  

</body>
</div>
</html>
