<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");

$date=Date('Y/m/d');
	$dattee=Date('l',strtotime($date));

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/forms.css">
	<title>Document</title>
    <style>
        .padder{
            margin-top:200px;
            margin-bottom:200px;
        }
    </style>
</head>
<div class="padder">
<body>



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
    $name=$query2['fname'];
    $lname=$query2['sname'];
    $img=$query2['photo'];
    }
    
    }?>
          
    <div class="form-style-10">
        <h2>Daily special Order Form </h2>
        
        <form action="" method="POST">
        <div class="inner-wrap">
        
        
        
        <label>Not eaten:<select name="noitem">
        <?php
        $sql1=mysqli_query($conn,"SELECT * from incomingfood");
        while($row1=mysqli_fetch_array($sql1))
        {
            
            echo "<option>".$row1['itemname']."</option>";
        }
        
        ?></select></label
        <label>Replace Item Name:<select name="item">
        <?php
        $sql=mysqli_query($conn,"SELECT * from incomingfood");
        while($row=mysqli_fetch_array($sql))
        {
            
            echo "<option>".$row['itemname']."</option>";
        }
        
        ?></select>
        </label>
        
         </div>
        <div class="button-section">
        <input type="submit" name="register" value="Rgister" style="width: 120; height: 30;"/>
        </div>
        </form>
        </div>
        
    
    <?php
    if(isset($_POST['register']))
        {
            $eat=$_POST['item'];
            $not=$_POST['noitem'];
            
        $sqla=mysqli_query($conn,"insert into replacedfood(eaten,noteaten) VALUES('$eat','$not')") OR die(mysql_error());
       
        if($sqla>0)
        {
        echo '<script type="text/javascript">
        alert(" seccesfully registered")</script>';
        }
        
        else echo "not inserted";
        }
    ?>
    
</body>
    </div>
</html>
<?php   include("../footer.php");?>