<?php require_once("models/load_information.php");?>
<?php if ($web["weboff"] == 1) 
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
         document.title = ' <?php echo $page_404 ." - ". $web['webname'];?>';
         </script>
	<body id="page-top">
		<?php require_once("views/navbar.php"); ?>
		<div id="wrapper">
         <?php require_once("views/sidebar.php"); ?>
       
            <!-- /.start-container-fluid -->
            <div id="content-wrapper">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-8 mx-auto text-center  pt-4 pb-5">
                     <h1><img alt="404" src="<?php echo $web['url']?>/assets/img/404.png" class="img-fluid"></h1>
                     <h1>Sorry! Page not found.</h1>
                     <p class="land">Unfortunately the page you are looking for has been moved or deleted.</p>
                     <div class="mt-5">
                        <a class="btn btn-outline-primary" href="<?php echo $web['url']?>/game-page.html"><i class="mdi mdi-home"></i> GO TO HOME PAGE</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
            <!-- /.container-fluid -->
         <!-- /.content-wrapper -->
      <?php require_once("views/footer.php"); ?>
   </body>
</html>
<?php } ?>