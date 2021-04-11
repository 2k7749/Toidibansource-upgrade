 <?php 
				require_once("../libraries/class.database.php");
						$csdl = new mySQL();
						$csdl->connect();
						$done = isset($_POST['react_id']) ? (int)$_POST['react_id'] : false;
						$types_react = $_POST['type_react'];
						switch($types_react) {
							case 1: $react = "reactnum"; break;
							case 2: $react = "lovenum"; break;
							case 3: $react = "hahanum"; break;
							case 4: $react= "wownum"; break;
							case 5: $react = "sadnum"; break;
							case 6: $react = "angrynum"; break;
						}
						if($_POST['type_react'])
						$queryupdate = "UPDATE posts SET $react=$react+1 WHERE id = $done";
						$doquery = $csdl->query($queryupdate);
					 ?>