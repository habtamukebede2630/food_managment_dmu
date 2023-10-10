<?php
session_start();
include("../connection.php");
include("header.php");
include("navbar.php");
?>
<?php
$queryincoming=mysqli_query($conn,"select *from incomingfood");
if($queryincoming){
	$row=mysqli_fetch_array($queryincoming);
	$itemnameinc=$row['itemname'];
}
$queryshortage=mysqli_query($conn,"select *from shortageofitem");
if($queryshortage){
	$row=mysqli_fetch_array($queryshortage);
	$itemnameshortage=$row['itemname'];
}
?>
<html>
<head>
<title>daily menu scale</title>
<style>
	table{
		margin-top:80px;
	}
</style>

<script type = "text/javascript" >
 function preventBack()
 {
 window.history.forward();
 } 
 setTimeout("preventBack()", 0); 
 window.onunload=function(){null};
  </script>
</head>
<body>
<div id="container">

<div id="content">
	<tr>
	<td>
		<center>
			<table border="0" width="" height="400">
	<tr>
	<td width="500" height="30" >
	<div id="Center">
  <?php $date=date("Y/m/d"); ?>
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
$name=$query2['fname'];
$lname=$query2['sname'];
$img=$query2['photo'];
}

}
	$date=Date('Y/m/d');
	$dattee=Date('l',strtotime($date));

?>
<form action="" method="post">
<table border="1" width="450">
	<h4><b><i><?php echo $dattee;?></i></b> Daily Food scale</h4><tr>
		<th></th>
	</tr>
	<tr>
		<th align="left" bgcolor="#959c9d" >Item name</th>
		<th align="left" bgcolor="#959c9d" >Daily expenditure</th>
	</tr>
	<?php
	$date=Date('Y/m/d');
	$dattee=Date('l',strtotime($date));
	
	$totalstud=0;
	$internship=0;
	$infood=0;
	$itemname=NULL;
	$sql10=NULL;
	$count=NULL;
	$currentstudent=NULL;
$result2=mysqli_query($conn,"select * FROM student") or die(mysqli_error());
		$totalstud=mysqli_num_rows($result2);
		
			
$result3=mysqli_query($conn,"select * FROM student where status='internship'") or die(mysqli_error());

		$internship=mysqli_num_rows($result3);
		
$result4=mysqli_query($conn,"select * FROM student where status='noncafe'") or die(mysqli_error());
	$noncafe = mysqli_num_rows($result4);		
		
$result5=mysqli_query($conn,"select * FROM student where status='punish'") or die(mysqli_error());
	$punish = mysqli_num_rows($result5);
$currentstudent=$totalstud-($noncafe+$internship+$punish);
   
		
	$sql=mysqli_query($conn,"select * FROM foodscale WHERE day='$dattee'") or die(mysqli_error());
	while($row=mysqli_fetch_array($sql))
	{
		
		$itemname=$row['itemname'];
		$daily=$row['dailyexpenditure'];
	
		
		
		
		
		$daily=$currentstudent*$daily;
		
			
			echo"<tr><td>$itemname</td><td>$daily</td></tr>";
	
	}
	
	

	
	if(isset($_POST['submit']))
	{
	$date=Date('Y/m/d');
	$dattee=Date('l',strtotime($date));
	$totalstud=0;
	$internship=0;
	$infood=0;
	$itemname=NULL;
	$itemmm=NULL;
	$remainitem=NULL;
	$dail=NULL;
		
$result2=mysqli_query($conn,"select * FROM student") or die(mysqli_error());
		$totalstud=mysqli_num_rows($result2);
			
$result3=mysqli_query($conn,"select * FROM student where status='internship'") or die(mysqli_error());

		$internship=mysqli_num_rows($result3);
		
$result4=mysqli_query($conn,"select * FROM student where status='noncafe'") or die(mysqli_error());
	$noncafe = mysqli_num_rows($result4);		
		
$result5=mysqli_query($conn,"select * FROM student where status='punish'") or die(mysqli_error());
	$punish = mysqli_num_rows($result5);
$currentstudent=$totalstud-($noncafe+$internship+$punish);
		
	$sql=mysqli_query($conn,"select * FROM foodscale WHERE day='$dattee'") or die(mysqli_error());
	while($row=mysqli_fetch_array($sql))
	{
		
		$itemname=$row['itemname'];
		$daily=$row['dailyexpenditure'];
		
		$result6=mysqli_query($conn,"SELECT * FROM incomingfood WHERE itemname='$itemname'") or die(mysql_error());
	
	while($row5=mysqli_fetch_array($result6))
	{
		$infood=$row5['quantity'];
		$itemmm=$row5['itemname'];
		$remainitem=$infood-$dail;
		
	}
	
		$daily=$currentstudent*$daily;
		$item=$itemname;
		if($daily<=$infood)
		{
	 $dat=$date;
		$day=$dattee;
	
		$sqld=mysqli_query($conn,"SELECT * FROM dailyexpenditure WHERE date='$date' and itemname='$item'") or die(mysql_error());
		$count2=mysqli_num_rows($sqld);
		if($count2=='0' )
		{
		
		$sql13=mysqli_query($conn,"SELECT * from incomingfood WHERE itemname='$item'") or die(mysqli_error());
		$rem=mysqli_fetch_assoc($sql13);
		$quantity=$rem['quantity'];
		
		$remitem=$quantity-$daily;
		$id1=$rem['id'];
		$update=mysqli_query($conn,"update incomingfood set quantity='$remitem' WHERE id='$id1'") or die(mysqli_error());
		
	$sql3="INSERT INTO dailyexpenditure(date,itemname,dailyexpenditure,day,senderid,fname,lname,photo) VALUES('$dat','$item','$daily','$day','$id','$name','$lname','$img')";
	
	$query=mysqli_query($conn,$sql3) or die(mysql_error()); 

	echo '<script type="text/javascript">
	alert(" succesfully inserted")</script>';
	
		
		//$sql12=mysql_query("Update incomefood set quantity='$remainitem'") or die(mysql_error());
	}
	
	
	
	else
		echo '<script type="text/javascript">
	alert(" this item is already inserted")</script>';
	
	
	}
else
	
{
	$result8=mysqli_query($conn,"SELECT * FROM incomingfood WHERE itemname='$itemname'") or die(mysqli_error());
	
	while($row8=mysqli_fetch_array($result8))
	{
		$infood=$row8['quantity'];
		$itemmm=$row8['itemname'];
		
		
	}
	
		// $daily=$currentstudent*$daily;
	$sqld1=mysqli_query($conn,"SELECT * FROM shortageofitem WHERE datee='$date' and itemname='$item'") or die(mysqli_error());
		$count3=mysqli_num_rows($sqld1);
		if($count3=='0' && $itemnameinc!==$itemmm)
		{
			
	$sql9=mysqli_query($conn,"insert into shortageofitem(itemname,datee,day,dailyexpenditure) VALUES('$itemname','$date','$dattee','$daily')") or die(mysqli_error()); 
	}
}
		
		}
	
	
	}	
	
	
	//mysql_num_rows()
	
	?>
<tr>
	
	
<?php
$sql10=mysqli_query($conn,"SELECT * FROM shortageofitem WHERE datee='$date'") or die(mysqli_error());
	$count=mysqli_num_rows($sql10);
	if($count>0)
	{
		
		echo "<br><table border=0><tr><th></th><th><center><i>Shortage of item list</center></th></tr><tr><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Item Name</th></tr>";
		while($rowss=mysqli_fetch_array($sql10))
		{
			$itemm=$rowss['itemname'];
		echo "<tr color=red><td></td><td bgcolor=#f80e25 ><b>$itemm</b></td></tr>";
		}
		echo"</table>";
		
		
	}
?>

</center>
	
  </form>
  	
  	
  	
  
 
  

	


</body>
</html>