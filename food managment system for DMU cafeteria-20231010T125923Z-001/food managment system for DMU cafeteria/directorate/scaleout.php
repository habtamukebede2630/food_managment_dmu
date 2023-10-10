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
$queryinc=mysqli_query($conn,"select *from incomingfood");
if($queryinc){
   $row=mysqli_fetch_array($queryinc);
   $incoming=$row['itemname'];
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
<style>
    .padder{
        margin-bottom:200px;
    }
</style>
<div class="padder">
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
        $id=$_POST['id'];
        $date=$_POST['date'];
        $itemname=$_POST['itemname'];
        $scale=$_POST['scale'];
        $dxp=$_POST['dailyexpenditure'];
        $singleprice=$_POST['sprice'];
        $day=$_POST['day'];
        $calculate=$singleprice*$dxp;
        $query1=mysqli_query($conn,"insert into foodscale (date,itemname,scale,dailyexpenditure,sprice,day,totalprice,eid)values('$date','$id','$scale','$dxp','$singleprice','$day','$calculate','$uid')");
        if($query1>0){
            echo '<script type="text/javascript">
	   alert(" successfully scaled up")</script>';
        }
        
        else{
            echo '<script type="text/javascript">
	alert(" tryagain")</script>';
        }


    }
    ?>
   
    
    <div class="form-style-10">
    <h2>scaleout daily food menu</h2>
        <form method="POST">
        
            <div class="inner-wrap">
                 
    <label><input type="button"value="Date"onclick="Date();"/><input type="text"name="date"readonly="" value="<?php echo $date; ?>"/></label><br>
    <label>itemname:<select name="id">
       
    <?php
      
       
      $sql=mysqli_query($conn,"SELECT * from incomingfood ");
          while($row=mysqli_fetch_array($sql))
      {
          
          echo "<option>".$row['itemname']."</option>";
      }
  
      ?></select>	</label>
		<label>scale:<select name="scale" >
	<option value="number">Number</option>
	<option value="killogram" selected="">Killogram</option>
	<option value="packet">Packet</option>
	<option value="liter">Liter</option>
	<option value="cap">Cap</option>
	<option value="m3">Meter Cube</option>
	<option value="carton">Karton</option>
	</select></label>	
	
 <label>Daily Expenditure:<input type="text" name="dailyexpenditure" pattern="^[.0-9/ ]+" required=""></label>	

	
		
 <label>Single Price:<input type="text"name="sprice" pattern="^[.0-9/ ]+"required=""></label>	


          <label>Day<select name="day">
	      <option value="monday">Monday</option>
	        <option value="tuesday">Tuesday</option>
	       <option value="wednesday">wednesday</option>
	     <option value="thursday">Thursday</option>
	     <option value="friday">Friday</option>
	     <option value="saturday">Saturday</option>
	      <option value="sunday">Sunday</option>
	     </select></label>	
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
</div>
</html>
<?php
include("../footer.php");
?>