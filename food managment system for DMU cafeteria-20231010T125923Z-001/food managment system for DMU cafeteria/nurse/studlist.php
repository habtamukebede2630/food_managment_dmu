<?php
session_start();
if(empty($_SESSION['user'])){
    header('location:../index.php');
   }

include("../connection.php");
?>
<html>
<head>
<title>students list</title>
<link rel="Stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<div id="container">

	<div id="content">
		<center>
	<table border="1px" width="500" height="50"><tr>
		<th> fname</th>
		<th> lname</th>
		<th>department</th>
		<th>year</th>
		<th>ayear</th>
		<th>id</th>
		
	
</tr>
<?php

if(isset($_POST['search']))
{
	$id=$_POST['id'];
	$sql="SELECT * from student where id=$id";
$result=$conn->query($sql);
if($result->num_rows>0){
    while($row=$result-> fetch_assoc()){
        echo"<tr><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["department"]."</td><td>".$row["year"]."</td><td>".$row["ayear"]."</td><td>".$row["id"]."</td></tr>";
    }
    echo"</table>";
}
else{
    echo"<center><h1> NO RECORD FOUND</h1></center>";
}
	
}

?>
</table>
</center>

</body>
</html>