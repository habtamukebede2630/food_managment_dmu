<?php
include("../connection.php");
session_start();
if(empty($_SESSION['user'])){
    header('location:../index.php');
   }
   include("header.php");
   include("navbar.php");    
?>
<?php
$queryincoming=mysqli_query($conn,"select *from incomingfood ");
if($queryincoming){
	$row=mysqli_fetch_array($queryincoming);
	$quantityincomming=$row['quantity'];
}
$queryshortage=mysqli_query($conn,"select *from shortageofitem ");
if($queryshortage){
	$row=mysqli_fetch_array($queryshortage);
	$quantityshortage=$row['dailyexpenditure'];
}
$querylack=mysqli_query($conn,"select *from materiallack");
if($querylack){
	$row=mysqli_fetch_array($querylack);
	$namelack=$row['itemname'];
}
?>
<?php 
	$dat=date("Y/m/d");
	$tim=date("H:h:i:sa"); 
	?>
<?php 
	$date=date("Y/m/d");
	$time=date("H:h:i:sa"); 
	?>

     <?php
      if(isset($_SESSION['user']['username'])){
          $username=$_SESSION['user']['username'];
          $query1=mysqli_query($conn,"select * from user where user_id='$username'");
          while($query2=mysqli_fetch_array($query1)){
              $uid=$query2['user_id'];
			  $fname=$query2['fname'];
			  $sname=$query2['sname'];
			  $photo=$query2['photo'];

          }
      }
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/forms.css">
    <title>Document</title>
</head>
<body>
<div class="form-style-10">
<h2>Registrer Incommming Food</h2>
<form action="" method="POST">
        <div class="inner-wrap">
        <label><input type="button"value="Date"onclick="dat();"/> <input type="text"name="date" value="<?php echo $dat; ?>" readonly="true"/></label>
        
        <label>Item Name: <input type="text" name="iname" required="" pattern="^[a-zA-Z() ]+"class="demoInputBox"></label>
        <label>Scale <select name="scale" >
						<option value="kilogram">kilogram</option>
						<option value="liter">liter</option>
						<option value="packet">packet</option>
						<option value="number">number</option>
						<option value="tasa">tasa</option>
						
					</select></label>
        <label>Quantity <input type="text" name="quantity" required="" pattern="^[0-9]+"class="demoInputBox"></label>
         <label>Supplied by <select name="suplay" >
						<option value="merchant">Merchant</option>
						<option value="enterprise">Enterprise</option>
						<option value="university">University</option>
											
					</select></label>
        <label>Single Price <input type="text" name="sprice" pattern="^[a-zA-Z0-9./ ]+"class="demoInputBox"></label>
    </div>
    <div class="button-section">
     <input type="submit" name="submit" value="Register" class="btnRegister" >
<input type="reset" name="reset" value="Reset" class="btnRegister">
     
    </div>
</form>
<?php
	$quan=0;
	if(isset($_POST['submit']))
	
if(isset($_POST['submit']))
{
	
	$date=$_POST['date'];
	$inamee=$_POST['iname'];
	$scale=$_POST['scale'];
	$quan=$_POST['quantity'];
	$sprice=$_POST['sprice'];
	$sup=$_POST['suplay'];
	$tprice=$sprice*$quan;
	
	$sql0=mysqli_query($conn,"select * FROM incomingfood WHERE itemname='$inamee'");
	$num=mysqli_num_rows($sql0);
	$rowcheck=mysqli_fetch_assoc($sql0);
	if($num=='0')
	{
	$sql="INSERT INTO incomingfood(date,itemname,scale,quantity,sprice,tprice,eid,supplayer,status) VALUES('$date','$inamee','$scale','$quan','$sprice','$tprice','$uid','$sup','notpay')";
	$query=mysqli_query($conn,$sql); 
	
	$qa="INSERT INTO userview(date,time,userid,fname,lname,photo,activity) VALUES('$date','$uid','$fname','$sname','$photo','register new income $quan $scale $inamee')";
	$query1=mysqli_query($conn,$qa);
	echo '<script type="text/javascript">
	alert(" food item is added to store")</script>';
	}
	elseif($quantityincomming>$quantityshortage || $queryincomming===$namelack){
		$sql=mysqli_query($conn,"delete from shortageofitem where itemname='$inamee'") or die(mysqli_error());
		$sql=mysqli_query($conn,"delete from materiallack where itemname='$namelack'");
	
	
		$quantity1=$rowcheck['quantity'];
		$sum=$quantity1+$quan;
		$id2=$rowcheck['id'];
		$price=$rowcheck['tprice'];
		$totalprice=$price+$tprice;
		$sql2="UPDATE incomingfood set quantity='$sum' , tprice='$totalprice' WHERE id=$id2";
		$query9=mysqli_query($conn,$sql2);

echo '<script type="text/javascript">
	alert("Food item is already availiable so it will be added")</script>';	
}

	
	

	

	}


	
	?>	
    
</body>
</html>