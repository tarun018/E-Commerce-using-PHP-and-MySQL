<div id="pageHeader"><table width="100%" border="0" cellspacing="0" cellpadding="12">
  <tr>
    <td width="32%"><a href="http://localhost/InorbitMall/index.php"><img src="logo.jpg" alt="Logo" width="252" height="36" border="0" /></a></td>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

session_start();
if(!isset($_SESSION['user']))
{
 ?>


    <td width="68%" align="right"> <a href="http://localhost/InorbitMall/user_login.php">Login</a> | <a href="http://localhost/InorbitMall/forgetpass.php">Reset Your Password</a></td>
<?php } ?>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

session_start();
if(isset($_SESSION['user']))
{
 ?>


    <td width="68%" align="right"> You are logged in as: <?php echo $_SESSION["user"] ?> <a href="http://localhost/InorbitMall/logout.php">Logout</a> | <a href="http://localhost/InorbitMall/cart.php">Your Cart</a> | <a href="http://localhost/InorbitMall/user_profile.php">Edit profile</a></td>
<?php } ?>
	</tr>
  <tr>
    <td colspan="2"><a href="http://localhost/InorbitMall/index.php">Home</a> &nbsp; &middot; &nbsp; <a href="http://localhost/InorbitMall/list_all_products.php">Products</a> &nbsp; &middot; &nbsp; <a href="http://localhost/InorbitMall/help.php">Help</a> &nbsp; &middot; &nbsp; <a href="http://localhost/InorbitMall/contact.php">Contact</a></td>
    </tr>
  </table>
</div>