<!DOCTYPE html>
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
        <li class="li_class"> <a href="nursehome.php">Home </a></li>
        <li class="li_class" >
            <a href="#">Request </a>
            <ul class="dropdown" >
                <li class="li_class li-drop"><a href="ailingform.php">Ailing students</a></li>
                
               
            </ul>
        </li> 
        <li class="li_class"><a href="#"> Send </a>
               <ul class="dropdown" >
                <li class="li_class li-drop"><a href="#">feedback</a></li>
              
                </ul>
                
              
            </li>
            <li class="li_class"><a href="#">View</a>
            <ul class="dropdown" >
                <li class="li_class li-drop"><a href="registernoncafe.php">Feedback</a></li>
                </ul>
                
        
        
        
        </li>
        <li class="li_class"><a href="../logout.php">Logout</a></li>
    </ul>
</div>

</body>
</div>
</html>
