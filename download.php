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

            <?php 
            if(empty($_GET["vdownload"])){ ?>
             <div id="content-wrapper">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-8 mx-auto text-center  pt-4 pb-5">
                     <h1><img alt="slap" style="width:50%;height:50%" src="https://i.imgur.com/EpXO03z.gif" class="img-fluid"></h1>
                      <h1>Sorry! Page not found.</h1>
                     <p class="land">Unfortunately the page you are looking for has been moved or deleted.</p>
                     <div class="mt-5">
                        <a class="btn btn-outline-primary" href="<?php echo $web['url']?>/game-page.html"><i class="mdi mdi-home"></i> GO TO HOME PAGE</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
            <?php }else{ 
                $check_bought = "SELECT * FROM purchase_history WHERE idgame = ".$_GET['vdownload']." AND buyer = '".$info['username']."'";
                $do_check_bought = $csdl->query($check_bought);
                $veri_check = $csdl->num_row($do_check_bought);
                $get_product = "SELECT * FROM posts WHERE id = ".$_GET['vdownload']."";
                $do_get_product = $csdl->query($get_product);
                $fetch_getproduct = $csdl->fetch($do_get_product);
                if($veri_check > 0 || $info["package"] == "premium"){
                ?>
                 <div id="content-wrapper">
            <div class="container-fluid pt-5 pb-5">
               <div class="row">
                  <div class="col-md-8 mx-auto text-center upload-video pt-5 pb-5">
                     <h1><i class="fas fa-file-download text-primary"></i></h1>
                     <h1 class="mt-5"><?php echo $fetch_getproduct["title"];?></h1>
                     <p class="land"><script type="text/javascript">
  var count = 10; // SEt time
  var redirect = "<?php echo $fetch_getproduct["linkdown"];?>"; // Target URL

  function countDown() {
    var timer = document.getElementById("timer"); // Timer ID
    if (count > 0) {
      count--;
      timer.innerHTML = "This page will redirect in " + count + " seconds."; // Timer Message
      setTimeout("countDown()", 1000);
    } else {
      window.location.href = redirect;
    }
  }
</script> <p id="timer">
        <script type="text/javascript">
          countDown();
        </script>
      </p></p>
                     <div class="mt-4">
                        <a class="btn btn-outline-primary" href="<?php echo $fetch_getproduct["linkdown"];?>">Download Now</a>
                     </div>
                  </div>
               </div>
            </div>
            <?php }else{ ?>
                <div id="content-wrapper">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-8 mx-auto text-center  pt-4 pb-5">
                     <h1><img alt="slap" style="width:50%;height:50%" src="https://i.imgur.com/EpXO03z.gif" class="img-fluid"></h1>
                      <h1>Sorry! Page not found.</h1>
                     <p class="land">Unfortunately the page you are looking for has been moved or deleted.</p>
                     <div class="mt-5">
                        <a class="btn btn-outline-primary" href="<?php echo $web['url']?>/game-page.html"><i class="mdi mdi-home"></i> GO TO HOME PAGE</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
            <?php }} ?>
            <!-- /.container-fluid -->
         <!-- /.content-wrapper -->
      <?php require_once("views/footer.php"); ?>
   </body>
</html>
<?php } ?>