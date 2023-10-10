<?php
include("connection.php");
session_start();
include("header.php");
include("navbar.php");

?>
<html>
<head>
<title>send feadback </title>
<link rel="Stylesheet" type="text/css" href="stylesheet.css">
<link rel="Stylesheet" type="text/css" href="css/forms.css">
</head>
<body>


<html>
<head>


<script>
	function valdation(){
		if(user.email.value==""){
			alert("email is not empty");
			user.email.focus();
			return false;
		}
		a=/([\w\-]+\@[\w\-]+\.[\w\-gmail.comyahoo]+)/;
		if(!a.test(user.email.value)){
			alert("invalid email format");
			user.email.focus();
			return false;
		}
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
		
	}
</script>
</head>
<body >
<div class="form-style-10">
<h2>Put your comment appropretely</h2>
<form action="<?php $_PHP_SELF?>" method="POST" name="user" onsubmit="return valdation();" >
	 <div class="inner-wrap">
		<label>Email:<input type="email" name="email" required=""/></label>
				
		<label>Comment:<textarea name="comment"required=""></textarea></label>
		<label>TO<select name="role" required="">
        <option value="" selected >--select role--</option>
         	<option value="admin">admins</option>
	<option value="headcafe">headcafe</option>
	<option value="foodstore">foodstore</option>
	<option value="studentdirectorate">studentdirectorate</option>
	<option value="chef">chef</option>
	<option value="ticherhead">ticker</option>
	<option value="procter">procter</option>
	<option value="admipresidentnster">president</option>
	<option value="vicepresident">vicepresident</option>
	<option value="registrar">registrar</option>
	<option value="merchant">merchant</option>
	<option value="enterprise">enterprise</option>
	<option value="nurse">nurse</option>
	<option value="studentunion">studentunion</option>
	<option value="departmenthead">departmenthead</option>
	<option value="finance">finance</option>
	<option value="purchase">purchase</option>
         </select></label>
        </div>
   			 <div class="button-section">
				<input type="submit"name="submit"value="Send "/>
			
				<input type="reset"name="reset"value="Clear"/>
			</div>
</form>
</div>
</body>
<?php
if(isset($_POST['submit']))
{


$role=$_POST['role'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$status="comment";

$sql="INSERT INTO feedback(date,fname,recieverid,comment,statu) values(NOW(),'$email','$role','$comment','$status')";
$query=mysqli_query($conn,$sql); 
if($query>0)
	
	echo '<script type="text/javascript">
	alert(" your feedback successfully send")</script>';
else
	

	echo '<script type="text/javascript">
	alert("not successful send,try again!")</script>'.mysqli_error();
}
?>
 </div>
 
	<?php
 include("footer.php");
	?>

</body>
</html>
