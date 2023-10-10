<?php
include("../connection.php");
include("header.php");
include("navbar.php");
include("sidebar.php");
?>
<?php
$data=date("d/m/y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>food managment system for DMU</title>

</head>
<body>
    <center>
<form method="post"enctype="multipart/form-data">
<table  align="center" height="520" width="460px" border="0" >
<th colspan="2" >
<h2> Assign daily menu form</h2></th>
<tr><td  align="right"><input type="button" value="Date"></td><td><input type="text" name="date" value="<?php echo $data?>"/></td></tr>
<tr><td align="right"><h3>Day<h3></td> <td >
    <select name="day" >
        <option> select date</option>
        <option value="monday">MONDAY</option>
        <option value="tuesday">TUESDAY</option>
        <option value="wednesday">WEDNESDAY</option>
        <option value="thursday">THURSDAY</option>
        <option value="thursday">THURSDAY</option>  
        <option value="friday">THURSDAY</option>
        <option value="saturday">SATURDAY</option>
        <option value="SUNDAY">SUNDAY</option>


    </select>
</td></tr>
<tr><td  align="right"><h3>breakfast:<td ><input type="text"name="breakfast" pattern="^[a-zA-Z0-9/ ]+"required=""></td></tr>
<tr><td  align="right"><h3>lunch:</h3></td><td ><input type="text" name="lunch" pattern="^[a-zA-Z0-9/ ]+"></td></tr>
<tr><td  align="right"><h3>dinner:</h3></td><td ><input type="text"name="dinner" pattern="^[a-zA-Z0-9/ ]+"required=""></td></tr>
<tr><td ></td><td><input type="submit"  name="request" value="Register" style="background:#aac1dd;font-size:1.2em;  width: 86px;height: 40px; border-radius:14px;" >
<input type="reset" value="Reset"style="background:#aac1dd; width: 70px;height: 40px;font-size:1.2em; text-transform: capitalize; border-radius:14px;"></td></tr>
</table>
</form>
</center>
<?php
if(isset($_POST['request'])){
    if(!empty($_POST['day']) && !empty($_POST['breakfast'])&& !empty($_POST['lunch'])&& !empty($_POST['dinner'])){
    $messageIdent = ($_POST['day'] . $_POST['breakfast'] . $_POST['lunch'] . $_POST['dinner'] );
    $sessionMessageIdent = isset($_SESSION['messageIdent'])?$_SESSION['messageIdent']:'';

    if($messageIdent!=$sessionMessageIdent){          
       
            $_SESSION['messageIdent'] = $messageIdent;
          
        $day=$_POST['day'];
        $breakfast=$_POST['breakfast'];
        $lunch=$_POST['lunch'];
        $dinner=$_POST['dinner'];
       
        $select = mysqli_query($conn, "SELECT * FROM assignmenu WHERE day = '".$_POST['day']."'");
        if(mysqli_num_rows($select)){
            exit('<script type="text/javascript"> alert("menu already assigned ")</script>');
          }
   
        $query="insert into assignmenu(day,breakfast,lunch,dinner) values ('$day','$breakfast','$lunch','$dinner')";
        $run=mysqli_query($conn,$query) or die(mysqli_error()) ;
        if($run){
            echo '<script type="text/javascript"> alert("menu assigned ")</script>';
        }
        else{
            echo '<script type="text/javascript"> alert("couldnt assign menu")</script>';

        }   
   
}
else {
}   echo "";
}
}

?>

<?php
include("../footer.php");
?>
</body>
</html>