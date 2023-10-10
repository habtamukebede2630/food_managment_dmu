<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");


?>
	<?php 
	$dat=date("Y/m/d");
	$tim=date("H:h:i:sa"); 
	?>
		
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
$fname=$query2['fname'];
$sname=$query2['sname'];
$img=$query2['photo'];
}

}
	?>
	






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/forms.css">
    <script type = "text/javascript" >
 function preventBack()
 {
 window.history.forward();
 } 
 setTimeout("preventBack()", 0); 
 window.onunload=function(){null};
  </script>
</head>
<body>
<?php
	$quan=0;
	if(isset($_POST['submit']))
	
if(isset($_POST['submit']))
{$date=Date('Y/m/d');
	$dattee=Date('l',strtotime($date));
	include ("connection.php");
	$date=$_POST['date'];
	$inamee=$_POST['iname'];
	$scale=$_POST['scale'];
	$quan=$_POST['quantity'];
	$sprice=$_POST['sprice'];
	$tprice=$sprice*$quan;
	$sql0=mysqli_query($conn,"select * FROM specialcase WHERE itemname='$inamee'");
	$num=mysqli_num_rows($sql0);
	$rowcheck=mysqli_fetch_assoc($sql0);
	if($num=='0')
	{
	$sql="INSERT INTO specialcase(itemname,scale,quantity,senderid,sprice,tprice,date) VALUES('$inamee','$scale','$quan','$id','$sprice','$tprice','$date')";
	$query=mysqli_query($conn,$sql); 
	
	$qa="INSERT INTO userview(date,time,user_id,fname,lname,photo,activity) VALUES('$date','$tim','$id','$fname','$sname','$img','register new income $quan $scale $inamee')";
	$query1=mysqli_query($conn,$qa);
	echo '<script type="text/javascript">
	alert(" item reported")</script>';
	}
else
	
	{
		$quantity1=$rowcheck['quantity'];
		$sum=$quantity1+$quan;
		$id2=$rowcheck['id'];
		$price=$rowcheck['tprice'];
		$totalprice=$price+$tprice;
		$sql2="UPDATE specialcase set quantity='$sum' , tprice='$totalprice' WHERE id=$id2";
		$query9=mysqli_query($conn,$sql2);

echo '<script type="text/javascript">
	alert("Food item is already availiable so it will be added")</script>'.mysqli_error();	
}
	
	

	

	}
	
	?>	














<div class="form-style-10">
	<h2>Report Food Items for holyday or special case</h2>
	<form action="" method="post">
	<div class="inner-wrap">
		<label><input type="button"value="Date"onclick="dat();"/></label>
					
				<label><input type="text"name="date" value="<?php echo $dat; ?>" readonly="true"/></label>
					
			<label> Name:<input type="text" name="iname" required="" pattern="^[a-zA-Z() ]+"class="demoInputBox"></label>
				
					
				<label>Scale<input type="text" name="scale" required="" pattern="^[a-zA-Z() ]+"class="demoInputBox"></label>
				<label>Quantity:<input type="text" name="quantity" required="" pattern="^[0-9]+"class="demoInputBox"></label>
					
				
					
			<label>Price:<input type="text" name="sprice" pattern="^[0-9./birr$ ]+"class="demoInputBox"></label> 
					
			
			<div class="button-section">
			<input type="submit" name="submit" value="Register" class="btnRegister" >
<input type="reset" name="reset" value="Reset" class="btnRegister">
</div>
		
	</form>
</div>
</body>
</html>
<?php
include("../footer.php");
?>