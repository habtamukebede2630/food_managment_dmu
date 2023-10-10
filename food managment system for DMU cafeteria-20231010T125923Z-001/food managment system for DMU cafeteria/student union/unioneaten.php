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
</head>
<style>
    .menuclass{
        margin-top:200px;
    }
</style>
<body>
    <center>
    <div class="menuclass">
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
$date=Date('Y/m/d');
	$dattee=Date('l',strtotime($date));
$result=mysqli_query($conn,"select * from dailyexpenditure WHERE day='$dattee'");

echo "<p><h3>Food items that are Availiable on $dattee <h3></p>
	<table border=1 > 
	
	<tr>
		<th align=left width=230>Item Name</th>
		<th align=left width=230>Quantity</th>
	</tr>";
		while($row=mysqli_fetch_array($result))
		{
	echo "<tr>
	
	<td align=left>".$row['itemname']."</td>
	<td align=left>".$row['dailyexpenditure']."</td>
	<tr>";
		}
		echo "</table>";

	
    
    ?>
    </center>
    </div>
</body>
<?php
include("../footer.php");
?>
</html>