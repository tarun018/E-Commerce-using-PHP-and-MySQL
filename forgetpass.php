<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
include "storescripts/connect_to_mysql.php";
if (isset($_POST['login'])) {
    $login = mysql_real_escape_string($_POST['login']);
	$security = mysql_real_escape_string($_POST['security']);
	$securityanswer = mysql_real_escape_string($_POST['ganswer']);
	$newpassword = mysql_real_escape_string($_POST['password']);
	$newcpassword = mysql_real_escape_string($_POST['cpassword']);
	$sql = mysql_query("SELECT * FROM customer WHERE login='$login' LIMIT 1");
	$userMatch = mysql_num_rows($sql); 
	$list = mysql_fetch_array($sql);
	$oldpassword = $list['password'];
	$correctsecurity = $list['security'];
	$correctsecurityanswer = $list['securityanswer'];
	if($security==$correctsecurity && $securityanswer==$correctsecurityanswer){
			if($newpassword != $newcpassword){
				echo 'Password Mismatch, <a href="forgetpass.php">Retry here</a>';
				exit();
			}
			else if($newpassword==$oldpassword){
				echo 'Same as old password, <a href="user_login.php">Login here</a>';
				exit();
			}
			else {
				$upd = mysql_query("UPDATE customer SET password='$newpassword' WHERE login='$login'");
			}
	}
	else {
		echo 'You have entered wrong details. In case you forget your details, <a href="contact.php">click here</a>';
		exit();
	}
	header("location: index.php?resetsuccess"); 
    exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Store Home Page</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
<script type="text/javascript" language="javascript"> 
<!--
function validateMyForm ( ) { 
    var isValid = true;
	if ( document.forget.login.value == "" ) { 
	    alert ( "Please enter login name" ); 
	    isValid = false;
    } else if ( document.forget.security.value == "" ) { 
	    alert ( "Please select security question" ); 
	    isValid = false;
    } else if ( document.forget.ganswer.value == "" ) { 
	    alert ( "Please asnwer the security question" ); 
	    isValid = false;
    } else if ( document.forget.password.value == "" ) { 
	    alert ( "Please enter password" ); 
	    isValid = false;
    } else if ( document.forget.cpassword.value == "" ) { 
	    alert ( "Please confirm password" ); 
	    isValid = false;
    }
    return isValid;
}
//-->
</script>
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php"); ?>
  <div id="pageContent"></p>
<a name="ForgetPassword" id="ForgetPassword"></a>
    <h3>
    &darr; Reset Password &darr;
    </h3>
    <form action="" enctype="multipart/form-data" name="forget" id="forget" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="37%" align="right">Login Name</td>
        <td width="63%"><label>
          <input name="login" type="text" id="login" size="40" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Security Question</td>
        <td><label>
          <select name="security" id="security">
          <option value=""></option>
          <option value="What is your school name?">What is your school name?</option>
          <option value="What is your mother's first maiden name?">What is your mother's first maiden name?</option>
          <option value="What is your favourite hobby?">What is your favourite hobby?</option>
          <option value="What is your nick name?">What is your nick name?</option>
          <option value="What is your pet name?">What is your pet name?</option>
          <option value="What is your favourite game?">What is your favourite game?</option>
          </select>
        </label></td>
      </tr>
      <tr>
        <td width="37%" align="right">Answer</td>
        <td width="63%"><label>
          <input name="ganswer" type="text" id="ganswer" size="40" />
        </label></td>
      </tr>
      <tr>
        <td width="20%" align="right">Password</td>
        <td width="80%"><label>
          <input name="password" type="password" id="password" size="20" />
        </label></td>
      </tr>
      <tr>
        <td width="20%" align="right">Confirm Password</td>
        <td width="80%"><label>
          <input name="cpassword" type="password" id="cpassword" size="20" />
        </label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
            <input type="submit" name="button" id="button" value="Check Now"  onclick="javascript:return validateMyForm();"/>
        </label></td>
      </tr>
    </table>
    </form>
  </div>
  <?php include_once("template_footer.php");?>
</div>
</body>
</html>