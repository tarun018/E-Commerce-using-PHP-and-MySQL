<?php
if(isset($_GET['sortby'])){
	$sortby = $_GET['sortby'];
} else {
	$sortby = "date_added";
}
if(isset($_GET['way'])){
	$way = $_GET['way'];
} else {
	$way = "DESC";
}
if(isset($_GET['filterby'])){
	$filterby = $_GET['filterby'];
}
else {
	$filterby = NULL;	
}
include "storescripts/connect_to_mysql.php";
if($filterby == NULL){
	$sql = mysql_query("SELECT * FROM products ORDER BY $sortby $way");
}
else {
	$sql = mysql_query("SELECT * FROM products WHERE category='$filterby' ORDER BY $sortby $way");	
}
$i = 0;
$dyn_table = '<table align="left" border="1" cellpadding="10" table width="100%">';
while($row = mysql_fetch_array($sql)){ 
    
    $id = $row["id"];
    $product_name = $row["product_name"];
	$price = $row["price"];
	$date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
    if ($i % 3 == 0) { 
        $dyn_table .= '<tr>
						<td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" /></a>
						' . $product_name . '<br/>
						$' . $price . '<br/>
						<a href="product.php?id=' . $id . '">View Details</a>
						</td>';
    } else {
        $dyn_table .= '<td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" /></a>
						' . $product_name . '<br/>
						$' . $price . '<br/>
						 <a href="product.php?id=' . $id . '">View Details</a>
						</td>';
    }
    $i++;
	if ($i%3 == 0)
		$dyn_table .= '</tr>';
}
$dyn_table .= '</table';	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Store Home Page</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
<style>
img{
float: left;
margin-right: 5px;	
}
</style>
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");?>
  <div id="pageContent">
    <p>Sort By: 
<select name="menu" onChange="window.document.location.href=this.options[this.selectedIndex].value;" value="Choose">
		<option value = ''> Choose </option>
        <option value="http://localhost/InorbitMall/list_all_products.php?sortby=price&way=DESC&filterby=<?php 
		if(isset($_GET['filterby']))
			echo $filterby; 
		else
			echo NULL;
		?>">Price: High to Low</option>
        <option value="http://localhost/InorbitMall/list_all_products.php?sortby=price&way=ASC&filterby=<?php 
		if(isset($_GET['filterby']))
			echo $filterby; 
		else
			echo NULL;
		?>">Price: Low to High</option>
		<option value="http://localhost/InorbitMall/list_all_products.php?sortby=date_added&way=DESC&filterby=<?php 
		if(isset($_GET['filterby']))
			echo $filterby; 
		else
			echo NULL;
		?>">Date Added</option>
 </select> 
| Filter By: 
<select name="menu" onChange="window.document.location.href=this.options[this.selectedIndex].value;" value="Choose">
		<option value = ''> Choose </option>
         <option value="http://localhost/InorbitMall/list_all_products.php">None</option>
          <option value="http://localhost/InorbitMall/list_all_products.php?filterby=Footwear&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">Footwear</option>
          <option value="http://localhost/InorbitMall/list_all_products.php?filterby=Clothing&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">Clothing</option>
          <option value="http://localhost/InorbitMall/list_all_products.php?filterby=Watches&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">Watches</option>
          <option value="http://localhost/InorbitMall/list_all_products.php?filterby=HandBag&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">HandBag</option>
          <option value="http://localhost/InorbitMall/list_all_products.php?filterby=Perfumes&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">Perfumes</option>
          <option value="http://localhost/InorbitMall/list_all_products.php?filterby=Jewellery&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">Jewellery</option>
          <option value="http://localhost/InorbitMall/list_all_products.php?filterby=Sunglasses&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">Sunglasses</option>
          <option value="http://localhost/InorbitMall/list_all_products.php?filterby=EBooks&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">EBooks</option>
          <option value="http://localhost/InorbitMall/list_all_products.php?filterby=DVD&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">DVD's</option>
          <option value="http://localhost/InorbitMall/list_all_products.php?filterby=Gaming&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">Gaming</option>
 </select> 
    </p>
    <?php echo $dyn_table; ?>
  </div>
  <?php include_once("template_footer.php");?>
</div>
</body>
</html>