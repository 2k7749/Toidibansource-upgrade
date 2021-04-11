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

//Get all Products
$query = "SELECT * FROM posts";
$stmt = $conn->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll();

?>
<nav class="navbar navbar-expand navbar-light bg-white static-top osahan-nav sticky-top">
   &nbsp;&nbsp;
   <button class="btn btn-link btn-sm text-secondary order-1 order-sm-0" id="sidebarToggle">
      <i class="fas fa-bars"></i>
   </button> &nbsp;&nbsp;

   <!-- Navbar Search -->
   <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-5 my-2 my-md-0 osahan-navbar-search">
      <a class="navbar-brand mr-1 center" href="<?php echo $web['url'] ?>/home.html"><img class="img-logosite" alt="" src="<?php echo $web['logo'] ?>"></a>
   </div>
   <!-- Navbar -->
   <ul class="navbar-nav ml-auto ml-md-0 osahan-right-navbar">

      <?php
      if (isset($_SESSION['username'])) {
      ?>
         <?php if ($info["level"] == 1) { ?>
            <li class="nav-item mx-1">
               <a class="nav-link" href="<?php echo $web['url'] ?>/cpanel/home.html">
                  <i class="fas fa-gamepad fa-fw"></i>
                  Control Panel
               </a>
            </li>
         <?php } else { ?>
            <li class="nav-item mx-1">
               <a class="nav-link" href="<?php echo $web['url'] ?>/account-view.html">
                  <i class="fas fa-gamepad fa-fw"></i>
                  My Games
               </a>
            </li>

            <li class="nav-item dropdown no-arrow mx-1">
               <a class="nav-link dropdown-toggle" href="#" onclick="myCart()" id="cartsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-cart-plus fa-fw"></i>
                  <span id="carts-count" class="badge badge-danger"><?php echo count($_SESSION['products']) ?></span>
               </a>
               <div id="my-cart" name="my-cart" style="min-width: 20rem;" class="dropdown-menu dropdown-menu-right" aria-labelledby="cartsDropdown">
               </div>
            </li>

            <?php
            //info message
            if (isset($_SESSION['message'])) {
            ?>
               <div class="row">
                  <div class="col-sm-6 col-sm-offset-6">
                     <div class="alert alert-info text-center">
                        <?php echo $_SESSION['message']; ?>
                     </div>
                  </div>
               </div>
            <?php
               unset($_SESSION['message']);
            }
            ?>
         <?php } ?>
         <?php
         $count_noti = 0;
         $cm_noti = "SELECT * FROM noti_log WHERE noti_status = 0 AND username = '" . $info['username'] . "'";
         $query_noti = $csdl->query($cm_noti);
         $count_noti = $csdl->num_row($query_noti);
         ?>
         <script type="text/javascript">
            function notiFunc() {
               var uget = document.getElementById("uget").value;
               $.ajax({
                  url: "../c_fe_noti.html",
                  type: "POST",
                  data: {
                     uget: uget
                  },
                  success: function(data) {
                     $("#notification-count").hide();
                     $("#notification-latest").html(data);
                  },
                  error: function() {}
               });
            }

            function realtimeNoti() {
               var uget = document.getElementById("uget").value;
               $.ajax({
                  url: "../c_fe_noti.html",
                  type: "POST",
                  data: {
                     ufget: uget
                  },
                  success: function(data) {
                     if (data > 0) {
                        $("#notification-count").show();
                        $("#notification-count").html(data);
                     }
                  },
                  error: function() {}
               });
            }
            $(document).ready(function() {
               $('body').click(function(e) {
                  if (e.target.id == 'alertsDropdown') {
                     //$("#notification-latest").show();
                  }
               });
            });
            setInterval(realtimeNoti, 5000);
         </script>
         <script type="text/javascript">
            function myCart() {
               $(document).ready(function() {
                  var html = `
                  <table style="color:white;width:100%;" border="0">
                     <?php
                        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                       ?>
                        <br>
                        <center><p style="color:white;">Cart is Empty</p></center>
                     <?php
                     }else{
                     foreach ($_SESSION['products'] as $key => $product) :
                     ?>
                      <tbody>
                        <tr>
                          <td class="text-center">
                            <a href="#">
                              <img src="<?php print $product['img'] ?>" alt="Name of Game" title="" width="47" height="47">
                            </a>
                          </td>
                          <td class="text-center"><a href="#"><?php echo $product['title']; ?></a>
                          </td>

                          <td class="text-center">
                           
                          </td>
                          <td class="text-center"> <?php print $product['qty'] ?> x <br> <?php echo number_format($product['prices']);  ?></td>
                          <td>
                            <a href="<?php echo $web['url'];?>/remove-item-<?php echo $key ?>.html" class="fas fa-minus-circle fa-fw"></a>
                          </td>
                        </tr>
                       

                      <?php $amount_sub += $product['prices'] * $product['qty'];
                     endforeach; }?>
                      
                        </tbody>
                        </table>
                        <div class="dropdown-divider"></div>
                        <table style="margin:5px;color:white;width:100%;" border="0">
                           <tbody>
                              <tr>
                                 <td>
                                    <p class="text-white">Sub-Total:<br><?php echo number_format($amount_sub); ?>VNĐ </p>
                                 </td>
                                 <td>
                                   <a href="<?php echo $web['url'] ?>/mycart.html"> <button style="margin:5px;"class="btn btn-love float-right" name="pthisGame" id="pthisGame">Check Out</button></a>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     `;
                  $("#my-cart").html(html);
               });
            }
         </script>
         <input type="hidden" value="<?php echo $info['username']; ?>" id="uget" name="uget" />
         <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" onclick="notiFunc()" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-bell fa-fw"></i>
               <span id="notification-count" class="badge badge-danger"><?php if ($count_noti > 0) {
                                                                           echo $count_noti;
                                                                        } ?></span>
            </a>
            <div id="notification-latest" class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            </div>
         </li>
         <li class="nav-item dropdown no-arrow osahan-right-navbar-user">
            <a class="nav-link dropdown-toggle user-dropdown-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <?php if (!isset($_SESSION['username']) || $info['img'] == '') { ?>
                  <img alt="" src=" <?php echo $web['avatardefault']; ?>">
               <?php } else { ?>
                  <img alt="" src="<?php echo $info['img']; ?>">
               <?php } ?>
               <?php echo $info['name']; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
               <a class="dropdown-item">
                  <font color="#FFFF00"><i class="fas fa-sun"></i> &nbsp;&nbsp; <?php echo number_format($info['money']); ?></font>
               </a>
               <a class="dropdown-item" href="<?php echo $web['url']; ?>/account-view.html"><i class="fas fa-fw fa-user-circle"></i> &nbsp; My Account</a>
               <a class="dropdown-item" href="<?php echo $web['url']; ?>/settings.html"><i class="fas fa-fw fa-cog"></i> &nbsp; Settings</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-sign-out-alt"></i> &nbsp; Logout</a>
            </div>
         </li>
      <?php } else { ?>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <li class="nav-item dropdown no-arrow osahan-right-navbar-user">
            <span class="btn btn-outline-danger btn-sm"><strong><a href="<?php echo $web['url'] ?>/signin.html"><i class="fas fa-sign-in-alt"></i> Sign In</a></strong></span>
            <span class="btn btn-outline-danger btn-sm"><strong><a href="<?php echo $web['url'] ?>/signup.html"><i class="fas fa-user-plus"></i> Sign Up</a></strong></span>
         </li>
      <?php } ?>
   </ul>
</nav>