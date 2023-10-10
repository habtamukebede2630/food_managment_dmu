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
    <title>chef checf student status</title>
</head>
<body>
<style>
        .menuclass{
            margin-top:200px;
			margin-bottom:200px;
        }
    </style>
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
}

}
$year=Date('Y'); $x=8; $year=$year-$x;
	$result3=mysqli_query($conn,"select * FROM student where status='internship'") or die(mysql_error());

		$internship = mysqli_num_rows($result3);
$result4=mysqli_query($conn,"select * FROM student where status='noncafe'") or die(mysql_error());
	$noncafe = mysqli_num_rows($result4);		
		
$result5=mysqli_query($conn,"select * FROM punish") or die(mysql_error());

	
	$punish = mysqli_num_rows($result5);
	$result2=mysqli_query($conn,"select * FROM student where status='active'") or die(mysql_error());
		$totalstud=mysqli_num_rows($result2);
	$result=mysqli_query($conn,"select * from specialfood where status='special'");
	$totalstud1=mysqli_num_rows($result);
    ?>
    <div class="menuclass">
        <center>
     <table border="1" width="450px">
    	<tr>
    		<th>Student status</th>
    		<th>Total number</th>
    	</tr>
    	<tr>
    		<td>Non-Cafe</td><td><?php echo $noncafe;?></td></tr>
    		<tr><td>Internship</td><td><?php echo $internship;?></td></tr>
    		<tr><td>Special food user</td><td><?php echo $totalstud1;?></td></tr>
    		<tr><td>Currently cafe user</td><td><?php echo $totalstud;?></td></tr>
    		
    	
    </table>
    <?php
    
    echo "<p><h4>$year non cafe students list<h4></p>
	<table border=1 width=450 >
	<tr>
	
	<th align=left width=10>Student id</th>
	<th align=left width=10>Name</th>
	<th align=left width=20>Sex</th>
	<th align=left width=70>Departement</th>
	<th align=left width=20>Class Year</th>
	<th align=left width=50>status</th>
	
	</tr>";
		while($rown=mysqli_fetch_array($result4))
		{
	echo "<tr>
	
	<td align=left>".$rown['id']."</td>
	<td align=left>".$rown['name']."</td>
	<td align=left>".$rown['sex']."</td>
	<td align=left>".$rown['dept']."</td>
	<td align=left>".$rown['year']."</td>
	<td align=left>".$rown['status']."</td><tr>";
		}
		echo "</table>";
?>
</div>
</center>
</body>
</html>