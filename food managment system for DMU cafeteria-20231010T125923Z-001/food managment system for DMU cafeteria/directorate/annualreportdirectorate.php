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
            margin-top:100px;
			margin-bottom:200px;
        }
    </style>
</head>
<div class="padder">
<body>
<center>

<table border="0" width="" height="300">
	<tr>
	<td width="500" height="50" >
	<div id="Center">
 <h1>Total Imported Food Items </h1>
  		<table border="2" width="600" bgcolor="#cdd7dc"><tr>
  	<th style="height:40px;">Food Item Name</th><th>Total Income Item</th><th>Total Item Price</th></tr>
  	
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
	$sql1=mysqli_query($conn,"select* from dailyexpenditure where itemname='$item'");
	$num=mysqli_num_rows($sql1);
	if($num=='0')
	{
		$sum=$quantity;
		$product2=$product2+($price*$sum);
		$as=$price*$sum;
	echo "<tr><td>".$item."</td><td>".$sum."&nbsp;&nbsp;&nbsp;".$scale."</td><td>".$as."&nbsp;&nbsp;&nbsp; Birr"."</td></tr>";
	
	}
	else
	{
			$sql2=mysqli_query($conn,"select* from dailyexpenditure where itemname='$item'");
		
		while($row2=mysqli_fetch_array($sql2))
		{
			$x=$row2['dailyexpenditure'];
			
			
			$sum=$sum+$x;
			
		}
		$sum=$sum+$quantity;
		$product2=$product2+($price*$sum);
				echo "<tr><td>".$item."</td><td>".$sum."&nbsp;&nbsp;&nbsp;".$scale."</td><td>".$price*$sum."Birr</td></tr>";
	}
}

echo "<tr><td colspan='2'><center>Total</center></td><td>".$product2."</td></tr><tr></tr></table>";
?><br><br>
<h1>food Items Expended</h1>
<table border='1' width="450px" bgcolor="#cdd7dc"><th>Item Name</th><th>Expenditure</th><th>Total Price</th>
<?php
///////all daily expenditure calcultio wochi
$a=array();
$produc=0;
$sql=mysqli_query($conn,"select * from incomingfood");
while($row=mysqli_fetch_array($sql))
{
	
	$item=$row['itemname'];
	$price=$row['sprice'];
	
$sql4=mysqli_query($conn,"select * from dailyexpenditure where itemname='$item'");
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
	echo "<tr><td>".$item."</td><td>".$sum."</td><td>".$sum*$price."</td></tr>";
	
	
	
	}
}}echo "<tr><td colspan='2'><center>Total</center></td><td>".$produc."&nbsp;&nbsp;&nbsp; Birr"."</td></tr><tr></tr>";

?>
</center>
</table><br>
<h2>Avilable Items In store</h2>
<table border="1" width="500px" bgcolor="#cdd7dc">
<th>Item Name</th><th>Quantity</th>
<?php 
	$product1=0;
$as=0;
$sql=mysqli_query($conn,"select * from incomingfood");
while($row=mysqli_fetch_array($sql))
{
	$quantity=$row['quantity'];
	$item=$row['itemname'];
	$price=$row['sprice'];
	$scale=$row['scale'];
	
	
	
echo "<tr><td>".$item."</td><td>".$quantity.'&nbsp;&nbsp;&nbsp;'.$scale."</td></tr>";
	
}	
	?></table>
	<?php
	
	////////////////////////////////////////////////////////////////////////////
	$dg=0;
	$birr=0;
	$sqw=mysqli_query($conn,"select * from birr where fod='internship'");
	while($ddd=mysqli_fetch_array($sqw))
	{
		$birr=$birr+$ddd['amount'];
	}
	
	//echo "<h1>Amount of birr expend for Internship is &nbsp;&nbsp;&nbsp;<u>$birr</u></h1>";
	
	
	
	$sqw1=mysqli_query($conn,"select * from birr where fod='For non-cafe'");
	while($ddd1=mysqli_fetch_array($sqw1))
	{
		$dg=$dg+$ddd1['amount'];
	}
	
	//echo "<h1>Amount of birr expend for Nonn cafe studets is &nbsp;&nbsp;&nbsp;<u>$dg</u></h1>";
	
	
////////////////for special case 	
	?>
	
	<?php
	$dgq=0;
	$sqw12=mysqli_query($conn,"select * from specialcase");
	while($q1=mysqli_fetch_array($sqw12))
	{
		$dgq=$dgq+$q1['tprice'];
	}
	
	//echo "<h1>Amount of birr expend for special case &nbsp;&nbsp;&nbsp;<u>$dgq</u></h1>";
	?>
      <p><h1><center>Over All summry of Annual Report</center></h1></p>
	  <table border="1" bgcolor="#cdd7dc" width="500">
		<th>Condition</th><th>Amount of birr expend</th>
		<tr><td>For Internship</td><td><?php echo $birr;?>&nbsp;&nbsp;birr</td></tr>
		<tr><td>For Non-cafe</td><td><?php echo $dg;?>&nbsp;&nbsp;birr</td></tr>
		<tr><td>For Special case</td><td><?php echo $dgq;?>&nbsp;&nbsp;birr</td></tr>
		<tr><td>For Cafe user</td><td><?php echo $produc;?>&nbsp;&nbsp;birr</td></tr>
		<tr><td>Total</td><td><?php echo $produc+$dgq+$dg+$birr;?>&nbsp;&nbsp;birr</td></tr>
	</table>
	
</body>
</div>
<?php include("../footer.php");?>
</html>