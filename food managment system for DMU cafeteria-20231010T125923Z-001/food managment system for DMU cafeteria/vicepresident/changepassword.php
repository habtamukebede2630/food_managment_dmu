<?php

include("../connection.php");
session_start();
include("navbar.php");
include("header.php");
if(isset($_SESSION['user']['username'])&& isset($_SESSION['user']['password'])){
  $username=$_SESSION['user']['username'];
  $pold=$_SESSION['user']['password'];
$fetcher=mysqli_query($conn,"select *from user where user_id='$username'");
while($fetchit=mysqli_fetch_array($fetcher)){
  $uid=$fetchit['user_id'];
}

}?>
<?php
if(isset($_POST['submit']))
{
  //$un=$_SESSION["username"];
  $password=$_POST['oldpassword'];
  $password=md5($password);
$confirmpassword = ($_POST["newpassword"]);
$confirmpassword=md5($confirmpassword);

if ($password == $pold)

{
  $query = mysqli_query($conn,"update account set password='$confirmpassword'where username='$uid'");
  if($query){	
	
		echo "<script>alert('Password has been updated successfully..');</script>";
	}
	else
	{
		echo "<script>alert('Failed to update password..');</script>";		
	}
}else echo "not match";
}

?>
<link rel="stylesheet" href="../css/forms.css">
<style>
  .padder{
    margin-top:200px;
    margin-bottom:200px;
  }
</style>
<div class="padder">


                   <div class="form-style-10">
                    <h2>change password</h2>
                <form method="post" action="" name="">
                  <div class="inner-wrap">
                    <div >
                        <label>Old Password</label>
                        <div >
                            <input  type="password" name="oldpassword" id="oldpassword" required/>
                        </div>
                    </div>
                    <div >
                        <label>New Password</label>
                        <div >
                            <input  type="password" name="newpassword" id="newpassword" required pattern=".{6,}" title="Six or more characters"/>

                        </div>
                    </div>
                    <div >
                        <label>Confirm Password</label>
                        <div >
                            <input  type="password" name="newpassword" id="newpassword" required pattern=".{6,}" title="Six or more characters"/>
                        </div>
                    </div>
                    <div class="button-section">

                    <input  type="submit" name="submit" id="sendBtn" id="submit" value="Submit" />
                    </div>

                    </div>
                </form>
                <p>&nbsp;</p>
            </div>
            </div>
            </div>

<?php
include("../footer.php");
?>
