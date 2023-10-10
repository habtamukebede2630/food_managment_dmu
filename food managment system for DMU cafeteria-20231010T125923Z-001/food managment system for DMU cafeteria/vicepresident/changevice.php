<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .padder{
        margin-top:200px;
    }
</style>
<div class="padder">
    <center>
<body>
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




$sql="SELECT * FROM account WHERE username='$username'";
$result=mysqli_query($conn,$sql);

?>

<form name="form1" method="post" action="">

<table  border="0" cellspacing="5" cellpadding="5" align="center" style="text-shadow: right">


<?php


while($rows=mysqli_fetch_array($result)){
  $user=$rows['username']; 
 $pass=$rows['password']; 
?>

<tr>
<td align="center"><strong>Enter the current password</strong></td>
<td align="center">
<input name="lastname" type="password" id="main" >
</td>
</tr>
<tr>
<td colspan="4" align="center"><input type="submit" name="Submit" value="submit" ></td>
</tr>

<?php

}
?>

<tr>

</tr>
</table>

</form>


<?php

?>
<?php

// Check if button name "Submit" is active, do this
if(isset($_POST['Submit'])){
	$fname=($_POST['lastname']);
	if($pass==$fname){
		?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="changevice1.php?aid='<?php $user ?>'" style='text-decoration:none;border=3; align=center'>
			<input id=button1 type='reset' value='continue' name=reset></a>
			<?php
	}
	
else{
		echo '<script type="text/javascript">
	alert(" current password is not correct")</script>';
	}
}
?>
</body>
</center>
</div>
</html>