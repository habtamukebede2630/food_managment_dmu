
<?php
session_start();
include("../connection.php");
include("header.php");
include("navbar.php");
?>
<?php $date=date("Y/m/d"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/forms.css">
    <title>delete logfile</title>
</head>
<body>
    <?php
    if(isset($_SESSION['user']['username'])){
        $username=$_SESSION['user']['username'];
        $query1=mysqli_query($conn,"select *from user where user_id='$username'");
        while($query2=mysqli_fetch_array($query1))
        $uid=$query2['user_id'];
   
    ?>
    <?php
    $qid=mysqli_query($conn,"select *from logfile");
    if($qid){
    $row=mysqli_fetch_array($qid);
    $id=$row['nu'];
    $status=$row['status'];
    $username=$row['username'];
    $date=$row['date'];
    }
    ?>
    <?php
if(isset( $_REQUEST['delete'])){
    $id=$_REQUEST['nu'];

   // $username=$_REQUEST['username'];
   $query=mysqli_query($conn,"delete from logfile where nu='$id'");
   if($query){
    echo '<script type="text/javascript">
	alert(" succesfully deleted")</script>';
   }
}
    $result=mysqli_query($conn," select *from  logfile where nu='$id'");
       $row=mysqli_fetch_array($result);

   ?>
    <div class="form-style-10">
   <h2>delete the uers log file</h2>
    <form action="" method="">
    <div class="inner-wrap">
	<table align="center" height="400px" width="400px">
   <label>  Id:</label><input type="text" name="nu" value="<?php echo $row['nu'];?>" readonly>
   <label>  username:</label><input type="text" name="nu" value="<?php echo $row['username'];?>" readonly>
   
   

    <tr><td></td><td><input type="submit" value="delete" name="delete"></table></div></form>
	<?php
	
}else
    {
    	header("location:index.php");
     }
	 

?>
</body>
</html>