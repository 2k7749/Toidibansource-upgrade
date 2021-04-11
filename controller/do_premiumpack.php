<?php 
				session_start();
				require_once("../libraries/class.database.php");
						$csdl = new mySQL();
						$csdl->connect();
						$timenow = time();
						$timecv = date("Y-m-d H:i:s",$timenow);
						if(
    //Check required variables are set
    isset($_SESSION['csrf_ajax_key']) &&
    isset($_SESSION['csrf_ajax_val']) &&
    isset($_POST[$_SESSION['csrf_ajax_key']]) &&
    isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&

    //Check is AJAX
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest' &&

    //Check is POST
    $_SERVER['REQUEST_METHOD'] === 'POST' &&

    //Check POST'ed keys match the session keys
    $_SESSION['csrf_ajax_val'] == $_POST[$_SESSION['csrf_ajax_key']]
){
    //Good - Query now
   if(isset($_POST["u_premium"]))
{
						$aa = "SELECT premium_price FROM website";
						$qr = $csdl->query($aa);
						$web = $csdl->fetch($qr);
						$bb = "SELECT * FROM users WHERE username = '".$_POST["u_premium"]."'";
						$qrb = $csdl->query($bb);
						$u_info = $csdl->fetch($qrb);
						$query_check = "SELECT * from premium_history WHERE buyer = '".$_POST["u_premium"]."'";
						$do_check = $csdl->query($query_check);
						$f_do_check= $csdl->num_row($do_check);
						if($u_info["money"] < $web["premium_price"])
						{
							$data = array(
								"code"     => 2,
								"msg"  => "You Haven't Enough Money"
							);
							echo json_encode($data);
						}else if($f_do_check == 1){
							$data = array(
								"code"     => 3,
								"msg"  => "You already own this package"
							);
							echo json_encode($data);
						}else if($u_info["money"] >= $web["premium_price"] && $_SESSION["username"] === $_POST["u_premium"]){
	$query = "INSERT INTO premium_history (buyer,paydate) VALUE ('".$_POST["u_premium"]."','".$timecv."')";
	$do_query = $csdl->query($query);
	$trans_money = "UPDATE users SET money = money - ".$web["premium_price"].",package = 'premium' WHERE username = '".$_POST["u_premium"]."'";
	$do_trans = $csdl->query($trans_money);
	$update_noti = "INSERT INTO noti_log(username,content,time,type,noti_status) VALUES ('".$_POST["u_premium"]."','You have successfully purchased the Premium package','".$timecv."','Store',0)";
	$query_update_noti = $csdl->query($update_noti);
	if($do_query){
		$data = array(
            "code"     => 0,
            "msg"  => "Buy successful Premium Package"
        );
		echo json_encode($data);
		//Unset Key
		unset($_SESSION['csrf_ajax_val'], $_SESSION['csrf_ajax_key']);
	}else{
		$data = array(
            "code"     => 1,
            "msg"  => "Error! An error occurred. Please try again later"
        );
        echo json_encode($data);
	}
	}else{
		$data = array(
            "code"     => 1,
            "msg"  => "Error! An error occurred. Please try again later"
        );
        echo json_encode($data);
	}

}else{
	echo "Directory access is forbidden.";
					 } 
}
//End - QUery
					 ?>
