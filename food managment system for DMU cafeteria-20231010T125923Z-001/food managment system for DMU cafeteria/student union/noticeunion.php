<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");


?>
<html>
<head>
<title>food Managment System</title>

<script type = "text/javascript" >
 function preventBack()
 {
 window.history.forward();
 } 
 setTimeout("preventBack()", 0); 
 window.onunload=function(){null};
  </script>
</head>
<style>
    .padder{
        margin-top:100px;

    }
</style>
<body>
    <center>
<div class="padder">
	
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
	
	<form action="" method="post">
	<table border="0" style="height: 450; width: 400px;"  align="center" class="demo-table">
		<th colspan="2" height="60px;" align="center">
			<h2>Add Notice</h2>
		</th>
			<tr>
				<td align="center">
					<input type="button"value="Date"onclick="dat();"/>
				</td>
				<td>
					<input type="text"name="date" value="<?php echo $dat; ?>" readonly="true"/>
				</td>
			</tr>
			<tr>
				<td  align="center">Notice Title:</td>
				<td>
					<input type="text" name="titl" required="" pattern="^[a-zA-Z() ]+"class="demoInputBox">
				</td>
			</tr>
			<tr>
				<td  align="center">Add the notice:</td>
				<td><textarea name="news"     style="height: 100px;width: 200px;">
					
				</textarea></td>
			</tr>
			
			<tr>
			<td ></td>
			<td><input type="submit" name="submit" value="Post notice" class="btnRegister" >
			<input type="reset" name="reset" value="Reset" class="btnRegister">
	
			</td></tr>
		</table>
	</form>
	<?php
	$quantity1=NULL;
	if(isset($_POST['submit']))
	
{
	
	$date=$_POST['date'];
	$title=$_POST['titl'];
	$notice=$_POST['news'];
	$sql0=mysqli_query($conn,"select * FROM notice WHERE title='$title'") OR die(mysqli_error());
	$num=mysqli_num_rows($sql0);
	$rowcheck=mysqli_fetch_assoc($sql0);
	if($num=='0')
	{
	$sql= "INSERT INTO notice(dat,title,new,userid,fname,lname,photo) VALUES('$date','$title','$notice','$id','$fname','$sname','$img')";
	$re=mysqli_query($conn,$sql) or die(mysqli_error());
	
	$qa="INSERT INTO userview(date,time,user_id,fname,lname,photo,activity) VALUES('$date','$tim','$id','$fname','$sname','$img','$fname $sname post notice about $title')";
	$queryt=mysqli_query($conn,$qa) or die(mysqli_error());
	echo '<script type="text/javascript">
	alert(" Notice has benn inserted")</script>';
	}
else
	
	{
		$quantity1=$rowcheck['title'];
		$sum=$quantity1+$quan;
		$id2=$rowcheck['id'];
		$new=$rowcheck['new'];
		$new1=$new+$notice;
		$sql2=mysqli_query($conn,"UPDATE notice set news='$new1' WHERE id=$id2");
	$qa2="INSERT INTO userview(date,time,user_id,fname,lname,photo,activity) VALUES('$date','$tim','$id','$fname','$sname','$img','register additional $quan $scale $inamee')";
		$queryu=mysqli_query($conn,$qa2) or die(mysqli_error());
echo '<script type="text/javascript">
	alert("Notice was post before but it will update ")</script>'.mysql_error();
	}
	
	}
	
	?>	
		
		
        </div>
        </center>
</body>
</html>