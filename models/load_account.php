<?php 
require_once('libraries/class.database.php');
require "crypt_hipz.php";
$csdl = new mySQL();
$csdl->connect();
$sql = "SELECT *, (select count(*) FROM purchase_history WHERE buyer = '".$info['username']."') total FROM purchase_history WHERE buyer = '".$info['username']."'";
$result = $csdl->query($sql);
$row = $csdl->fetch($result);

		$total_records = $row['total'];
		$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
		$limit = 8;
		$total_page = ceil($total_records / $limit);
		 
		// Giới hạn current_page trong khoảng 1 đến total_page
		if ($current_page > $total_page){
			$current_page = $total_page;
		}
		else if ($current_page < 1){
			$current_page = 1;
		}
		 
		if($_POST["find"] == null)
		{
		$start = ($current_page - 1) * $limit;
		$query = "SELECT * FROM `purchase_history` WHERE buyer = '".$info['username']."' ORDER BY idgame DESC LIMIT $start, $limit";
		}
		else
		{
		$total_page = 0;
		$keyword_to_find = htmlentities($_POST["find"]);
		$query = "SELECT * FROM `purchase_history` WHERE buyer = '".$info['username']."' AND namegame LIKE '%".$keyword_to_find."%'";
		}
		$result2 = $csdl->query($query);

echo '<div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="row">
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-primary o-hidden h-100 border-none">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fas fa-fw fa-users"></i>
                           </div>
                           <div class="mr-5" style="font-size:15px;"><b><strong>Your Name</strong></b></div>
						   <div class="mr-5">'.$info['name'].'</div>
						   <div class="mr-5" style="font-size:15px;"><b><strong>Your Email</strong></b></div>
						   <div class="mr-5">'.$info['email'].'</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">Go Settings</span>
                        <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span>
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-warning o-hidden h-100 border-none">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fas fa-fw fa-video"></i>
                           </div>
                           
						   <div class="mr-5" style="font-size:15px;"><b><strong>Your Scoin</strong></b></div>
						   <div class="mr-5" style="color:black;"><i class="fas fa-sun"></i>'.number_format($info['money']).'</div>
						   <div class="mr-5" style="font-size:15px;"><b><strong>Your Points</strong></b></div>
						    <div class="mr-5" style="color:black;">'.number_format($info['point']).'</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1">
                        <span class="float-left">Update Everytime</span>
                        <span class="float-right">
                        <i class="fas fa-stopwatch"></i>
                        </span>
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-success o-hidden h-100 border-none">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fas fa-fw fa-list-alt"></i>
                           </div>
                           <div class="mr-5" style="font-size:20px;"><b><strong>The game you have purchased</strong> </b> <br> <center><span style="color:black;font-size:40px;">'.number_format($row['total']).'</span></center></div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1">
                        <span class="float-left">Update Everytime</span>
                        <span class="float-right">
                        <i class="fas fa-stopwatch"></i>
                        </span>
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-danger o-hidden h-100 border-none">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fas fa-fw fa-cloud-upload-alt"></i>
                           </div>
                           <div class="mr-5" style="font-size:20px;">Discount</strong> </b> <br> <center><span style="color:black;font-size:40px;">50%</span></center></div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1">
                        <span class="float-left">Update Everytime</span>
                        <span class="float-right">
                        <i class="fas fa-stopwatch"></i>
                        </span>
                        </a>
                     </div>
                  </div>
               </div>
               <hr>'; 
			   
			   
               echo '<div class="video-block section-padding">
               <hr class="mt-0">
			   <div class="btn-group float-right right-action">
                               <form method="post" action="" class="form-inline my-2 my-lg-0">
                        <input class="form-control form-control-sm mr-sm-1" name="find" type="search" placeholder="Search" aria-label="Search"><button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button> &nbsp;&nbsp;&nbsp;
                     </form>
							  
                           </div>
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>Your Purchased Games</h6>
                        </div>
                     </div>
					  ';
						   
					while ($loadgame = $csdl->fetch($result2)){

						$getimg = "SELECT img FROM posts WHERE id = '".$loadgame['idgame']."'";
						$do_getimg = $csdl->query($getimg);
						$fetch_img = $csdl->fetch($do_getimg);

							   echo '<div class="col-xl-3 col-sm-6 mb-3">
									<div class="channels-card">
									   <div class="channels-card-image">
										 <img class="img-fluid" src="'.$fetch_img['img'].'" alt="">
										  <div class="channels-card-image-btn"> <a href="'.$web['url'].'/source/codenum-'.$loadgame['idgame'].'.html"><button type="button" class="btn btn-warning btn-sm"><strong>Go To View And Download</strong></button></a></div>
									   </div>
									   <div class="channels-card-body">
										  <div class="channels-title">
											 <a href="'.$web['url'].'/source/codenum-'.$loadgame['idgame'].'.html">'.substr($loadgame['namegame'],0,40).'</a>
										  </div>
										  <div class="channels-view">
											<strong>Date Buy:</strong> <font color="#ff0066">'.date('d/m/Y H:i:s',strtotime($loadgame['paydate'])).'</font><br>
										  </div>
									   </div>
									</div>
								 </div>';}
								 
					echo'</div><nav aria-label="Page navigation example">';
                    echo ' <ul class="pagination justify-content-center pagination-sm mb-0">';
							$adjacents = 2; 
							$second_last = $total_page - 1;
							if ($current_page > 1 && $total_page > 1){
								echo '<li class="page-item"><a class="page-link" href="account-view'.($current_page-1).'.html">Previous</a></li>';
							}elseif($total_page==0){
								echo '';
							}else{
							
							}
							if($total_page <= 10){
							for ($i = 1; $i <= $total_page; $i++){
								if ($i == $current_page){
									echo '<li class="page-item active"><a href="#" class="page-link">'.$i.'</a></li>';	
														}
								else{
									echo '<li class="page-item"><a class="page-link" href="account-view'.$i.'.html">'.$i.'</a></li>';
									}
								}
							}elseif($total_page > 10){
								if($current_page <= 4){
								for($i = 1; $i < 8; $i++){
									if($i == $current_page)
									{
										echo '<li class="page-item active"><a href="#" class="page-link">'.$i.'</a></li>';	
									}else{
										echo '<li class="page-item"><a class="page-link" href="game-page'.$i.'.html">'.$i.'</a></li>';
									}
								}
							echo '<li class="page-item"><a class="page-link">...</a></li>';
							echo '<li class="page-item"><a href="account-view'.$second_last.'.html" class="page-link">'.$second_last.'</a></li>';
							echo '<li class="page-item"><a href="account-view'.$total_page.'.html" class="page-link">'.$total_page.'</a></li>';
								}elseif($current_page > 4 && $current_page < $total_page - 4){
								echo '<li class="page-item"><a href="account-view1.html" class="page-link">1</a></li>';
								echo '<li class="page-item"><a href="account-view2.html" class="page-link">2</a></li>';
								echo '<li class="page-item"><a class="page-link">...</a></li>';	
									for($i = $current_page - $adjacents;$i <= $current_page + $adjacents; $i++){
										if($i == $current_page){
											echo '<li class="page-item active"><a href="#" class="page-link">'.$i.'</a></li>';
										}else{
											echo '<li class="page-item"><a class="page-link" href="account-view'.$i.'.html">'.$i.'</a></li>';
										}
									}
									echo '<li class="page-item"><a class="page-link">...</a></li>';
									echo '<li class="page-item"><a href="account-view'.$second_last.'.html" class="page-link">'.$second_last.'</a></li>';
									echo '<li class="page-item"><a href="account-view'.$total_page.'.html" class="page-link">'.$total_page.'</a></li>';
								}else{
								echo '<li class="page-item"><a href="account-view1" class="page-link">1</a></li>';
								echo '<li class="page-item"><a href="account-view2" class="page-link">2</a></li>';
								echo '<li class="page-item"><a class="page-link">...</a></li>';	
								for($i = $total_page - 6;$i <= $total_page;$i++){
									if($i == $current_page){
									echo '<li class="page-item active"><a href="#" class="page-link">'.$i.'</a></li>';
								}else{
											echo '<li class="page-item"><a class="page-link" href="account-view'.$i.'.html">'.$i.'</a></li>';
										}
								}
							}
							}
							if ($current_page < $total_page && $total_page > 1){
								echo '<li class="page-item"><a class="page-link" href="account-view'.($current_page+1).'.html">Next</a></li>';
							}
                     echo '</ul></nav>  </div>
            </div>';
			?>