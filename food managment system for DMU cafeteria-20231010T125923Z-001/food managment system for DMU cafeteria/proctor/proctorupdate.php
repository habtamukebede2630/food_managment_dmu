<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update status by proctor</title>
    <link rel="stylesheet" href="../css/fillforms.css">
	<style>
		.padder{
			margin-top:200px;
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
    <center>
     <p><h4>Enter departement name</h4></p>
    <form action="" method="post">
Enter Student's ID number:<input type="text" name="id" placeholder="enter student's id"><br><br>
<input type="submit" value="Search" name="search">
  </form>
  </center>
  <?php
$year=Date('Y');
$date=Date('Y/m/d');
	$dattee=Date('l',strtotime($date));

if(isset($_POST['search']))
{$did=$_POST['id'];
	
    $sql=mysqli_query($conn,"select * from student where id='$did' and status='break'");
	$row=mysqli_fetch_array($sql);
	if($row)
	{
	$id1=$row['status'];
	$na=$row['name'];
	$ide=$row['id'];
	?>
    <div class="form-style-10">
	<h3>Update student status</i></h3>
	
	<form action="" method="POST">
	<div class="inner-wrap">
	
	<label>Date:<input type="text"name="dat"readonly="" value="<?php echo $date; ?>"/></label> 
	<label>Student Name:<input type="text"name="name"readonly="" value="<?php echo $na; ?>"/></label>
	<label>Student ID:<input type="text"name="id"readonly="" value="<?php echo $ide; ?>"/></label>
	<label>Status:<select name="status">
		<option  value="break">Break</option>
		<option  value="active">Come back</option>
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
	alert(" this student is not gone to home")</script>';
?>
<?php
}
if(isset($_POST['update']))
	{
        $did=$_POST['id'];
		$sql=mysqli_query($conn,"select * from student where id='$did'");
	$row=mysqli_fetch_array($sql);
		
		$status=$_POST['status'];
		
	$sqla=mysqli_query($conn,"update student set status='$status' where id='$did'") OR die(mysql_error());
	$sqla=mysqli_query($conn,"delete from breaktime where studid='$did'") OR die(mysql_error());
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

</body>
</div>
</html>