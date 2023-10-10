
<?php
include("../connection.php");
session_start();

if(empty($_SESSION['user'])){
    header('location:../index.php');
   }
   include("header.php");
   include("navbar.php");
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update user profile</title>
    <link rel="stylesheet" href="../css/forms.css">
</head>
<body>
<?php $date=date("Y/m/d"); ?>
    <?php
if(isset($_SESSION['user']['username'])){
    $username=$_SESSION['user']['username'];
    $query1= mysqli_query($conn,"select *from user where user_id='$username'");
    while($query2=mysqli_fetch_array($query1)){
        $id=$query2['user_id'];
    }

 if(isset( $_REQUEST['update'])){
    $uid=$_REQUEST['user_id'];
    $fn=$_REQUEST['fname'];
    $sn=$_REQUEST['sname'];
    $role=$_REQUEST['role'];
    $stat=$_REQUEST['status'];
    $result=mysqli_query($conn,"update account,user set user.fname='$fn', user.sname='$sn',user.role='$role',account.status='$stat'where user.user_id='$uid' and account.username='$uid'");
    if($result){
        $qa= mysqli_query($conn,"insert into userview(date,user_id,activity) VALUES('$date','$id','update user')");
        echo '<script type="text/javascript">
	alert(" succesfully updated")</script>';
    }
    else
	
{
	
echo '<script type="text/javascript">
	alert("try again!")</script>'.mysqli_error();	
}
    
 }
  $userid=$_REQUEST['user_id'];
	$result=mysqli_query($conn,"select * from user,account where user.user_id='$userid'and account.username='$userid' ");  
	$row=mysqli_fetch_array($result);
    ?>
    <div class="form-style-10">
   <h2>update users status</h2>
    <form action="" method="">
    <div class="inner-wrap">
	<table align="center" height="400px" width="400px">
   <label> User Id:</label><input type="text" name="user_id" value="<?php echo $row['user_id'];?>" readonly>
	<label>First Name:</label>
	
	<input type="text" name="fname" value="<?php echo $row['fname'];?>">
	<label>Second Name</label>
	<input type="text" name="sname" value="<?php echo $row['sname'];?>">
	<label>User name:</label><input type="text" name="user_id" value="<?php echo $row['user_id'];?>">
	<label>Role:</label>
	
	<select name="role" style="width: 160px;">
    <?php
	
	if($row['role']=="admin"){
        ?>
        <option value="admin" selected="admin">admin</option>
	<option value="chef" >chef</option>
	<option value="foodstore">foodstore</option>
	<option value="studdir">student directorate</option>
	<option value="nurse">nurse</option>
	<option value="headcafe">headcafe</option>
	<option value="studentunion">student union</option>
	<option value="purchase">purchase</option>
	<option value="enterprise">enterprise</option>
	<option value="merchant">merchant</option>
	<option value="president">president</option>
	<option value="vicepresident">vicepresident</option>
	<option value="registrar">registrar</option>
	<option value="procter">procter</option>
	<option value="college">college</option>
	<option value="ticker">ticker</option>
	<option value="finance">finance</option>
    <?php
	}else if($row['role']=="chef"){ 
	?>
    <option value="admin">adminster</option>
	<option value="chef" selected="chef">chef</option>
	<option value="foodstore">foodstore</option>
	<option value="studdir">student directorate</option>
	<option value="nurse">nurse</option>
	<option value="headcafe">headcafe</option>
	<option value="studentunion">student union</option>
	<option value="purchase">purchase</option>
	<option value="enterprise">enterprise</option>
	<option value="merchant">merchant</option>
	<option value="president">president</option>
	<option value="vicepresident">vicepresident</option>
	<option value="registrar">registrar</option>
	<option value="procter">procter</option>
	<option value="college">college</option>
	<option value="ticker">ticker</option>
	<option value="finance">finance</option>
    
	<?php
	}else if($row['role']=="foodstore"){
	?>
	<option value="admin">adminster</option>
	<option value="chef" >chef</option>
	<option value="foodstore" selected="foodstore">foodstore</option>
	<option value="studdir">student directorate</option>
	<option value="nurse">nurse</option>
	<option value="headcafe">headcafe</option>
	<option value="studentunion">student union</option>
	<option value="purchase">purchase</option>
	<option value="enterprise">enterprise</option>
	<option value="merchant">merchant</option>
	<option value="president">president</option>
	<option value="vicepresident">vicepresident</option>
	<option value="registrar">registrar</option>
	<option value="procter">procter</option>
	<option value="college">college</option>
	<option value="ticker">ticker</option>
	<option value="finance">finance</option>
	<?php
	}
	else if($row['role']=="headcafe")
	{
	?>
	<option value="admin">adminster</option>
	<option value="chef" >chef</option>
	<option value="foodstore" >foodstore</option>
	<option value="studdir">student directorate</option>
	<option value="nurse">nurse</option>
	<option value="headcafe" selected="headcafe">headcafe</option>
	<option value="studentunion">student union</option>
	<option value="purchase">purchase</option>
	<option value="enterprise">enterprise</option>
	<option value="merchant">merchant</option>
	<option value="president">president</option>
	<option value="vicepresident">vicepresident</option>
	<option value="registrar">registrar</option>
	<option value="procter">procter</option>
	<option value="college">college</option>
	<option value="ticker">ticker</option>
	<option value="finance">finance</option>
	<?php
	}else if($row['role']=="registrar"){
	?>
	<option value="admin">adminster</option>
	<option value="chef" >chef</option>
	<option value="foodstore" >foodstore</option>
	<option value="studdir">student directorate</option>
	<option value="nurse">nurse</option>
	<option value="headcafe">headcafe</option>
	<option value="studentunion">student union</option>
	<option value="purchase">purchase</option>
	<option value="enterprise">enterprise</option>
	<option value="merchant">merchant</option>
	<option value="president">president</option>
	<option value="vicepresident">vicepresident</option>
	<option value="registrar" selected="registrar">registrar</option>
	<option value="procter">procter</option>
	<option value="college">college</option>
	<option value="ticker">ticker</option>
	<option value="finance">finance</option>
	<?php
	}else if($row['role']=="procter"){
	?>
	<option value="admin">adminster</option>
	<option value="chef" >chef</option>
	<option value="foodstore" >foodstore</option>
	<option value="studdir">student directorate</option>
	<option value="nurse">nurse</option>
	<option value="headcafe">headcafe</option>
	<option value="studentunion">student union</option>
	<option value="purchase">purchase</option>
	<option value="enterprise">enterprise</option>
	<option value="merchant">merchant</option>
	<option value="president">president</option>
	<option value="vicepresident">vicepresident</option>
	<option value="registrar">registrar</option>
	<option value="procter" selected="procter">procter</option>
	<option value="college">college</option>
	<option value="ticker">ticker</option>
	<option value="finance">finance</option>
	<?php
	}else if($row['role']=="president"){
	?>
	<option value="admin">adminster</option>
	<option value="chef" >chef</option>
	<option value="foodstore" >foodstore</option>
	<option value="studdir">student directorate</option>
	<option value="nurse">nurse</option>
	<option value="headcafe">headcafe</option>
	<option value="studentunion">student union</option>
	<option value="purchase">purchase</option>
	<option value="enterprise">enterprise</option>
	<option value="merchant">merchant</option>
	<option value="president" selected="president">president</option>
	<option value="vicepresident">vicepresident</option>
	<option value="registrar">registrar</option>
	<option value="procter">procter</option>
	<option value="college">college</option>
	<option value="ticker">ticker</option>
	<option value="finance">finance</option>
	<?php
	}else if($row['role']=="vicepresident"){
	?>
	<option value="admin">adminster</option>
	<option value="chef" >chef</option>
	<option value="foodstore">foodstore</option>
	<option value="studdir">student directorate</option>
	<option value="nurse">nurse</option>
	<option value="headcafe">headcafe</option>
	<option value="studentunion">student union</option>
	<option value="purchase">purchase</option>
	<option value="enterprise">enterprise</option>
	<option value="merchant">merchant</option>
	<option value="president">president</option>
	<option value="vicepresident" selected="vicepresident">vicepresident</option>
	<option value="registrar">registrar</option>
	<option value="procter">procter</option>
	<option value="college">college</option>
	<option value="ticker">ticker</option>
	<option value="finance">finance</option>
	<?php
	}
	else if($row['role']=="studentdirectorate")
	{
	?>
	<option value="admin">adminster</option>
	<option value="chef" >chef</option>
	<option value="foodstore">foodstore</option>
	<option value="studentdirectorate" selected="studentdirectorate">student directorate</option>
	<option value="nurse">nurse</option>
	<option value="headcafe">headcafe</option>
	<option value="studentunion">student union</option>
	<option value="purchase">purchase</option>
	<option value="enterprise">enterprise</option>
	<option value="merchant">merchant</option>
	<option value="president">president</option>
	<option value="vicepresident">vicepresident</option>
	<option value="registrar">registrar</option>
	<option value="procter">procter</option>
	<option value="college">college</option>
	<option value="ticker">ticker</option>
	<option value="finance">finance</option>
	<?php
	}else if($row['role']=="studentunion"){
	?>
	<option value="admin">adminster</option>
	<option value="chef" >chef</option>
	<option value="foodstore">foodstore</option>
	<option value="studdir">student directorate</option>
	<option value="nurse">nurse</option>
	<option value="headcafe">headcafe</option>
	<option value="studentunion">student union</option>
	<option value="purchase">purchase</option>
	<option value="enterprise">enterprise</option>
	<option value="merchant">merchant</option>
	<option value="president">president</option>
	<option value="vicepresident">vicepresident</option>
	<option value="registrar">registrar</option>
	<option value="procter">procter</option>
	<option value="college">college</option>
	<option value="ticker">ticker</option>
	<option value="finance">finance</option>
	<?php
	}else if($row['role']=="purchase"){
	?>
	<option value="admin">adminster</option>
	<option value="chef" >chef</option>
	<option value="foodstore">foodstore</option>
	<option value="studdir">student directorate</option>
	<option value="nurse">nurse</option>
	<option value="headcafe">headcafe</option>
	<option value="studentunion">student union</option>
	<option value="purchase">purchase</option>
	<option value="enterprise">enterprise</option>
	<option value="merchant">merchant</option>
	<option value="president">president</option>
	<option value="vicepresident">vicepresident</option>
	<option value="registrar">registrar</option>
	<option value="procter">procter</option>
	<option value="college">college</option>
	<option value="ticker">ticker</option>
	<option value="finance">finance</option>
	<?php
	}else if($row['role']=="nurse"){
	?>
	<option value="admin">adminster</option>
	<option value="chef" >chef</option>
	<option value="foodstore">foodstore</option>
	<option value="studdir">student directorate</option>
	<option value="nurse"selected="nurse">nurse</option>
	<option value="headcafe">headcafe</option>
	<option value="studentunion">student union</option>
	<option value="purchase">purchase</option>
	<option value="enterprise">enterprise</option>
	<option value="merchant">merchant</option>
	<option value="president">president</option>
	<option value="vicepresident">vicepresident</option>
	<option value="registrar">registrar</option>
	<option value="procter">procter</option>
	<option value="college">college</option>
	<option value="ticker">ticker</option>
	<option value="finance">finance</option>
	<?php
	}else if($row['role']=="college")
	{
	?>
	<option value="admin">adminster</option>
	<option value="chef" >chef</option>
	<option value="foodstore">foodstore</option>
	<option value="studdir">student directorate</option>
	<option value="nurse">nurse</option>
	<option value="headcafe">headcafe</option>
	<option value="studentunion">student union</option>
	<option value="purchase">purchase</option>
	<option value="enterprise">enterprise</option>
	<option value="merchant">merchant</option>
	<option value="president">president</option>
	<option value="vicepresident">vicepresident</option>
	<option value="registrar">registrar</option>
	<option value="procter">procter</option>
	<option value="college">college</option>
	<option value="ticker">ticker</option>
	<option value="finance">finance</option>
	<?php
	}else if($row['role']=="finance")
	{
	?>
	<option value="admin">adminster</option>
	<option value="chef" >chef</option>
	<option value="foodstore" >foodstore</option>
	<option value="studdir">student directorate</option>
	<option value="nurse">nurse</option>
	<option value="headcafe">headcafe</option>
	<option value="studentunion">student union</option>
	<option value="purchase">purchase</option>
	<option value="enterprise">enterprise</option>
	<option value="merchant">merchant</option>
	<option value="president">president</option>
	<option value="vicepresident">vicepresident</option>
	<option value="registrar">registrar</option>
	<option value="procter">procter</option>
	<option value="college">college</option>
	<option value="ticker">ticker</option>
	<option value="finance">finance</option>
	<?php
	}else if($row['role']=="ticker")
	{
	?>
	<option value="admin">adminster</option>
	<option value="chef" >chef</option>
	<option value="foodstore">foodstore</option>
	<option value="studdir">student directorate</option>
	<option value="nurse">nurse</option>
	<option value="headcafe">headcafe</option>
	<option value="studentunion">student union</option>
	<option value="purchase">purchase</option>
	<option value="enterprise">enterprise</option>
	<option value="merchant">merchant</option>
	<option value="president">president</option>
	<option value="vicepresident">vicepresident</option>
	<option value="registrar">registrar</option>
	<option value="procter">procter</option>
	<option value="college">college</option>
	<option value="ticker">ticker</option>
	<option value="finance">finance</option>
	<?php
	}else if($row['role']=="enterprise"){
	?>
	<option value="admin">adminster</option>
	<option value="chef" >chef</option>
	<option value="foodstore">foodstore</option>
	<option value="studdir">student directorate</option>
	<option value="nurse">nurse</option>
	<option value="headcafe">headcafe</option>
	<option value="studentunion">student union</option>
	<option value="purchase">purchase</option>
	<option value="enterprise">enterprise</option>
	<option value="merchant">merchant</option>
	<option value="president">president</option>
	<option value="vicepresident">vicepresident</option>
	<option value="registrar">registrar</option>
	<option value="procter">procter</option>
	<option value="college">college</option>
	<option value="ticker">ticker</option>
	<option value="finance">finance</option>
	<?php
	}else if($row['role']=="merchant"){
	?>
	<option value="admin">adminster</option>
	<option value="chef" >chef</option>
	<option value="foodstore">foodstore</option>
	<option value="studdir">student directorate</option>
	<option value="nurse">nurse</option>
	<option value="headcafe">headcafe</option>
	<option value="studentunion">student union</option>
	<option value="purchase">purchase</option>
	<option value="enterprise">enterprise</option>
	<option value="merchant">merchant</option>
	<option value="president">president</option>
	<option value="vicepresident">vicepresident</option>
	<option value="registrar">registrar</option>
	<option value="procter">procter</option>
	<option value="college">college</option>
	<option value="ticker">ticker</option>
	<option value="finance">finance</option>
	<?php
	}
	?>
	</select></td></tr>
	<label>Status:</label>
	<select name="status" style="width: 160px;">
	<?php
	if($row['status']=="1")
	{
	?>
	<option value="1" selected>Active</option><option value="0">Blocked</option>
	<?php
	}else if($row['status']=="0"){
	?>
	<option value="1">Active</option><option value="0" selected>Blocked</option>
	<?php
	}
	?>
	</select></td></tr>
	<tr><td></td><td><input type="submit" value="Update" name="update"></table></div></form>
	<?php
	
}else
    {
    	header("location:index.php");
     }
	 

?>
</body>
</html>