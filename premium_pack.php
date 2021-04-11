<?php
session_start();
$_SESSION['csrf_ajax_key'] = sha1(uniqid());
$_SESSION['csrf_ajax_val'] = sha1(uniqid());
require_once("models/load_information.php"); ?>
<?php
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
    document.title = '<?php echo $page_premiumpack . " - " . $web['webname']; ?>';
    jQuery(document).ready(function($) {
      var sidehome = document.getElementById("sidehome");
      var sidepremium = document.getElementById("sidepremium");
      sidehome.className = sidehome.className.replace(/\bnav-item active\b/g, "nav-item");
      sidepremium.classList.add("active");
    });
  </script>

  <body id="page-top">
    <?php require_once("views/navbar.php"); ?>
    <div id="wrapper">
      <?php require_once("views/sidebar.php"); ?>
      <style type="text/css">
        /* by Jamal Hassouni*/
        @import url('https://fonts.googleapis.com/css?family=Roboto:300');

        body {
          margin: 0;
          padding: 0;
          font-family: 'Roboto', sans-serif !important;
        }

        section {
          width: 100%;
          height: 100vh;
          -webkit-box-sizing: border-box;
          box-sizing: border-box;
          padding: 0px 0;
        }

        .card {
          position: relative;
          max-width: 300px;
          height: auto;
          background: linear-gradient(-45deg, #fe0847, #feae3f);
          border-radius: 15px;
          margin: 0 auto;
          padding: 40px 20px;
          -webkit-box-shadow: 0 10px 15px rgba(0, 0, 0, .1);
          box-shadow: 0 10px 15px rgba(0, 0, 0, .1);
          -webkit-transition: .5s;
          transition: .5s;
        }

        .card:hover {
          -webkit-transform: scale(1.1);
          transform: scale(1.1);
        }

        .col-sm-4:nth-child(1) .card,
        .col-sm-4:nth-child(1) .card .title .fa {
          background: linear-gradient(-45deg, #f403d1, #64b5f6);

        }

        .col-sm-4:nth-child(2) .card,
        .col-sm-4:nth-child(2) .card .title .fa {
          background: linear-gradient(-45deg, #ffec61, #f321d7);

        }

        .col-sm-4:nth-child(3) .card,
        .col-sm-4:nth-child(3) .card .title .fa {
          background: linear-gradient(-45deg, #24ff72, #9a4eff);

        }

        .card::before {
          content: '';
          position: absolute;
          bottom: 0;
          left: 0;
          width: 100%;
          height: 40%;
          background: rgba(255, 255, 255, .1);
          z-index: 1;
          -webkit-transform: skewY(-5deg) scale(1.5);
          transform: skewY(-5deg) scale(1.5);
        }

        .title .fa {
          color: #fff;
          font-size: 60px;
          width: 100px;
          height: 100px;
          border-radius: 50%;
          text-align: center;
          line-height: 100px;
          -webkit-box-shadow: 0 10px 10px rgba(0, 0, 0, .1);
          box-shadow: 0 10px 10px rgba(0, 0, 0, .1);

        }

        .title h2 {
          position: relative;
          margin: 20px 0 0;
          padding: 0;
          color: #fff;
          font-size: 28px;
          z-index: 2;
        }

        .price,
        .option {
          position: relative;
          z-index: 2;
        }

        .price h4 {
          margin: 0;
          padding: 20px 0;
          color: #fff;
          font-size: 60px;
        }

        .option ul {
          margin: 0;
          padding: 0;

        }

        .option ul li {
          margin: 0 0 10px;
          padding: 0;
          list-style: none;
          color: #fff;
          font-size: 16px;
        }

        .card a {
          position: relative;
          z-index: 2;
          background: #fff;
          color: black;
          width: 150px;
          height: 40px;
          line-height: 40px;
          border-radius: 40px;
          display: block;
          text-align: center;
          margin: 20px auto 0;
          font-size: 16px;
          cursor: pointer;
          -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
          box-shadow: 0 5px 10px rgba(0, 0, 0, .1);

        }

        .card a:hover {
          text-decoration: none;
        }
      </style>

      <!-- /.start-container-fluid -->
      <div id="content-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 mx-auto text-center  pt-4 pb-5">
              <h1><img alt="logo" style="width:20%;height:auto" src="<?php echo $web['logo']; ?>"></h1>
              <h4>
                <font color="#f321d7">Recharge 1 time</font> - Get Pack "<font color="#24ff72">Standard</font>"
              </h4>
              <section>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="card text-center">
                      <div class="title">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        <h2>Basic</h2>
                      </div>
                      <div class="price">
                        <h4><sup><i class="fas fa-sun"></i></sup>0</h4>
                      </div>
                      <div class="option">
                        <ul>
                          <li> <i class="fa fa-check" aria-hidden="true"></i> Download Game(Free) </li>
                          <li> Limited </li>
                          <li> <i class="fa fa-check" aria-hidden="true"></i> Limited Benefits </li>
                          <li> <i class="fa fa-times" aria-hidden="true"></i> Live Support </li>
                        </ul>
                      </div>
                      <a>
                        <font color="black">DEFAULT </font>
                      </a>
                    </div>
                  </div>
                  <!-- END Col one -->
                  <div class="col-sm-4">
                    <div class="card text-center">
                      <div class="title">
                        <i class="fa fa-plane" aria-hidden="true"></i>
                        <h2>Standard</h2>
                      </div>
                      <div class="price">
                        <h4><sup><i class="fas fa-sun"></i></sup>100</h4>
                      </div>
                      <div class="option">
                        <ul>
                          <li> <i class="fa fa-check" aria-hidden="true"></i> Download Game(All) </li>
                          <li> Pay Per Game </li>
                          <li> <i class="fa fa-check" aria-hidden="true"></i> Unlimited Benefits </li>
                          <li> <i class="fa fa-times" aria-hidden="true"></i> Live Support </li>
                        </ul>
                      </div>
                      <?php if ($info['package'] != 'premium' || $info['package'] == 'standard') { ?>
                        <a href="<?php echo $web['url']; ?>/recharge-account.html">Order Now </a>
                      <?php } else { ?>
                        <a href="#">You're Premium</a>
                      <?php } ?>
                    </div>
                  </div>
                  <!-- END Col two -->
                  <div class="col-sm-4">
                    <div class="card text-center">
                      <div class="title">
                        <i class="fa fa-rocket" aria-hidden="true"></i>
                        <h2>Premium</h2>
                      </div>
                      <div class="price">
                        <h4><sup><i class="fas fa-sun"></i></sup><?php echo $web['premium_price']; ?></h4>
                      </div>
                      <div class="option">
                        <ul>
                          <li> <i class="fa fa-check" aria-hidden="true"></i> Download Game(All) </li>
                          <li> Unlimited </li>
                          <li> <i class="fa fa-check" aria-hidden="true"></i> Unlimited Benefits </li>
                          <li> <i class="fa fa-check" aria-hidden="true"></i> Live Support </li>
                        </ul>
                      </div>
                      <?php if ($info['package'] != 'premium') { ?>
                        <a href="#" data-toggle="modal" data-target="#premiumModal">Order Now</a>
                      <?php } else { ?>
                        <a href="#">You're Premium</a>
                      <?php } ?>
                    </div>
                  </div>
                  <!-- END Col three -->
                  <input type="hidden" value="<?php echo $info['username']; ?>" id="u_p_premium" name="u_p_premium" />
                </div>
                <div class="mt-5">
                  <a class="btn btn-outline-primary" href="<?php echo $web['url'] ?>/game-page.html"><i class="mdi mdi-home"></i> GO TO SHOP</a>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
      <!-- BUY Modal-->
      <div class="modal fade" id="premiumModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <script type="text/javascript">
          var u_p_premium = document.getElementById("u_p_premium").value;
          $(document).ready(function() {
            $("#transPre").click(function() {
              $.ajax({
                url: "c_pay_pre.html",
                type: "POST",
                data: {
                  u_premium: u_p_premium,
                  "<?php echo $_SESSION['csrf_ajax_key']; ?>": "<?php echo $_SESSION['csrf_ajax_val']; ?>"
                },
                dataType: "JSON",
                success: function(vData) {
                  if (vData.code == 1) {
                    toastr.success(vData.msg, "Success", {
                      onHidden: function() {
                        window.location.reload();
                      }
                    });
                    document.getElementById("closeThis").click();
                  } else if (vData.code == 2) {
                    toastr.error(vData.msg, "Error");
                  } else if (vData.code == 3) {
                    toastr.warning(vData.msg, "Warning");
                  } else {
                    toastr.warning(vData.msg, "Warning");
                  }
                }
              });
            });
          });
        </script>
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">UP TO PREMIUM?</h5>
              <button id="closeThis" class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Download Unlimited Game with premium package FOR only <font color="red" <i class="fas fa-sun"></i><?php echo $web['premium_price']; ?></font>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <form name="prePremium" id="prePremium" method="POST">
                <input class="btn btn-primary" type="button" value="BUY NOW" name="transPre" id="transPre" />
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /.content-wrapper -->
      <?php require_once("views/footer.php"); ?>
  </body>

  </html>
<?php } ?>