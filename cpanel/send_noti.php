<?php 
require_once("../libraries/class.database.php");
require_once("models/load_information.php");
$csdl = new mySQL();
$csdl->connect();
?>
<?php require_once("views/header.php"); 
if($info["level"] != 1){
  header("location: ./home.html");
  }
?>
<?php
if (isset($_POST["sendnoti"])) 
{
    $fromto = htmlentities(strip_tags($_POST["fromto"]));
    $typenoti = htmlentities(strip_tags($_POST["typenoti"]));
    $content = $_POST["noti_content"];
    $sql = "INSERT INTO noti_log(username,content,time,type,noti_status) VALUES ('$fromto','$content',now(),'$typenoti',0)";
    $query_sql = $csdl->query($sql);
    if($query_sql){
       echo '<script>$(function () {toastr.success("Sent Noti", "Success")});</script>';
    }else{
      echo '<script>$(function () {toastr.error("An error occurred", "Error")});</script>';
    }
}
?>
<script src="<?php echo $web['url'];?>/cpanel/ckeditor/ckeditor.js"></script>
<body class="">
<?php require_once("views/navbar.php"); ?>
<?php require_once("views/navbar_non_stats.php"); ?>
 <!-- Page content -->
 <div class="container-fluid mt--7">
     
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">SEND NOTIFICATION</h3>
                </div>
                <div class="col-4 text-right">
                 
                </div>
              </div>
            </div>
            <div class="card-body">
            
            <form method="POST">
                <!-- Download -->
                <h6 class="heading-small text-muted mb-4">Options</h6>
                <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="title">Sender</label>
                        <select class="form-control" name="typenoti" id="typenoti">
                        <option value="Systems">Systems</option>
                        <option value="Store">Store</option>
                        <option value="Admin">Admin</option>
                        </select>
                      </div>
                    </div>
                    <?php 
                    $option_user = "Select username FROM users";
                    $query_option_users = $csdl->query($option_user);
                    ?>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label" for="fromto">From To</label>
                      <select class="form-control" id="fromto" name="fromto">
                        <?php while($fetch_option_users = $csdl->fetch($query_option_users)){ echo '<option value="'.$fetch_option_users['username'].'">'.$fetch_option_users['username'].'</option>'; }?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Content -->
                <h6 class="heading-small text-muted mb-4">Noti Content</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control form-control-alternative" name="noti_content" id="noti_content" rows="5" cols="50"><?php echo $content; ?></textarea>
                  </div>
                </div>
            </div>

            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                </div>
                <div class="col-4 text-right">
                  <input type="submit" name="sendnoti" value="SEND NOTI" class="btn btn-sm btn-warning">
                </div>
              </div>

              </form>
              <script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'noti_content' );
</script>
</div>
          </div>
        </div>
      </div>
<?php require_once("views/footer.php"); ?>
</body>
</html>