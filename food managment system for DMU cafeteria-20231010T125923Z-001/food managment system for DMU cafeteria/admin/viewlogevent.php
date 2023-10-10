<?php
include("../connection.php");
session_start();
if (empty($_SESSION['user'])){
    header('location:../index.php');
   }
   include("header.php");
   include("navbar.php");
?><!DOCTYPE html>
<html lang="en">
<head>
    <style>
        form{
            margin-top: 200px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type = "text/javascript" >
 function preventBack()
 {
 window.history.forward();
 } 
 setTimeout("preventBack()", 0); 
 window.onunload=function(){null};
  </script>
    <title>log events</title>
</head>
<body>
    <form id="form"method="post"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<center>
   <table border="1"bgcolor="#959c9d">
       <h3><i>system log event</i> </h3>
    <?php

    $result=mysqli_query($conn,"select *from logfile");
    echo "<tr>";
echo "<th bgcolor=#959c9d>Username</th>";
echo "<th bgcolor=#959c9d>log type</th>";
echo "<th bgcolor=#959c9d>date</th>";
echo "<th bgcolor=#959c9d>role</th>";
echo "<th bgcolor=#959c9d>ipadd</th>";
echo "<th bgcolor=#959c9d> usertype</th>";				
echo "<th bgcolor=#959c9d> delete</th>";				
	echo "</tr>";	
    while($row=mysqli_fetch_array($result)){

  
    ?>
    
	<tr align='center'>	

<td><font color='black'><?php echo $row['username'];?></font></td>
<td><font color='black'><?php echo $row['action'];?></font></td>
<td><font color='black'><?php echo $row['date'];?></font></td>
<td><font color='black'><?php echo $row['user'];?></font></td>
<td style="width: 200px;"><font color='black'><?php echo $row['ipadd'];?></font></td>
<td><font color='black'><?php echo $row['status'];?></font></td>
<td><font color='black'>

<?php echo '<a href=deletelogfile.php?aid='.$row['nu'].'>';?>

<img src="../images/delete.jpg "height="20px"width="20px"><?php echo $row['nu'];?></a>
</font></td>

</tr>


            <?php	
			}
		
			?>


   </table>
   </center>
</body>
<?php
//include("../footer.php");
?>
</html>