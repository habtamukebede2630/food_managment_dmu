
<?php

if(isset($_POST['login']))
{
if(isset($_POST['username'])&&isset($_POST['password']))
{
    $uname=$_POST['username'];
    $upass=$_POST['password'];
    //$upass=md5($upass);
    $result=mysqli_query($conn,"Select * from account where username='$uname' and password='$upass'");
    $row=mysqli_fetch_array($result);
    $username=$row['username'];
    $password=$row['password'];
    $status=$row['status'];
  $result=mysqli_query($conn,"Select * from user where userid='$uname'");
  if($result){
    while($row=mysqli_fetch_array($result)){
    $role=$row['role'];
    
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
//Display Mac Address   
    
    if($username!=null&&$password!=null&&$role!=null&&$status!=0)
    {
        $_SESSION['username']=$uname;
        $_SESSION['password']=$upass;
        $_SESSION['role']=$role;
        $_SESSION['status']=$status;
        $ipaddress = $macaddress; 
        if($_SESSION['role']=="adminster")
        {
           
            header("location:admin/adminhome.php");
            
            
            }
      
        elseif(mysqli_query($conn,"Select * from account WHERE username='$uname' && $status='0'"))
        {
        echo "<div id='fall'>Your account is blocked</div>";	
        }
        
        else
        {
        
        echo '<script type="text/javascript">
alert("Please enter correct username and password!")</script>';
       }	}	
    }}

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<div class="body3 ">
                    <form action="#" method="POST">
                        <H1 class="title">LOGIN</H1>
                        <!-- <label for="username"> Username </label>  <br> -->
                        <input type="text" placeholder="username" name="username"><br>
                        <!-- <label for="password"> password </label>  <br> -->
                        <input type="password"placeholder="password" name="password"><br>
                        <input type="submit"value="login"class="btn_home"name="login">
                        <input type="reset"value="clear" class="btn_home"> 
                </form>
            </div>
    
</body>
</html>