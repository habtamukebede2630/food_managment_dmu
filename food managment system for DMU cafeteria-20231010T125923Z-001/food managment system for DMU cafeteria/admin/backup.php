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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backup By Admin</title>
    <style>
      .padder{
        margin-top:200px;
      }
    </style>
</head>
<body>
  <div class="padder">
    <script>
function preventBack()
 {
 window.history.forward();
 } 
 setTimeout("preventBack()", 0); 
 window.onunload=function(){null};
  </script>
  <?php
  $tables = array();
  $query=mysqli_query($conn,'SHOW TABLES');
  while($row=mysqli_fetch_row($query)){
      $tables[]=$row[0];
  }
  $result="";
  foreach($tables as $table){
    $query = mysqli_query($conn, 'SELECT * FROM '.$table);
      $num_fields=mysqli_num_fields($query);
      $result.='DROP TABLE IF EXISTS'.$table.';';
      $row2 = mysqli_fetch_row(mysqli_query($conn, 'SHOW CREATE TABLE '.$table));
      $result.="\n\n".$row2[1].";\n\n";
      for ($i = 0; $i < $num_fields; $i++) {
        while($row = mysqli_fetch_row($query)){
           $result .= 'INSERT INTO '.$table.' VALUES(';
             for($j=0; $j<$num_fields; $j++){
               $row[$j] = addslashes($row[$j]);
               $row[$j] = str_replace("\n","\\n",$row[$j]);
               if(isset($row[$j])){
                   $result .= '"'.$row[$j].'"' ; 
                }else{ 
                    $result .= '""';
                }
                if($j<($num_fields-1)){ 
                    $result .= ',';
                }
            }
               $result .= ");\n";
        }
        }
        $result .="\n\n";
  }
  $folder = 'C:/xampp/htdocs/food managment system for DMU cafeteria/backup/';
  if (!is_dir($folder))
mkdir($folder, 0777, true);
chmod($folder, 0777);
$filename = $folder."food_managment"; 

$handle = fopen($filename.'.sql','w+');
fwrite($handle,$result);
fclose($handle);
  ?>
  	
	<?php
	
    echo "<script>alert('Database Backed Up Successfully!');</script>.</a> </h2>";
    echo "<tr color=blue><td>Path: ".$filename."</td></tr><br>";
?>
</div>
</body>
</html>