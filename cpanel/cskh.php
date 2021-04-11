<?php require_once("models/load_information.php");
if($info["level"] == 2){
    header("location: ./home.html");
  }else if($info["level"] == 3){
    header("location: ./home.html");
  }
?>
<?php require_once("views/header.php"); ?>
<body class="">
<?php require_once("views/navbar.php"); ?>
<?php require_once("views/navbar_non_stats.php"); ?>
<?php require_once("models/load_cskh.php"); ?>
<?php require_once("views/footer.php"); ?>
</body>
</html>