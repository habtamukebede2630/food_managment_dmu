<?php
include("../connection.php");
session_start();
if(empty($_SESSION['user'])){
    header('location:../index.php');
   }
   include("header.php");
   include("navbar.php");
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="../css/fillforms.css">
<style>
		.padder{
			margin-top:200px;
		}
	</style>
</head>
<div class="padder">
<body>
	<center>
<p><h4>Enter Student's ID</h4></p>
   <form action="" method="post">
Student ID:<input type="text" name="id" placeholder="enter student ID"><br>
<input type="submit" value="Search" name="search">
</center>
  </form>
  <?php
$year=Date('Y');
$date=Date('Y/m/d');
	$dattee=Date('l',strtotime($date));
    if(isset($_POST['search']))
{
	
	$id=$_POST['id'];
    $sql=mysqli_query($conn,"select * from student where id='$id' and status='active'");
	$row=mysqli_fetch_array($sql);
	if($row)
	{
	$id=$row['id'];
	$name=$row['name'];
	$ayear=$row['year'];
	$sex=$row['sex'];
	$dept=$row['dept'];
	$meal=$row['meal'];


?>
<div class="form-style-10">
	<h3>Register  Students who leave the dorm</h3>
	
	<form action="" method="POST">
	<div class="inner-wrap">
	
	<label>Date:<input type="text"name="dat"readonly="" value="<?php echo $date; ?>"/></label> 
	<label>Name:<input type="text"name="name"readonly="" value="<?php echo $name; ?>"/></label>
	<label>Sex:<input type="text"name="sex"readonly="" value="<?php echo $sex; ?>"/></label>
	<label>ID NO:<input type="text"name="id"readonly="" value="<?php echo $id; ?>"/></label> 
	<label>Departement:<input type="text"name="dept"readonly="" value="<?php echo $dept; ?>"/></label>
	<label>Class year:<input type="text"name="cyear"readonly="" value="<?php echo $ayear; ?>"/></label> 
	<label>Acadamic year:<input type="text"name="ayear"readonly="" value="<?php echo $year; ?>"/></label>
	<label>Meal Number:<input type="text"name="meal"readonly="" value="<?php echo $meal; ?>"/></label>
	<label>Leave date:<input type="date" name="le" pattern="^[/0-9- ]+"/></label>
	<label>Return Date:<input type="date" name="re" pattern="^[0000-00-00/></label>
	
	
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
	alert(" student with this id is not cafeteria user ")</script>';
?>
<?php
}
if(isset($_POST['register']))
	{
		$na=$_POST['name'];
		$idd=$_POST['id'];
		$dep=$_POST['dept'];
		$ayear1=$_POST['ayear'];
		$cyear=$_POST['cyear'];
		$dat=$_POST['dat'];
		$sexxt=$_POST['sex'];
		$meal=$_POST['meal'];
		$le=$_POST['le'];
		$re=$_POST['re'];
		$sqld=mysqli_query($conn,"SELECT * FROM breaktime WHERE date='$date' and studid='$idd'") or die(mysql_error());
		$count2=mysqli_num_rows($sqld);
		if($count2=='0')
		{
	$sqla=mysqli_query($conn,"insert into breaktime(date,studid,name,acyear,dept,meal,cyear,senderid,le,re) VALUES('$date','$idd','$na','$ayear1','$dep','$meal','$cyear','$uid','$le','$re')") OR die(mysqli_error());
		$sql78="update student set status='break' where id='$idd'" or die(mysqli_error());
		$count78=mysqli_query($conn,$sql78);
	 
	if($sqla>0)
	{
	echo '<script type="text/javascript">
	alert(" succesfully registered")</script>';
	}
	}
	else echo '<script type="text/javascript">
	alert(" Already registered")</script>';
	}
?>

</body>
</div>
</html>