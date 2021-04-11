<?php
error_reporting(0);
//Setting session start
session_start();

$total = 0;

//Database connection, replace with your connection string.. Used PDO
$conn = new PDO("mysql:host=localhost;dbname=toidibansource", 'root', 'mysql');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//get action string
$action = isset($_GET['action']) ? $_GET['action'] : "";

//Add to cart
if ($action == 'addcart' && $_SERVER['REQUEST_METHOD'] == 'POST') {

	//Finding the product by code
	$query = "SELECT * FROM posts WHERE sku=:sku";
	$stmt = $conn->prepare($query);
	$stmt->bindParam('sku', $_POST['sku']);
	$stmt->execute();
	$product = $stmt->fetch();
	$currentQty = 1;
	// $currentQty = $_SESSION['products'][$_POST['sku']]['qty']; //Incrementing the product qty in cart
	$_SESSION['products'][$_POST['sku']] = array('id' => $product['id'], 'qty' => $currentQty, 'title' => $product['title'], 'img' => $product['img'], 'prices' => $product['prices']);
	$product = '';
	require_once("views/navbar.php");
	header("Location:home.html");
}

//Empty All
if ($action == 'emptyall') {
	$_SESSION['products'] = array();
	header("Location:home.html");
}

//Empty one by one
if ($action == 'empty') {
	$sku = $_GET['sku'];
	$products = $_SESSION['products'];
	unset($products[$sku]);
	$_SESSION['products'] = $products;
	header("Location:home.html");
}




//Get all Products
$query = "SELECT * FROM posts";
$stmt = $conn->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll();

?>

<?php
session_start();
//initialize cart if not set or is unset
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}

//unset qunatity
unset($_SESSION['qty_array']);
?>
<?php
require_once('libraries/class.database.php');
$csdl = new mySQL();
$csdl->connect();
$sql = "select count(id) as total from `posts`";
$result = $csdl->query($sql);
$row = $csdl->fetch($result);

$total_records = $row['total'];
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 8;
$total_page = ceil($total_records / $limit);

// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page) {
	$current_page = $total_page;
} else if ($current_page < 1) {
	$current_page = 1;
}
if (empty($_POST["find"])) {
	$start = ($current_page - 1) * $limit;
	$query = "SELECT * FROM `posts` ORDER BY id DESC LIMIT $start, $limit";
} else {
	$total_page = 0;
	$keyword_to_find = htmlentities($_POST["find"]);
	$query = "SELECT * FROM `posts` WHERE title LIKE '%" . $keyword_to_find . "%'";
}
$result2 = $csdl->query($query);

/*.start-container-fluid */
echo '<div class="container-fluid">
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
			<div class="owl-carousel owl-carousel-category">
		';
$query_hotgame = "SELECT *,(reactnum+hahanum+sadnum+lovenum+wownum+angrynum) as total_react FROM `posts` ORDER BY viewsnum DESC LIMIT 0, 15";
$dquery_hotgame = $csdl->query($query_hotgame);
$user = $_SESSION['username'];
$query_check_buy = "SELECT idgame from purchase_history WHERE buyer = '$user'";
$do_q_c = $csdl->query($query_check_buy);
$listgame_purchared = array();
while($fetch_q_c = $csdl->fetch_array($do_q_c)){
    array_push($listgame_purchared, $fetch_q_c['idgame']);  
}

while ($fetch_hotgame = $csdl->fetch($dquery_hotgame)) {
	echo '<div class="item">
                              <div class="category-item">
                                 <a href="' . $web['url'] . '/source/codenum-' . $fetch_hotgame["id"] . '.html">
                                    <span><img class="img-fluid" src="' . $fetch_hotgame["img"] . '" alt=""></span>
                                    <h6>' . $fetch_hotgame["title"] . '</h6>
                                    <p><i class="fas fa-heart"></i> ' . number_format($fetch_hotgame["total_react"]) . '</p>
                                 </a>
                              </div>
                           </div>
                        
                  ';
}
echo '</div>
						</div>
					</div>
               </div>
			<hr><div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <div class="btn-group float-right right-action">
                               <form method="post" action="" class="form-inline my-2 my-lg-0">
                        <input class="form-control form-control-sm mr-sm-1" name="find" type="search" placeholder="Search Source" aria-label="Search"><button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button> &nbsp;&nbsp;&nbsp;
                     </form>
							  
                           </div>
                           <h6>Source All Game</h6>
                        </div>
                     </div>';
foreach ($products as $product) {
	for ($j = 0; $j < $row["total"]; $j++) {
	}
	echo '<div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a class="play-icon" href="' . $web['url'] . '/source/codenum-' . $product["id"] . '.html"><i class="fas fa-american-sign-language-interpreting"></i></a>
                              <a href="' . $web['url'] . '/source/codenum-' . $product["id"] . '.html"><img width="270" height="169" class="img-itemsize" src="' . $product["img"] . '" alt=""></a>
                             
							 
                           </div>
                           <div class="video-card-body">
						   
							<div class="row no-gutters">
							<div class="col-12 col-sm-6 col-md-8">
							<div class="video-title">
                                 <a href="' . $web['url'] . '/source/codenum-' . $product["id"] . '.html">' . substr_replace(mb_substr($product["title"], 0, 40, 'UTF-8'), "...", 50) . '</a>
                              </div>
							  <div class="video-page text-success">
                                 ' . $product["author"] . '  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                              </div>
                              <div class="video-view">
                                <i class="fas fa-eye"></i> ' . $product["viewsnum"] . ' | <i class="fas fa-calendar-alt"></i> ' . $product["createdate"] . '
                              </div>
							</div>
							<div class="col-6 col-md-4" style="padding-left: 24px;top: 10px;">
							';
							if(in_array($product["id"], $listgame_purchared)){
							  echo '<a href="' . $web['url'] . '/source/codenum-' . $product["id"] . '.html"><button class="btn btn-warning"><span class="fas fa-eye fa-sm"></span></button></a>
							  <button class="btn btn-secondary"><span class="fas fa-cart-arrow-down fa-sm"></span></button> 
							  ';
							}else{
								if(in_array($product["id"], $_SESSION['products'][$product['sku']])){
									$isShow = 'btn-danger';
								}else{
									$isShow = "btn-success";
								}
								echo'
							  	<div style="top:5px;">
								<a href="' . $web['url'] . '/source/codenum-' . $product["id"] . '.html"><button class="btn btn-warning"><span class="fas fa-eye fa-sm"></span></button></a>
								<button onclick="addToCart(event, this)" id="' . $product['sku'] . '" name="addtocart" class="btn '.$isShow.'" value="' . $product['sku'] . '"><span class="fas fa-shopping-cart fa-sm"></span></button>
                      			</div>
							  ';
							}
							echo '</div>
							</div>

                           </div>
                        </div>
                     </div>';
			
}
?>
<?php
echo '</div><nav aria-label="Page navigation example">';
echo ' <ul class="pagination justify-content-center pagination-sm mb-0">';
$adjacents = 2;
$second_last = $total_page - 1;
if ($current_page > 1 && $total_page > 1) {
	echo '<li class="page-item"><a class="page-link" href="game-page' . ($current_page - 1) . '.html">Previous</a></li>';
} elseif ($total_page == 0) {
	echo '';
} else {
}
if ($total_page <= 10) {
	for ($i = 1; $i <= $total_page; $i++) {
		if ($i == $current_page) {
			echo '<li class="page-item active"><a href="#" class="page-link">' . $i . '</a></li>';
		} else {
			echo '<li class="page-item"><a class="page-link" href="game-page' . $i . '.html">' . $i . '</a></li>';
		}
	}
} elseif ($total_page > 10) {
	if ($current_page <= 4) {
		for ($i = 1; $i < 8; $i++) {
			if ($i == $current_page) {
				echo '<li class="page-item active"><a href="#" class="page-link">' . $i . '</a></li>';
			} else {
				echo '<li class="page-item"><a class="page-link" href="game-page' . $i . '.html">' . $i . '</a></li>';
			}
		}
		echo '<li class="page-item"><a class="page-link">...</a></li>';
		echo '<li class="page-item"><a href="game-page' . $second_last . '.html" class="page-link">' . $second_last . '</a></li>';
		echo '<li class="page-item"><a href="game-page' . $total_page . '.html" class="page-link">' . $total_page . '</a></li>';
	} elseif ($current_page > 4 && $current_page < $total_page - 4) {
		echo '<li class="page-item"><a href="game-page1.html" class="page-link">1</a></li>';
		echo '<li class="page-item"><a href="game-page2.html" class="page-link">2</a></li>';
		echo '<li class="page-item"><a class="page-link">...</a></li>';
		for ($i = $current_page - $adjacents; $i <= $current_page + $adjacents; $i++) {
			if ($i == $current_page) {
				echo '<li class="page-item active"><a href="#" class="page-link">' . $i . '</a></li>';
			} else {
				echo '<li class="page-item"><a class="page-link" href="game-page' . $i . '.html">' . $i . '</a></li>';
			}
		}
		echo '<li class="page-item"><a class="page-link">...</a></li>';
		echo '<li class="page-item"><a href="game-page' . $second_last . '.html" class="page-link">' . $second_last . '</a></li>';
		echo '<li class="page-item"><a href="game-page' . $total_page . '.html" class="page-link">' . $total_page . '</a></li>';
	} else {
		echo '<li class="page-item"><a href="game-page1" class="page-link">1</a></li>';
		echo '<li class="page-item"><a href="game-page2" class="page-link">2</a></li>';
		echo '<li class="page-item"><a class="page-link">...</a></li>';
		for ($i = $total_page - 6; $i <= $total_page; $i++) {
			if ($i == $current_page) {
				echo '<li class="page-item active"><a href="#" class="page-link">' . $i . '</a></li>';
			} else {
				echo '<li class="page-item"><a class="page-link" href="game-page' . $i . '.html">' . $i . '</a></li>';
			}
		}
	}
}
if ($current_page < $total_page && $total_page > 1) {
	echo '<li class="page-item"><a class="page-link" href="game-page' . ($current_page + 1) . '.html">Next</a></li>';
}
echo '</ul></nav>  </div>
            </div>';
					  /*.end-container-fluid */
echo "
<script>
function addToCart(event, sku){
	event.preventDefault();
	var gsku = sku.value;
	$.ajax({
		type: 'POST',
		url: '" . $web['url'] . "/add-to-cart.html',
		data: {sku: gsku},
		success: function(){
			$.post('" . $web['url'] . "/c_carts.html', function(data) {
				$('#carts-count').text(data);
				$('#' + gsku).removeClass('btn-success').addClass('btn-danger');
			 });
		 
		}
	  });
  };
</script> 
";