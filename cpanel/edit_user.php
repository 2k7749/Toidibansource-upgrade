<?php 
require_once("../libraries/class.database.php");
require_once("models/load_information.php");
require "../models/crypt_hipz.php";
$csdl = new mySQL();
$csdl->connect();
?>
<?php 
if($info["level"] == 2){
  header("location: ./home.html");
}else if($info["level"] == 3){
  header("location: ./home.html");
}else if($info["level"] == 4){
  header("location: ./home.html");
}
?>
<?php require_once("views/header.php"); ?>
<?php
if (isset($_POST["uedit"])) 
{
    $iduser = $_POST["iduser"];
    $username = htmlentities(strip_tags($_POST["username"]));
    $password = Encrypt_Pass($_POST["password"]);
    $name = htmlentities(strip_tags($_POST["name"]));
    $email = htmlentities(strip_tags($_POST["email"]));
    $level = $_POST["level"];
    $money = $_POST["money"];
    $point = $_POST["point"];
    $img = htmlentities(strip_tags($_POST["img"]));
    $package = htmlentities(strip_tags($_POST["package"]));
    $sql = "UPDATE users SET username = '$username',password = '$password',name = '$name', email = '$email', level = $level, money = $money, point = $point, img = '$img', package = '$package' where id = $iduser";
     $query_sql = $csdl->query($sql);
     if($query_sql){
      echo '<script>$(function () {toastr.success("Successful Update", "Success")});</script>';
   }else{
     echo '<script>$(function () {toastr.error("An error occurred", "Error")});</script>';
   }
}
$username = "";
$password = "";
$name = "";
$email = "";
$level = "";
$money = "";
$point = "";
$img = "";
$package = "";
         

        if (isset($_GET["uid"])) 
        {
            $id = $_GET["uid"];
            $sql = "SELECT * FROM users WHERE id = $id";
            $query = $csdl->query($sql);
            while ( $data = $csdl->fetch_array($query) ) 
            {
                $username = $data["username"];
                $password = $data["password"];
                $name = $data["name"];
                $email = $data["email"];
                $level = $data["level"];
                $money = $data["money"];
                $point = $data["point"];
                $img = $data["img"];
                $package = $data["package"];
            }
        }	
?>
<script type="text/javascript">
       $(document).ready(function() {
  $('input').keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
    </script>
    <script language="javascript">
function delete_Users()
{
	jQuery.ajax({
	url: "c_del_user.html",
	data: 'deluser='+$("#deluser").val(),
	type: "POST",
  success: function(){
      toastr.success("Delete User Success", "Success");   
         },
         error: function(output){
            toastr.Error(msg, "Error");
         }
	});
}
</script>
<body class="">
<?php require_once("views/navbar.php"); ?>
<?php require_once("views/navbar_non_stats.php"); ?>
 <!-- Page content -->
 <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a>
                    <img style="width:180px;height:180px" src="<?php echo $img; ?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <br>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading"><?php echo $viewsnum;?></span>
                      <span class="description">View</span>
                    </div>
                    <div>
                      <span class="heading"><?php echo $reactnum?></span>
                      <span class="description">React</span>
                    </div>
                    <div>
                      <span class="heading"><?php echo $soldnum;?></span>
                      <span class="description">Sold</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                <?php echo $title;?>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $tag_string;?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Update Date: <?php echo $updatedate;?>
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>Create Date: <?php echo $createdate;?>
                </div>
                <hr class="my-4" />
                <p><?php echo $content;?></p>
                <a href="#">Show more</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit User - <?php echo $username;?></h3>
                </div>
              </div>
            </div>
            <div class="card-body">
            
            <form method="POST" name="fr_update">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="username">Username</label>
                        <input type="hidden" name="iduser" value="<?php echo $id; ?>">
                        <input type="text" id="username" name="username" class="form-control form-control-alternative" value="<?php echo $username;?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="password">Password</label>
                        <input type="text" id="password" name="password" class="form-control form-control-alternative" value="<?php echo Decrypt_Pass($password); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="email">Email</label>
                        <input type="text" id="email" name="email" tags class="form-control form-control-alternative" value="<?php echo $email; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="name">Name</label>
                        <input type="text" id="name" name="name" tags class="form-control form-control-alternative" value="<?php echo $name; ?>">
                      </div>
                    </div>
                    
                    <div class="col-lg-6">
                    <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="money">Money</label>
                        <input type="text" id="money" name="money" class="form-control form-control-alternative" value="<?php echo $money;?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="point">Point</label>
                        <input type="text" id="point" name="point" class="form-control form-control-alternative" value="<?php echo $point;?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="level">Level</label>
                        <select class="form-control" id="level" name="level">
                        <option value="1">Admin</option>
                        <option value="2">Staff</option>
                        <option value="3">Support</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="package">Package</label>
                        <select class="form-control" id="package" name="package">
                        <option value="basic">Basic</option>
                        <option value="standard">Standard</option>
                        <option value="premium">Premium</option>
                        </select>
                      </div>
                    </div>
                   
                  </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="img">Image</label>
                        <input type="text" id="img" name="img" class="form-control form-control-alternative" value="<?php echo $img; ?>">
                      </div>
                    </div>
                  </div>
                 
                </div>
                <hr class="my-4" />
            </div>

            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">0

                </div>
                <div class="col-4 text-right">
                   <input type="hidden" id="deluser" name="deluser" value="<?php echo $_GET["uid"]; ?>">
                  <input type="submit" name="uedit" value="UPDATE USER" class="btn btn-sm btn-warning">
                  <a class="btn btn-sm btn-warning" href="#" onclick="delete_Users()">Delete</a>
                </div>
              </div>

              </form>
</div>
          </div>
        </div>
      </div>
<?php require_once("views/footer.php"); ?>
</body>
</html>