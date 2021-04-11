<?php
require_once("libraries/class.database.php");
require_once("models/load_information.php");
?>
<?php
session_start();
?>
<?php
if ($web['flood'] == 1) {
   if (!isset($_SESSION)) {
      session_start();
   }
   $timef = $web['timeflood'];
   if ($_SESSION['last_session_request'] > (time() - $timef)) {
      if (empty($_SESSION['last_request_count'])) {
         $_SESSION['last_request_count'] = 1;
      } elseif ($_SESSION['last_request_count'] < 5) {
         $_SESSION['last_request_count'] = $_SESSION['last_request_count'] + 1;
      } elseif ($_SESSION['last_request_count'] >= 5) {
         header("location: " . $web['url'] . "/attention.html");
         exit;
      }
   } else {
      $_SESSION['last_request_count'] = 1;
   }

   $_SESSION['last_session_request'] = time();
}
?>
<?php
if (isset($_SESSION['username'])) {
   header("location: " . $web['url'] . "/home.html");
} else if ($web["weboff"] == 1) {
   header("location: " . $web['url'] . "/maintenance.html");
} else {
?>
   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title>SignIn - <?php echo $web['webname']; ?></title>
      <meta property="og:url" content="<?php echo $web["url"]; ?>" />
      <meta property="og:type" content="website" />
      <meta property="og:title" content="<?php echo $web["webname"]; ?>" />
      <meta property="og:description" content="<?php echo $web["mota"]; ?>" />
      <meta property="og:image" content="<?php echo $web["logo"]; ?>" />
      <meta name="keywords" content="<?php echo $web["keyword"]; ?>" />
      <link rel="shortcut icon" type="image/png" href="<?php echo $web["icon"]; ?>" />
      <meta property="fb:app_id" content="<?php echo $web["apifb"]; ?>" />
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="<?php echo $web["url"]; ?>/assets/img/favicon.png">
      <!-- Bootstrap core CSS-->
      <link href="<?php echo $web["url"]; ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="<?php echo $web["url"]; ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link href="<?php echo $web["url"]; ?>/assets/css/sellerstyle.css" rel="stylesheet">
      <!-- Owl Carousel -->
      <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <link rel="stylesheet" href="<?php echo $web["url"]; ?>/assets/vendor/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="<?php echo $web["url"]; ?>/assets/vendor/owl-carousel/owl.theme.css">
      <script src="<?php echo $web["url"]; ?>/assets/js/toastr_opt.js"></script>
      <script type="text/javascript">
         var _0x3b20 = ["\x63\x6F\x6E\x74\x65\x78\x74\x6D\x65\x6E\x75", "\x70\x72\x65\x76\x65\x6E\x74\x44\x65\x66\x61\x75\x6C\x74", "\x61\x64\x64\x45\x76\x65\x6E\x74\x4C\x69\x73\x74\x65\x6E\x65\x72", "\x6B\x65\x79\x64\x6F\x77\x6E", "\x63\x74\x72\x6C\x4B\x65\x79", "\x73\x68\x69\x66\x74\x4B\x65\x79", "\x6B\x65\x79\x43\x6F\x64\x65", "\x4D\x61\x63", "\x6D\x61\x74\x63\x68", "\x70\x6C\x61\x74\x66\x6F\x72\x6D", "\x6D\x65\x74\x61\x4B\x65\x79", "\x73\x74\x6F\x70\x50\x72\x6F\x70\x61\x67\x61\x74\x69\x6F\x6E", "\x65\x76\x65\x6E\x74", "\x63\x61\x6E\x63\x65\x6C\x42\x75\x62\x62\x6C\x65", "\x72\x65\x61\x64\x79"];
         $(document)[_0x3b20[14]](function() {
            document[_0x3b20[2]](_0x3b20[0], function(_0xee91x1) {
               _0xee91x1[_0x3b20[1]]()
            }, false);
            document[_0x3b20[2]](_0x3b20[3], function(_0xee91x1) {
               if (_0xee91x1[_0x3b20[4]] && _0xee91x1[_0x3b20[5]] && _0xee91x1[_0x3b20[6]] == 73) {
                  _0xee91x2(_0xee91x1)
               };
               if (_0xee91x1[_0x3b20[4]] && _0xee91x1[_0x3b20[5]] && _0xee91x1[_0x3b20[6]] == 74) {
                  _0xee91x2(_0xee91x1)
               };
               if (_0xee91x1[_0x3b20[6]] == 83 && (navigator[_0x3b20[9]][_0x3b20[8]](_0x3b20[7]) ? _0xee91x1[_0x3b20[10]] : _0xee91x1[_0x3b20[4]])) {
                  _0xee91x2(_0xee91x1)
               };
               if (_0xee91x1[_0x3b20[4]] && _0xee91x1[_0x3b20[6]] == 85) {
                  _0xee91x2(_0xee91x1)
               };
               if (event[_0x3b20[6]] == 123) {
                  _0xee91x2(_0xee91x1)
               }
            }, false);

            function _0xee91x2(_0xee91x1) {
               if (_0xee91x1[_0x3b20[11]]) {
                  _0xee91x1[_0x3b20[11]]()
               } else {
                  if (window[_0x3b20[12]]) {
                     window[_0x3b20[12]][_0x3b20[13]] = true
                  }
               };
               _0xee91x1[_0x3b20[1]]();
               return false
            }
         })
      </script>
   </head>

   <body class="login-main-body">
      <section class="login-main-wrapper">
         <div class="container-fluid pl-0 pr-0">
            <div class="row no-gutters">
               <div class="col-md-5 p-5 bg-white full-height">
                  <div class="login-main-left">
                     <div class="text-center mb-5 login-main-left-header pt-4">
                        <img src="<?php echo $web["url"]; ?>/assets/img/favicon.png" class="img-fluid" alt="LOGO">
                        <h5 class="mt-3 mb-3">Welcome to <?php echo $web["webname"]; ?></h5>
                        <p><?php echo $web["alertlogin"]; ?></p>
                     </div>
                     <?php
                     require "models/crypt_hipz.php";
                     if (isset($_POST["btn_Login"])) {
                        $username = $_POST["username"];
                        $password = $_POST["password"];
                        $username = strip_tags($username);
                        $username = addslashes($username);
                        $password = strip_tags($password);
                        $password = addslashes($password);
                        $encrypt_up = Encrypt_Pass($password);
                        if ($username == "" || $password == "") {
                           echo '
      <script type="text/javascript">toastr.warning("Please Enter Username and Password", "Warning");</script>
      ';
                        } else {
                           $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$encrypt_up' LIMIT 1";
                           $query = $csdl->query($sql);
                           if (!$query) {
                              echo $csdl->error;
                           }
                           if ($csdl->num_row($query) == 0) {
                              echo '
         <script type="text/javascript">toastr.error("Account or password is incorrect", "Error");</script>
       ';
                           } else {
                              $_SESSION['username'] = $username;
                              echo '<script>window.location.href = "./home.html";</script>';
                           }
                        }
                     }
                     ?>
                     <form method="POST" action="signin.html">
                        <div class="form-group">
                           <label>Username</label>
                           <input type="text" name="username" class="form-control" placeholder="Enter your Username">
                        </div>
                        <div class="form-group">
                           <label>Password</label>
                           <input type="password" name="password" class="form-control" placeholder="•••••••••••">
                        </div>
                        <div class="mt-4">
                           <div class="row">
                              <div class="col-12">
                                 <button name="btn_Login" type="submit" class="btn btn-outline-primary btn-block btn-lg">Sign In</button>
                              </div>
                           </div>
                        </div>
                     </form>

                     <div class="text-center mt-5">
                        <p class="light-gray">Don’t have an account? <a href="signup.html">Sign Up</a></p>
                        <p class="light-gray">Forgot Password? <a href="forgot-pass.html">Click Here</a></p>
                     </div>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="login-main-right bg-white p-5 mt-5 mb-5">
                     <div class="owl-carousel owl-carousel-login">
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="https://cdn.mos.cms.futurecdn.net/1668bcfc79a14ff5a192100ea08e0d5e.jpg" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">​Free sign up - Fast</h5>
                              <p class="mb-4">With <br> just a few steps you have got an account</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="https://gamehot24h.com/wp-content/uploads/2019/11/san-dau-thuc-son-ky-hiep-mobile_1574321727.jpg" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Download Super - Fast</h5>
                              <p class="mb-4">Multinational cloud server<br> It will help you download the source faster <br>only available at TOIDIBANSOURCE</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="https://2game.vn/data/pictures/2game/2018/03/19/2game-choi-thu-ngao-thien-mobile-anh-2.jpg" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Display Smart - Fast</h5>
                              <p class="mb-4">

                                 <HEAD></HEAD>High response<br> Giving you the best experience possible <br>With our modern technology
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <?php require_once("views/footer.php"); ?>
   </body>

   </html>
<?php } ?>