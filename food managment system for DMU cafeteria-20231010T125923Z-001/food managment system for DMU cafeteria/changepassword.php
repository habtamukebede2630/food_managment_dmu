<?php
//session_start();
//error_reporting(0);
$dt = date("Y-m-d");
$tim = date("H:i:s");
include("header.php");
include("../confiyg.php");
if(isset($_POST['submit']))
{
  $un=$_SESSION["username"];
  $passwor=$_POST['oldpassword'];
  $password=base64_encode($passwor);
$confirmpasswor = ($_POST["newpassword"]);
$confirmpassword=base64_encode($confirmpasswor);
$s="select * from account where Username='$un'";
$sx=mysqli_query($conn,$s);
while($f=mysqli_fetch_assoc($sx))
$pw=$f["Password"];

if ($password == $pw)

{
  $query = mysqli_query($conn,"UPDATE account SET Password='{$confirmpassword}' WHERE Password='{$password}' AND Username='$_SESSION[username]'");
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
<style>

body{
  font-family:sans-serif;
}

.submission-form{
  max-width:500px;
  margin:2rem auto;
 border:2px solid #2980B9;
  padding:2rem;
  border-radius:5px;
  margin-top:30px;
}
  label{
    display:block;
    padding:1rem 0 .25rem;
    text-transform:uppercase;
    font-size:14px;
  }
   input, textarea{
    display:block;
    width:100%;
    border:2px solid #2980B9;
    padding:.5rem;
    font-size:18px;
    border-radius:5px;
  }
  select{
	      display:block;
    width:100%;
    border:2px solid #2980B9;
    padding:.5rem;
    font-size:18px;
    border-radius:5px;
  }

#sendBtn{
  border:0;
  background:#343050;
  padding:.5rem;
  color:white;
  margin:1rem 0;
  width:auto;
  text-transform:uppercase;
  cursor:pointer;
  transition:.3s background ease;}
  &:hover{
    background:#3498DB;
  }
  input:invalid {
    border-color: red;
}
input,
input:valid {
    border-color: #ccc;
}
</style>


                <form method="post" action="" name="frmdoctchangepass" 
                    class="submission-form">
                    <div >
                        <label>Old Password</label>
                        <div >
                            <input  type="password" name="oldpassword" id="oldpassword" required/>
                        </div>
                    </div>
                    <div >
                        <label>New Password</label>
                        <div >
                            <input  type="password" name="newpassword" id="newpassword" required pattern=".{8,}" title="Eight or more characters"/>

                        </div>
                    </div>
                    <div >
                        <label>Confirm Password</label>
                        <div >
                            <input  type="password" name="newpassword" id="newpassword" required pattern=".{8,}" title="Eight or more characters"/>
                        </div>
                    </div>

                    <input  type="submit" name="submit" id="sendBtn" id="submit" value="Submit" />


                </form>
                <p>&nbsp;</p>
            </div>

<?php
include("../footer.php");
?>
<script type="application/javascript">
function validateform() {
    if (document.frmdoctchangepass.oldpassword.value == "") {
        alert("Old password should not be empty..");
        document.frmdoctchangepass.oldpassword.focus();
        return false;
    } else if (document.frmdoctchangepass.newpassword.value == "") {
        alert("New Password should not be empty..");
        document.frmdoctchangepass.newpassword.focus();
        return false;
    } else if (document.frmdoctchangepass.newpassword.value.length < 8) {
        alert("New Password length should be more than 8 characters...");
        document.frmdoctchangepass.newpassword.focus();
        return false;
    } else if (document.frmdoctchangepass.newpassword.value != document.frmdoctchangepass.password.value) {
        alert(" New Password and confirm password should be equal..");
        document.frmdoctchangepass.password.focus();
        return false;
    } else {
        return true;
    }
}
</script>