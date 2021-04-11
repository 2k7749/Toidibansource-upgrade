<?php
	require_once("../libraries/class.database.php");
	require_once("../libraries/trumthe247.class.php");
	$csdl = new mySQL();
	$csdl->connect();
	$trumthe247 = new Trumthe247();
	
	$validate = $trumthe247->ValidateCallback();
	
	if($validate != false) { //Nếu xác thực callback đúng thì chạy vào đây.
		$status = $validate['status']; //Trạng thái thẻ nạp, thẻ thành công = 1, thẻ thất bại != 1, xem bảng mã lỗi.
		$desc = $validate['desc']; //Mô tả chi tiết lỗi.
		$serial = $validate['card_data']['serial']; //Số serial của thẻ.
		$pin = $validate['card_data']['pin']; //Mã pin của thẻ.
		$card_type = $validate['card_data']['card_type']; //Loại thẻ. vd: VTT, VMS, VNP.
		$amount = $validate['card_data']['amount']; //Mệnh giá của thẻ.
		$content = $validate['content']; //Nội dung quý khách đã đẩy lên ở phần nạp thẻ.
		
		switch($amount) {
                    case 10000: $scoin = 100; break;
					case 20000: $scoin = 200; break;
					case 30000: $scoin = 300; break;
					case 50000: $scoin= 500; break;
					case 100000: $scoin = 1000; break;
					case 200000: $scoin = 2000; break;
					case 300000: $scoin = 3000; break;
					case 500000: $scoin = 5000; break;
					case 1000000: $scoin = 10000; break;
				}

		if($status == 1) {
			$update_scoin = "UPDATE users SET money = money + ".$scoin.",package = 'standard' WHERE username = '$content'";
			$query_scoin = $csdl->query($update_scoin);
			$timenow = time();
			$timecv = date("Y-m-d H:i:s",$timenow);
			$update_noti = "INSERT INTO noti_log(username,content,time,type,noti_status) VALUES ('".$content."','You have successfully purchased $scoin Scoin','".$timecv."','Systems',0)";
			$query_update_noti = $csdl->query($update_noti);
			$trumthe247->WriteLog('trumthe247_success.txt', json_encode($validate)); //Ghi log để debug.
		} else {
			
			$trumthe247->WriteLog('trumthe247_failed.txt', json_encode($validate)); //Ghi log để debug.
		}
	}
?>