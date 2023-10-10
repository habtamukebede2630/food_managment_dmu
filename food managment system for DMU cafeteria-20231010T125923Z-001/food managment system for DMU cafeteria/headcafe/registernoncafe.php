
<?php
ob_start();
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:../index.php');
}
?>
<?php
include("../connection.php");
include("header.php");
include("navbar.php");

?>
<?php
$queryt=mysqli_query($conn,"select *from student");
if($queryt){
	$rowt=mysqli_fetch_array($queryt);
	$t=$rowt['t'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register non-cafe students</title>  
	<link rel="stylesheet" href="../css/forms.css">
</head>
<body>
    <?php
	
   if(isset($_SESSION['user']['username']))
   {
	   $username=$_SESSION['user']['username'];
	   $stat=$_SESSION['user']['status'];
	  
	 
	   $query1=mysqli_query($conn,"select *from user WHERE user_id='$username'");
	   while($query2=mysqli_fetch_array($query1))
	   { 
	   $uid=$query2['user_id'];
	   $name=$query2['fname'];
	   $lname=$query2['sname'];
	   $img=$query2['photo'];
	   }
	   $query3=mysqli_query($conn,"select *from student where status='$stat'");
	   while($q4=mysqli_fetch_array($query3)){
		   $sid=$q4['status'];
	   }
	}
    ?>

      <center>
		<style>
			.padder{
				margin-top:200px;
			}
		</style>
		<div class="padder">
    <h4>enter students id to register for non cafe</h4>
    <form action=""method="post">
	
        ID-NO <input type="text"name="id">
		<div class="button-secton">
        <input type="submit"value="search"name="search">
		</div>
	</center>

    </form>
 </div>
    <?php
    $year=Date("Y");
    $date=Date('Y/m/d');
    $fdate=Date('l',strtotime($date));
    if(isset($_POST['search'])){
        $id=$_POST['id'];
        $sql=mysqli_query($conn,"select *from student where id='$id' and status!='punish'");
       $row=mysqli_fetch_array($sql);
       if($row){
           $id=$_POST['id'];
           $name=$row['name'];
           $ayear=$row['year'];
           $sex=$row['sex'];
           $dept=$row['dept'];
           $meal=$row['meal'];
       
  
    ?>
    <div class="form-style-10">
        <h2>Register <i>Non-cafe </i>students</h2>
        <form action=""method="post">
            <div class="inner-wrap">
                <label >Issued date: <input type="text"name="date"readonly=""value="<?php echo $date;?>"></label>
                <label >Name:</label><input type="text"name="name"readonly=""value="<?php echo $name;?>">
                <label>Sex:<input type="text"name="sex"readonly="" value="<?php echo $sex; ?>"/></label>
	            <label>NO:<input type="text"name="id"readonly="" value="<?php echo $id; ?>"/></label> 
	            <label>Departement:<input type="text"name="dept"readonly="" value="<?php echo $dept; ?>"/></label>
                <label>year:<input type="text"name="cyear"readonly="" value="<?php echo $ayear; ?>"/></label> 
	            <label> year:<input type="text"name="ayear"readonly="" value="<?php echo $year; ?>"/></label>
	            <label> Status:<select name="status" required="">
		        <option value="noncafe">Non-cafe</option>
		         <option value="take">Cafe user</option>
	           </select>
	</label>
	
            </div>
            <div class="button-section">
            <input type="submit" name="register" value="Register" style="width: 120; height: 30;"/>
	        <input type="submit" name="update" value="Update" style="width: 120; height: 30;"/>
            </div>
            
        </form>
    </div>
    <?php	
}
	else
	echo '<script type="text/javascript">
	alert(" student can not be registered")</script>';
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
		$date=$_POST['date'];
		$sexxt=$_POST['sex'];
		$status=$_POST['status'];
		$sqln=mysqli_query($conn,"UPDATE student set status='active' where id='$idd'");
		if($status=='take'){
      $sqln1=mysqli_query($conn," DELETE  FROM noncafe where studid='$idd'");
  

	header('Location:generatemealcard.php');
		 	
		}
		
	
	echo '<script type="text/javascript">
	alert(" sucessfully updated")</script>';
	
	}
	

if(isset($_POST['register']))
	{
		
		$na=$_POST['name'];
		$idd=$_POST['id'];
		$dep=$_POST['dept'];
		$ayear1=$_POST['ayear'];
		$cyear=$_POST['cyear'];
		$date=$_POST['date'];
		$sexxt=$_POST['sex'];
		$status=$_POST['status'];
		if($status=='take')
		{
			echo '<script type="text/javascript">
	alert("the student is registred by default ")</script>';
		}
		
		else
		{
			
		
		$sqld=mysqli_query($conn,"SELECT * FROM noncafe WHERE studid='$idd'") or die(mysql_error());
		$num=mysqli_num_rows($sqld);
	$rowcheck=mysqli_fetch_assoc($sqld);
	if($num=='0')
	{
	$sqla=mysqli_query($conn,"insert into noncafe(date,eid,studid,name,cyear,acyear,dept,sex,status,payment) VALUES('$date','$uid','$idd','$na','$cyear','$ayear1','$dep','$sexxt','$status','notpay')") ;
	$sqlb=mysqli_query($conn,"delete from specialfood where studid='$idd'");
	$sqlb=mysqli_query($conn,"delete from ailingstudent where studid='$idd'");
	
	 $sqln=mysqli_query($conn,"UPDATE student set status='$status',t='null' where id='$idd'");
	if($sqla>0)
	{
	echo '<script type="text/javascript">
	alert(" sucessfully registered")</script>';
	}}else{
		echo '<script type="text/javascript">
	alert(" The student allready registered before")</script>';
	}
				
	
	}
} 

?>
   <?php
   include("../footer.php");
   ?>
</body>
</html>