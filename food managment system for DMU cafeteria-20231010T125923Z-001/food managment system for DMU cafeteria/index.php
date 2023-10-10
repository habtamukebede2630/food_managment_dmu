<?php
session_start();
include("connection.php");
//Getting Input value
 $query=mysqli_query($conn,"select *from account");
 if($query){
   $row=mysqli_fetch_array($query);
 $status=$row['status'];

 }
 else{
  echo'<script type="text/javascript"> alert("not")</script>';
 }
 
if(isset($_POST['login'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  $password=md5($password);
  if(empty($username)&&empty($password)){
    $error= 'Fileds are Mandatory';
    }
    
    else{
     
   //Checking Login Detail
   $result=mysqli_query($conn,"SELECT account.* ,role from account left join  user on account.username=user.user_id WHERE username='$username' AND password='$password'");
   $row=mysqli_fetch_assoc($result);
   $count=mysqli_num_rows($result);
   if($count==1){
        $_SESSION['user']=array(
     'username'=>$row['username'],
     'password'=>$row['password'],
     'status'=>$row['status'],
     'role'=>$row['role']);
     $status=$_SESSION['user']['status'];
     $role=$_SESSION['user']['role'];
    
  
     //Redirecting User Based on Role
     ob_start();  

//Get the ipconfig details using system commond  
system('ipconfig /all');  

// Capture the output into a variable  
$mycomsys=ob_get_contents();  

// Clean (erase) the output buffer  
ob_clean();  

$find_mac = "Physical"; 
//find the "Physical" & Find the position of Physical text  

$pmac = strpos($mycomsys, $find_mac);  
// Get Physical Address  

$macaddress=substr($mycomsys,($pmac+36),17); 
$ipaddress=$macaddress; 
     if($role=='admin'&& $status!=0){
      mysqli_query($conn,"INSERT INTO logfile (username,password,action,date,user,ipadd,status)VALUES('$username','$password', 'Login', NOW(),'$role','$ipaddress','correct login')")or die(mysqli_error());
       header('location:admin/adminhome.php');
     }
     elseif($role=='headcafe'&& $status!=0){
      mysqli_query($conn,"INSERT INTO logfile (username,password,action,date,user,ipadd,status)VALUES('$username','$password', 'Login', NOW(),'$role','$ipaddress','correct login')")or die(mysqli_error());

      header('location:headcafe/headcafehome.php');
     }
     elseif($role=='registrar'&& $status!=0){
      mysqli_query($conn,"INSERT INTO logfile (username,password,action,date,user,ipadd,status)VALUES('$username','$password', 'Login', NOW(),'$role','$ipaddress','correct login')")or die(mysqli_error());

      header('location:registrar/registrarhome.php');
     }
     elseif($role=='foodstore'&& $status!=0){
      mysqli_query($conn,"INSERT INTO logfile (username,password,action,date,user,ipadd,status)VALUES('$username','$password', 'Login', NOW(),'$role','$ipaddress','correct login')")or die(mysqli_error());

      header('location:storemanager/storemanagerhome.php');
     }
     elseif($role=='studentdirectorate'&& $status!=0){
      mysqli_query($conn,"INSERT INTO logfile (username,password,action,date,user,ipadd,status)VALUES('$username','$password', 'Login', NOW(),'$role','$ipaddress','correct login')")or die(mysqli_error());

      header('location:directorate/studentdirectoratehome.php');
     }
     elseif($role=='studentunion'&& $status!=0){
     // mysqli_query($conn,"INSERT INTO logfile (username,password,action,date,user,ipadd,status)VALUES('$username','$password', 'Login', NOW(),'$role','$ipaddress','correct login')")or die(mysqli_error());

      header('location:student union/studentunionhome.php');
     }
     elseif($role=='nurse'&& $status!=0){
      //mysqli_query($conn,"INSERT INTO logfile (username,password,action,date,user,ipadd,status)VALUES('$username','$password', 'Login', NOW(),'$role','$ipaddress','correct login')")or die(mysqli_error());

      header('location: nurse/nursehome.php');
     }
     elseif($role=='proctor'&& $status!=0){
      //mysqli_query($conn,"INSERT INTO logfile (username,password,action,date,user,ipadd,status)VALUES('$username','$password', 'Login', NOW(),'$role','$ipaddress','correct login')")or die(mysqli_error());

      header('location: proctor/proctorhome.php');

     }
     elseif($role=='finance'&& $status!=0){
       header('location:finance/financehome.php');
     }
     elseif($role=='merchant'&& $status!=0){
      header('location:merchant/merchanthome.php');
    }
    elseif($role=='chef'&& $status!=0){
      header('location:chef/chefhome.php');
    }
    elseif($role=='president'&& $status!=0){
      header('location:president/presidenthome.php');
    }
    elseif($role=='vicepresident'&& $status!=0){
      header('location:vicepresident/vicepresidenthome.php');
    }
    elseif($role=='tickerhead'&& $status!=0){
      header('location:tickerhead/tickerheadhome.php');
    }
    elseif($role=='purchase'&& $status!=0){
      header('location:purchase/purchasehome.php');
    }
    elseif($role=='departmenthead'&& $status!=0){
      header('location:departmenthead/headhome.php');
    }
    elseif($role=='enterprise'&& $status!=0){
      header('location:enterprise/enterprisehome.php');
    }
     elseif($status=='0'){
      echo'<script type="text/javascript"> alert("blocked account contact the admin")</script>';
    }
 }

  else{
    echo'<script type="text/javascript"> alert("incorrect username or password")</script>';
   }
  
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>food managment</title>
    <link rel="stylesheet" href="stylesheet.css">
  
</head>
<body>
       <?php
       include("header.php");
       include("navbar.php");
      
       ?>
        <!-- body2 section  -->

        <div class="body2-body3-container">
            <!-- body3 section  -->
           
            <div class="info-container">
           
                    <h4> Wellcome to Debremarkos university <br> food managment official website. </h4>
                    <P id="p1_id">
                        Objectives of the system include  <br> <br>
                        1) Students can view notice fastly <br> 2 )Information can exchange fastly and securly <br>
                        2) the system will take you to your <br> page according to your role <br>
                        3) Wastage of food will reduced as much as the system posibble <br>
                    </P>
                   
                   
            </div>
            <div class="body3 ">
                    <form action="#" method="POST" class="form">
                        <H1 class="title">LOGIN</H1>
                        <!-- <label for="username"> Username </label>  <br> -->
                        <input type="text" placeholder="username" name="username"required=""><br>
                        <!-- <label for="password"> password </label>  <br> -->
                        <input type="password"placeholder="password" name="password"required=""><br>
                        <input type="submit"value="login"class="btn_home" name="login">
                        <input type="reset"value="clear" class="btn_home"> 
                </form>
            </div>
    
</body>
        </div>
       
          
        <!-- footer section  -->
        <?php
      
         include("footer.php");?>
        
</body>
</html>
