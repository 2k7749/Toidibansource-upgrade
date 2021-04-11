<?php require_once("config_paypal.php"); ?>
<?php
session_start();
$productName = "Product";
$currency = "USD";
// $productPrice = 0;
$productId = 123456;
$orderNumber = 999;
if (!isset($_SESSION['cart'])) {
   $_SESSION['cart'] = array();
}

//unset qunatity
unset($_SESSION['qty_array']);

$_SESSION['csrf_ajax_key'] = sha1(uniqid());
$_SESSION['csrf_ajax_val'] = sha1(uniqid());
require_once('libraries/class.database.php');
$csdl = new mySQL();
$csdl->connect();
$code = -1;
if (isset($_GET["code"])) {
   $code = intval($_GET['code']);
}
$sql = "SELECT * from posts WHERE id = $code";
$query = $csdl->query($sql);
$viewsplus = "UPDATE posts SET viewsnum = viewsnum + 1 WHERE id = $code";
$doviewsplus = $csdl->query($viewsplus);
$g_u_u = $info["username"];
$query_check_buy = "SELECT * from purchase_history WHERE buyer = '$g_u_u' AND idgame = '$code'";
$do_q_c = $csdl->query($query_check_buy);
$fetch_q_c = $csdl->num_row($do_q_c);
?>
<?php
while ($data = $csdl->fetch($query)) {
?>

   <script language="javascript">
      document.title = ' <?php echo html_entity_decode($data['title']) . " - " . $web['webname']; ?>';
   </script>
   <script language="javascript">
      function plus_reaction(elmt) {
         var type_react = elmt.value;
         var getid = document.getElementById("getid").value;
         jQuery.ajax({
            url: "../c_react.html",
            data: {
               react_id: getid,
               type_react: type_react
            },
            type: "POST",
            success: function(data) {
               if (type_react == 1) {
                  toastr.success("Thanks for dropping the LIKE", "Success");
               } else if (type_react == 2) {
                  toastr.success("Thanks for dropping the LOVE", "Success");
               } else if (type_react == 3) {
                  toastr.success("Thanks for dropping the HAHA", "Success");
               } else if (type_react == 4) {
                  toastr.success("Thanks for dropping the WOW", "Success");
               } else if (type_react == 5) {
                  toastr.success("Thanks for dropping the SAD", "Success");
               } else if (type_react == 6) {
                  toastr.success("Thanks for dropping the ANGRY", "Success");
               }
            },
            error: function(data) {
               toastr.Error("Error! An error occurred. Please try again later", "Error");
            }
         });
      }
   </script>
   <script language="javascript">
      $(document).ready(function() {
         var g_s_id = document.getElementById("getid").value;
         var g_u_pay = document.getElementById("getuser").value;
         var str = "s_id=" + g_s_id + "&u_pay=" + g_u_pay + "&<?php echo $_SESSION['csrf_ajax_key']; ?>=" + "<?php echo $_SESSION['csrf_ajax_val']; ?>";
         $("#pthisGame").click(function() {
            $.ajax({
               url: "../c_pay.html",
               type: "POST",
               data: str,
               dataType: "JSON",
               success: function(vData) {
                  if (vData.code == 0) {
                     toastr.success(vData.msg, "Success", {
                        onHidden: function() {
                           window.location.reload();
                        }
                     });
                     document.getElementById('pthisGame').style.visibility = 'hidden';
                  } else if (vData.code == 1) {
                     toastr.error(vData.msg, "Error");
                  } else if (vData.code == 2) {
                     toastr.warning(vData.msg, "Warning");
                  } else {
                     toastr.warning(vData.msg, "Warning");
                  }
               }
            });
         });
      });
   </script>
   <script language="javascript">
      function download_Items() {
         var getid = document.getElementById("getid").value;
         $.ajax({
            type: "POST",
            url: "../download.html",
            data: {
               vdownload: getid
            },
            success: function() {
               toastr.success("Redirecting", "Success");
               window.location.href = "<?php echo $web['url']; ?>/download-source" + getid + ".html";
            },
            error: function(output) {
               toastr.Error(msg, "Error");
            }
         });
         return;
      }
   </script>
   <script type="text/javascript">
      function login_to_buy() {
         toastr.warning("Please login to make this request", "Warning");
      }
   </script>
   <div id="content-wrapper">
      <div class="container-fluid pb-0">
         <div class="video-block section-padding">
            <div class="row">
               <div class="col-md-8">
                  <div class="single-video-left">
                     <div class="single-video">
                        <iframe width="100%" height="315" src="<?php echo $data['videoreviews']; ?>?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                     </div>
                     <div class="single-video-title box mb-3">
                        <center>
                           <h1><?php echo $data['title']; ?></h1>
                        </center>
                     </div>
                     <div class="single-video-info-content box mb-3">
                        <h6 class="text-warning">Reviews And Information <i class="fa fa-info-circle"></i></h6>
                        <p>
                           <font color="white"><?php echo $data['content']; ?></font>
                        </p>
                        </p>
                     </div>
                     <div class="single-video-info-content box mb-3">
                        <h6 class="text-success">Tutorials <i class="fa fa-list-ol"></i></h6>
                        <p>
                           <font color="white"><?php echo $data['tutorials']; ?></font>
                        </p>
                     </div>
                     <div class="single-video-info-content box mb-3">
                        <h6 class="text-danger">Tags <i class="fa fa-tags"></i></h6>
                        <p class="tags mb-0">
                           <font color="white">
                              <?php
                              $get_keyw = $data['keyword'];
                              $array_keyw_cut =  explode(',', $get_keyw);
                              for ($i = 0; $i < sizeof($array_keyw_cut); $i++) {
                                 echo ' <span><a href="#">' . $array_keyw_cut[$i] . '</a></span>';
                              }
                              ?></font>
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="single-video-right">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="adblock">
                              <div class="single-video-author box mb-3">
                                 <input type="hidden" value="<?php echo $info['username']; ?>" id="getuser" name="getuser" />
                                 <?php
                                 $checkbuy = "SELECT * FROM purchase_history WHERE idgame = " . $data['id'] . " AND buyer = '" . $info['username'] . "'";
                                 $do_checkbuy = $csdl->query($checkbuy);
                                 $veri_check = $csdl->num_row($do_checkbuy);
                                 if ($veri_check > 0 || $info['package'] == 'premium') { ?>
                                    <p class="cloud-text cloud-title" style="background-image: url('https://media.giphy.com/media/QxTOIydCGHUklYrb10/giphy.gif')">Available For Download</p>

                                    <p><a class="btn btn-warning" style="width: 100%" href="#" onclick="download_Items()"><i class="fas fa-file-download"></i> Download Source Here</a></p><br>
                                    <p><a class="btn btn-primary" style="width: 100%" href="<?php echo $web['community']; ?>"><i class="fas fa-street-view"></i> Join our Community</a></p><br>
                                 <?php } else { ?>
                                    <p class="cloud-text cloud-title" style="background-image: url('https://i2.wp.com/windowscustomization.com/wp-content/uploads/2018/12/a-night-among-tree.gif?fit=750%2C366&quality=80&strip=all&ssl=1')">Not Available - Buy To Download</p>
                                    <span><button class="btn btn-warning border-none float-left"><i class="fas fa-sun"></i><?php echo number_format($data['prices']); ?></button></span>


                                    <?php if (!isset($_SESSION['username'])) { ?>
                                       <p><a class="btn btn-success float-right" href="#" onclick="login_to_buy()"><i class="fas fa-shopping-cart"></i> BUY IT</a></p><br><br><br>

                                    <?php } else { ?>

                                       <?php $changecureen = ceil($data['prices']); ?>
                                       <?php $productPrice = ceil($changecureen / 21000);
                                       ?>
                                       <?php $productId = $data['sku']; ?>
                                       <form name="fthisgame" id="fthisgame" method="post">
                                          <p><input type="button" value="👉 𝓑𝓾𝔂 𝓣𝓱𝓲𝓼 👈" class="btn btn-love float-right" name="pthisGame" id="pthisGame" /></p><br><br><br>
                                       </form>
                                       <?php if(in_array(17, $_SESSION['products'][$data['sku']])){ ?>
                                          <div style="top:5px;">
                                             <button class="btn btn-secondary float-right">A͓̽d͓̽d͓̽ ͓̽T͓̽o͓̽ ͓̽C͓̽a͓̽r͓̽t͓̽</button>
                                             <input type="hidden" name="sku" value="<?php echo $productId; ?>" />
                                          </div>
                                      
                                       <?php }else{ ?>
                                          <form method="post" action="<?php echo $web['url']; ?>/add-to-cart.html">
                                             <div style="top:5px;">
                                                <button class="btn btn-primary float-right">A͓̽d͓̽d͓̽ ͓̽T͓̽o͓̽ ͓̽C͓̽a͓̽r͓̽t͓̽</button>
                                                <input type="hidden" name="sku" value="<?php echo $productId; ?>" />
                                             </div>
                                          </form>
                                       <?php } ?>
                                       <br><br><br>
                                    <?php } ?>
                                 <?php } ?>
                                 <br><br>
                                 <p>
                                 <div class="box">
                                    <button class="reaction-like" id="like" value="1" onclick="plus_reaction(this); return false;"><span class="legend-reaction"> <?php echo number_format($data['reactnum']); ?> Like</span></button>
                                    <button class="reaction-love" id="love" value="2" onclick="plus_reaction(this); return false;"><span class="legend-reaction"> <?php echo number_format($data['lovenum']); ?> Love</span></button>
                                    <button class="reaction-haha" id="haha" value="3" onclick="plus_reaction(this); return false;"><span class="legend-reaction"> <?php echo number_format($data['hahanum']); ?> Haha</span></button>
                                    <button class="reaction-wow" id="wow" value="4" onclick="plus_reaction(this); return false;"><span class="legend-reaction"> <?php echo number_format($data['wownum']); ?> Wow</span></button>
                                    <button class="reaction-sad" id="sad" value="5" onclick="plus_reaction(this); return false;"><span class="legend-reaction"> <?php echo number_format($data['sadnum']); ?> Sad</span></button>
                                    <button class="reaction-angry" id="angry" value="6" onclick="plus_reaction(this); return false;"><span class="legend-reaction"> <?php echo number_format($data['angrynum']); ?> Angry</span></button>
                                 </div>
                                 </p><br>
                                 <input type="hidden" value="<?php echo $data['id']; ?>" id="getid" name="getid" />

                                 <font color="#fd721f"><i class="fa fa-info-circle"></i> The resource is permanently free </font><a href="<?php echo $web["url"]; ?>/premium-pack.html"><i class="fa fa-star"></i>
                                    <font color="white">View NOW</font><i class="fa fa-star"></i>
                                 </a>
                                 <p class="tags mb-0">
                                    <span>
                                       <font><span class="float-left">Sold</span> <span class="float-right"><?php echo $data['soldnum']; ?></span>
                                          <br><br>
                                          <span class="float-left">Update Day</span> <span class="float-right"><?php echo date('d/m/Y H:i:s', strtotime($data['updatedate'])); ?></span>
                                          <br><br>
                                          <span class="float-left">Published on</span> <span class="float-right"><?php echo date('d/m/Y H:i:s', strtotime($data['createdate'])); ?></span>
                                          <br><br>
                                          <span class="float-left">Author</span> <span class="float-right text-success"><?php echo $data['author']; ?> <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span>
                                       </font>
                                    </span>
                                 </p><br>
                                 <span><button class="btn btn-secondary border-none float-right">Support</button></span>
                              </div>

                           </div>
                           <div class="col-md-12">
                              <?php
                              $querycount = "SELECT count(id) as total FROM `posts` WHERE tag = " . $data['tag'] . "";
                              $resultcount = $csdl->query($querycount);
                              $row = $csdl->fetch($resultcount);
                              $querythis = "SELECT * FROM posts WHERE tag = " . $data['tag'] . " AND id != " . $data['id'] . " ORDER BY id DESC LIMIT 1, 5";
                              $resultthis = $csdl->query($querythis);
                              while ($loadpost = $csdl->fetch($resultthis)) {
                                 for ($j = 0; $j < $row["total"]; $j++) {
                                    if ($loadpost["tag"] != $j) {
                                       $quecate = "select c.cateid,c.catename FROM `categories` c,`posts` v WHERE " . $loadpost["tag"] . " = c.cateid group by c.cateid,c.catename";
                                       $result3 = $csdl->query($quecate);
                                       $fcate = $csdl->fetch($result3);
                                       $leftcate = $fcate["catename"];
                                    }
                                 }
                                 echo '<div class="video-card video-card-list">
                                    <div class="video-card-image">
                                       <a class="play-icon" href="codenum-' . $loadpost['id'] . '.html"><i class="fas fa-american-sign-language-interpreting"></i></a>
                                       <a href="codenum-' . $loadpost['id'] . '.html"><img class="img-fluid" src="' . $loadpost['img'] . '" alt=""></a>
                                       <div class="time">' . $leftcate . '</div>
                                    </div>
                                    <div class="video-card-body">
                                       <div class="video-title">
                                          <a href="codenum-' . $loadpost['id'] . '.html">' . $loadpost['title'] . '</a>
                                       </div>
                                       <div class="video-page text-success">
                                          ' . $loadpost['author'] . '  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                       </div>
                                       <div class="video-view">
                                          <i class="fas fa-eye"></i>  ' . $loadpost['viewsnum'] . ' views | <i class="fas fa-calendar-alt"></i> ' . date('d/m/Y', strtotime($loadpost['createdate'])) . '
                                       </div>
                                    </div>
                                 </div>';
                              } ?>
                           </div>
                           <div class="adblock mt-0">
                              <div class="img">
                                 Google AdSense<br>
                                 336 x 280 Px
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
<?php } ?>