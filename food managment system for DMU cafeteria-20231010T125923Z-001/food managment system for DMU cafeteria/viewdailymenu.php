<?php
include("connection.php");
include ("header.php");
include("navbar.php")

?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet.css">
    <style>
        .padder{
            margin-top:300px;
            margin-bottom:300px;
        }
        .padder h4{
            margin-top:20px;
        }
    </style>
</head>

<?php


$date=Date('Y/m/d');
$dattee=Date('l',strtotime($date));
?>
  <?php
    
    $queryview=mysqli_query($conn,"select *from dailymenu where day='$dattee'");
    if($queryview){
        $fetch=mysqli_fetch_array($queryview);
    
        $breakfast=$fetch['breakfast'];
        $lunch=$fetch['lunch'];
        $dinner=$fetch['dinner'];
     //   echo"<tr><td>".$breakfast."</td><td>".$lunch."</td><td>".$dinner."</td></tr>";
    
        echo'</table>';
        
   
   

}
?>
<div class="padder">
    <center>
<body>

    <h4><?php echo$dattee ?> Daily Menu</h4>
     <table border="2" width="850"height="150">
      <tr>
        <th>
            Breakfast
            <center><?php echo"<td><center><h3>".$breakfast."</h3></center></td>"?></center>
        </th>
      </tr>
      <tr>
        <th>
            lunch
            <center>
            <?php echo"<td><center><h3>".$lunch."</h3></center></td>"?>
           </center>
        </th>
      </tr>
      <tr>
        <th>
            Dinner
            <?php echo"<td><center><h3>".$dinner."</h3></td></center>"?>
        </th>
      </tr>
  


  
    <?php
 
 //echo"</table>";


    ?>
    
</body>
</center>
</div>
</html>
<?php
include("footer.php");
?>