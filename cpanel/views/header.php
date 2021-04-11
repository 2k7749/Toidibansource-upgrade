<?php
session_start();
?>
<?php
//Khai bao dang nhap
$config['dn2_dnp'] = 'javhd';
$config['mk2_dnp'] = 'fullhd';

if ($_SERVER['PHP_AUTH_USER'] != $config['dn2_dnp'] || $_SERVER['PHP_AUTH_PW'] != $config['mk2_dnp']){
header('WWW-Authenticate: Basic realm="Your connection to this site is not private"');
header('HTTP/1.0 401 Unauthorized');

//Trang sẽ hiển thị khi thông tin khai báo sai bét. Hỗ trợ HTML nên bạn có thể thiết kế một trang đẹp hơn
echo 'Directory access is forbidden.';
exit;
} 
?>
<?php
require_once("models/check_permission.php");
?>
<?php require_once("models/load_information.php");?>
<?php require_once("../libraries/class.database.php");?>
<?php
if ($web['flood'] == 1)  
{ 
   if (!isset($_SESSION)) 
   {
           session_start();
   }
    $timef = $web['timeflood'];
   if($_SESSION['last_session_request'] > (time() - $timef ))
   {
      if(empty($_SESSION['last_request_count']))
      {
          $_SESSION['last_request_count'] = 1;
      }
      elseif($_SESSION['last_request_count'] < 5)
      {
          $_SESSION['last_request_count'] = $_SESSION['last_request_count'] + 1;
      }
      elseif($_SESSION['last_request_count'] >= 5)
      {
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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    CONTROL - WEBSITE
  </title>
  <!-- Favicon -->
  <link href="<?php echo $web['url']?>/cpanel/assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?php echo $web['url']?>/cpanel/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
  <script src="https://code.jquery.com/jquery-3.4.1.js" crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <link rel="stylesheet" href="<?php echo $web['url']?>/cpanel/assets/css/inputTags.css">
  <script type="text/javascript" src="<?php echo $web['url']?>/cpanel/assets/js/inputTags.jquery.js"></script>
  <link href="<?php echo $web['url']?>/cpanel/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?php echo $web['url']?>/cpanel/assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
</head>
<script type="text/javascript">
    toastr.options = { 
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
