
<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");

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
    $uid=$query2['user_id'];
    $fname=$query2['fname'];
    $lname=$query2['sname'];
    $phone=$query2['phone'];
    }
    
    }?>
<html>
<head>
<title>veiwfeedbacks</title>
<link rel="Stylesheet" type="text/css" href="../css/stylesheet.css">
<link rel="stylesheet" href="../css/forms.css">
<center>
    <style>
    .padder{
        margin-top:200px;
        margin-bottom:200px;
    }
</style>
</head>
<div class="padder">


<?php

include ("../connection.php");
if(isset($_session['counter']))
	$_session['counter']+=1;
	else
	$_session['counter']=1;
?>

<?php

if(isset($_SESSION['username'])&&isset($_SESSION['password'])&&isset($_SESSION['role']))
	{
		$username=$_SESSION['username'];
		$password=$_SESSION['password'];
		$role=$_SESSION['role'];
	
	}else
	{
	?>
	<?php
	}
	?>

<html>
<head>
<script>
	function valdation(){
		
				
		if(user.comment.value==""){
			alert("comment is not empty");
			user.comment.focus();
			return false;
		}
		b=/[a-zA-Z]/;
		if(!b.test(user.comment.value)){
			alert("comment is not empty and only allowd latters ");
			user.comment.focus();
			return false;
		}
		if(user.date.value==""){
			alert("date not empty");
			user.date.focus();
			return false;
			
		}
		c=/[0-9]/;
		if(!c.test(user.date.value)){
			alert("date must be number");
			user.date.focus();
			return false;
		}
	}
</script>

<link rel="stylesheet" href="setting.css"/>
</head>

<h2> Replay the comment  </h2>

<form action="<?php $_PHP_SELF?>" method="POST" name="user" onsubmit="return valdation();">
	<table border="0"cellspacing="2"cellpadding="2"height="300" align="center">
		
		
		<tr>
			<td>
			replay&nbsp;&nbsp;	Comment:</td><td><textarea name="comment"      style="height: 350px;width: 750px;">
					
				</textarea></td>
			
		</tr>
		
		<tr>
			<td></td>
				<td>
                    <div class="button-section">
				<input type="submit"name="submit"value="Send"/>
			&nbsp; &nbsp;	<input type="reset"name="reset"value="Clear"/>
            </div>
			</td>
		</tr>
	</table>
</form>


<?php

 $reciever =$_REQUEST['id'];
if(isset($_POST['submit']))
{

   
    $i=0;
$query2=mysqli_query($conn,"select * from feedback WHERE recieverid='$role' and statu='comment'");
$w2=mysqli_num_rows($query2);
if($w2){
?>
&nbsp;<img src="../images/111.png" height="15" width="15" align="top" align="right"/>
<?php	
}
while($row=mysqli_fetch_array($query2)){
$i--;	
}if($i){
  echo $i;
}

include('../connection.php');
$model=date("Y/m/d");;
$name=$_POST['comment'];
$status="replay";
$query1=mysqli_query($conn,"select * from user WHERE user_id='$username' ");
while($query2=mysqli_fetch_array($query1))
{ 
$id=$query2['user_id'];
$fname=$query2['fname'];
$lname=$query2['sname'];
$phone=$query2['phone'];
} 
$sql="INSERT INTO feedback(date,fname,sname,phone,role,comment,recieverid,statu) values('$model','$fname','$lname','$phone','$role','$name','$reciever','$status')";
$query=mysqli_query($conn,$sql); 
$update=mysqli_query($conn,"update feedback set statu='seen' where recieverid='$name'");
if($query>0)
	
	echo '<script type="text/javascript">
	alert(" your feedback successfully send")</script>';
else
	

	echo '<script type="text/javascript">
	alert("not successful send,try again!")</script>'.mysqli_error();
}
?>


	<?php
 include("../footer.php");
?>


</body>
</div>
</center>

</html>






