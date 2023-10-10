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
	$date=date("Y/m/d");
	$time=date("H:h:i:sa"); 
	?>

     <?php
      if(isset($_SESSION['user']['username'])){
          $username=$_SESSION['user']['username'];
          $query1=mysqli_query($conn,"select * from user where user_id='$username'");
          while($query2=mysqli_fetch_array($query1)){
              $uid=$query2['user_id'];

          }
      }
      ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>incoming materials</title>
<link rel="stylesheet" href="../css/forms.css">
</head>
<body>
<div class="form-style-10">
    <h2>Register incomming materials</h2>
    <form action=""method="post">
        <div class="inner-wrap">
        <label><input type="button"value="Date"onclick="date();"/> <input type="text"name="date" value="<?php echo $date; ?>" readonly="true"/></label>
        
        <label>Material Name: <input type="text" name="mname" required="" pattern="^[a-zA-Z() ]+"class="demoInputBox"></label>
         <label>Supplied by <select name="supplier" >
						<option value="merchant">Merchant</option>
						<option value="enterprise">Enterprise</option>
						<option value="university">University</option>
											
					</select></label>
        <label>Quantity <input type="text" name="quantity" required="" pattern="^[0-9]+"class="demoInputBox"></label>
        <label>Single Price <input type="text" name="sprice" pattern="^[a-zA-Z0-9./ ]+"class="demoInputBox"></label>
    </div>
    <div class="button-section">
     <input type="submit" name="submit" value="Register" class="btnRegister" >
<input type="reset" name="reset" value="Reset" class="btnRegister">
        </div>
        
            
        </div>
          
    </form>
    <?php
    $quantity=0;
    if(isset($_POST['submit'])){
        $date=$_POST['date'];
        $mname=$_POST['mname'];
        $supplier=$_POST['supplier'];
        $quantity=$_POST['quantity'];
        $sprice=$_POST['sprice'];
        $tprice=$quantity*$sprice;
        $sql=mysqli_query($conn,"select *from material where itemname='$mname'");
        $row=mysqli_fetch_assoc($sql);
        $num=mysqli_num_rows($sql);
        if($num=='0'){
            $sqli=mysqli_query($conn,"insert into material (itemname,quantity,sprice,tprice,eid,supplier)values('$mname','$quantity','$sprice','$tprice','$uid','$supplier')");
            $query=($sql);
            
	echo '<script type="text/javascript">
	alert(" material added to store")</script>';
        }
        else{
            
                $quantity1=$row['quantity'];
                $sum=$quantity1+$quantity;
                $price=$row['tprice'];
                $totalprice=$price+$tprice;
                $sql2=mysqli_query($conn,"UPDATE material set quantity='$sum' , tprice='$totalprice' WHERE itemname='$mname'");
                $query9=($sql2);
        
        echo '<script type="text/javascript">
            alert("added to the remaining item in store")</script>';	
        
            
        }




    }
    ?>
   
</body>
<?php include("../footer.php");?>
</html>
