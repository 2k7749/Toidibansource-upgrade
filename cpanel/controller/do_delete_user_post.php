                    <?php 
			            require_once("../../libraries/class.database.php");
						$csdl = new mySQL();
						$csdl->connect();
						if(isset($_POST['deluser'])){
						$query_uid = "DELETE FROM users WHERE id = ".$_POST['deluser']."";
						$do_query_uid = $csdl->query($query_uid);
                        }
                        if(isset($_POST['gameid'])){
                        $query_gameid = "DELETE FROM posts WHERE id = ".$_POST['gameid']."";
						$do_query_gameid = $csdl->query($query_gameid);
                        }
                        ?>