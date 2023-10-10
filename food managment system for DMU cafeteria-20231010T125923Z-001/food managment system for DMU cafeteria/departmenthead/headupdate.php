<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/forms.css">
</head>
<body>
    <?php
    $querystud=mysqli_query($conn,"select *from  student ");
    if($querystud){
        $row=mysqli_fetch_array($querystud);
        $taken=$row['t'];

    }
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
    $name=$query2['fname'];
    $lname=$query2['sname'];
    $img=$query2['photo'];
    }
    
    }?>
    <style>
    .padder{
        margin-top:200px;
        align:center;

    }
    </style>
    <center>    <div class="padder">
        <div class="form-style-10">
        <p><h2>Enter departement name</h2></p>
        <div class="inner-wrap">
       <form action="" method="post">
    Departement Name:<input type="text" name="dept"><br><br>
    Year:<input type="text" name="year"required><br><br>
    <div class="button-section">
    <input type="submit" value="Search" name="search">
    </div>
    </div>
      </form>
      </div>
      </div>
      </center>
      

      <?php
    $year=Date('Y');
    $date=Date('Y/m/d');
        $dattee=Date('l',strtotime($date));
    
    if(isset($_POST['search']))
    {
        $did=$_POST['dept'];
        $years=$_POST['year'];
        
        $sqlq=mysqli_query($conn,"select * from student where dept='$did'  and year='$years'");
        $student=mysqli_num_rows($sqlq);
        
        $sql=mysqli_query($conn,"select * from internship where department='$did' and status='approve'");
        $row=mysqli_fetch_array($sql);
        if($uid!=$did){
            echo '<script type="text/javascript">
            alert(" you are not autorized for this department")</script>';
        }
        if($row)
        {
        $id1=$row['status'];
        ?>
    <div class="form-style-10">
        <h2>Update status</h2>
        
        <form action="" method="POST">
        <div class="inner-wrap">
        
        <label>Date:<input type="text"name="dat"readonly="" value="<?php echo $date; ?>"/></label> 
        <label>Departement:<input type="text"name="dept"readonly="" value="<?php echo $did; ?>"/></label>
        <label>Number of Student:<input type="text"name="stud"readonly="" value="<?php echo $student; ?>"/></label>
        <label>Year:<input type="text"name="year"readonly="" value="<?php echo $years; ?>"/></label>
        <label>Status:<select name="status">
            <option  value="internship">Internship</option>
            <option  value="active">Active</option>
                    </select>
        </label>
         </div>
        <div class="button-section">
        <input type="submit" name="update" value="Update" style="width: 120; height: 30;"/>
        </div>
        </form>
        </div>
    <?php	
    }
        else
        echo '<script type="text/javascript">
        alert(" This departement have not get permission for internship")</script>';
    ?>
    <?php
    }
    if(isset($_POST['update']))
        {
            $years=$_POST['year'];
            $did=$_POST['dept'];
            $sql=mysqli_query($conn,"select * from student where dept='$did'");
        $row=mysqli_fetch_array($sql);
            
            $status=$_POST['status'];
        $sqla=mysqli_query($conn,"update student set status='$status' where dept='$did' and year='$years' and status!='noncafe' ") or die(mysqli_error());
        $sqlb=mysqli_query($conn,"delete  from noncafe where dept='$did' and year='$years'");
        if($status=='active')
        {
            $sqla=mysqli_query($conn,"update internship set status='seen' where department='$did'") OR die(mysqli_error());
        }
        if($sqla)
        {
            echo '<script type="text/javascript">
        alert(" seccesfully updated")</script>';
        }
         
        else {
            echo '<script type="text/javascript">
        alert(" not updated")</script>';
        }
        
        
        }
    ?>
   <?php include("../footer.php");?>
</body>
</html>