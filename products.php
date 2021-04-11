<?php
require_once("models/load_information.php");
?>
<?php if ($web["weboff"] == 1) {
   header("location: " . $web['url'] . "/maintenance.html");
} else {
   $code_bg = -1;
   if (isset($_GET["code"])) {
      $code_bg = intval($_GET['code']);
   }
   $code_bg_sql = "SELECT img from posts WHERE id = $code_bg";
   $query_code_bg = $csdl->query($code_bg_sql);
   $fetch_query_code_bg = $csdl->fetch($query_code_bg);
?>
   <!DOCTYPE html>
   <html lang="en">
   <?php require_once("views/header.php"); ?>

   <body id="page-top">
      <?php require_once("views/navbar.php"); ?>
      <div id="wrapper">
         <?php require_once("views/sidebar.php"); ?>
         <style type="text/css">
            @import url('https://fonts.googleapis.com/css?family=Coiny');

            .cloud-text {
               font-family: 'Coiny', cursive;
               -webkit-background-clip: text;
               -webkit-text-fill-color: transparent;
               background-size: auto;
               background-attachment: unset;
               background-position: center;
               width: 100%;
               margin: 10%;
               font-size: 35px;
               animation: clouds-moving infinite 69s;
               animation-fill-mode: forwards;
               animation-play-state: running;
               animation-timing-function: linear;
               text-align: center;
            }

            @keyframes clouds-moving {
               0% {
                  background-position: 0%;
               }

               50% {
                  background-position: 100%;
               }

               100% {
                  background-position: 0%;
               }
            }

            .attribute {
               position: relative;
               font-size: 26px;
               text-align: center;
            }
         </style>
         <script language="javascript">
            $(document).ready(function() {
               var element = document.getElementById("clouds");
               element.classList.remove("clouds");
            });
         </script>
         <div class="imgbg-source" style="background-image: url(<?php echo $fetch_query_code_bg['img']; ?>);"></div>
         <div class="single-channel-page" id="content-wrapper">
            <div class="single-channel-nav">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <a class="channel-brand" style="color:white;"><?php echo $info['username']; ?> <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                           <a class="nav-link" href="../game-page.html">All Game <span class="sr-only">(current)</span></a>
                        </li>
                        <?php
                        $querycate = "select * from categories WHERE cateid = 1 or cateid = 2 or cateid = 3"; //lấy 3 Cate trừ ID 1
                        $query1 = $csdl->query($querycate);
                        ?>
                        <?php
                        $j = 0;
                        while ($cate = $csdl->fetch($query1)) {
                        ?>
                           <?php $strlow = strtolower($cate["catename"]);
                           $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                           $pos = strpos($actual_link, $strlow); ?>
                           <li class="nav-item <?php if ($pos == false) {
                                                   echo "";
                                                } else {
                                                   echo "active";
                                                } ?>">
                              <a class="nav-link" name="<?php echo $strlow; ?>" href="<?php echo $web['url']; ?>/<?php echo strtolower($cate["catename"]); ?>-page.html"><?php echo $cate["catename"] ?></a>
                           </li>
                        <?php
                           $j++;
                        }
                        ?>
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              More
                           </a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <?php
                              $querycleft = "select * from categories where cateid != 1 and cateid !=2 and cateid !=3"; //lấy ALL Cate còn lại trừ ID
                              $query2 = $csdl->query($querycleft);
                              ?>
                              <?php
                              $k = 0;
                              while ($cateleft = $csdl->fetch($query2)) {
                              ?>
                                 <a class="dropdown-item" name="<?php echo strtolower($cateleft["catename"]); ?>" href="<?php echo $web['url']; ?>/<?php echo strtolower($cateleft["catename"]); ?>-page.html"><?php echo $cateleft["catename"]; ?></a>
                              <?php
                                 $k++;
                              }
                              ?>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Something else here</a>
                           </div>
                        </li>
                     </ul>
                     <?php if (!isset($_SESSION['username'])) { ?>
                     <?php } else { ?>
                        <span class="btn btn-outline-danger btn-sm"><strong><?php echo strtoupper($info['package']); ?></strong></span>
                     <?php } ?>
                  </div>
               </nav>
            </div>
            <!-- /.start-container-fluid -->
            <?php require_once("models/load_products.php"); ?>
            <!-- /.end-container-fluid -->
            <?php require_once("views/footer_bottom.php"); ?>
            <?php require_once("models/load_allgame.php"); ?>
         </div>
         <!-- /.content-wrapper -->
      </div>
      <?php require_once("views/footer.php"); ?>
   </body>

   </html>
<?php } ?>