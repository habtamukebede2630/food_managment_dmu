<?php
include("../connection.php");
session_start();
ob_start();
if(empty($_SESSION['user'])){
    header('location:../index.php');
   }

include("header.php");
include("navbar.php");
?>
<?php
if(isset($_SESSION['user']['username'])&& isset($_SESSION['user']['password'])&& isset(['user']['role'])){
    $username=$_SESSION['user']['username'];
    $password=$_SESSION['user']['password'];
    $role=$_SESSION['user']['role'];
    $query1=mysqli_query($conn,"select *from user where user_id='$username'");
    while($query2=mysqli_fetch_array($query1)){
        $uid=$query2['user_id'];

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="../css/forms.css">
     <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
</head>
<body> 
<?php $date=Date('Y/m/d');
	$dattee=Date('l',strtotime($date)); ?>
	<?php
    if(isset($_SESSION['user']['username'])){
    $username=$_SESSION['user']['username'];
    $query1=mysqli_query($conn,"select * from user where user_id='$username'");
     while($query2=mysqli_fetch_array($query1))
     {
         $uid=$query2['user_id'];
     }
    }
    ?>
    <?php
    if(isset( $_POST['submit'])){
        $day=$_POST['day'];
        $breakfast=$_POST['breakfast'];
        $lunch=$_POST['lunch'];
        $dinner=$_POST['dinner'];
        $foodname=$_POST['foodname'];

        $date=$_POST['date'];
       // $itemname=$_POST['itemname'];
        $query3=mysqli_query($conn,"insert into dailymenu (senderid,date,day,breakfast,lunch,dinner)values('$uid','$date','$day','$breakfast','$lunch','$dinner')");
        if($query3>0){
            echo '<script type="text/javascript">
	   alert(" successfully sceduled")</script>';
        }
        
        else{
            echo '<script type="text/javascript">
	alert(" tryagain")</script>';
        }


    }
    ?>
   
    
    <div class="form-style-10">
    <h2>Register food menu</h2>
        <form method="POST">
        
            <div class="inner-wrap">
                 
    <label><input type="button"value="Date"onclick="Date();"/><input type="text"name="date"readonly="" value="<?php echo $date; ?>"/></label><br>
    

          <label>Day<select name="day">
	      <option value="monday">Monday</option>
	        <option value="tuesday">Tuesday</option>
	       <option value="wednesday">wednesday</option>
	     <option value="thursday">Thursday</option>
	     <option value="friday">Friday</option>
	     <option value="saturday">Saturday</option>
	      <option value="sunday">Sunday</option><br>
          </select>
          <label>Breakfast:<input type="text" name="breakfast" pattern="^[a-zA-Z ]+" required=""></label>	
          <label>Lunch:<input type="text" name="lunch" pattern="^[a-zA-Z ]+" required=""></label>	
          <label>Dinner:<input type="text" name="dinner" pattern="^[a-zA-Z ]+" required=""></label>	






       </div>
    <div class="button-section">
    <input type="submit"  name="submit" value="Submit">
<input type="reset" value="Reset">
</div>
</div>
</form>
</div> 
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>
<?php
include("../footer.php");
?>
