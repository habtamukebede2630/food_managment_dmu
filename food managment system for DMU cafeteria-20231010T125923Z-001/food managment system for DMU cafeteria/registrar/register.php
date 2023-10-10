
<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");

?>

<?php
$data=date("d/m/y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mfood mangment</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="../css/forms.css">
	<center>
	

</head>

<body>
	<div class="padder">
    <?php
  //  include("header.php");
   
    
    
    
    ?>
	<?php
			
			error_reporting(E_ALL); 
			ini_set('../$connection','display_errors');
			include_once '../connection.php';
			if(isset($_POST['send'])){
			if($_FILES['csv_data']['name']){
			$arrFileName = explode('.',$_FILES['csv_data']['name']);
			if($arrFileName[1] == 'csv'){
			$handle = fopen($_FILES['csv_data']['tmp_name'], "r");
			fgetcsv($handle);

			//if (fgets($handle, 4) !== "\xef\xbb\xbf") //Skip BOM if present
       // rewind($handle); //Or rewind pointer to start of file

             //$i = 0;
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
			 {
			$item1 = @mysqli_real_escape_string($connection,$data[0]);
			$item2 = @mysqli_real_escape_string($connection,$data[1]);
			$item3 = @mysqli_real_escape_string($connection,$data[2]);
			$item4 = @mysqli_real_escape_string($connection,$data[3]);
			$item5 = @mysqli_real_escape_string($connection,$data[4]);
			$item6 = @mysqli_real_escape_string($connection,$data[5]);
			$query = "SELECT *FROM student WHERE id = '" . $data[1] . "'";
			
			$check = mysqli_query($conn, $query);
 
			if ($check->num_rows > 0)
			{
				$update=mysqli_query($conn,"update student set name='$item1',sex='$item3',dept='$item4',year='$item5',status='active',t='' where id='$item2' ");
			
			}
					else{			
			$import=@mysqli_query($conn,"INSERT into student(name,id,sex,dept,year,status,t) values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','active','')");
			
		           }	
			
			
			}
			fclose($handle);
			echo '<script type="text/javascript">
				alert(" import is successful")</script>';
			}
			}
			}
			?>

       
    

	


<div class="form-style-10">
<h2>import your excel file here </h2>
<form action=""method="post"name="uploadcsv" enctype='multipart/form-data'>
	<div class="inner-wrap">
     
    <div class="button-section">
<label><input type="file"  name="csv_data" accept=".csv">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="import"name="send"><label></label></label>
 </div>
 </div>
 </form>
</div>
		</center>


<?php
include("../footer.php");
?>

</div>
</body>

</div>
</html>