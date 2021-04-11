<?php require_once("models/load_information.php"); ?>
<?php if ($web["weboff"] == 1) {
   header("location: " . $web['url'] . "/maintenance.html");
} else {
?>
   <!DOCTYPE html>
   <html lang="en">
   <?php require_once("views/header.php"); ?>
   <?php
   $zbaraddress = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
   $justhome = $web['url'] . '/home.html';
   if (isset($_SESSION['username'])) {
      $soundfile = "" . $web['url'] . "/assets/sound/konichiwa.mp3";
      $sessionKey = "tempkey";
      $sessionView = $_SESSION[$sessionKey];
      if (!$sessionView) {
         $_SESSION[$sessionKey] = 1;
         echo "<audio controls autoplay style='display:none'>
  <source src='$soundfile' type='audio/ogg'>
  <source src='$soundfile' type='audio/mpeg'>
</audio>";
      }
   }
   ?>
   <script>
      document.title = 'Home - <?php echo $web['webname']; ?>';
   </script>

   <body id="page-top">
      <?php require_once("views/navbar.php"); ?>
      <div id="wrapper">
         <?php require_once("views/sidebar.php"); ?>
         <div class="single-channel-page" id="content-wrapper">
            <div class="single-channel-image">
               <div class="img-banner">
                  <div class="img-fullscreen">
                     <?php $time = date("H");
                     if ($time < "17") {
                     ?>
                        <video loop="" muted="" autoplay="" poster="<?php echo $web['url']; ?>/assets/img/page_home_background.png" class="fullscreen-bg__video">
                           <source src="<?php echo $web['url']; ?>/assets/video/webm_page_bg_background_light.webm" type="video/webm">
                           <source src="<?php echo $web['url']; ?>/assets/video/mp4_page_bg_background_light.mp4" type="video/mp4">
                        </video>
                  </div>
                  <div class="home_header_textimage_first">
                     <a href="<?php echo $web['url']; ?>/home.html" class="home_header_textimage" style="background-image: url('<?php echo $theme["imgheadlight"]; ?>')"></a>
                  </div>
               <?php } else { ?>
                  <video loop="" muted="" autoplay="" poster="<?php echo $web['url']; ?>/assets/img/page_home_background.png" class="fullscreen-bg__video">
                     <source src="<?php echo $web['url']; ?>/assets/video/webm_page_home_background.webm" type="video/webm">
                     <source src="<?php echo $web['url']; ?>/assets/video/mp4_page_home_background.mp4" type="video/mp4">
                  </video>
               </div>
               <div class="home_header_textimage_first">
                  <a href="<?php echo $web['url']; ?>/home.html" class="home_header_textimage" style="background-image: url('<?php echo $theme["imghead"]; ?>')"></a>
               </div>
            <?php } ?>
            </div>
            <div class="channel-profile">
               <?php if (!isset($_SESSION['username']) || $info['img'] == '') { ?>
                  <img class="channel-profile-img" alt="" src=" <?php echo $web['avatardefault']; ?>">
               <?php;
               } else { ?>
                  <img class="channel-profile-img" alt="" src="<?php echo $info['img']; ?>">
               <?php;
               } ?>
               <div class="social hidden-xs">
                  Social &nbsp;
                  <a class="fb" target="_blank" href="<?php echo $web['linkfb']; ?>">Facebook</a>
                  <a class="tw" target="_blank" href="<?php echo $web['linktw']; ?>">Twitter</a>
                  <a class="gp" target="_blank" href="<?php echo $web['linktele']; ?>">TeleGram</a>
               </div>
            </div>
         </div>
         <div class="single-channel-nav">
            <nav class="navbar navbar-expand-lg navbar-light">
               <?php if (isset($_SESSION['username'])) { ?>
                  <font color="white" size="3"><strong><?php echo $info['username']; ?></strong> <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></font>
               <?php;
               } else { ?>
                  <font color="white" size="3"><strong>Guest</strong> <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Un-Verified"><i class="fas fa-check-circle text-secondary"></i></span></font>
               <?php;
               } ?>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="game-page.html">All Game <span class="sr-only">(current)</span></a>
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
         <?php require_once("models/load_allgame.php"); ?>
         <!-- /.end-container-fluid -->
         <?php require_once("views/footer_bottom.php"); ?>
         
      </div>
      <!-- /.content-wrapper -->
      </div>
      <?php require_once("views/footer.php"); ?>
   </body>

   </html>
<?php } ?>