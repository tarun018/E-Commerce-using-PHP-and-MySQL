<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
include "storescripts/connect_to_mysql.php";
if (isset($_POST['name'])) {
    $name = mysql_real_escape_string($_POST['name']);
    $login = mysql_real_escape_string($_POST['login']);
    $password = mysql_real_escape_string($_POST['password']);
    $cpassword = mysql_real_escape_string($_POST['cpassword']);	
	$mobile = mysql_real_escape_string($_POST['mobile']);
	$security = mysql_real_escape_string($_POST['security']);
	$securityanswer = mysql_real_escape_string($_POST['answer']);
	$email = mysql_real_escape_string($_POST['email']);
	$address = mysql_real_escape_string($_POST['address']);
	$city = mysql_real_escape_string($_POST['city']);
	$state = mysql_real_escape_string($_POST['state']);
	$pin = mysql_real_escape_string($_POST['pin']);
	if($password != $cpassword){
		echo 'Your passwords do not match., <a href="user_registration.php">Refill here</a>';
		exit();
	}
	$sql = mysql_query("SELECT id FROM customer WHERE mobile='$mobile' LIMIT 1");
	$userMatch = mysql_num_rows($sql); 
    if ($userMatch > 0) {
		echo 'Sorry your mobile number is already registered into the system, <a href="user_registration.php">click here</a>';
		exit();
	}
	$sql = mysql_query("INSERT INTO customer (login, password, name, mobile, security, securityanswer, email, address, city, state, pin) 
        VALUES('$login', '$password','$name','$mobile','$security','$securityanswer','$email','$address','$city','$state','$pin')") or die (mysql_error());
     $pid = mysql_insert_id();
	header("location: index.php?success"); 
    exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventory list</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
<script type="text/javascript" language="javascript"> 
<!--
function validateMyForm ( ) { 
    var isValid = true;
    if ( document.userForm.name.value == "" ) { 
	    alert ( "Please type Your Name" ); 
	    isValid = false;
    } else if ( document.userForm.login.value == "" ) { 
	    alert ( "Please type Your Login Name" ); 
	    isValid = false;
    } else if ( document.userForm.password.value == "" ) { 
	    alert ( "Please type Your Password" ); 
	    isValid = false;
    } else if ( document.userForm.cpassword.value == "" ) { 
	    alert ( "Please confirm Your Password" ); 
	    isValid = false;
    } else if ( document.userForm.security.value == "" ) { 
	    alert ( "Please select security question" ); 
	    isValid = false;
    } else if ( document.userForm.answer.value == "" ) { 
	    alert ( "Please select security question answer" ); 
	    isValid = false;
    } else if ( document.userForm.mobile.value == "" ) { 
            alert ( "Please enter your Mobile Number" ); 
            isValid = false;
    } else if ( document.userForm.email.value == "" ) { 
            alert ( "Please provide your Email" ); 
            isValid = false;
    } else if ( document.userForm.address.value == "" ) { 
            alert ( "Please provide your address" ); 
            isValid = false;
    } else if ( document.userForm.city.value == "" ) { 
            alert ( "Please provide your city" ); 
            isValid = false;
    } else if ( document.userForm.state.value == "" ) { 
            alert ( "Please provide your state" ); 
            isValid = false;
    } else if ( document.userForm.pin.value == "" ) { 
            alert ( "Please provide your pin" ); 
            isValid = false;
    }
    return isValid;
}
//-->
</script>
</head>

<body>
<div align="center" id="mainWrapper">
  	<?php include_once("template_header.php");?>
    <div id="pageContent"><br />
    <a name="UserRegistration" id="UserRegistration"></a>
    <h3>
    &darr; New User Registration &darr;
    </h3>
    <form action="" enctype="multipart/form-data" name="userForm" id="userForm" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">Full Name</td>
        <td width="80%"><label>
          <input name="name" type="text" id="name" size="40" />
        </label></td>
      </tr>
      <tr>
        <td width="20%" align="right">Login</td>
        <td width="80%"><label>
          <input name="login" type="text" id="login" size="20" />
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
        <td width="20%" align="right">Answer</td>
        <td width="80%"><label>
          <input name="answer" type="text" id="answer" size="40" />
        </label></td>
      </tr>        
      <tr>
        <td align="right">Mobile</td>
        <td><label>
          <input name="mobile" type="text" id="mobile" size="10" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Email Id</td>
        <td><label>
          <input name="email" type="text" id="email" size="50" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Address</td>
        <td><label>
          <textarea name="address" id="address" cols="64" rows="5"></textarea>
        </label></td>
      </tr>
      <tr>
        <td width="20%" align="right">City</td>
        <td width="80%"><label>
          <input name="city" type="text" id="city" size="20" />
        </label></td>
      </tr>
      <tr>
        <td width="20%" align="right">State</td>
        <td width="80%"><label>
          <input name="state" type="text" id="state" size="20" />
        </label></td>
      </tr>
      <tr>
        <td align="right">PinCode</td>
        <td><label>
          <input name="pin" type="text" id="pin" size="6" />
        </label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="button" id="button" value="Register Now"  onclick="javascript:return validateMyForm();"/>
        </label></td>
      </tr>
    </table>
    </form>
    <p><br />
      <br />
    </p>
  </div>
  <?php include_once("template_footer.php");?>  
</div>
</body>
</html>