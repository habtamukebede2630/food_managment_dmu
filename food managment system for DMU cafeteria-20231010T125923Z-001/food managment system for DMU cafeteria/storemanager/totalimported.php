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
    <center>
	<style>
		.padder{
			margin-top:150px;
			margin-bottom:200px;
		}
	</style>
</head>
<div class="padder">
<body>
<table border="0" width="" height="300">
	<tr>
	<td width="500" height="50" >
	
 <h1>Total Income Food Items </h1>
  		<table border="2" width="600" bgcolor="#cdd7dc"><tr>
  	<th style="height:40px;">Food Item Name</th><th>Total Income Item</th></tr>
	  <?php
$product2=0;
$as=0;
$sql=mysqli_query($conn,"select * from incomingfood");
while($row=mysqli_fetch_array($sql))
{
	$quantity=$row['quantity'];
	$item=$row['itemname'];
	$price=$row['sprice'];
	$scale=$row['scale'];
	
	
	$sum=0;
	$sql1=mysqli_query($conn,"select* from dailyexpenditure where itemname='$item' and status='approve'");
	$num=mysqli_num_rows($sql1);
	if($num=='0')
	{
		$sum=$quantity;
		$product2=$product2+($price*$sum);
		$as=$price*$sum;
	echo "<tr><td>".$item."</td><td>".$sum."&nbsp;&nbsp;&nbsp;".$scale."</td></tr>";
	
	}
	else
	{
			$sql2=mysqli_query($conn,"select* from dailyexpenditure where itemname='$item' and status='approve'  ");
		
		while($row2=mysqli_fetch_array($sql2))
		{
			$x=$row2['dailyexpenditure'];
			
			
			$sum=$sum+$x;
			
		}
		$sum=$sum+$quantity;
		$product2=$product2+($price*$sum);
				echo "<tr><td>".$item."</td><td>".$sum."&nbsp;&nbsp;&nbsp;".$scale."</td></tr>";
	}
}


?><br><br>
<?php
///////all daily expenditure calcultio wochi
$a=array();
$produc=0;
$sql=mysqli_query($conn,"select * from incomingfood");
while($row=mysqli_fetch_array($sql))
{
	
	$item=$row['itemname'];
	$price=$row['sprice'];
	
$sql4=mysqli_query($conn,"select * from dailyexpenditure where itemname='$item'  ");
while($row2=mysqli_fetch_array($sql4))
{
	$quantity=$row2['dailyexpenditure'];
	$item=$row2['itemname'];
	$sum=0;
	$che=0;
	foreach($a as $value)
	{
	if($item==$value)
	{
	$che=1;	
	}	
	}
	if($che=='0')
	{
		
	$z=0;
	
	
	 $date=Date('Y');
	if($z=='0')
	{
			array_push($a,$item);
		$sql3=mysqli_query($conn,"select * from dailyexpenditure where itemname='$item'");
		while($row3=mysqli_fetch_array($sql3))
		{
		$sum=$sum+$row3['dailyexpenditure'];	
		
		}
		$produc=$produc+($sum*$price);

}

	
	
	
	}
}}

?>
    
</body>
</div>
<?php
include("../footer.php");
?>
</html>