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
    if(isset($_POST["s_id"]) && isset($_POST["u_pay"]))
{
	
						$g_s_id = $_POST["s_id"];
						$posts = "SELECT * FROM posts WHERE id = '$g_s_id'";
						$query_posts = $csdl->query($posts);
						$fetch_post = $csdl->fetch($query_posts);
						$bb = "SELECT * FROM users WHERE username = '".$_POST["u_pay"]."'";
						$qrb = $csdl->query($bb);
						$u_info = $csdl->fetch($qrb);
						$query_check_buy = "SELECT * from purchase_history WHERE buyer = '$g_u_u' AND idgame = '$code'";
						$do_q_c = $csdl->query($query_check_buy);
						$fetch_q_c= $csdl->num_row($do_q_c);
						if($u_info["money"] < $fetch_post["prices"]){
							$data = array(
								"code"     => 2,
								"msg"  => "You Haven't Enough Money"
							);
							echo json_encode($data);
						}else if($fetch_q_c == 1){
							$data = array(
								"code"     => 3,
								"msg"  => "You already own this Game"
							);
							echo json_encode($data);
						}
						else if($u_info["money"] >= $fetch_post["prices"] && $_SESSION["username"] === $_POST["u_pay"]){
	$query = "INSERT INTO purchase_history (idgame,namegame,buyer,paydate,prices) VALUE (".$_POST["s_id"].",'".$fetch_post["title"]."','".$_POST["u_pay"]."','".$timecv."',".$fetch_post["prices"].")";
	$do_query = $csdl->query($query);
	$trans_money = "UPDATE users SET money = money - ".$fetch_post["prices"]." WHERE username = '".$_POST["u_pay"]."'";
	$do_trans = $csdl->query($trans_money);
	$update_sold = "UPDATE posts SET soldnum = soldnum + 1 WHERE id = '".$_POST["s_id"]."'";
	$post_name = $fetch_post["title"];
	$update_noti = "INSERT INTO noti_log(username,content,time,type,noti_status) VALUES ('".$_POST["u_pay"]."','You have successfully purchased the game $post_name','".$timecv."','Store',0)";
	$query_update_noti = $csdl->query($update_noti);
	$do_update_sold = $csdl->query($update_sold);
	if($do_query){
		$data = array(
			"code"     => 0,
			"msg"  => "You have purchased this Source, have FUN!"
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
	}}else{
		$data = array(
            "code"     => 1,
            "msg"  => "Error! An error occurred. Please try again later"
        );
        echo json_encode($data);
						}
}
else{
	echo "Directory access is forbidden.";
					 } 
//End - QUery
}
					 ?>