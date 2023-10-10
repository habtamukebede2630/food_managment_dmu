<?php
include("../connection.php");
session_start();
if(empty($_SESSION['user'])){
    header('location:../index.php');
  
   }
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
	<style>
		.padder{
			margin-top:180px;
			margin-bottom:180px;
			
		}
		.pad{
			margin-top:100px;
		}
		
	</style>
</head>
<div class="padder">
<body>

<?php
if(isset($_SESSION['user']['username'])&& isset($_SESSION['user']['password'])&&isset($_SESSION['user']['role'])){
    $username=$_SESSION['user']['username'];
    $password=$_SESSION['user']['password'];
     $role=$_SESSION['user']['role'];
    $query1=mysqli_query($conn,"select *from user where user_id='$username'");
    while($query2=mysqli_fetch_array($query1)){
        $id=$query2['user_id'];
    }
}
$year=Date('Y'); $x=8; $year=$year-$x;
$result3=mysqli_query($conn,"select *from student where status='internship'") or die(mysqli_error());
$internship=mysqli_num_rows($result3);
$result4=mysqli_query($conn,"select *from student where status='noncafe'") or die(mysqli_error());
$noncafe=mysqli_num_rows($result4);
$result5=mysqli_query($conn,"select *from  punish") or die(mysqli_query());
$punish=mysqli_num_rows($result5);
$result2=mysqli_query($conn,"select *from student where status='active'") or die(mysqli_query());
$totalstud=mysqli_num_rows($result2);
$result=mysqli_query($conn,"select *from specialfood where status='special'")or die(mysqli_error());
$totalstud1=mysqli_num_rows($result);

?>
<center>
<table border=1 width="650px"margin-top="300px">
<tr>
    <th bgcolor="lightgrey">
        Student status</th>
    <th bgcolor="lightgrey">Total number</th>
</tr>
<tr>
    		<td>Non-Cafe</td><td><?php echo $noncafe;?></td></tr>
    		<tr><td>Internship</td><td><?php echo $internship;?></td></tr>
    		<tr><td>Special food user</td><td><?php echo $totalstud1;?></td></tr>
    		<tr><td>Currently cafe user</td><td><?php echo $totalstud;?></td></tr>
</table>
</center>
<div class="pad">
<?php
  echo "<center><p><h2>$year Non-cafe students list</h2></p>
  <table border=1 width=650 >
	<tr>
	
	<th align=left width=50>Student id</th>
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
</body>
</div>
</html>
<?php
include("../footer.php");
?>