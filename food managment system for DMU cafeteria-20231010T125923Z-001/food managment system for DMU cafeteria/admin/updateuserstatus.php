
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
            margin-top:300px;
            margin-bottom:200px;
        }
    </style>
</head>
<div class="padder">
<body>
    <?php
    if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['password'])){
        $result=mysqli_query($conn,"select *from user,account where user.user_id=account.username");
        echo "
	<center><table border=1 width=700px >
	<tr ><h3>User Details</h3></tr><tr>
	<th bgcolor=lightgrey>First Name</th>
	<th bgcolor=lightgrey> Second Name</th>
	<th bgcolor=lightgrey>Username</th>
	<th bgcolor=lightgrey>Role</th>
	<th bgcolor=lightgrey> Edit</th></tr></tr>";
    while($row=mysqli_fetch_array($result))
	{
	echo "<tr><td>".$row['fname']."</td><td>".$row['sname']."</td><td>".$row['username']."</td><td>".$row['role']."</td><td><a href=updateuserprofileform.php?user_id=".$row['user_id']."><img src='../images/logo.jpg' width=40px height=40></a></td><tr>";
	}
	echo "</table></center>";
    }else
    {
    	header("location:index.php");
     }
    
    
    ?>
    <?php
    include("../footer.php");
    ?>
</body>
    </div>
</html>