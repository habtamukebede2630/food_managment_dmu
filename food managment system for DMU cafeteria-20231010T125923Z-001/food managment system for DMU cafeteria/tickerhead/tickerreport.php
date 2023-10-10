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
</head>
<style>
    .padder{
        margin-top:200px;
       margin-bottom:200px;
    }
    .internship{
        padding-top:35px;
    }
</style>
<div class="padder">
<body>
    <center>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,widtd=900, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>tickerLists</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="widtd: 900px; font-size:16px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<style>
#print_content{
width:450px;
margin-left:-10 auto;
}
.print-content{
    margin-top:110px;
}
</style>
<div id="print_content">           
     <?php
    if(isset($_SESSION['user']['username'])&& isset($_SESSION['user']['password'])&&isset($_SESSION['user']['role'])){
        $username=$_SESSION['user']['username'];
        $password=$_SESSION['user']['password'];
        $role=$_SESSION['user']['role'];
        $query1=mysqli_query($conn,"select *from user where user_id='$username'");
        while($query2=mysqli_fetch_array($query1))
        {
            $id=$query2['user_id'];
        }
    }
   
    $result=mysqli_query($conn,"select * from student where status='break'");
echo "<div class='padtable'><p><h4>Students who leave from the university in case of break<h4></p>
	<table border=1 width=650 > 
	<tr><th bgcolor=#daebe0 width=30>Student Id</th>
	<th bgcolor=#daebe0 width=130>Name</th>
	<th bgcolor=#daebe0 width=30>Accadamic Year</th>
	<th bgcolor=#daebe0 width=20>Departement</th>
	<th bgcolor=#daebe0 width=20>Meal Number</th>
	
	</tr>";
		while($row=mysqli_fetch_array($result))
		{
			
	echo "<tr>
	<td align=left>".$row['id']."</td>
	<td align=left>".$row['name']."</td>
	<td align=left>".$row['year']."</td>
	<td align=left>".$row['dept']."</td>
	<td align=left>".$row['meal']."</td>
	
	
	<tr>";
		
		}
		echo "</table></div><br><br>";


$result=mysqli_query($conn,"select * from student where status='internship'");



echo "<div class='internship>'<p><h4>Students who are internship <h4></p>
	<table border=1 width=650> 
	<tr><th bgcolor=#d6e8eb width=30>Student Id</th>
	<th bgcolor=#d6e8eb width=130>Name</th>
	<th bgcolor=#d6e8eb width=30>Accadamic Year</th>
	<th bgcolor=#d6e8eb width=20>Departement</th>
	<th bgcolor=#d6e8eb width=20>Meal Number</th>
	
	</tr>";
		while($row=mysqli_fetch_array($result))
		{
			
	echo "<tr>
	<td align=left>".$row['id']."</td>
	<td align=left>".$row['name']."</td>
	<td align=left>".$row['year']."</td>
	<td align=left>".$row['dept']."</td>
	<td align=left>".$row['meal']."</td>
	
	
	<tr>";
		
		}
		echo "</table></div><br><br>";
        $result=mysqli_query($conn,"select * from student where status='punish'");



        echo "<p><h4>Students who leave from the university incase of punishment<h4></p>
            <table border=1 width=650> 
            <tr><th bgcolor=#d6e8eb width=30>Student Id</th>
            <th bgcolor=#d6e8eb width=130>Name</th>
            <th bgcolor=#d6e8eb width=30>Accadamic Year</th>
            <th bgcolor=#d6e8eb width=20>Departement</th>
            <th bgcolor=#d6e8eb width=20>Meal Number</th>
            
            </tr>";
                while($row=mysqli_fetch_array($result))
                {
                    
            echo "<tr>
            <td align=left>".$row['id']."</td>
            <td align=left>".$row['name']."</td>
            <td align=left>".$row['year']."</td>
            <td align=left>".$row['dept']."</td>
            <td align=left>".$row['meal']."</td>
            
            
            <tr>";
                
                }
                echo "</table><br><br>";
                $result=mysqli_query($conn,"select * from specialfood where status='special'");
                echo "<p><h3>Student list who who are special user<h3></p>
                    <table border=1 width=650> 
                    <tr><th bgcolor=#9fe8f4 width=30>Student Id</th>
                    <th bgcolor=#9fe8f4 width=130>Name</th>
                    <th bgcolor=#9fe8f4 width=30>Accadamic Year</th>
                    <th bgcolor=#9fe8f4 width=20>Departement</th>
                    <th bgcolor=#9fe8f4 width=20>Meal Number</th>
                    
                    </tr>";
                        while($row=mysqli_fetch_array($result))
                        {
                            
                    echo "<tr>
                    <td align=left>".$row['studid']."</td>
                    <td align=left>".$row['name']."</td>
                    <td align=left>".$row['cyear']."</td>
                    <td align=left>".$row['dept']."</td>
                    <td align=left>".$row['meal']."</td>
                    
                    
                    <tr>";
                        
                        }
                        echo "</table><br><br>";
                        
                        
                        
                    $result=mysqli_query($conn,"select * from student where status!='active'");
                echo "<p><h3>Student list who who are Irregular food users<h3></p>
                    <table border=1 width=700> 
                    <tr><th bgcolor=#9fe8f4 width=30>Student Id</th>
                    <th bgcolor=#9fe8f4 width=100>Name</th>
                    <th bgcolor=#9fe8f4 width=30>Accadamic Year</th>
                    <th bgcolor=#9fe8f4 width=20>Departement</th>
                    <th bgcolor=#9fe8f4 width=20>Meal Number</th>
                    
                    
                    
                    </tr>";
                        while($row=mysqli_fetch_array($result))
                        {
                            
                    echo "<tr>
                    <td align=left>".$row['id']."</td>
                    <td align=left>".$row['name']."</td>
                    <td align=left>".$row['year']."</td>
                    <td align=left>".$row['dept']."</td>
                    <td align=left>".$row['meal']."</td>
                    
                    
                    
                    <tr>";
                        
                        }
                        echo "</table><br><br>";	
        
    ?>
    <a href="javascript:Clickheretoprint()">Print</a>
		</div>
                    </center>
   
</body>
</div>
</html>
<?php
include("../footer.php");
?>