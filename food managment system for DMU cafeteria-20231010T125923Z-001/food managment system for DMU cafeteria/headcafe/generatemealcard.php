<?php
   include("../connection.php");
session_start();
if(empty($_SESSION['user'])){
    header('location:../index.php');
   }

include("header.php");
include("navbar.php");
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>generate meal card</title>
</head>
<style>
	form{
		margin-top:200px;
	}
</style>
<body>
    <center>
    <form action=""method="post">
    <p><h3>search student that needs to take meal card</h3></p>
    IDNO:  <input type="text"name="id"placeholder="insert the students id">
    <input type="submit" value="search"name="search">
    <script language="javascript">
        function printer(){
            var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,";
            disp_setting+="scrollbars=yes,widtd=900, height=400, left=100, top=25";
            var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Lists</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="widtd: 900px; font-size:16px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus();  
        }
    </script>
    <style>
#print_content{
width:300px;
margin-left:-10 auto;
}
</style>
<div id="print_content">
    <?php





if(isset($_POST['search']))
{
	$id=$_REQUEST['id'];
if(isset($id))
{
	
	$sql=mysqli_query($conn,"select * from student where id='$id' and status='active' and t!='take'and status!='punish'");
	
	$row=mysqli_fetch_array($sql);
	$id=$row['id'];
	$name=$row['name'];
	$year=$row['year'];
	$s=$row['status'];
	$meal=$row['meal'];
	$dept=$row['dept'];
		if($id!=null)
	
	{?>
	<table width="570" height="80" bgcolor="#fff" border="0.5"><tr><td>
	
		Name:<?php
		echo $name;
		?>
		<?php 
		//echo $fname;
		echo"<br>";
		?>
		department:<?php 
		echo $dept;
		?>
		&nbsp;&nbsp;
		class year:<?php 
		echo $year;
		echo"<br>";
		?>
		Academic year:<?php 
		echo $year;
		?>
		&nbsp;&nbsp;
		dorm NO:<?php 
		//echo $blockno;
		?>
		-
		<?php 
		//echo $dormno;
		echo"<br>";
		?>
		</td>
		<td>
		&nbsp;&nbsp;&nbsp;ID NO:<?php 
		echo $id;
		echo "<br>";
		?>
		&nbsp;&nbsp;&nbsp;Meal NO:<?php 
		echo $meal;
		//echo "<img src=".$row['path']." width=70 height=50>";
		?>
		</td>
		</tr><tr>
		<?php
		$array1=array("date","sep","oc","no","de","ja","fe","ma","ap","ma","ju","jl","au");
		echo"<td>";
		echo "<table border=1><tr>";
		foreach($array1 as $value)
		echo "<td>".$value."</td>";
		echo "</tr>";
		for($i=1;$i<=15;$i++)
		{
		echo"<tr><td>".$i."</td>";
		for($j=1;$j<=12;$j++)
		{
		echo "<td>"."_"."</td>";
		}
		echo "</tr>";
		}
		echo"</table></td><td>";
		echo "<table border=1><tr>";
		foreach($array1 as $value)
		echo "<td>".$value."</td>";
		echo "</tr>";
		for($i=16;$i<=30;$i++)
		{
		echo"<tr><td>".$i."</td>";
		for($j=1;$j<=12;$j++)
		{
		echo "<td>"."_ "."</td>";
		}
		echo "</tr>";
		}
		echo "</table></td>";
		$swe=mysqli_query($conn,"update student set t='take' where id='$id'");
		?>
		<tr><td> student's signature:...........................</td><td>Student's Service Representative signiture..........................</td></tr>
		<a href="javascript:printer()">Print</a>
		</div></tr>
		</tr></table>
	<?php
	}
	else{
	echo '<script type="text/javascript">
	alert(" students with this id is not allowed to take meal card")</script>';
	
	
}

}
?>
<?php
}
?>
    </form>
    </center>
</body>
</html>
<?php
include("../footer.php");
?>