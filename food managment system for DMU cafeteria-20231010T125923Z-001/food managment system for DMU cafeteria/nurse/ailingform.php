<?php
include("../connection.php");
ob_start();
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:../index.php');
}
?>
<?php
include("header.php");
include("navbar.php");
?>
<?php
if(isset($_SESSION['user']['username'])){
    $username=$_SESSION['user']['username'];
    $query1=mysqli_query($conn,"select * from user where user_id='$username'");
    while($query2=mysqli_fetch_array($query1)){
        $uid=$query2['user_id'];
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
    <link rel="stylesheet" href="../css/forms.css">
</head>
<style>
	.padder{
		margin-top:200px;
	}
</style>
<div class="padder">
<body>


<center>
<p><h4> Enter the id number and see students information</h4></p>
<form action=""method="post">
    <input type="text"name="id"><br>
    <input type="submit"value="search"name="search">
</form>
</center>
<?php
$year=Date('Y');
$date=Date('Y/m/d');
	$fdate=Date('l',strtotime($date));
if(isset($_POST['search'])){
    $id=$_POST['id'];
    $sql=mysqli_query($conn,"select *from student where id='$id'and  status='active'");
    $row=mysqli_fetch_array($sql);
    if($row){
        $id=$row['id'];
        $name=$row['name'];
        $ayear=$row['year'];
        $sex=$row['sex'];
        $dept=$row['dept'];
        $meal=$row['meal'];

    



?>
<div class="form-style-10">
	<h2>Register Ailing student</h2>
	<form action="" method="POST" style="background-color: #d7d8e1">
	<div class="inner-wrap">
       
	<label></label>Date :<input type="text"name="date"readonly="" value="<?php echo $date; ?>"/>
	<label></label>Name<input type="text"name="name"readonly="" value="<?php echo $name; ?>"/>
	<label></label>Sex<input type="text"name="sex"readonly="" value="<?php echo $sex; ?>"/>
	<label></label>Age<input type="text" name="age" required="" pattern="^[0-9]+">
	<label></label> ID Numer:<input type="text"name="id"readonly="" value="<?php echo $id; ?>"/>
	<label></label>Departement<input type="text"name="dept"readonly="" value="<?php echo $dept; ?>"/>

	<label></label> year:<input type="text"name="cyear"readonly="" value="<?php echo $ayear; ?>"/>
	<label></label>Date of Examination:<input type="date" name="doe" pattern="^[a-zA-Z0-9/ ]+"/>
	<label></label>Diagnosis:<textarea name="dig" required=""></textarea>
	<label></label>Sick Level:<input type="text" name="slevel" pattern="^[a-zA-Z0-9/ ]+">
	<label></label>Recomendation:<textarea name="recom" required=""></textarea>
	 </div>
    <div class="button-section">
	
<center><input type="submit" name="register" value="Register" style="width: 120; height: 30;"/></center>
	</div>
	</form>
	</div>
<?php	
}
	else
	echo '<script type="text/javascript">
	alert(" student with this id is not curretly in dmu ")</script>';
?>
<?php
}
if(isset($_POST['register']))
	{
		
		$name=$_POST['name'];
		$age=$_POST['age'];
		$dignosis=$_POST['dig'];
		$slevel=$_POST['slevel'];
		$rec=$_POST['recom'];
		$date=$_POST['doe'];
		$cyear=$_POST['cyear'];
		$idd=$_POST['id'];
		$sex=$_POST['sex'];
		$dept=$_POST['dept'];
		
		
		
	$sql0=mysqli_query($conn,"select * FROM ailingstudent WHERE studid='$idd'");
	$num=mysqli_num_rows($sql0);
	$rowcheck=mysqli_fetch_assoc($sql0);
	if($num=='0')
	{
		
	$result=mysqli_query($conn,"insert into ailingstudent(ayear,studid,name,age,sex,dept,diagnosis,sicklevel,recommendation,status,senderid) VALUES('$cyear','$idd','$name','$age','$sex','$dept','$dignosis','$slevel','$rec','A','$uid')");
	 $query=($result) or die(mysqli_error());
					
	if($query>0)
	{
	echo '<script type="text/javascript">
	alert(" successfully registered")</script>';
	}}
	else{
		
	
		echo '<script type="text/javascript">
	alert(" The student already registered before")</script>';
	}
	}

?>
</body>
</div>
</html>