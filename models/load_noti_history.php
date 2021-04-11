<?php 
require_once('libraries/class.database.php');
$csdl = new mySQL();
$csdl->connect();

$query = "SELECT * FROM noti_log WHERE username = '".$info['username']."'";
$result2 = $csdl->query($query);
while ($read = $csdl->fetch($result2)){
			echo'
			<tr>
			  <td>'.$read["type"].'</td>
			  <td>'.$read["content"].'</td>
			  <td>'.$read["time"].'</td>
			</tr>
			';
		}
		?>