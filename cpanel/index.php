<?php require_once("models/load_information.php");?>
<?php require_once("views/header.php"); ?>
<body class="">
<?php require_once("views/navbar.php"); ?>
<?php 
if($info["level"] == 1){
require_once("views/navbar_stats.php"); 
}else{
    require_once("views/navbar_non_stats.php"); 
}
?>
<?php require_once("models/load_home.php"); ?>
<?php require_once("views/footer.php"); ?>
</body>
</html>