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
            margin-top:300px;
        }
    </style>
</head>
<div class="padder">
<body>
<?php
include("../connection.php");
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
	
	<div class="form-style-10"></div>
	<form action="changepresident1.php" method="POST">
<table align="center" cellpadding="15"><tr><td>
	New Password:</td><td>  <input type="password" name="password" size="20" /><br /> </td></tr>

	<tr><td>Confirm Password:</td><td> <input type="password" name="confirmpassword" size="20" /><br /> </td></tr>

	<tr><td><input type="hidden" name="q" value="' </td></tr>
	
	<?php

	if (isset($_GET["q"])) {

	    echo $_GET["q"];

	}
?>'"><tr><td>
	   <input type="submit" name="ResetPasswordForm" value=" Reset Password " />
	   
	   </td></tr></table>

	</form>

	
	
	<?php



  include('../connection.php');
	

	if (isset($_POST["ResetPasswordForm"]))
	{


	    $password =( $_POST["password"]);

	    $confirmpassword = ($_POST["confirmpassword"]);


	        if ($password == $confirmpassword)

	        {

	           

	                $query = mysqli_query($conn,"UPDATE account SET password ='$password' WHERE username ='$id'");
if($query){
	
	
		echo '<script type="text/javascript">
	alert(" Your password has been successfully reset")</script>';
	
	
}
	                
	            
	        }
	        else{
		echo '<script type="text/javascript">
	alert(" your password does not match")</script>';
	}
	}
	?>

</body>
</div>

</html>