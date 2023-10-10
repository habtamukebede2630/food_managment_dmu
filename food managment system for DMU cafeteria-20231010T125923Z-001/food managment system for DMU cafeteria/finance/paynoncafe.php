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
    <title>Document</title>
    <link rel="stylesheet" href="../css/forms.css">
</head>
<?php
 $idfetch=mysqli_query($conn,"select *from student");
 if($idfetch){
    $row=mysqli_fetch_array($idfetch);
    $id=$row['id'];
 }
?>
<body>
	<style>
		.padder{
			margin-top:110px;
		}
	</style>
    <?php
    if(isset($_SESSION['user']['username'])&& isset($_SESSION['user']['password'])&& isset($_SESSION['user']['role'])){
        $username=$_SESSION['user']['username'];
        $password=$_SESSION['user']['password'];
        $role=$_SESSION['user']['role'];
        $query1=mysqli_query($conn,"select *from user where user_id='$username'");
        while($query2=mysqli_fetch_array($query1)){
            $uid=$query2['user_id'];
            $name=$query2['fname'];
          $lname=$query2['sname'];
         $img=$query2['photo'];
        }
    }
    ?>
	<div class="padder">
    <center>
    <p><h4>You can select student's ID from the list that you want to pay</h4></p>
    <form action="" method="POST">


Select Student's ID:
<select name="id">
	<?php
	$sql=mysqli_query($conn,"SELECT * from noncafe where  status='noncafe' ");
	while($row=mysqli_fetch_array($sql))
	{
		
		echo "<option>".$row['studid']."</option>";
	}
	
	?></select>
	
	<input type="submit" value="Search" name="search">


  </form>
  </center>
   
  <?php
$year=Date('Y');
$date=Date('Y/m/d');
	$dattee=Date('l',strtotime($date));

if(isset($_POST['search']))
{
	
	$id=$_POST['id'];
    $sql=mysqli_query($conn,"select * from student where id='$id' and status='noncafe'");
	$row=mysqli_fetch_array($sql);
	if($row)
	{
	$id=$row['id'];
	$name=$row['name'];
	$ayear=$row['year'];
	$sex=$row['sex'];
	$dept=$row['dept'];
?>
   <center>
<div class="form-style-10">
	<h2>Payment form for <i>Non-cafe</i> Students</h2>
	
	<form action="" method="POST">
	<div class="inner-wrap">
	
	<label>Date:</label> <input type="text"name="dat"readonly="" value="<?php echo $date; ?>"/>
	<label>Name:</label><input type="text"name="name"readonly="" value="<?php echo $name; ?>"/>
	<label>Sex:</label><input type="text"name="sex"readonly="" value="<?php echo $sex; ?>"/>
	<label>NO:</label> <input type="text"name="id"readonly="" value="<?php echo $id; ?>"/>
	<label>Departement:</label><input type="text"name="dept"readonly="" value="<?php echo $dept; ?>"/>
	<label>Class year:</label> <input type="text"name="cyear"readonly="" value="<?php echo $ayear; ?>"/>
	<label> Acadamic year:</label><input type="text"name="ayear"readonly="" value="<?php echo $year; ?>"/>
	<label> Status:<select name="status" required="">
		<option value="pay">Pay</option>
		<option value="notpay">Not Pay</option>
	</select>
	
	</label>
	
	 </div>
    <div class="button-section">
	<input type="submit" name="all" value="Update all" style="width: 120; height: 30;"/>
	<input type="submit" name="pay" value="Pay" style="width: 120; height: 30;"/>
	</div>
    <?php	
}
	else
	echo '<script type="text/javascript">
	alert(" no recored found with this id")</script>';
?>
<?php
}
if(isset($_POST['pay']))
	{
		$na=$_POST['name'];
		$idd=$_POST['id'];
		$dep=$_POST['dept'];
		$ayear1=$_POST['ayear'];
		$cyear=$_POST['cyear'];
		$dat=$_POST['dat'];
		$sexxt=$_POST['sex'];
		$status=$_POST['status'];
		$sql0=mysqli_query($conn,"select * FROM noncafe WHERE studid='$idd' and payment='notpay'");
		$sql45=mysqli_query($conn,"update noncafe set payment='$status' where studid='$idd'");
	
		if($sql45){
			echo '<script type="text/javascript">
	alert(" succesfully payed")</script>';
		}
		
		
		
	}
	
	?>
	</form>
</div>
	<?php
	echo "<center><table border=1><tr><th>Student name</th><th>Student ID</th><th>Sex</th><th>Class year</th><th>Accadamic year</th></tr>";
	$payed=mysqli_query($conn,"select * from noncafe where payment='pay'") OR die(mysql_error());
	$total=mysqli_num_rows($payed);$z=$total*450;
	while($t=mysqli_fetch_array($payed))
	{
		echo "<tr><td>".$t['studid']."</td><td>".$t['name']."</td><td>".$t['sex']."</td><td>".$t['cyear']."</td><td>".$t['acyear']."</td></tr>";
	}
echo "</table><br><br> </center>";



	echo "<center><table border=1><tr><th>Student name</th><th>Student ID</th><th>Sex</th><th>Class year</th><th>Accadamic year</th></tr>";
	$not=mysqli_query($conn,"select * from noncafe where payment='notpay'") OR die(mysql_error());
	$totlnot=mysqli_num_rows($not);
	
	while($t=mysqli_fetch_array($not))
	{
		echo "<tr><td>".$t['studid']."</td><td>".$t['name']."</td><td>".$t['sex']."</td><td>".$t['cyear']."</td><td>".$t['acyear']."</td></tr>";
	}
echo "</table> <br><br></center>";

echo "<center>Total number of student who take their money is &nbsp;&nbsp;&nbsp;<u>$total</u>&nbsp;&nbsp;&nbsp;and total birr is <u>$z</u><br><br><br></center>";


echo "<center>Total number of student who does not tke their money is &nbsp;&nbsp;&nbsp;<u>$totlnot</u></center>";
?>
<center><p>Enter the date<input type="date" name="date" required=""/></p></center>

<?php
if(isset($_POST['all']))
{
    $id=$_POST['id'];
    $na=$_POST['name'];
    $idd=$_POST['id'];
    $dep=$_POST['dept'];
    $ayear1=$_POST['ayear'];
    $cyear=$_POST['cyear'];
    $dat=$_POST['dat'];
    $sexxt=$_POST['sex'];
    $status=$_POST['status'];
    $sqld=mysqli_query($conn,"SELECT * FROM noncafe") or die(mysql_error());
    $sql45=mysqli_query($conn,"update noncafe set payment='$status'");

    if($sql45){
        echo '<script type="text/javascript">
alert(" succesfully updated")</script>';
    }

        

}
?>
</center>
</div>
</body>
</html>