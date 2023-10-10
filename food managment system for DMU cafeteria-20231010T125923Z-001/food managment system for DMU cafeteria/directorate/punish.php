
<?php
include("../connection.php");
session_start();

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
	<style>
		.padder{
			margin-top:200px;
		}
	</style>
	<div class="padder">
		<center>
				<p><h4>Enter Student's ID  to get full information</h4></p>
	   <form action="" method="post">
	ID-NO:<input type="text" name="id"><br>
	<input type="submit" value="Search" name="search">
	  </form>
	  </center>
	  </div>

	  <br>
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
	<link rel="stylesheet" href="../css/forms.css">
	<div class="form-style-10">
		<h2>Register  <i>Punish</i> Students</h2>
		
		<form action="" method="POST">
		<div class="inner-wrap">
		
		<label>Date:<input type="text"name="dat"readonly="" value="<?php echo $date; ?>"/></label> 
		<label>Name:<input type="text"name="name"readonly="" value="<?php echo $name; ?>"/></label>
		<label>Sex:<input type="text"name="sex"readonly="" value="<?php echo $sex; ?>"/></label>
		<label>ID NO:<input type="text"name="id"readonly="" value="<?php echo $id; ?>"/></label> 
		<label>Departement:<input type="text"name="dept"readonly="" value="<?php echo $dept; ?>"/></label>
		<label>Class year:<input type="text"name="cyear"readonly="" value="<?php echo $ayear; ?>"/></label> 
		<label>Acadamic year:<input type="text"name="ayear"readonly="" value="<?php echo $year; ?>"/></label>
		<label>Reason for register: <textarea name="reason" required="true"> </textarea> </label> 
		
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
			$na=$_POST['name'];
			$idd=$_POST['id'];
			$dep=$_POST['dept'];
			$ayear1=$_POST['ayear'];
			$cyear=$_POST['cyear'];
			$dat=$_POST['dat'];
			$sexxt=$_POST['sex'];
			$reson=$_POST['reason'];
			$sqld=mysqli_query($conn,"SELECT * FROM punish WHERE rid='$idd'") or die(mysqli_error());
			$count2=mysqli_num_rows($sqld);
			if($count2=='0')
			{
		$sqla=mysqli_query($conn,"insert into punish(date,eid,studid,name,cyear,acyear,dept,sex,reason) VALUES('$dat','$uid','$idd','$na','$cyear','$ayear1','$dep','$sexxt','$reson')") OR die(mysql_error());
		$sqlwea=mysqli_query($conn,"update student set status='punish',t='' where id='$idd'") OR die(mysqli_error());
		
		 
		if($sqla>0)
		{
		echo '<script type="text/javascript">
		alert(" seccesfully registered")</script>';
		}
		}
		else echo "not inserted";
		}
	?>
	<?php
	include("../footer.php");
	?>