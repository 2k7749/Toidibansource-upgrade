<?php
require_once("../libraries/class.database.php");


$csdl = new mySQL();
$csdl->connect();
if(isset($_POST['uget'])){
$sql="UPDATE noti_log SET noti_status = 1 WHERE noti_status = 0";	
$result=$csdl->query($sql);
$uget = $_POST['uget'];
$sql="SELECT * FROM noti_log WHERE username  = '$uget' ORDER BY id DESC limit 5";
$result=$csdl->query($sql);

$response='';
while($row=$csdl->fetch($result)) {
	$data_content = mb_substr($row["content"], 0, 31, 'UTF-8') . "<br/>" . mb_substr($row["content"], 32, strlen($row["content"]), 'UTF-8');
	$response = $response . "<a class='dropdown-item' href=''><i class='fas fa-fw fa-star'></i>". $row["type"] . "</br>" . $data_content . "</a>" . "<div class='dropdown-divider'></div>";
}
$response = $response . "<a class='dropdown-item text-center' href='".$web['url']."/notification.html'>View More</a>";
if(!empty($response)) {
	echo $response;
}
}
if(isset($_POST['ufget'])){
    $ufget = $_POST['ufget'];
    $count_noti=0;
            $cm_noti="SELECT * FROM noti_log WHERE noti_status = 0 AND username = '$ufget'";
            $query_noti=$csdl->query($cm_noti);
            $count_noti=$csdl->num_row($query_noti);
    
    $response=$count_noti;
    
    if(!empty($response)) {
        echo $response;
    }
    }
?>