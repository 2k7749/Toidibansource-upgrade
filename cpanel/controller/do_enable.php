<?php 
			    require_once("../../libraries/class.database.php");
						$csdl = new mySQL();
						$csdl->connect();
						if(isset($_POST['weboff'])){
						$done = isset($_POST['weboff']) ? (int)$_POST['weboff'] : false;
						$queryupdate = "UPDATE website SET weboff = ".$_POST['weboff']."";
						$doquery = $csdl->query($queryupdate);
						}
						if(isset($_POST['signin'])){
							$done1 = isset($_POST['signin']) ? (int)$_POST['signin'] : false;
						$queryupdate1 = "UPDATE website SET accesslogin = ".$_POST['signin']."";
						$doquery1 = $csdl->query($queryupdate1);
						}
						if(isset($_POST['signup'])){
							$done2 = isset($_POST['signup']) ? (int)$_POST['signup'] : false;
						$queryupdate2 = "UPDATE website SET accessreg = ".$_POST['signup']."";
						$doquery2 = $csdl->query($queryupdate2);
						}
						if(isset($_POST['antiddos'])){
							$done2 = isset($_POST['antiddos']) ? (int)$_POST['antiddos'] : false;
						$queryupdate2 = "UPDATE website SET flood = ".$_POST['antiddos']."";
						$doquery2 = $csdl->query($queryupdate2);
						}
					 ?>