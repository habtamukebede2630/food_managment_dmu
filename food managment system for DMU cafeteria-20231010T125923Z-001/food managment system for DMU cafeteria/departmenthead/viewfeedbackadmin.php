<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");
if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['password']) && isset($_SESSION['user']['role'])){
  $username=$_SESSION['user']['username'];
  $query1=mysqli_query($conn,"select *from user where user_id='$username'");
  while($query2=mysqli_fetch_array($query1)){
    $role=$query2['role'];
  }
}

?>
<html>
<head>
<title>adminindex </title>
<link rel="Stylesheet" type="text/css" href="../css/stylesheet.css">
<style>
    .padder{
        margin-top:230px;
        margin-bottom:200px;
    }
</style>
</head>
<body>
<div class="padder">


	
<?php
include('../connection.php');

$query1=mysqli_query($conn,"select * FROM  feedback WHERE statu='comment' and recieverid='$role'");
echo "<center>";
echo "<table border='1' style=width:700px;border-color:#918e86;>
<tr style=background-color:#53acac;font-size:16px;width:100px;text-align:center;>
<th bgcolor=#9fe8f4>name</th>
<th bgcolor=#9fe8f4>job</th>
<th bgcolor=#9fe8f4>phone</th>
<th bgcolor=#9fe8f4>Comment</th>
<th bgcolor=#9fe8f4>Date</th>
<th bgcolor=#9fe8f4>Replay</th>
<th bgcolor=#9fe8f4>Delete all</th>
<th bgcolor=#9fe8f4>Delete</th>
</tr>";
while($query2=mysqli_fetch_array($query1))
{ 
echo "<tr>";
echo "<td>".$query2['fname']."</td>";
echo "<td>".$query2['role']."</td>";
echo "<td>".$query2['phone']."</td>";
echo "<td>".$query2['comment']."</td>";
echo "<td>".$query2['date']."</td>";
echo "<td><a href=replay.php?id=".$query2['fname'].">";

echo "<img  src=del.png width=40 height=30/></a>";
echo "<td><a href=deletefeedbackadmin.php?id=".$query2['id'].">";?> <img src="../images/del.png" width="40" width="50"/> </a></td>

</tr>

<?php
}
?>


</div>
  <d>
	<?php
 include("../footer.php");
?>

</div>
</body>
</html>
