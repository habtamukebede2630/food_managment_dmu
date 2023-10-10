<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");


?>
<html>
<head>
<title>delete feed back </title>
<link rel="Stylesheet" type="text/css" href="../css/styesheet.css">
<style>
    .padder{
        margin-top:200px;
    }
</style>
</head>
<div class="padder">


<body>

	</td>
	</tr>
<div id="content">
	<tr>
	<td>
	<table border="0" width="" height="">
	<tr>
	<td width="500" height="50" >
	<div id="Center">
	
	<?php $date=date("Y/m/d"); ?>
	<?php
	
	if(isset($_SESSION['user']['username'])&&isset($_SESSION['user']['password']))
    {
    	if(isset($_SESSION['user']['username'])&&isset($_SESSION['user']['password'])&&isset($_SESSION['user']['role']))
	{
		$username=$_SESSION['user']['username'];
		$password=$_SESSION['user']['password'];
		$role=$_SESSION['user']['role'];
		
		$query1=mysqli_query($conn,"select * from user WHERE user_id='$username'");
		while($query2=mysqli_fetch_array($query1))
{ 
$id=$query2['user_id'];
}

}
	include("../connection.php");
	$aid=$_REQUEST['id'];
	$sql="delete from feedback where id='$aid'";  
	 $query=mysqli_query($conn,$sql); 
	if($query>0)
	{
	$qa="INSERT INTO userview(user_id,activity) VALUES('$id','delete feadback')";
	$query1=mysqli_query($conn,$qa) or die(mysqli_error());
	echo '<script type="text/javascript">
	alert(" seccessfull")</script>';
	}
else
	
{
	
echo '<script type="text/javascript">
	alert("try again!")</script>'.mysqli_error();	
}
	 
	  
	
	
	}?>



</div>
 
	<?php
 include("../footer.php");
	?>
	</td>
  </tr>
 </table>
 </td></tr>
 </div>

</table> 

</div>

</body>
</div>
</html>
