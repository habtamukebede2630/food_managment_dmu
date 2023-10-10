<?php
session_start();
ob_start();
include("../connection.php");
if(isset($_SESSION['counter'])){
	$_SESSION['counter']+=1;
}
	else
	$_SESSION['counter']=1;{
	}
    if(empty($_SESSION['user'])){
        header('location:../index.php');
       }
    
?>
<html>
<head>
<title>createaccount</title>
<link rel="Stylesheet" type="text/css" href="setting.css">

</head>
<body>
<center>
<div id="container">
<table><tr><td>
<?php
include("header.php");
include("navbar.php");

?>
</td></tr></table>

	<div id="content">
	<table border="0" width="" height="400"><tr>
	<td width="100" height="50">
	
	</td>
	<td width="500" height="50">
	<div id="Center">
	<?php
if(isset($_POST['submit']))
{
	$id=$_SESSION['username1'];
	$pass=$_POST['password'];
	$pass1=$_POST['password1'];
	
	if($pass==$pass1){
		
	$pass=md5($pass);
	$account=mysqli_query($conn,"select * from account where username='$id'");
	$rq=mysqli_num_rows($account);
	if($rq=='0')
	{
	$query=mysqli_query($conn,"insert into account(username,password,status) VALUES('$id','$pass','1')");
	

	
		echo '<script type="text/javascript">
	alert(" seccesfully registered")</script>';
		
		}
		
	else {
		echo '<script type="text/javascript">
	alert(" the username is used by other user")</script>';
		header('Location:account.php');
		}
		}
		else{
			echo '<script type="text/javascript">
	alert(" your password doesnt match try again!")</script>';
			
			}}
		

	?>
 <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>
<link rel="stylesheet" href="../css/forms.css">

<div class="form-style-10">
<h2>Set Account Password</h2>
<form action="" method="post">
        <div class="inner-wrap">
        <label> Password:<input type="password" name="password"  minlength="6"id="psd" required=""></label>
       <label>Confirm:<input type="password" name="password1" minlength="6" id="psd" required=""></label>
</div>
    <div class="button-section">
<label><input type="submit"  name="submit" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset"><label></label></label>
 </div>
 </form>
</div>
</center>
	<?php
 include("../footer.php");
?>
</td></tr></table>
</div>

</body>
</html>
