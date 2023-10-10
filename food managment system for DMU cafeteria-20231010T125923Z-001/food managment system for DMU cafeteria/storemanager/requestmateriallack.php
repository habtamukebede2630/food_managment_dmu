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
    <title>Store Asking material lack</title>
    <link rel="stylesheet" href="../css/forms.css">
</head>
<body>
<?php
		$dat=date("Y/m/d");
		$tim=date("h:i:sa");
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
		
		if(isset($_POST['submit']))
			{
				$quantity=$_POST['quantity'];
				$kind=$_POST['kind'];
				$model=$_POST['model'];
				$iname=$_POST['iname'];
				$supplayer=$_POST['supplayer'];

		$sql=mysqli_query($conn,"insert into materiallack(senderid,itemname,kind,quantity,model,status,date,supplayer)values('$id','$iname','$kind',
		'$quantity','$model','A','$dat','$supplayer')");
		
		$query=($sql); 
		if($query>0)
			{
		$qa=mysqli_query($conn,"INSERT INTO userview(date,time,user_id,fname,lname,photo,activity) VALUES('$dat','$tim','$id','$fname',
		'$sname','$img','request material lack.$iname')");
		$query1=($qa);
	echo '<script type="text/javascript">
	alert(" seccesfully registered")</script>';
			}
	else
	{
	echo '<script type="text/javascript">
	alert("try again!")</script>'.(mysqli_error());	
	}
	
	}
		?>
		
		
		
	<div class="form-style-10">
<h2>Request Material/Food Form</h2>
<form action="" method="post">
        <div class="inner-wrap">
        <label><input type="button"value="Date"onclick="dat();"/> <input type="text"name="date" value="<?php echo $dat; ?>" readonly="true"/></label>
        
        <label>Item Name: <input type="text" name="iname" required="" pattern="^[a-zA-Z() ]+"class="demoInputBox"></label>
        <label>kind <select name="kind">
						<option value="food">food</option>
						<option value="material">material</option>
						
						
					</select></label>
        <label>Quantity <input type="text" name="quantity" required="" pattern="^[0-9]+"class="demoInputBox"></label>
        <label>Model: <input type="text" name="model" pattern="^[a-zA-Z0-9./ ]+"class="demoInputBox"></label>
		<label> supplier<select name="supplayer"> <option>select supplier</option>
		<option value="merchant">Merchant</option>
		<option value="enterprise">Enterprise</option>
	</select>
    </div>
    <div class="button-section">
     <input type="submit" name="submit" value="Register" class="btnRegister" >
<input type="reset" name="reset" value="Reset" class="btnRegister">
     
    </div>
</form>	
		
    
</body>
</html>