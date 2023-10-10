<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php")
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fillforms.css">
    <title>Document</title>
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
	$dat=date("Y/m/d");
	$tim=date("H:h:i:sa"); 
	?>
    <?php
	if(isset($_SESSION['user']['username'])&&isset($_SESSION['user']['password'])&&isset($_SESSION['user']['role']))
	
	{
		$username=$_SESSION['username'];
		$password=$_SESSION['password'];
		$role=$_SESSION['role'];
		
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
    <div class="form-style-10">
	<h3>post notice</i></h3>
	
	<form action="" method="POST">
	<div class="inner-wrap">
    <input type="button"value="Date"onclick="dat();"/>
    <input type="text"name="date" value="<?php echo $dat; ?>" readonly="true"  style="width: 200"/> <br>
        <label>Notice Title:</label>
        <input type="text" name="titl" required="" pattern="^[a-zA-Z() ]+"class="demoInputBox"  style="width: 200"><br>
        <label >Add the notice:</label>
        <textarea name="news"style="height: 300px;width: 350px;">	
				</textarea><br>
                <input type="submit" name="submit" value="Post notice" class="btnRegister" > &nbsp;  &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
			<input type="reset" name="reset" value="Reset" class="btnRegister">
</form>

</body>
</html>