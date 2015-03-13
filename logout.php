<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
session_unset(); 
session_destroy();
header("Location: http://localhost/InorbitMall/index.php"); 
exit();
?>

</body>
</html>