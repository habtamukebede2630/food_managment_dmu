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
	//include("connection.php");
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
	if(isset($_POST['update']))
	{
		$year=$_POST['year'];
         $dept=$_POST['dept'];
		$uid=$_POST['userid'];
		$exi=$_POST['edate'];
		$re=$_POST['bdate'];
		$quant=$_POST['nstud'];
		
		
		$exite=strtotime($exi);
		$return=strtotime($re);
		$dif=$return-$exite;
		$dif=floor($dif/(60*60*24));
		$sum=$quant*15*$dif;
		$so=mysqli_query($conn,"SELECT * FROM birr") or die(mysql_error());
		while($erw=mysqli_fetch_array($so))
		{
			$for=$erw['fod'];
		}
		$sqlo=mysqli_query($conn,"update birr set status='approve' where fod='for non-cafe' and date='$dat'");
		if($dif>30)
		{
		$sqld1=mysqli_query($conn,"SELECT * FROM birr WHERE date='$dat' and fod='$for' and dept='$dept'") or die(mysql_error());
		$count3=mysqli_num_rows($sqld1);
		if($count3=='0')
	{
	$sql43="INSERT INTO birr(date,senderid,name,fname,photo,amount,fod,dept,status,student) VALUES('$dat','$id','$fname','$sname','$img','$sum','internship','$dept','request','$quant')";
		$birr=mysqli_query($conn,$sql43)or die(mysqli_error());
		if($sql43)
		{
			echo '<script type="text/javascript">
	alert("birr added to report!")</script>'.mysqli_error();	
		}
		
	}
	
	else {
		echo '<script type="text/javascript">
	alert(" sorry you were added this before")</script>';
		}	
				
		}
		
		else
		
		{
			echo '<script type="text/javascript">
	alert(" number of day is less than 30")</script>';
		}}	
	$userid=$_REQUEST['userid'];
	$result=mysqli_query($conn,"select * from  birr where fod='for-non-cafe' and status='request' ")or die(mysql_error()); 
	$row=mysqli_fetch_array($result);
	
	?>
		<div class="form-style-10">
	<h2> Approve internship Request </h2>
<form action="" method="post">
 <div class="inner-wrap">
	<label>Request ID<input type="text" name="userid" value="<?php echo $row['date'];?>" readonly></label>
	<label>Sender Id:<input type="text" name="senderid" value="<?php echo $row['senderid'];?>"></label>
	<label>Departement:<input type="text" name="dept" value="<?php echo $row['department'];?>"></label>
	<label>Year:<input type="text" name="year" value="<?php echo $row['year'];?>"></label>
	<label>Start date:<input type="text" name="edate" value="<?php echo $row['startdate'];?>"></label>
	<label>Return Date:<input type="text" name="bdate" value="<?php echo $row['returndate'];?>"></label>
	<label>Reason to move:<input type="text" name="rmove" value="<?php echo $row['reason'];?>"></label>
	<label>Number of Student:<input type="text" name="nstud"value="<?php echo $row['number'];?>"></label>
	
	<?php
	}
	?>
	</select>
	</div>
    <div class="button-section">
	<input type="submit" value="Approve" name="update">
	</div>
	</form>

</body>
</html>