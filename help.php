<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Store Home Page</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");
  	if (isset($_GET['success'])){
			echo "Successful Registration.";
	}
  	if (isset($_GET['userloginsuccess'])){
			echo "Successful Login.";
	}
	
  ?>
  <div id="pageContent">
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td width="94%" valign="top"><h3>Help Section</h3>
      <p>Inorbit mall also serves customers online. Instead of physically shopping, customers can register with us and get an account through which they can shop online. All the items we provide are displayed in our website. Customers can select items they want, their quantity which they want and they can choose home delivery option with extra charge for delivery or as their wishlist when they visit us next time.</p>
      <p>Each user who has registered is given a virtual cart that displays all the items he has chosen. Few items are offered discounts that are automatically added to items in cart. Net price is displayed at the bottom.</p>
      <p>With our user-friendly website one can easily order items.</p>
      <p><ul>
  <li>Clicking on products, one can start with choosing items.</li>
  <li> All the items are displayed in grid view. Clicking on an
item, directs to page with details about the product.</li>
  <li>Clicking on add to cart, adds that item to cart and user can choose auantity of the product any available discount is automatically added to that item and net price is evaluated, which is shown at the bottom.</li>
  <li>Clicking on delivery below user can choose addres to which the items in cart are to be delivered, by default the address given at time of registration is used. </li>

</ul> </p>
      <p><br />
</td>
    <td width="3%" valign="top"><p><br />
        </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

session_start();
if(!isset($_SESSION['user']))
{
 ?>
     <td width="3%" valign="top"><h3>&nbsp;</h3>
<p></p></td>
<?php } ?>
   
  </tr>
</table>

  </div>
  <?php include_once("template_footer.php");?>
</div>
</body>
</html>