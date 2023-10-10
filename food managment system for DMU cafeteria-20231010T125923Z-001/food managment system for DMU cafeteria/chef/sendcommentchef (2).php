<?php
include("../connection.php");

session_start();
include("header.php");
include("navbar.php");

?>
<html>
<head>
<title>Finance Index </title>
<link rel="Stylesheet" type="text/css" href="../css/stylesheet.css">
<link rel="stylesheet" href="../css/forms.css">
</head>
<style>
    .padder{
        margin-top:200px;
    }
</style>
<div class="padder">
<body>

	
	

<?php


if(isset($_session['counter']))
	$_session['counter']+=1;
	else
	$_session['counter']=1;
?>

<?php

if(isset($_SESSION['user']['username'])&&isset($_SESSION['user']['password'])&&isset($_SESSION['user']['role']))
	{
		$username=$_SESSION['user']['username'];
		$password=$_SESSION['user']['password'];
		$role=$_SESSION['user']['role'];
        $query1=mysqli_query($conn,"select *from user where user_id='$username'");

        while($query2=mysqli_fetch_array($query1)){
        $fname=$query2['fname'];
        $lname=$query2['sname'];
        $phone=$query2['phone'];
        $role=$query2['role'];
        $id=$query2['user_id'];


        }
	
	}
    
    
    
    
    else
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
<center>
<link rel="stylesheet" href="setting.css"/>
</head>
<strong>
    <div class="form-style-10">
<h2> Put your comment here </h2>
   <div class="inner-wrap">

  
<form action="<?php $_PHP_SELF?>" method="POST" name="user" onsubmit="return valdation();">
	
				<label>
                Comment:</label></td><td><textarea name="comment"      style="height: 100px;width: 300px;">
					
				</textarea>
			
		
		
		
	
       <label>TO </label>
        <td></t><select name="reciever" required="">
        <option value="" selected >--select role--</option>
         	<option value="adminster">adminster</option>
	<option value="headcafe">headcafe</option>
	<option value="foodstore">foodstore</option>
	<option value="studentdirectorate">studentdirectorate</option>
	<option value="chef">chef</option>
	<option value="ticker">ticker</option>
	<option value="procter">procter</option>
	<option value="vicepresident">vicepresident</option>
	<option value="registrar">registrar</option>
	<option value="merchant">merchant</option>
	<option value="nurse">nurse</option>
	<option value="studentunion">studentunion</option>
	<option value="college">college</option>
	<option value="finance">finance</option>
	<option value="purchase">purchase</option>
         </select><br /><br />
                
			    
		
		
				<input type="submit"name="submit"value="Send"/>
			
				<input type="reset"name="reset"value="Clear"/>
			
	>
    </div>
</form>
</div>
</strong>
<?php
$tim=date("h:i:sa");
if(isset($_POST['submit']))
{
include('../connection.php');
$model=date("Y/m/d");;
$name=$_POST['comment'];
$reciever=$_POST['reciever'];
$status="comment";
$query1=mysqli_query($conn,"select * from  user WHERE user_id='$username' ");
while($query2=mysqli_fetch_array($query1))
{ 
$img=$query2['photo'];
//$id=$query2['user_id'];
$fname=$query2['fname'];
$lname=$query2['sname'];
$sex=$query2['sex'];
$phone=$query2['phone'];
$job=$query2['role'];
} 

$sql="INSERT INTO feedback(date,fname,sname,phone,role,comment,recieverid,statu) values('$model','$fname','$lname','$phone','$role','$name','$reciever','$status')";
$query=mysqli_query($conn,$sql); 
if($query>0)
	{
	$qa="INSERT INTO userview(date,time,user_id,fname,lname,photo,activity) VALUES('$model','$tim','$id','$fname','$lname','$img','send feadback to .$reciever')";
	$query1=mysqli_query($conn,$qa);
	echo '<script type="text/javascript">
	alert(" your feedback successfully send")</script>';
	}
else{

	

	echo '<script type="text/javascript">
	alert("not successful send,try again!")</script>'.mysqli_error();
}
}



?>


	<?php
 include("../footer.php");
	?>
	
    </center>
</body>
</div>

</html>
