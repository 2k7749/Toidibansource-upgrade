 <?php 
				session_start();
				require_once("../libraries/class.database.php");
				require "../models/crypt_hipz.php";
						$csdl = new mySQL();
						$csdl->connect();
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
    if(isset($_POST["iemail"]) && isset($_POST["current_pass"]) && isset($_POST["new_pass"]) && isset($_POST["confirm_pass"]))
{
	
	$sql = "SELECT * FROM users WHERE email = '".$_POST["iemail"]."'";
	$result = $csdl->query($sql);
	$row = $csdl->fetch($result);
	$g_c_pass = Encrypt_Pass($_POST["current_pass"]);
	$g_c_mail = $_POST["iemail"];
	if($_POST["new_pass"] == "null" || $_POST["confirm_pass"] == "null"){
		$new_pass = $confirm_pass = Encrypt_Pass(Decrypt_Pass($row['password']));
	}
	else{
		$new_pass = $confirm_pass = $_POST["new_pass"];
	}
	if($_POST["current_pass"] == "null")
	{
		$data = array(
			"code"     => 9,
			"msg"  => "Please Enter The Password To Make Changes"
		);
		echo json_encode($data);
	}
	else if($_POST["current_pass"] != Decrypt_Pass($row['password'])){
		$data = array(
			"code"     => 5,
			"msg"  => "Invalid Current Password"
		);
		echo json_encode($data);
	}
	else if(strlen($_POST["iemail"]) < 0 || strlen($_POST["iemail"]) > 50){
		{
			$data = array(
				"code"     => 8,
				"msg"  => "Email must be less than 50 characters"
			);
			echo json_encode($data);
		}
	}else if(strlen($_POST["full_name"]) < 0 || strlen($_POST["full_name"]) > 50){
		$data = array(
			"code"     => 7,
			"msg"  => "Name must be less than 50 characterss"
		);
		echo json_encode($data);
	}else if(strlen($new_pass) < 8){
		$data = array(
			"code"     => 6,
			"msg"  => "Password must be between 8 - 30 characterscterss ".$new_pass.""
		);
		echo json_encode($data);
	}
	//excuted
	else if($_SESSION["username"] === $row["username"] && $g_c_pass === $row["password"] && $g_c_mail === $row["email"]){
	if($_POST["full_name"] == null){
		$setname = $row["name"];
	}else{
		$setname = htmlspecialchars(strip_tags($_POST["full_name"]));
	}
	if($_POST["avatar_url"] == null){
		$setavt = $row["img"];
	}else{
		$setavt = htmlspecialchars(strip_tags($_POST["avatar_url"]));
	}
	$setpass = $new_pass;
	$conf_pass_check = $confirm_pass;
	if(Decrypt_Pass($setpass) == null || Decrypt_Pass($conf_pass_check) == null){
		$encrypt_up = Encrypt_Pass($setpass);
	}else{
		$encrypt_up = Encrypt_Pass(Decrypt_Pass($setpass));
	}
	$query = "UPDATE users SET password = '$encrypt_up', name = '$setname', img = '$setavt' WHERE email = '".$_POST["iemail"]."'";
	$do_query = $csdl->query($query);
	if($do_query)
	{
		$data = array(
            "code"     => 0,
            "msg"  => "Settings UPDATED"
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

//End - QUery
}
					 ?>
