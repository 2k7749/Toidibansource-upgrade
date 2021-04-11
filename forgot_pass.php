<?php require_once("models/load_information.php"); require_once('libraries/class.database.php'); session_start(); ?>
<?php
if ($web['flood'] == 1)  { 
 if (!isset($_SESSION)) 
 {
    session_start();
 }
$timef = $web['timeflood'];
 if($_SESSION['last_session_request'] > (time() - $timef )){
    if(empty($_SESSION['last_request_count'])){
        $_SESSION['last_request_count'] = 1;
    }elseif($_SESSION['last_request_count'] < 5){
        $_SESSION['last_request_count'] = $_SESSION['last_request_count'] + 1;
    }elseif($_SESSION['last_request_count'] >= 5){
      header("location: ".$web['url']."/attention.html");
            exit;
         }
 }
 else
 {
    $_SESSION['last_request_count'] = 1;
 }

 $_SESSION['last_session_request'] = time();
}
?>
<?php if(isset($_SESSION['username']))
{
  header("location: ".$web['url']."/home.html");
}else{
   if ($web["weboff"] == 1) 
   {
   	header("location: ".$web['url']."/maintenance.html");
   }
?>
<!DOCTYPE html>
<html lang="en">
   
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title>SignUp - <?php echo $web['webname']; ?></title>
	  <meta property="og:url" content="<?php echo $web["url"]; ?>" />
	  <meta property="og:type" content="website" />
      <meta property="og:title" content="<?php echo $web["webname"]; ?>" />
	  <meta property="og:description" content="<?php echo $web["mota"]; ?>" />
	  <meta property="og:image" content="<?php echo $web["logo"]; ?>" />
	  <meta name="keywords" content="<?php echo $web["keyword"]; ?>" />
	  <link rel="shortcut icon" type="image/png" href="<?php echo $web["icon"]; ?>"/>
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
      <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <link rel="stylesheet" href="<?php echo $web["url"]; ?>/assets/vendor/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="<?php echo $web["url"]; ?>/assets/vendor/owl-carousel/owl.theme.css">
      <script type="text/javascript">
    toastr.options ={ 
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "1500",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            }
                      </script>
   </head>
   <body class="login-main-body">
      <section class="login-main-wrapper">
         <div class="container-fluid pl-0 pr-0">
            <div class="row no-gutters">
               <div class="col-md-5 p-5 bg-white full-height">
                  <div class="login-main-left">
                     <div class="text-center mb-5 login-main-left-header pt-4">
                        <img src="assets/img/favicon.png" class="img-fluid" alt="LOGO">
                        <h5 class="mt-3 mb-3">Welcome to <?php echo $web["webname"]; ?></h5>
                        <?php 
require("models/crypt_hipz.php");
if(isset($_POST['btn_submit']))
{
   $username = $_POST["uname"];
   $email = $_POST["umail"];

$query = "SELECT username,email FROM `users` WHERE username = '$username' AND email = '$email'";
$result = $csdl->query($query);
$row = $csdl->fetch($result);
if(strlen($row["username"]) <= 0 || strlen($row["email"]) <= 0 || $row["email"] != $email ){
echo "<script>$(document).ready(function(){ toastr.warning('Invalid Username Or Email', 'Warning')});</script>";
}else{
    $random = rand(100000,999999);
    $decrypt = Encrypt_Pass($random);
    $update_pass = "UPDATE `users` SET `password` = '$decrypt' WHERE username = '$username'";
    $updated = $csdl->query($update_pass);
    
    require("libraries/PHPMailerAutoload.php");
    
    // Khai báo tạo PHPMailer
    $mail = new PHPMailer();
    //Khai báo gửi mail bằng SMTP
    $mail->IsSMTP();
    //$mail->CharSet  = "utf-8";
    $mail->Debugoutput = "html";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->SMTPSecure = "ssl";
    $mail->SMTPAuth   = true;
    $mail->Username   = "nhungpham0391@gmail.com";
    $mail->Password   = "0972792602";
    $mail->SetFrom("noreply@toidibansource.com", "ToiDiBanSource.Com");
    $mail->AddReplyTo("noreply@toidibansource.com","ToiDiBanSource.Com");
    $mail->AddAddress($email, "CUSTOMER");
    $mail->Subject = 'RESET PASSWORD ToiDiBanSource.Com'; 
    $mail->MsgHTML('<h3>You have requested a password reset</h3>
    <p>Hello ! Thank you for joining the TOIDIBANSOURCE community, we have received your password reset request</p>
    <p>Here is your new password</p>
    <p>Username: <b>'.$username.'</b></p>
    <p>Email: <b>'.$email.'</b></p>
    <p>Password: <b>'.$random.'</b></p>
    <p>Please change your password immediately, Dear!</p>
    '); 
    $mail->AltBody = "RESET PASSWORD";
    if(!$mail->Send()) {
      echo "<script>$(document).ready(function(){ toastr.error('An error has occurred', 'Error')});</script>";
       
   }else {
   echo "<script>$(document).ready(function(){ toastr.success('Mail has been sent', 'Success')});</script>";
          }
}
}
?>
                        <p>Forgot Password - Please Enter Your Username And Your Email To RESET PASSWORD</p>
                     </div>
					 <?php if ($web['accessreg'] == 0)  { ?>
                    <form method="POST" id="forgot">
                    <div class="form-group">
                           <label>Your Username</label>
                           <input type="text" name="uname" id="uname" class="form-control" placeholder="Enter Username">
                        </div>
						  <div class="form-group">
                           <label>Your gmail</label>
                           <input type="text" name="umail" id="umail" class="form-control" placeholder="Enter Your Gmail">
                        </div>
                        <div class="mt-4">
                           <button name="btn_submit" type="submit" class="btn btn-outline-primary btn-block btn-lg">Reset Password</button>
                        </div>
                     </form>
					 <?php }elseif ($web['accessreg'] == 1) {
  
  echo 

  '
<span class="boxhd1">NOTICE!!</span>
   <div class="boxhd1border">
   <h3>Registration has been disabled by the administrator</h3>
   <h4>Contact: <a href="<?php $web[lienhe]; ?>">Admin</a> For more details</h4>
 </div>  
  ';
} ?>
					 
                     <div class="text-center mt-5">
                        <p class="light-gray">Already have an Account? <a href="signin.html">Sign In</a></p>
                     </div>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="login-main-right bg-white p-5 mt-5 mb-5">
                     <div class="owl-carousel owl-carousel-login">
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="http://game4v.com/g4v-content/uploads/2019/11/game-china-11.jpg" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">​Free sign up - Fast</h5>
                              <p class="mb-4">With <br> just a few steps you have got an account</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="https://www.gizmochina.com/wp-content/uploads/2019/04/Lets_Hunt_Monsters.jpg" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Download Super - Fast</h5>
                              <p class="mb-4">Multinational cloud server<br> It will help you download the source faster <br>only available at TOIDIBANSOURCE</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="https://virtualseablog.files.wordpress.com/2016/11/screenshot_20161115-102120.png?w=723" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Display Smart - Fast</h5>
                              <p class="mb-4"><HEAD></HEAD>High response<br> Giving you the best experience possible <br>With our modern technology</p>
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
<?php	}?>