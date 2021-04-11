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
         document.title = ' <?php echo $page_purchaselog ." - ". $web['webname'];?>';
         jQuery(document).ready(function($){
          var sidehome = document.getElementById("sidehome");
          var sidepurhist = document.getElementById("sidepurhist");
          sidehome.className = sidehome.className.replace(/\bnav-item active\b/g, "nav-item");
          sidepurhist.classList.add("active");
        });
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
                     <h1><img alt="logo" src="<?php echo $web['logo'];?>" style="width:35%;height:auto"></h1>
                     <h2>PURCHASE - <font color="#00FF40">HISTORY</font></h2>
                     <p class="land">
                        <style type="text/css">
table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: #fff;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}


section{
  margin: 50px;
}

.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: #fff;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}


/* scrollbar */

::-webkit-scrollbar {
    width: 6px;
} 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
} 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}
                        </style>
                        <script type="text/javascript">
                           $(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
                        </script>
                           <section>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Name OF Game</th>
          <th>Date</th>
          <th>Price</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
       <?php require_once('models/load_purchase_history.php'); ?>
      </tbody>
    </table>
  </div>
</section>
  </p>
                     <div class="mt-5">
                        <a class="btn btn-outline-primary" href="<?php echo $web['url']?>/game-page.html"><i class="mdi mdi-home"></i> GO TO SHOP</a>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
         </div>
         <!-- /.content-wrapper -->
      <?php require_once("views/footer.php"); ?>
   </body>
</html>
<?php } ?>