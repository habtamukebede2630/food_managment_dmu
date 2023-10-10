
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/forms.css">
	<center>
	<style>
		.padder{
			margin-top:250px;
		}
	</style>

</head>

<body>


<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");
?>
<div class="padder">
	
<p><h4>Enter Student's ID  to get full information</h4></p>
   <form action="" method="post">
ID-NO:<input type="text" name="id"><br>
<input type="submit" value="Search" name="search">
</div>
</center>
  </form>

  <?php
$year=Date('Y');
$date=Date('Y/m/d');
	$dattee=Date('l',strtotime($date));

if(isset($_POST['search']))
{
	
	$id=$_POST['id'];
    $sql=mysqli_query($conn,"select * from student where id='$id'");
	$row=mysqli_fetch_array($sql);
	if($row)
	{
		$id1=$row['id'];
	$name=$row['name'];
	$ayear=$row['year'];
	$sex=$row['sex'];
	$dept=$row['dept'];
	$meal=$row['meal'];
	
	
?>
<div class="form-style-10">
	<h2>Update students</i></h2>
	
	<form action="" method="POST">
	<div class="inner-wrap">
	
	<label>Date:<input type="text"name="dat"readonly="" value="<?php echo $date; ?>"/></label> 
	<label>Name:<input type="text"name="name"readonly="" value="<?php echo $name; ?>"/></label>
	<label>Sex:<input type="text"name="sex"readonly="" value="<?php echo $sex; ?>"/></label>
	<label>ID NO:<input type="text"name="id"readonly="" value="<?php echo $id1; ?>"/></label> 
	<label>Departement:<input type="text"name="dept"readonly="" value="<?php echo $dept; ?>"/></label>
	<label>Class year:<input type="text"name="cyear"readonly="" value="<?php echo $ayear; ?>"/></label> 
	<label>Acadamic year:<input type="text"name="ayear"readonly="" value="<?php echo $year; ?>"/></label>
	<label>Meal number:<input type="text"name="meal"readonly="" value="<?php echo $meal; ?>"/></label>
	<label>Status:<select name="status">
		<option  value="active">Active</option>
		<option  value="inactive">Inctive</option>
		</select>
	</label>
	 </div>
    <div class="button-section">
	<center><input type="submit" name="update" value="Update" style="width: 120; height: 30;"/></center>
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
if(isset($_POST['update']))
	{
		$na=$_POST['name'];
		$idd=$_POST['id'];
		$dep=$_POST['dept'];
		$ayear1=$_POST['ayear'];
		$cyear=$_POST['cyear'];
		$dat=$_POST['dat'];
		$sexxt=$_POST['sex'];
		$meal=$_POST['meal'];
		$status=$_POST['status'];
	$sqla=mysqli_query($conn,"update student set status='$status' where id='$idd'") OR die(mysql_error());
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

</html>