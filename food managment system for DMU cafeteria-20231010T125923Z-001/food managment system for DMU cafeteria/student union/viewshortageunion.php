<?php
include("../connection.php");

session_start();
include("header.php");
include("navbar.php");

?>
<html>
<head>
<title>student union index </title>
<link rel="Stylesheet" type="text/css" href="setting.css">
<script type = "text/javascript" >
 function preventBack()
 {
 window.history.forward();
 } 
 setTimeout("preventBack()", 0); 
 window.onunload=function(){null};
  </script>
  <center>
  <style>
    
    .padder{
        margin-top:200px;
        margin-bottom:300px;
    }
  </style>
</head>
<body>

		<div class="padder">

       
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
$result=mysqli_query($conn,"select * from shortageofitem WHERE day='$dattee'");

echo "<p><h3>Shortage of food items on $dattee is<h3></p>
	<table border=1 > 
	
	<tr>
		<th align=left width=330>Number</th>
		<th align=left width=330>Item Name</th>
		
	</tr>";
		while($row=mysqli_fetch_array($result))
		{
	echo "<tr>
	<td align=left>".$row['id']."</td>
	<td align=left>".$row['itemname']."</td>
	<tr>";
		}
		echo "</table>";

	
	
    
?>
  
  </div>
    </center>
</body>
</html>

<?php  include("../footer.php");?>