<?php
session_start();
include("connection.php");
?>
<html>
<head>
<title>searchform</title>
<link rel="Stylesheet" type="text/css" href="setting.css">
</head>
<body>
<div id="container">
<table><tr><td>
<?php
include("header.php");
?>
</td></tr></table>
<div id="navigationmenu">
<table width="1000"><tr><td>
	<?php
		include("menu.php");
	?>
	</td></tr></table>
	</div>
	<div id="content">
	<table border="0" width="1000" height="400"><tr><td width="100" height="50">
	<div id="sideleft">
	<?php
		include("adminlink.php");
	?>
	</div>
	</td>
	<td width="500" height="50"><div id="Center">
<?php

if(isset($_POST['generate']))
{
	$id=$_REQUEST['id'];
if(isset($id))
{
	$sql=mysqli_query($conn,"select * from assign,mealform where mealform.id='$id'");
	$row=mysqli_fetch_array($sql);
	$id=$row['id'];
	$name=$row['fname'];
	$fname=$row['lname'];
	$dept=$row['did'];
	$blockno=$row['blockno'];
	$dormno=$row['dormno'];
	$year=$row['year'];
	$ayear=$row['ayear'];
	$meal=$row['meal'];
	//$photo="<img src=".$row['path']."width=150 height=50>";
	if($id!=null)
	{?>
	<table width="570" height="80"><tr><td>
		Name:<?php
		echo $name;
		?>
		<?php 
		echo $fname;
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
		echo $ayear;
		?>
		&nbsp;&nbsp;
		dorm NO:<?php 
		echo $blockno;
		?>
		-
		<?php 
		echo $dormno;
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
		echo "<img src=".$row['path']." width=70 height=50>";
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
		?>
		<tr><td> student signature:</td>
		<form><input type="button" value="Print" onclick="window.print()"></form></tr>
		</tr></table>
		
	<?php
	}
	else{
	echo "<h2>No record found!</h2>";
	}
}
?>
<?php
}
?>
  </div></td>
  <td width="100" height="50"><div id="sideright">
<h1>well come to debre markos students food service manegement system</h1>
  </div>
  </td>
  </tr></table>
	</div>
	<table width="1000"><tr><td>
	<?php
 include("footer.php");
?>
</td></tr></table>
</div>

</body>
</html>
