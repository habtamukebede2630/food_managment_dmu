
<?php
include("../connection.php");
session_start();
if(empty($_SESSION['user'])){
    header('location:../index.php');
   }
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
    <title>mealcard form</title>

</head>
<body>
    <?php
    include("header.php");
    include("navbar.php");  
    include("sidebar.php");
    

    
    ?>
       
    <?php
     
    
            if(isset($_POST['upload'])){

            $id=$_POST['id'];
            $dormno=$_POST['dormno'];
            $blockno=$_POST['blockno'];
            $meal=$_POST['meal'];
           
            $name=$_FILES['photo']['name'];
            $tmp_name=$_FILES['photo']['tmp_name'];
            $path="images/".$_FILES['photo']['name'];
            
            if(!file_exists("images")){
              mkdir("images");
            }
            copy($tmp_name, $path);
            $select = mysqli_query($conn, "SELECT * FROM cafeusers WHERE meal = '".$_POST['meal']."'");
          if(mysqli_num_rows($select)) {
           exit('<center><h1>This meal number is already registered</h1></center>');
            }
            $check = mysqli_query($conn, "SELECT * FROM student WHERE id = '".$_POST['id']."'");
            if (mysqli_num_rows($check) == 0)
            {
              echo'<h1><script type="text/javascript"> alert("no student found by this id")</script></h1>';
            }
            else{
      
          
            

            $sql="insert into cafeusers(dormno,blockno,meal,id,path)values('$dormno','$blockno','$meal','$id','$path')";
            $result=mysqli_query($conn, $sql);
            if($result){
              echo'<script type="text/javascript"> alert("sucessfully registered")</script>';
            }else{
                echo'<script type="text/javascript"> alert("can not register ")</script>';
            }
            echo "";
          }
        }
          
            
        

    ?>
    <center>
<form method="post"enctype="multipart/form-data">
<table  align="center" height="520" width="460px" border="0" >
<th colspan="2" >
<h2> cafteria user students registration form</h2></th>
<tr><td  align="right"><input type="button" value="Date"></td><td><input type="text" name="date" value="<?php echo $data?>"/></td></tr>
<tr><td  align="right"><h3>Dorm NO:</h3></td><td ><input type="text"name="dormno" pattern="^[a-zA-Z0-9/ ]+"required=""></td></tr>
<tr><td  align="right"><h3>Block NO:</h3></td><td ><input type="text"name="blockno" pattern="^[a-zA-Z0-9/ ]+"required=""></td></tr>
<tr><td  align="right"><h3>Meal NO:</h3></td><td ><input type="text"name="meal" pattern="^[a-zA-Z0-9/ ]+"required=""></td></tr>
<tr><td  align="right"><h3>ID:</td><td><input type="text" name="id" pattern="^[a-zA-Z0-9/ ]+"></td></tr>
<tr><td  align="right"><h3>Photo:</td><td ><input type="file"name="photo" pattern="^[a-zA-Z0-9/ ]+"required=""></td></tr>
<tr><td ></td><td><input type="submit"  name="upload" value="Register" style="background:#aac1dd;font-size:1.2em;  width: 86px;height: 40px; border-radius:14px;" >
<input type="reset" value="Reset"style="background:#aac1dd; width: 70px;height: 40px;font-size:1.2em; text-transform: capitalize; border-radius:14px;"></td></tr>
</table>
</form>
</center>
<?php
include("../footer.php");
?>
  
    
</body>
</html>