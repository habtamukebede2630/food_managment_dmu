<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");

?>
<html>
<head>
<title>Internship request </title>
<link rel="Stylesheet" type="text/css" href="../css/forms.css">

</head>
<body>


		<?php 
	$date=Date('Y/m/d');
	$dattee=Date('l',strtotime($date));
	?>
		<head>

</head>
<?php
	if(isset($_SESSION['user']['username'])&&isset($_SESSION['user']['password'])&&isset($_SESSION['user']['role']))
	
	{
		$username=$_SESSION['user']['username'];
		$password=$_SESSION['user']['password'];
		$role=$_SESSION['user']['role'];
		
		$query1=mysqli_query($conn,"select * from user WHERE user_id='$username'");
		while($query2=mysqli_fetch_array($query1))
{ 
$id=$query2['user_id'];
$fname=$query2['fname'];
$sname=$query2['sname'];
$img=$query2['photo'];
}

}
	if(isset($_POST['submit']))
{
	 $year=$_POST['year'];
	$dept=$_POST['dept'];
	$in=mysqli_query($conn,"select * from student where dept='$dept' and year='$year'");
	$x=mysqli_num_rows($in);
	$date=$_POST['date'];
	$place=$_POST['pmove'];
	$reason=$_POST['rmove'];
	$exite=$_POST['edate'];
	$back=$_POST['bdate'];
   

	$stud=$x;
	$mat=$_POST['use'];
	if($dept!==$id){
		echo '<script type="text/javascript">
	alert(" choose the right department")</script>';
	}
else{
	$sql="insert into internship(date,senderid,startdate,returndate,place,reason,department,year,material,number,status)values('$date','$id','$exite','$back','$place','$reason','$dept','$year','$mat','$stud','A')";
	$query=mysqli_query($conn,$sql);
	
	if($exite<=$date)
	{
		$status=mysqli_query($conn,"update student set status='active' where dept='$dept' and status!='noncafe'and year='$year'");
	}
	else
	{
		$status=mysqli_query($conn,"update student set status='inactive' where dept='$dept'");
	}
	
	if($query>0)
	{
	$qa="INSERT INTO userview(date,time,user_id,fname,lname,photo,activity) VALUES('$date','$id','$fname','$sname','$img','internship request')";
	$query1=mysqli_query($conn,$qa);
		
	
	echo '<script type="text/javascript">
	alert(" request is sent")</script>';
	}
	
else
	
{
	
echo '<script type="text/javascript">
	alert("try again!")</script>'.mysqli_error();	
}

}
	



	
}
	?>	
	
		
	<div class="form-style-10">
	<h2>Internship Request Form </h2>
  <form action="" method="post">
<div class="inner-wrap">
<label><input type="button"value="Date"onclick="dat();"/><input type="text"name="date" value="<?php echo $date; ?>"/></label>
<label>Place to move:<input type="text" name="pmove" required="" pattern="^[a-zA-Z0-9]+"></label>
<label>Reason to move:<input type="text" name="rmove" required="" pattern="^[a-zA-Z0-9]+"></label>
<label>Exite Date:<input type="date" name="edate" pattern="^[a-zA-Z0-9 -/ ]+"></label>
<label>Back Date<input type="date" name="bdate" pattern="^[a-zA-Z0-9/ -]+">:</label>
<label>Departement:<select name="dept" >
	<option value="" selected="">select departement</option>
	<option value="IT">Information technology</option>
	<option value="software">software</option>
	<option value="civil">civil</option>
	<option value="electerical">Electerical</option>
	<option value="water">water</option>
	<option value="cotem">COTEM</option>
	<option value="mechanical">Mechanical</option>
	<option value="rularagriculture">Rural developement & agricalture</option>
	<option value="plantscince">plantscince</option>
	<option value="animalscince">Animal Scince</option>
	<option value="naturalmgmt">Natural Resource Mgmt</option>
	<option value="horticulture">Horticulture</option>
	<option value="agroforesty">Agro Foresty</option>
	<option value="agribus">Agri-Bus & Value Chain Mgmt</option>
	<option value="egroeconomics">Agro Economics</option>
	<option value="chemistry">Chemistry</option>
	<option value="physics">Physics</option>
	<option value="mathematics">Mathematics</option>
	<option value="stat">Statistics</option>
	<option value="biology">Biology</option>
	<option value="sportscince">Sport Scince</option>
	<option value="biotechnology">Bio-technology</option>
	<option value="economics">Economics</option>
	<option value="accounting">Accounting</option>
	<option value="manegement">Manegement</option>
	<option value="nursing">Nursing</option>
	<option value="phealth">Public Health</option>
	<option value="midwifry">Midwifry</option>
	<option value="elanguage">Ethiopian Language</option>
	<option value="english">English</option>
	<option value="history">History</option>
	<option value="civic">Civics & Ethical Education</option>
	<option value="geography">Geography & Enviromental Studies</option>
	<option value="sociology">Sociology</option>
	</select></label>
    <label>Year:<input type="text" name="year" pattern="^[a-zA-Z0-9/ ]+"></label>
<label>Material Use:<input type="text" name="use" pattern="^[a-zA-Z0-9/ ]+"></label>
 </div>
    <div class="button-section">
<input type="submit" name="submit"  value="Request">
<input type="reset" value="reset"></div>
</form></div>
  
  

</body>
</html>
