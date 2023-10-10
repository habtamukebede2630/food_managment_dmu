
<?php
if(empty($_SESSION['user'])){
    header('location:../index.php');
   }
   if($_SESSION['user']['role']=='proctor'){
       header("location:proctor/proctorhome.php");
   }
   if($_SESSION['user']['role']=='headcafe'){
       header("location:headcafe/headcafehome.php");
   }
   if($_SESSION['user']['role']=='foodstore'){
    header("location:storemanager/storemanagerhome.php");
}
if($_SESSION['user']['role']=='studentunion'){
    header("location:studentunion/studentunionhome.php");
}
if($_SESSION['user']['role']=='tickerhead'){
    header("location:tickerhead/tickerheadhome.php");

}
if($_SESSION['user']['role']=='presidant'){
    header("location:presidant/presidanthome.php");

}
if($_SESSION['user']['role']=='vicepresidant'){
    header("location:vicepresidant/vicepresidanthome.php");

}
if($_SESSION['user']['role']=='merchant'){
    header("location:merchant/merchanthome.php");

}
if($_SESSION['user']['role']=='enterprise'){
    header("location:tickerhead/enterprisehome.php");

}
if($_SESSION['user']['role']=='chef'){
    header("location:chef/chefhome.php");

}
if($_SESSION['user']['role']=='admin'){
    header("location:directorate/adminhome.php");

}
if($_SESSION['user']['role']=='purhase'){
    header("location:purchase/purchasehome.php");

}

if($_SESSION['user']['role']=='departmenthead'){
    header("location:departmenthead/departmentheadhome.php");

}
if($_SESSION['user']['role']=='registrar'){
    header("location:registrar/registrarhome.php");

}
if($_SESSION['user']['role']=='nurse'){
    header("location:nurse/nursehome.php");

}
if($_SESSION['user']['role']=='finance'){
    header("location:finance/financehome.php");

}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
</head>
<body>
    <div class="contain">
    <div class="body1">
           <div class="logo">
                <img src="../images/logo.jpg" id="logoe">
            </div>
            <h1 class="proj_title">DMU FOOD MANAGMENT SYSTEM</h1>
            <div class="profile">
            <?php  
            if(isset($_SESSION['user']['username'])){
            $un = $_SESSION['user']['username'];

                $query1 = "select * from user where user_id='$un'";
                $result = mysqli_query($conn,$query1);
                if($row = mysqli_fetch_assoc($result)){
                    echo '
                        
                    <div class="pro_img">
                        <img src="../banner_img.jpeg" alt="">
                    </div>
                    <div class="pro_name_role">
                        <div class="pro_name">'.$row['fname']." " .$row['sname'].'</div>
                        <div class="pro_role">'.$row['role'].'</div>
                    </div>
                    <div class="edit_btn">
                        <a href="changepassword.php">change password</a>
                    </div>
                    ';
                }
            }
            ?>
             </div>
        </div>
<div class="navbar">
    <ul class="ul_container" >
        <li class="li_class"> <a href="studentdirectoratehome.php">Home </a></li>
        <li class="li_class" >
            <a href="#"> Register</a>
            <ul class="dropdown" >
                <li class="li_class li-drop"><a href="punish.php">Punished students </a></li>
                
            </ul>
        </li> 
        <li class="li_class"><a href="#"> Send</a>
               <ul class="dropdown" >
                <li class="li_class li-drop"><a href="studlist.php">Feedback</a></li>
              
                </ul>
                
              
            </li>
            <li class="li_class"><a href="#">Scaleout</a>
            <ul class="dropdown" >
                <li class="li_class li-drop"><a href="scaleout.php">Foodscale</a></li>
                
                </ul>
        </li>
        <li class="li_class"><a href="#">View</a>
    
        <ul class="dropdown" >
                <li class="li_class li-drop"><a href="viewinternshiprequest.php">Internship Request</a></li>
                <li class="li_class li-drop"><a href="annualreportdirectorate.php">Annual Report</a></li>
                <li class="li_class li-drop"><a href="betweendirectorate.php"> Reports between</a></li>
                <li class="li_class li-drop"><a href="viewnoncafedirectorate.php"> Report non-cafe</a></li>
                <li class="li_class li-drop"><a href="directoraterequest.php">Material Request</a></li>
                <li class="li_class li-drop"><a href="viewfinancerequestd.php">Finance Request</a></li>
                <li class="li_class li-drop"><a href="punishmentupdate.php">Punished student</a></li>
                
                <li class="li_class li-drop"><a href="viewdailymenudirectorate.php">Daily scale</a></li>
                <li class="li_class li-drop"><a href="#">Feedback</a></li>
                
                </ul>
    
    
    
    
    
    </li>
        <li class="li_class"><a href="../logout.php">Logout</a></li>
    </ul>
</div>
</div>
</body>
</html>
