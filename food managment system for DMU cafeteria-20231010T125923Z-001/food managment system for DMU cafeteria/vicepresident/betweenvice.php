<?php
include("../connection.php");
session_start();
include("header.php");
include("navbar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .spacing{
        margin-top:100px;
    }
</style>
</head>
<body>
<center>
        <div class="spacing">
    <form action="" method="post">
    <table >
 	<tr>
 		<th>View Reports</th>
  	</tr>
  	<tr>
  		<td>
  			Start Date: <input type="date" name="date"><td><input type="button" value="To"/></td><td><input type="date" name="dat"/></td>
  		</td>
  		
  	</tr>
  	<tr><td><input type="submit" name="today" value="Today"/></td></tr>
  	<tr><td><input type="submit" name="search" value="Search"/></td></tr>
 </table>
    </form>
    </div>
    </center>
    <center>
    <?php
    if(isset($_POST['search'])){
        $date1=$_REQUEST['date'];
 	  $date2=$_REQUEST['dat'];
       if($date1<=$date2)
       {
           echo "<table width=450 border=1 >
           <tr><th></th></tr>
           <i>Item name that are expend From:&nbsp;&nbsp;<u>$date1</u>&nbsp;&nbsp;&nbsp;&nbsp;To:&nbsp;&nbsp;<u>$date2</u> are expressed in the following format</i>
           <tr><th align=left>Item Name</th><th align=left>Total Expenditure</th></tr>";
          
          $rep1=mysqli_query($conn,"select * from incomingfood") or die(mysqli_error());
          while($yes=mysqli_fetch_array($rep1))
          {
          $item=$yes['itemname'];	
          $sum=0;
          $rep=mysqli_query($conn,"select * from dailyexpenditure where itemname='$item' and date>='$date1' and date<='$date2'") or die(mysql_error());
          while($row3=mysqli_fetch_array($rep))
          {
              $sum=$sum+$row3['dailyexpenditure'];
              //$price=$sum+$row3['totalprice'];
          }
          
          if($sum!='0')
          {
              
          
          echo "<tr><td>".$item."</td><td>".$sum."</td></tr>";
          }}
          $arry=array("enjera  350 gram","met","fire wood");
          foreach($arry as $value)
          {
              
          $sum=0;
          $rep1=mysqli_query($conn,"select * from dailyexpenditure where itemname='$value' and date>='$date1' and date<='$date2'") or die(mysql_error());
          while($yes=mysqli_fetch_array($rep1))
          {
          $item=$yes['itemname'];
          $daily=$yes['dailyexpenditure'];	
          
      $sum=$sum+$daily;
          
          
          
      }
      
      
      if($sum!='0')
          {
              
          
          echo "<tr><td>".$item."</td><td>".$sum."</td></tr>";
          }
          
          
      }
      echo"</table>";
   }
   else {echo '<script type="text/javascript">
      alert(" start date is greater than end date")</script>';
   }
   }
   if(isset($_POST['today']))
   {
       $date=Date('Y/m/d');
      $dattee=Date('l',strtotime($date));
  
       
           echo "<table width=450 border=1 >
           <tr><th></th></tr>
           <i>Item name that are expend Today:&nbsp;&nbsp;<u>$date</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u></u> are expressed in the following format</i>
           <tr><th align=left>Item Name</th><th align=left>Total Expenditure</th></tr>";
          
          $rep1=mysqli_query($conn,"select * from incomingfood") or die(mysql_error());
          while($yes=mysqli_fetch_array($rep1))
          {
          $item=$yes['itemname'];	
          $sum=0;
          $rep=mysqli_query($conn,"select * from dailyexpenditure where itemname='$item' and date='$date'") or die(mysql_error());
          while($row3=mysqli_fetch_array($rep))
          {
              $sum=$sum+$row3['dailyexpenditure'];
              //$price=$sum+$row3['totalprice'];
          }
          
          if($sum!='0')
          {
              
          
          echo "<tr><td>".$item."</td><td>".$sum."</td></tr>";
          }}
          $arry=array("enjera  350 gram","met","fire wood");
          foreach($arry as $value)
          {
              
          $sum=0;
          $rep1=mysqli_query($conn,"select * from dailyexpenditure where itemname='$value' and date='$date'") or die(mysql_error());
          while($yes=mysqli_fetch_array($rep1))
          {
          $item=$yes['itemname'];
          $daily=$yes['dailyexpenditure'];	
          
      $sum=$sum+$daily;
          
          
          
      }
      
      
      if($sum!='0')
          {
              
          
          echo "<tr><td>".$item."</td><td>".$sum."</td></tr>";
          }
          
          
      }
      echo"</table>";
   }
   
    
    ?>
    </center>

    
</body>
</html>