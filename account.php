<?php require_once("models/load_information.php");?>
<?php 
   session_start();
   if(!isset($_SESSION['username'])){
   header("location: ".$web['url']."/home.html");
   }
   if ($web["weboff"] == 1) 
   {
   	header("location: ".$web['url']."/maintenance.html");
   }
   else
   {
   ?>
<!DOCTYPE html>
<html lang="en">
   <?php require_once("views/header.php"); ?>
   <script>
         document.title = ' <?php echo $page_myaccount ." - ". $web['webname'];?>';
         </script>
	<body id="page-top">
		<?php require_once("views/navbar.php"); ?>
		<div id="wrapper">
         <?php require_once("views/sidebar.php"); ?>
       
            <!-- /.start-container-fluid -->
           <?php require_once("models/load_account.php");?>
            <!-- /.container-fluid -->
         </div>
         <!-- /.content-wrapper -->
      <?php require_once("views/footer.php"); ?>
   </body>
</html>
<?php } ?>