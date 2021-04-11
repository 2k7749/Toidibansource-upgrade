<?php require_once("models/load_information.php");?>
<?php require_once("views/header.php"); ?>
<?php 
if($info["level"] != 1){
header("location: ./home.html");
}
?>
<body class="">
<?php require_once("views/navbar.php"); ?>
<?php require_once("views/navbar_stats.php"); ?>
<?php require_once("models/load_users.php"); ?>
<?php require_once("views/footer.php"); ?>
</body>
</html>