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
<body>
    <style>
        .tablestyle{
            margin-top:200px;
        }
    </style>
    <div class="tablestyle">
        <?php

$result=mysqli_query($conn,"select * from materiallack WHERE status='A'");


echo "<center><p><h3>Requested materials list<h3></p>
	<table border=1 >
	<tr><th align=left width=110>Sender Id</th>
	<th align=left width=130> Quantity</th>
	<th align=left width=130>Kind</th>
	<th align=left width=130>Model</th>
	<th align=left width=130>Item Name</th>
	<th align=left width=130>Approve</th></tr>";
		while($row=mysqli_fetch_array($result))
		{
	echo "<tr>
	<td align=left>".$row['senderid']."</td>
	<td align=left>".$row['quantity']."</td>
	<td align=left>".$row['kind']."</td>
	<td align=left>".$row['model']."</td>
		<td align=left>".$row['itemname']."</td>
	<td><a href=approvemateriallack.php?userid=".$row['rid']."><img src='../images/logo.jpg' width=30px></a></td><tr>";
		}
		echo "</table> </center>";
	
	echo'</div>';
    
?>
</div>

</body>
</html>