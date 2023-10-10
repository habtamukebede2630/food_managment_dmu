<?php
error_reporting(0);
include("../connection.php");
session_start();
include("navbar.php");
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/forms.css">
    <style>
        .padder{
            margin-top:300px;
        }
    </style>
</head>
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
    <div class="padder">
      <center>  <p><h4>Enter Student's ID</h4></p>
       <form action="" method="post">
    Select Student's ID number:<select name="id">
        <?php
      
       
        $sql=mysqli_query($conn,"SELECT * from ailingstudent where status='accept'");
            while($row=mysqli_fetch_array($sql))
        {
            
            echo "<option>".$row['studid']."</option>";
        }
    
        ?></select>
    <input type="submit" value="Search" name="search">
      </form>
      </center>
      </div>
      <?php
    $year=Date('Y');
    $date=Date('Y/m/d');
        $dattee=Date('l',strtotime($date));
    
    if(isset($_POST['search']))
    {
        $id=$_POST["id"];
        $sql=mysqli_query($conn,"select * from ailingstudent where studid='$id'");
        $row=mysqli_fetch_array($sql);
        if($row)
        {
        $id1=$row['studid'];
        $name=$row['name'];
        $ayear=$row['ayear'];
        $sex=$row['sex'];
        $dept=$row['dept'];
        $dig=$row['diagnosis'];
        $recomen=$row['recommendation'];
        $sender=$row['senderid'];
    $sql7=mysqli_query($conn,"select * from student where id='$id' and status='active'");
        $row=mysqli_fetch_array($sql7);
    $meal=$row['meal'];
    $cyear=$row['year'];
    
    ?>
    <div class="form-style-10">
        <h2>Register  <i>Special food user</i> Students</h2>
        
        <form action="" method="POST">
        <div class="inner-wrap">
        
        <label>Date issued:<input type="text"name="dat"readonly="" value="<?php echo $date; ?>"/></label> 
        <label>Name:<input type="text"name="nam"readonly="" value="<?php echo $name; ?>"/></label>
        <label>Sex:<input type="text"name="se"readonly="" value="<?php echo $sex; ?>"/></label>
        <label>iD number:<input type="text"name="stud"readonly="" value="<?php echo $id; ?>"/></label> 
        <label>Meal card:<input type="text"name="me"readonly="" value="<?php echo $meal; ?>"/></label> 
        <label>Departement:<input type="text"name="dep"readonly="" value="<?php echo $dept; ?>"/></label>
        <label>Acadamic year:<input type="text"name="ayea"readonly="" value="<?php echo $date; ?>"/></label> 
        <label>clss year:<input type="text"name="yea"readonly="" value="<?php echo $cyear; ?>"/></label>
        <label>Diagonesis:<input type="text"name="dia"readonly="" value="<?php echo $dig; ?>"/></label> 
        <label>Recommendation/students will eate for the desease:<input type="text"name="rec"readonly="" value="<?php echo $recomen; ?>"/></label> 
        <label>Sender Id:<input type="text"name="senderid"readonly="" value="<?php echo $sender; ?>"/></label> 
        
         </div>
        <div class="button-section">
        <input type="submit" name="register" value="Rgister" style="width: 120; height: 30;"/>
        </div>
        </form>
        </div>
        
    
    <?php
    }
        else
        echo '<script type="text/javascript">
        alert(" no recored found with this id")</script>';
    ?>
    
    
    <?php
    }
    if(isset($_POST['register']))
        {
            
        $id1=$_POST['stud'];
        $name=$_POST['nam'];
        $ayear=$_POST['ayea'];
        $sex=$_POST['se'];
        $dept=$_POST['dep'];
        $dig=$_POST['dia'];
        $recomen=$_POST['rec'];
        $meal=$_POST['me'];
        $cyear=$_POST['yea'];
        
        $sql0=mysqli_query($conn,"select * FROM specialfood WHERE studid='$id1'");
        $num=mysqli_num_rows($sql0);
        $rowcheck=mysqli_fetch_assoc($sql0);
        if($num=='0')
        {
        
        $sqla=mysqli_query($conn,"insert into specialfood(date,eid,studid,name,cyear,ayear,dept,sex,diag,recomm,meal,status) VALUES('$date','$uid','$id1','$name','$cyear','$ayear','$dept','$sex','$dig','$recomen','$meal','special')") or die(mysqli_error());
        echo '<script type="text/javascript">
        alert(" succesfully registered")</script>';
        $result=mysqli_query($conn,"update ailingstudent set status='registered'");  
            
        }
        else{
            echo '<script type="text/javascript">
        alert(" The student allready registered before")</script>';
        
        }
        
        }
    ?>
</body>
</html>