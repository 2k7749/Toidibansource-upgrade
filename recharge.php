<?php require_once("models/load_information.php");?>
<?php 
session_start();
  if(!isset($_SESSION['username'])){
   header("location: ".$web['url']."/home.html");
   }
   if ($web["weboff"] == 1) 
   {
   	header("location: ".$web['url']."/maintenance.html");
   }
   else
   {
   ?>
   <?php
  if(isset($_POST['submit'])) {
    if(!isset($_POST['card_type']) || !isset($_POST['card_amount']) || !isset($_POST['serial']) || !isset($_POST['pin'])) {
      $err = 'Please enter full';
    } else {
      $type = $_POST['card_type'];
      $amount = $_POST['card_amount'];
      $seri = $_POST['serial'];
      $pin = $_POST['pin'];
      
      if($type == '' || $amount == '' || $seri == '' || $pin == '') {
        $err = 'Please enter full';
      } else {
        require_once('libraries/trumthe247.class.php');
        
        $trumthe247 = new Trumthe247();
        $note = $info['username'];
        
        $charge_result = $trumthe247->ChargeCard($type, $seri, $pin, $amount, $note); //thực hiện đẩy thẻ lên hệ thống TrumThe247.Com
        
        if($charge_result == false) { //Có lỗi trong quá trình đẩy thẻ.
          $err = 'There was an error processing, please try again or contact Admin';
        } else if(is_string($charge_result)) { //Có lỗi trả về của hệ thống TRUMTHE247.COM.
          $err = $charge_result;
        } else if(is_object($charge_result)) { //Gửi thẻ thành công lên hệ thống.
          $success = 'Recharge successfully, check balance after 1 minutes';
        } else {
          $err = 'There was an error processing the transaction';
        }
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
   <?php require_once("views/header.php"); ?>
   <script>
         document.title = ' <?php echo $page_recharge ." - ". $web['webname'];?>';
         jQuery(document).ready(function($){
          var sidehome = document.getElementById("sidehome");
          var siderecharge = document.getElementById("siderecharge");
          sidehome.className = sidehome.className.replace(/\bnav-item active\b/g, "nav-item");
          siderecharge.classList.add("active");
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
                     <h1><img alt="logo" src="<?php echo $web['logo'];?>" style="width:35%;height:auto"></h1>
                     <h2><font color="red">RECHARGE</font> - ACCOUNT</h2>
                     <form method="POST" action="" style="color:#FF00AF">
          <div class="form-group">
            <label class="float-left">Loại thẻ</label>
            <select style="color:white" class="form-control" name="card_type">
              <option value="">Chọn loại thẻ</option>
              <option value="VTT">Viettel</option>
              <option value="VMS">Mobifone</option>
              <option value="VNP">Vinaphone</option>
            </select>
          </div>
          <div class="form-group">
            <label class="float-left">Mệnh giá</label>
            <select style="color:white" class="form-control" name="card_amount">
              <option value="">Chọn mệnh giá</option>
              <option value="10000">10.000</option>
              <option value="20000">20.000</option>
              <option value="50000">50.000</option>
              <option value="100000">100.000</option>
              <option value="200000">200.000</option>
              <option value="300000">300.000</option>
              <option value="500000">500.000</option>
              <option value="1000000">1.000.000</option>
            </select>
          </div>
          <div class="form-group">
            <label class="float-left">Số seri</label>
            <input style="color:white" type="text" class="form-control" name="serial" />
          </div>
          <div class="form-group">
            <label class="float-left">Mã thẻ</label>
            <input style="color:white" type="text" class="form-control" name="pin" />
          </div>
          <div class="form-group">
            <?php echo (isset($err)) ? '<script type="text/javascript">toastr.error("'.$err.'", "Error");</script>' : ''; ?>
            <?php echo (isset($success)) ? '<script type="text/javascript">toastr.success("'.$success.'", "Success");</script>' : ''; ?>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-warning btn-block" name="submit">NẠP NGAY</button>
          </div>
        </form>
                     <div class="mt-5">
                        <a class="btn btn-outline-primary" href="<?php echo $web['url']?>/game-page.html"><i class="mdi mdi-home"></i> GO TO SHOP</a>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
         </div>
         <!-- /.content-wrapper -->
      <?php require_once("views/footer.php"); ?>
   </body>
</html>
<?php } ?>