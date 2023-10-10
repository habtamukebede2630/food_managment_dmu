<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");
?>
<html>
<head>
<title>View non-cafe student </title>
</head>
<style>
	.padder{
		margin-top:200px;
	}
</style>
<div class="padder">


<body>


		
	<?php

if(isset($_SESSION['user']['username'])&&isset($_SESSION['user']['password'])&&isset($_SESSION['user']['role']))
	{
		$username=$_SESSION['user']['username'];
		$password=$_SESSION['user']['password'];
		$role=$_SESSION['user']['role'];
		
		$query1=mysqli_query($conn,"select * from user WHERE user_id='$username'");
		while($query2=mysqli_fetch_array($query1))
{ 
$uid=$query2['user_id'];
$fname=$query2['fname'];
$sname=$query2['sname'];
$img=$query2['photo'];
}
	$date=date("Y/m/d");
}
$result=mysqli_query($conn,"select * from student where status='noncafe'");
$x=mysqli_num_rows($result);

echo "<p><h3><i><center>non cafe studeents list<h3></p>
	<table border=1 width=750 >
	<tr>
	
	<th align=left width=80>Student id</th>
	<th align=left width=130>Student Name</th>
	<th align=left width=50>Class Year</th>
	<th align=left width=80>Departement</th>
	<th align=left width=20> Sex</th>
	</tr>";
		while($row=mysqli_fetch_array($result))
		{
	echo "<tr>
	<td align=left>".$row['id']."</td>
	<td align=left>".$row['name']."</td>
	<td align=left>".$row['year']."</td>
	<td align=left>".$row['dept']."</td>
	<td align=left>".$row['sex']."</td><tr>";
		}
		echo "</table>";
		?>
		<form action="" method="POST">
		<input type="submit" name="request" value="Request to finance" style="height: 40px;width: 120px;"/><br><br>
		</form><?php
		
		$result1=mysqli_query($conn,"select * from student where  status='noncafe' and sex='M'");
	
$s=mysqli_num_rows($result1);
$result2=mysqli_query($conn,"select * from student where  status='noncafe' and sex='F'");
  
$f=mysqli_num_rows($result2);
	echo "Total Number of Non-cafe Students are &nbsp;&nbsp;&nbsp;$x <br><br>";
	  echo "Male=$s<br><br>";
	    echo "Female=$f<br><br>";
	   
	   if(isset($_POST['request']))
	   {
	   $amount=$x*450;
	$noncafe=mysqli_query($conn,"insert into birr (date,senderid,name,fname,photo,amount,fod,status,student) VALUES('$date','$uid','$fname','$sname','$img','$amount','For non-cafe','request','$x')")or die(mysql_error());
	   	
	   	if($noncafe>0)
	   	{
			echo '<script type="text/javascript">
	alert(" request to finnce is sucessfull")</script>';
		}
		else{
			echo '<script type="text/javascript">
			alert(" already registered")</script>';
		}
	   } 
	    
?>
 <script>
	if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
	</script>

</body>
</div>
</html>
