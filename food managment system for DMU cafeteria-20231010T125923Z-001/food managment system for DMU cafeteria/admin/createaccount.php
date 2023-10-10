<?php
include("../connection.php");
session_start();
//ob_start();
if(empty($_SESSION['user'])){
    header('location:../index.php');
   }


?>
<?php
$data=date("d/m/y");
?>

<?php
$fetchuser_id=mysqli_query($conn,"select *from user");
if($fetchuser_id){
    $rowfetch=mysqli_fetch_array($fetchuser_id);
    $user_id=$row_fetch=['user_id'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>food managment for dmu</title>
    <link rel="stylesheet" href="../css/forms.css">
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <script type = "text/javascript" >
 function preventBack()
 {
 window.history.forward();
 } 
 setTimeout("preventBack()", 0); 
 window.onunload=function(){null};
  </script>
</head>
<?php $date=date("Y/m/d"); ?>
<?php include("header.php");
include("navbar.php");?>
<body>
    
<?php
    
     if(isset($_POST['submit'])){
        





         //if(isset($_SESSION['username'])&&isset($_SESSION['password'])&&isset($_SESSION['role']))
         //{
             $username=$_POST['user_id'];
            // $password=$_SESSION['password'];
             //$role=$_SESSION['role'];
             
             $query1=mysqli_query($conn,"select * from user WHERE user_id='$username'");
             $count=mysqli_num_rows($query1);
             if($count>0){
                echo'<script>alert("you choose existing username")</script>';
             }
             else{
             while($query2=mysqli_fetch_array($query1))
             { 
     $id=$query2['user_id'];
     $name=$query2['fname'];
     $lname=$query2['sname'];
     $img=$query2['photo'];
     }
     
    
         
     $sql= mysqli_query($conn,"insert into user(user_id,fname,sname,position,age,sex,phone,photo,role,date) VALUES('$_POST[user_id]','$_POST[fname]','$_POST[sname]','$_POST[position]','$_POST[age]','$_POST[sex]','$_POST[phone]','$_POST[photo]','$_POST[role]','$_POST[date]')");
         echo $_SESSION['username1']= $_POST['user_id'];
         echo '<script type="text/javascript">
         alert(" succesfully registered")</script>';
         echo $_SESSION['username1']=$_POST['user_id'];
         header("location:account.php");
             
         if($sql>0)
         {
         $qa="$conn,INSERT INTO userview(date,user_id,fname,lname,photo,activity) VALUES('$date','$id','$name','$lname','$img','register new user')";
         $query1=mysqli_query($qa);
         echo '<script type="text/javascript">
         alert(" sucessfully registered")</script>';
         }
     else
         
     {
         
     echo '<script type="text/javascript">
         alert("try again!")</script>'.mysqli_error();	
     }
     }} //}
    
   ?>
  
	   <div class="form-style-10">
	   <h2> account creation  for users</h2>
    <form method="POST"action="">
		<div class="inner-wrap">
    
     
    <label><input type="button"value="Date"onclick="date();"/><input type="text"name="date"readonly="" value="<?php echo $date; ?>"/></label>
    <label >  userName: <input type="text" name="user_id"required></label>
      <label></label> first name: <input type="text"name="fname"required=""pattern="^[a-zA-Z ]+"></label>
       <tr><td align="right">  lastname: <input type="text"name="sname"pattern="^[a-zA-Z ]+"required=""></td></tr>
      <tr><td align="right" ><label>Position:<select name="position">
	<option value="phd">phd</option>
	<option value="master">master</option>
	<option value="degree">degree</option>
	<option value="deploma">deploma</option>
	<option value="certeficate">certeficate</option>
	<option value="student">student</option>
</select></label></td></tr>
<label>Sex: <input type="radio" name="sex" size="40" value="male"/> Male &nbsp;
<input type="radio" name="sex" size="40" value="female"/>  Female</td></tr></label>
<label >Phone:<input type="text" name="phone" required=""></label>
<label>Age:<input type="text" name="age" required=""></label>
<label>Photo:<input type="file" name="photo" ></label>
<label>Role:<select name="role">
	<option value="admin">adminster</option>
	<option value="headcafe">headcafe</option>
	<option value="foodstore">foodstore</option>
	<option value="studentdirectorate">studentdirectorate</option>
	<option value="chef">chef</option>
	<option value="tickerhead">tickerhead</option>
	<option value="proctor">proctor</option>
	<option value="president">president</option>
	<option value="vicepresident">vicepresident</option>
	<option value="registrar">registrar</option>
	<option value="merchant">merchant</option>
	<option value="enterprise">enterprise</option>
	<option value="nurse">nurse</option>
	<option value="studentunion">studentunion</option>
	<option value="departmenthead">Head</option>
	<option value="finance">finance</option>
	<option value="purchase">purchase</option>
	</select></label>
	</div>

           <div class="button-section">
       
       <tr><td align="right" > <input type="submit"value="CREATE"name="submit">
        <input type="reset"value="RESET"name="reset"></td></tr>
		</div>
        
</table>
    </form>
	
	</div>
    </center>
     
    <?php 
    include("../footer.php");
    ?>
</body>
</html>