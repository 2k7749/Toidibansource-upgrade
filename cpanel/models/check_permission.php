<?php 
 if (!isset($_SESSION['username'])) {
	 header('Location: ../login.php');
}
?>

<?php
require_once("../libraries/class.database.php");
?>
<?php 
$username = $_SESSION['username'];
$cn = "SELECT * FROM users WHERE username ='$username' ";
$dt = $csdl->query($cn);
$info = $csdl->fetch($dt);
?>
<?php 
 if ($info['level'] == 0) 
 {
	 header('Location: ../signin.html');
}
?>