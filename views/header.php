<?php
      error_reporting(0);
      //ini_set("display_errors", "1");
      //error_reporting(E_ALL);
      ob_start();
      date_default_timezone_set('Asia/Ho_Chi_Minh'); 
      require_once("libraries/class.database.php");
      require_once("models/load_information.php");
      $csdl = new mySQL();
      $csdl->connect();
      ?>
<?php 
if ($web['accesslogin'] == 0)  { 
session_start();
if(!empty($_SESSION["username"])){
   $username = $_SESSION["username"];
   $cn = "SELECT * FROM users WHERE username ='$username'";
   $dt = $csdl->query($cn);
   $info = $csdl->fetch($dt);
}
?>

<?php } ?>
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
<head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
	  <meta name="robots" content="noindex, nofollow" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="ToiDiBanSource, source game, game source, server game online, server game, game private, server game lau, game lau, soure lau, share source, share code game, game code, code game, ma nguon, game source, game bai, game mobi,game pc, source code, source private, chia se code, ma nguon code, ma nguon game, chia se game">
      <meta name="author" content="ToiDiBanSource, source game, game source, server game online, server game, game private, server game lau, game lau, soure lau, share source, share code game, game code, code game, ma nguon, game source, game bai, game mobi,game pc, source code, source private, chia se code, ma nguon code, ma nguon game, chia se game">
      <title><?php echo $web['webname']; ?></title>
	  <meta property="og:url" content="<?php echo $web["url"]; ?>" />
	  <meta property="og:type" content="website" />
      <meta property="og:title" content="<?php echo $web["webname"]; ?>" />
	  <meta property="og:description" content="<?php echo $web["meta"]; ?>" />
	  <meta property="og:image" content="<?php echo $web["logo"]; ?>" />
	  <meta name="keywords" content="<?php echo $web["keyword"]; ?>" />
	  <meta property="fb:app_id" content="<?php echo $web["apifb"]; ?>" />
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="<?php echo $web["icon"]; ?>">
      <!-- Bootstrap core CSS-->
      <link href="<?php echo $web["url"]; ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="<?php echo $web["url"]; ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link href="<?php echo $web["url"]; ?>/assets/css/sellerstyle.css" rel="stylesheet">
      <link href="<?php echo $web["url"]; ?>/assets/css/reactions.css" rel="stylesheet">
      <!-- Owl Carousel -->
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <link rel="stylesheet" href="<?php echo $web["url"]; ?>/assets/vendor/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="<?php echo $web["url"]; ?>/assets/vendor/owl-carousel/owl.theme.css">
      <div id="clouds" class="clouds"></div>
   </head>
   
   <script src="<?php echo $web["url"]; ?>/assets/js/bkey_func.js"></script>
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
    FB.init({
      appId            : '<?php echo $web["apifb"]; ?>',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.11'
    });
  };
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div class="fb-customerchat"
 page_id="<?php echo $web["apipage"]; ?>"
 minimized="false"
 theme_color="#fa3c4c">
</div>
 <script src="<?php echo $web["url"]; ?>/assets/js/toastr_opt.js"></script>
 <?php
 $counter_expire = 600;
 // ignore agent list
$counter_ignore_agents = array('bot', 'bot1', 'bot3');
// ignore ip list
$counter_ignore_ips = array('127.0.0.2', '127.0.0.3');
// get basic information
$counter_agent = $_SERVER['HTTP_USER_AGENT'];
$counter_ip = $_SERVER['REMOTE_ADDR']; 
$counter_time = time();

$ignore = false; 
   
   // get counter information
   $sql = "SELECT * FROM counter_values LIMIT 1";
   $res = $csdl->query($sql);
   
   // fill when empty
   if ($csdl->num_row($res) == 0)
   {	  
	  $sql = "INSERT INTO `counter_values` (`id`, `day_id`, `day_value`, `yesterday_id`, `yesterday_value`, `week_id`, `week_value`, `month_id`, `month_value`, `year_id`, `year_value`, `all_value`, `record_date`, `record_value`) VALUES ('1', '" . date("z") . "',  '1', '" . (date("z")-1) . "',  '0', '" . date("W") . "', '1', '" . date("n") . "', '1', '" . date("Y") . "',  '1',  '1',  NOW(),  '1')";
      $csdl->query($sql);
	  // reload with settings
	  $sql = "SELECT * FROM counter_values LIMIT 1";
      $res = $csdl->query($sql);
	  
	  $ignore = true;
   }   
   $row = $csdl->fetch($res);
   
   $day_id = $row['day_id'];
   $day_value = $row['day_value'];
   $yesterday_id = $row['yesterday_id'];
   $yesterday_value = $row['yesterday_value'];
   $week_id = $row['week_id'];
   $week_value = $row['week_value'];
   $month_id = $row['month_id'];
   $month_value = $row['month_value'];
   $year_id = $row['year_id'];
   $year_value = $row['year_value'];
   $all_value = $row['all_value'];
   $record_date = $row['record_date'];
   $record_value = $row['record_value'];
   // check ignore lists
   $length = sizeof($counter_ignore_agents);
   for ($i = 0; $i < $length; $i++)
   {
	  if (substr_count($counter_agent, strtolower($counter_ignore_agents[$i])))
	  {
	     $ignore = true;
		 break;
	  }
   }
   $length = sizeof($counter_ignore_ips);
   for ($i = 0; $i < $length; $i++)
   {
	  if ($counter_ip == $counter_ignore_ips[$i])
	  {
	     $ignore = true;
		 break;
	  }
   }
// delete free ips
if ($ignore == false)
{
   $sql = "DELETE FROM counter_ips WHERE unix_timestamp(NOW())-unix_timestamp(visit) >= $counter_expire"; 
   $csdl->query($sql);	  
}
   
// check for entry
if ($ignore == false)
{
   $sql = "update counter_ips set visit = NOW() where ip = '$counter_ip'";
   $csdl->query($sql);	 
  
  if ($csdl->affected_row($csdl) > 0)
  {
    $ignore = true;						   		 
  }
  else
  {
    // insert ip
     $sql = "INSERT INTO counter_ips (ip, visit) VALUES ('$counter_ip', NOW())";
     $csdl->query($sql);
  }	  	  
}

// online?
$sql = "SELECT * FROM counter_ips";
$csdl->query($sql);
$online = $csdl->num_row($res);
   
// add counter
if ($ignore == false)
{     	  
   // yesterday
  if ($day_id == (date("z")-1)) 
  {
     $yesterday_value = $day_value; 
  }
  else
  {
     if ($yesterday_id != (date("z")-1))
    {
       $yesterday_value = 0; 
    }
  }
  $yesterday_id = (date("z")-1);
  
  // day
  if ($day_id == date("z")) 
  {
     $day_value++; 
  }
  else 
  {
     $day_value = 1;
    $day_id = date("z");
  }
  
  // week
  if ($week_id == date("W")) 
  {
     $week_value++; 
  }
  else 
  { 
     $week_value = 1;
    $week_id = date("W");
   }
  
   // month
  if ($month_id == date("n")) 
  {
     $month_value++; 
  }
  else 
  {
     $month_value = 1;
    $month_id = date("n");
   }
  
  // year
  if ($year_id == date("Y")) 
  {
     $year_value++; 
  }
  else 
  {
     $year_value = 1;
    $year_id = date("Y");
   }
  
  // all
  $all_value++;
    
  // neuer record?
  if ($day_value > $record_value)
  {
     $record_value = $day_value;
     $record_date = date("Y-m-d H:i:s");
  }
    
  // speichern und aufräumen
  $sql = "UPDATE counter_values SET day_id = '$day_id', day_value = '$day_value', yesterday_id = '$yesterday_id', yesterday_value = '$yesterday_value', week_id = '$week_id', week_value = '$week_value', month_id = '$month_id', month_value = '$month_value', year_id = '$year_id', year_value = '$year_value', all_value = '$all_value', record_date = '$record_date', record_value = '$record_value' WHERE id = 1";
  $csdl->query($sql);	  
}
 ?>