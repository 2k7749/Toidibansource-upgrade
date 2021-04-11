<?php require_once("models/load_information.php"); ?>
<?php require_once("models/config_paypal.php"); ?>

<?php
error_reporting(0);
//Setting session start
session_start();
$productName = "Product";
$currency = "USD";
$productPrice = 0;
$productId = 1;
$orderNumber = 999;
$total = 0;
$amount = 0;
$qty = 0;
//get action string
$action = isset($_GET['action']) ? $_GET['action'] : "";

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
  header("Location:mycart.html");
}
?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("location: " . $web['url'] . "/home.html");
}
if ($web["weboff"] == 1) {
  header("location: " . $web['url'] . "/maintenance.html");
} else {
?>
  <!DOCTYPE html>
  <html lang="en">
  <?php require_once("views/header.php"); ?>
  <script>
    document.title = ' <?php echo $page_cart . " - " . $web['webname']; ?>';
    jQuery(document).ready(function($) {
      var sidehome = document.getElementById("sidehome");
      var sidepurhist = document.getElementById("sidepurhist");
      sidehome.className = sidehome.className.replace(/\bnav-item active\b/g, "nav-item");
      sidepurhist.classList.add("active");
    });
  </script>

  <body id="page-top">
    <?php require_once("views/navbar.php"); ?>
    <div id="wrapper">
      <?php require_once("views/sidebar.php"); ?>
      <!-- /.start-container-fluid -->
      <div id="content-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 mx-auto text-center  pt-4 pb-5">
              <h1><img alt="logo" src="<?php echo $web['logo']; ?>" style="width:35%;height:auto"></h1>
              <h2>MY - <font color="#00FF40">CART</font>
              </h2>
              <p class="land">
                <style type="text/css">
                  table {
                    width: 100%;
                    table-layout: fixed;
                  }

                  .tbl-header {
                    background-color: rgba(255, 255, 255, 0.3);
                  }

                  .tbl-content {
                    height: 300px;
                    overflow-x: auto;
                    margin-top: 0px;
                    border: 1px solid rgba(255, 255, 255, 0.3);
                  }

                  th {
                    padding: 20px 15px;
                    text-align: left;
                    font-weight: 500;
                    font-size: 12px;
                    color: #fff;
                    text-transform: uppercase;
                  }

                  td {
                    padding: 15px;
                    text-align: left;
                    vertical-align: middle;
                    font-weight: 300;
                    font-size: 12px;
                    color: #fff;
                    border-bottom: solid 1px rgba(255, 255, 255, 0.1);
                  }


                  section {
                    margin: 50px;
                  }

                  .made-with-love {
                    margin-top: 40px;
                    padding: 10px;
                    clear: left;
                    text-align: center;
                    font-size: 10px;
                    font-family: arial;
                    color: #fff;
                  }

                  .made-with-love i {
                    font-style: normal;
                    color: #F50057;
                    font-size: 14px;
                    position: relative;
                    top: 2px;
                  }

                  .made-with-love a {
                    color: #fff;
                    text-decoration: none;
                  }

                  .made-with-love a:hover {
                    text-decoration: underline;
                  }

                  .total {
                    float: right;
                  }


                  /* scrollbar */

                  ::-webkit-scrollbar {
                    width: 6px;
                  }

                  ::-webkit-scrollbar-track {
                    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
                  }

                  ::-webkit-scrollbar-thumb {
                    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
                  }
                </style>
                <script type="text/javascript">
                  $(window).on("load resize ", function() {
                    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
                    $('.tbl-header').css({
                      'padding-right': scrollWidth
                    });
                  }).resize();
                </script>
              <section>
                <div class="tbl-header">
                  <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                      <tr class="text-center">
                        <td class="text-center">Img</td>
                        <td class="text-center">Tên sản phẩm</td>
                        <td class="text-center">Số lượng</td>
                        <td class="text-center">Đơn giá</td>
                        <td class="text-center">Thành tiền</td>
                        <td class="text-center"></td>
                      </tr>
                    </thead>
                  </table>
                </div>
                <div class="tbl-content">
                  <table cellpadding="0" cellspacing="0" border="0">
                    <?php $stackArr = array();
                    foreach ($_SESSION['products'] as $key => $product) :
                      array_push($stackArr, $product['id']);
                    ?>
                      <tbody>
                        <tr>
                          <td class="text-center">
                            <a href="#">
                              <img src="<?php print $product['img'] ?>" alt="Age Of Wisdom Tan Graphic Tee" title="" width="47" height="47">
                            </a>
                          </td>
                          <td class="text-center"><a href="#"><?php echo $product['title'];
                                                              ?></a>
                          </td>

                          <td class="text-center">
                            <input class="text-center" type="number" name="[Product][1]" class="form-control input-product-amount" placeholder="<?php print $product['qty'] ?>" value="<?php print $product['qty'] ?>" data-product-id="1" disabled="">
                          </td>
                          <td class="text-center"><?php echo number_format($product['prices']);  ?></td>
                          <td class="text-center"><?php echo number_format($product['prices'] * $product['qty']); ?> VNĐ</td>
                          <td class="text-center">
                            <a href="<?php echo $web['url'];?>/remove-item-<?php echo $key ?>.html" class="fas fa-minus-circle fa-fw"></a>

                          </td>
                          <?php $productId = $key;
                          ?>
                        </tr>
                      <?php $amount += $product['prices'] * $product['qty'];
                    endforeach; ?>

                      <?php $productPrice = ceil($amount / 23000);
                      require "models/crypt_hipz.php";
                      $payloadData = Encrypt_Pass(implode(',', $stackArr));
                      ?>

                      </tbody>
                  </table>

                  <table cellpadding="0" cellspacing="0" border="0">

                  <tr>
                      <td style="padding:60px;" colspan="8"><font style="font-size:30px;">Total: </font><b><strong style="font-size:30px;color:#00ff89;"><?php print number_format($amount) ?> VNĐ</strong></b></td>
                      <td colspan="2"><?php include 'paypal/paypalCheckout.php'; ?></td>
                    </tr>
                  </table>
                  <table cellpadding="0" cellspacing="0" border="0">
                  </table>
                </div>
              </section>
              </p>
              <div class="mt-5">
                <a class="btn btn-outline-primary" href="<?php echo $web['url'] ?>/game-page.html"><i class="mdi mdi-home"></i> Shopping More</a>


              </div>


              <?php  ?>


            </div>
            <!-- /.container-fluid -->
          </div>
          <!-- /.content-wrapper -->
          <?php require_once("views/footer.php"); ?>
  </body>

  </html>
<?php } ?>