<?php 
require_once('libraries/class.database.php');
$csdl = new mySQL();
$csdl->connect();
$upcasecate = ucfirst($_GET['cname']);
$checkcate = "SELECT * FROM categories WHERE catename = '".$upcasecate."'";
$querycheck = $csdl->query($checkcate);
$fetchcheck = $csdl->fetch($querycheck);

		if(isset($_GET['cname']) && strlen($fetchcheck['catename']) > 0){
		$vget = $_GET['cname'];
		$vupcasefirst = ucfirst($_GET['cname']);
		//Lấy cateID
		$collabcate = "SELECT * FROM categories WHERE catename = '".$vupcasefirst."'";
		$qcollabcate = $csdl->query($collabcate);
		$fcollabcate = $csdl->fetch($qcollabcate);
		$idcate = $fcollabcate['cateid'];
		$sql = "SELECT count(id) as total FROM `posts` WHERE tag = $idcate";
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
		if(empty($_POST["find"]))
		{
		$start = ($current_page - 1) * $limit;
		$query = "SELECT * FROM `posts` WHERE tag = $idcate ORDER BY id DESC LIMIT $start, $limit";
		}
		else
		{
		$total_page = 0;
		$keyword_to_find = htmlentities($_POST["find"]);
		$query = "SELECT * FROM `posts` WHERE tag = $idcate and title LIKE '%".$keyword_to_find."%'";
		}
		$result2 = $csdl->query($query);
		 /*.start-container-fluid */
		echo '
			<div class="container-fluid">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
						 <div class="top-category section-padding mb-4">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <div class="deconstructed">
  HOT GAMES
  <div>HOT GAMES</div>
  <div>HOT GAMES</div>
  <div>HOT GAMES</div>
  <div>HOT GAMES</div>
</div>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="owl-carousel owl-carousel-category">';
						$query_hotgame = "SELECT *,(reactnum+hahanum+sadnum+lovenum+wownum+angrynum) as total_react FROM `posts` ORDER BY viewsnum DESC LIMIT 0, 15";
			$dquery_hotgame = $csdl->query($query_hotgame);
			while($fetch_hotgame = $csdl->fetch($dquery_hotgame)){
                           echo'<div class="item">
                              <div class="category-item">
                                <a href="source/codenum-'.$fetch_hotgame["id"].'.html">
                                    <span><img class="img-fluid" src="'.$fetch_hotgame["img"].'" alt=""></span>
                                    <h6>'.$fetch_hotgame["title"].'</h6>
                                    <p><i class="fas fa-heart"></i> '.number_format($fetch_hotgame["total_react"]).'</p>
                                 </a>
                              </div>
                           </div>';}
						
						
									echo'</div>
								 </div>
							  </div>
						   </div>
						   <hr>
						<div class="btn-group float-right right-action">
                               <form method="post" action="" class="form-inline my-2 my-lg-0">
                        <input class="form-control form-control-sm mr-sm-1" name="find" type="search" placeholder="Search Source" aria-label="Search"><button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button> &nbsp;&nbsp;&nbsp;
                     </form>
							  
                           </div>
                           <h6>Source Game on '.$vupcasefirst.'</h6>
                        </div>
                     </div>';
		while ($loadgame = $csdl->fetch($result2)){
			for($j=0;$j<$row["total"];$j++)
			{
				if($loadgame["tag"] != $j){
				$quecate = "select c.cateid,c.catename FROM `categories` c,`posts` v WHERE ".$loadgame["tag"]." = c.cateid group by c.cateid,c.catename";
				$result3= $csdl->query($quecate);
				$fcate = $csdl->fetch($result3);
				$leftcate = $fcate["catename"];
			}
			}
			echo'
			<div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a class="play-icon" href="source/codenum-'.$loadgame["id"].'.html"><i class="fas fa-american-sign-language-interpreting"></i></a>
                              <a href="source/codenum-'.$loadgame["id"].'.html"><img width="270" height="169" class="img-itemsize" src="'.$loadgame["img"].'" alt=""></a>
                              <div class="time">'.$leftcate.'</div>
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="source/codenum-'.$loadgame["id"].'.html">'.substr($loadgame["title"],0,45).'...</a>
                              </div>
							  <div class="video-page text-success">
                                 '.$loadgame["author"].'  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                              </div>
                              <div class="video-view">
                               <i class="fas fa-eye"></i> '.$loadgame["viewsnum"].' | <i class="fas fa-calendar-alt"></i> '.$loadgame["createdate"].'
                              </div>
                           </div>
                        </div>
                     </div>
			';
		}
					echo'</div><nav aria-label="Page navigation example">';
                    echo ' <ul class="pagination justify-content-center pagination-sm mb-0">';
							$adjacents = 2; 
							$second_last = $total_page - 1;
							if ($current_page > 1 && $total_page > 1){
								echo '<li class="page-item"><a class="page-link" href="'.$vget.'-page'.($current_page-1).'.html">Previous</a></li>';
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
									echo '<li class="page-item"><a class="page-link" href="'.$vget.'-page'.$i.'.html">'.$i.'</a></li>';
									}
								}
							}elseif($total_page > 10){
								if($current_page <= 4){
								for($i = 1; $i < 8; $i++){
									if($i == $current_page)
									{
										echo '<li class="page-item active"><a href="#" class="page-link">'.$i.'</a></li>';	
									}else{
										echo '<li class="page-item"><a class="page-link" href="'.$vget.'-page'.$i.'.html">'.$i.'</a></li>';
									}
								}
							echo '<li class="page-item"><a class="page-link">...</a></li>';
							echo '<li class="page-item"><a href="'.$vget.'-page'.$second_last.'.html" class="page-link">'.$second_last.'</a></li>';
							echo '<li class="page-item"><a href="'.$vget.'-page'.$total_page.'.html" class="page-link">'.$total_page.'</a></li>';
								}elseif($current_page > 4 && $current_page < $total_page - 4){
								echo '<li class="page-item"><a href="'.$vget.'-page1.html" class="page-link">1</a></li>';
								echo '<li class="page-item"><a href="'.$vget.'-page2.html" class="page-link">2</a></li>';
								echo '<li class="page-item"><a class="page-link">...</a></li>';	
									for($i = $current_page - $adjacents;$i <= $current_page + $adjacents; $i++){
										if($i == $current_page){
											echo '<li class="page-item active"><a href="#" class="page-link">'.$i.'</a></li>';
										}else{
											echo '<li class="page-item"><a class="page-link" href="'.$vget.'-page'.$i.'.html">'.$i.'</a></li>';
										}
									}
									echo '<li class="page-item"><a class="page-link">...</a></li>';
									echo '<li class="page-item"><a href="'.$vget.'-page'.$second_last.'.html" class="page-link">'.$second_last.'</a></li>';
									echo '<li class="page-item"><a href="'.$vget.'-page'.$total_page.'.html" class="page-link">'.$total_page.'</a></li>';
								}else{
								echo '<li class="page-item"><a href="'.$vget.'-page1" class="page-link">1</a></li>';
								echo '<li class="page-item"><a href="'.$vget.'-page2" class="page-link">2</a></li>';
								echo '<li class="page-item"><a class="page-link">...</a></li>';	
								for($i = $total_page - 6;$i <= $total_page;$i++){
									if($i == $current_page){
									echo '<li class="page-item active"><a href="#" class="page-link">'.$i.'</a></li>';
								}else{
											echo '<li class="page-item"><a class="page-link" href="'.$vget.'-page'.$i.'.html">'.$i.'</a></li>';
										}
								}
							}
							}
							if ($current_page < $total_page && $total_page > 1){
								echo '<li class="page-item"><a class="page-link" href="'.$vget.'-page'.($current_page+1).'.html">Next</a></li>';
							}
                     echo '</ul></nav>  </div>
            </div>';
					  /*.end-container-fluid */
		}else{
			echo'<script>
		window.setTimeout(function(){
        window.location.href = "404.html";
    }, 1);
</script>';
		}
?>