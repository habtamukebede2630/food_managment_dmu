<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nav</title>
</head>
<body>
  <div class="contain">
    <div class="body1">
        <div class="logo">
            <img src="images/logo.jpg" id="logoe">
        </div>
        <h1 class="proj_title">DMU FOOD MANAGMENT SYSTEM</h1>
    </div>
    <div class="navbar">
        <ul class="ul_container" >
            <li class="li_class"> <a href="index.php">HOME </a></li>
            <li class="li_class" >
                <a href="#">VIEW </a>
                <ul class="dropdown" >
                    <li class="li_class li-drop"><a href="viewdailymenu.php">daily menu  </a></li>
                    <li class="li_class li-drop"><a href="notice.php"> notice </a></li>
                </ul>
            </li> 
            <li class="li_class"><a href="#">ABOUTUS  </a>
                <ul class="dropdown" >
                    <li class="li_class li-drop"><a href="vission.php">vission </a></li>
                    <li class="li_class li-drop"><a href="mission.php"> mission </a></li>
                    </ul>
            </li>
            <li class="li_class"><a href="contactus.php">CONTACTUS</a></li>
            <li class="li_class"><a href="help.php">HELP</a></li>
            <li class="li_class"><a href="feedbackall.php">FEEDBACK</a></li>
        </ul>
    </div>
  </div>
</body>
</html>