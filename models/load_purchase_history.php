<?php 
require_once('libraries/class.database.php');
$csdl = new mySQL();
$csdl->connect();

$query = "SELECT * FROM purchase_history WHERE buyer = '".$info['username']."'";
$result2 = $csdl->query($query);
while ($read = $csdl->fetch($result2)){
			echo'
			<tr>
			  <td>'.$read["namegame"].'</td>
			  <td>'.$read["paydate"].'</td>
			  <td>'.$read["prices"].'</td>
			</tr>
			';
		}
		?>