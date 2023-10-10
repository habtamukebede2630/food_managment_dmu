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
    <style>
        .padder{
            margin-top:160px;
            margin-bottom:160px;
        }
    </style>
</head>
<div class="padder">

<center>
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
$id=$query2['user_id'];
}

}
$date=Date('Y/m/d');
$dattee=Date('l',strtotime($date));
$result=mysqli_query($conn,"select * from foodscale WHERE day='$dattee'");
echo "<p><h3>$dattee food menu <h3></p>
<table border=1 >
<tr><th align=center width=130>No</th>
<th align=center width=130> Item name</th>
<th align=center width=130>Scale</th>
<th align=senter width=130>Daily Expenditure</th>
    <th align=center width=130> Single Price</th>
<th align=center width=130>Total Price</th>
</tr>";
    while($row=mysqli_fetch_array($result))
    {
echo "<tr>
<td align=center>".$row['no']."</td>
<td align=center>".$row['itemname']."</td>
<td align=center>".$row['scale']."</td>
<td align=center>".$row['dailyexpenditure']."</td>
<td align=center>".$row['sprice']."</td>
<td align=center>".$row['totalprice']."</td>
<tr>";
    }
    echo "</table>";



?>

    
</body>
</center>
</div>
</html>
<?php
include("../footer.php");
?>