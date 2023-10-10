<?php
session_start();
include("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<html>
<head>
<title>searchform</title>
<link rel="Stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<div id="container">
<table><tr><td>
<?php
include("header.php");
?>
</td></tr></table>
<div id="navigationmenu">
<table width="1000"><tr><td>
	
	</td></tr></table>
	</div>
	<div id="content">
	<table border="0" width="1000" height="400"><tr><td width="100" height="50">
	<div id="sideleft">

	</div>
	</td>
	<td width="500" height="50"><div id="Center">
	<p>SEARCH STUDENT</p>
   <form action="studlist.php" method="post">
ID-NO:<input type="text" name="id"><br><br>
<input type="submit" value="search" name="search">
  </div></td>
  <td width="100" height="50"><div id="sideright">

  </div>
  </td>
  </tr></table>
	</div>
	<table width="1000"><tr><td>
	<?php
 include("../footer.php");
?>
</td></tr></table>
</div>


<body>
    
</body>
</html>