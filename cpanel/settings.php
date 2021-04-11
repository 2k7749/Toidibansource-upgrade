<?php 
require_once("../libraries/class.database.php");
require_once("models/load_information.php");
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
if (isset($_POST["setupdate"])) 
{
    $webname = htmlentities($_POST["webname"]);
    $url = htmlentities($_POST["url"]);
    $logo = htmlentities($_POST["logo"]);
    $icon = htmlentities($_POST["icon"]);
    $meta = $_POST["meta"];
    $keyword = $_POST["tags"];
    $alertlogin = htmlentities($_POST["alertlogin"]);
    $alertreg = htmlentities($_POST["alertreg"]);
    $mess = htmlentities($_POST["mess"]);
    $linkfb = htmlentities($_POST["linkfb"]);
    $linkin = htmlentities($_POST["linkin"]);
    $linktele = htmlentities($_POST["linktele"]);
    $apifb = htmlentities($_POST["apifb"]);
    $sql = "UPDATE website SET webname = '$webname', url = '$url', logo= '$logo', icon='$icon', meta='$meta', keyword='$keyword', alertlogin= '$alertlogin', alertreg='$alertreg',mess='$mess',linkfb= '$linkfb',linkin= '$linkin',linktele = '$linktele', apifb= '$apifb'";
    $query_sql = $csdl->query($sql);
    if($query_sql){
       echo '<script>$(function () {toastr.success("Update Settings Successfully", "Success")});</script>';
    }else{
      echo '<script>$(function () {toastr.error("An error occurred", "Error")});</script>';
    }
}
?>
<script type="text/javascript">
jQuery(document).ready(function($) {
  var tags = $('#tags').inputTags({
    tags: [],
    autocomplete: {
      values: []
    },
    init: function(elem) {
      $('span', '#events').text('init');
    },
    create: function() {
      $('span', '#events').text('create');
    },
    update: function() {
      $('span', '#events').text('update');
    },
    destroy: function() {
      $('span', '#events').text('destroy');
    },
    selected: function() {
      $('span', '#events').text('selected');
    },
    unselected: function() {
      $('span', '#events').text('unselected');
    },
    change: function(elem) {
    },
    autocompleteTagSelect: function(elem) {
      console.info('autocompleteTagSelect');
    }
  });

  $('#tags').inputTags('tags', function(tags) {
  });

  var autocomplete = $('#tags').inputTags('options', 'autocomplete');
  $('span', '#autocomplete').text(autocomplete.values.join(', '));
});
</script>
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
    <!-- WEBOFF -->
    <script type="text/javascript">
    $(document).ready(function(){
        $("input:checkbox.weboff").change(function() { 
            if($(this).is(":checked")) { 
                jQuery.ajax({
	url: "c_enable.html",
	data: { weboff : 1 },
	type: "POST",
	success: function(){
      toastr.success("Turn On", "Success", {onHidden: function(){window.location.reload();}});   
         },
         error: function(output){
            toastr.Error(msg, "Error");
         }
	});
            } else {
                $.ajax({
                    url: "c_enable.html",
	                  data: { weboff : 0 },
                    type: "POST",
                    success: function(){
      toastr.warning("Turn Off", "Warning", {onHidden: function(){window.location.reload();}});   
         },
         error: function(output){
            toastr.Error(msg, "Error");
         }
                });
            }
        }); 
    });
</script>
<!-- SIGNIN-->
<script type="text/javascript">
    $(document).ready(function(){
        $("input:checkbox.signin").change(function() { 
            if($(this).is(":checked")) { 
                jQuery.ajax({
	url: "c_enable.html",
	data: { signin : 1 },
	type: "POST",
	success: function(){
      toastr.success("BLOCK Signin On", "Success", {onHidden: function(){window.location.reload();}});   
         },
         error: function(output){
            toastr.Error(msg, "Error");
         }
	});
            } else {
                $.ajax({
                    url: "c_enable.html",
	                  data: { signin : 0 },
                    type: "POST",
                    success: function(){
      toastr.warning("BLOCK Signin Off", "Warning", {onHidden: function(){window.location.reload();}});   
         },
         error: function(output){
            toastr.Error(msg, "Error");
         }
                });
            }
        }); 
    });
</script>
<!-- SIGNUP-->
<script type="text/javascript">
    $(document).ready(function(){
        $("input:checkbox.signup").change(function() { 
            if($(this).is(":checked")) { 
                jQuery.ajax({
	url: "c_enable.html",
	data: { signup : 1 },
	type: "POST",
	success: function(){
      toastr.success("BLOCK Signup On", "Success", {onHidden: function(){window.location.reload();}});   
         },
         error: function(output){
            toastr.Error(msg, "Error");
         }
	});
            } else {
                $.ajax({
                    url: "c_enable.html",
	                  data: { signup : 0 },
                    type: "POST",
                    success: function(){
      toastr.warning("BLOCK Signup Off", "Warning", {onHidden: function(){window.location.reload();}});   
         },
         error: function(output){
            toastr.Error(msg, "Error");
         }
                });
            }
        }); 
    });
</script>
   <style>
.switch input {
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  filter: alpha(opacity=0);
  -moz-opacity: 0;
  opacity: 0;
  z-index: 100;
  position: absolute;
  width: 100%;
  height: 100%;
  cursor: pointer;
}

.switch {
  width: 180px;
  height: 55px;
  position: relative;
}

.switch label {
  display: block;
  width: 40%;
  height: 50%;
  position: relative;
  background: #1F2736; /*#121823*/
  background: linear-gradient(87deg,#3a6ece 0,#ff67b4 100%);
  border-radius: 30px 30px 30px 30px;
  box-shadow: inset 0 3px 8px 1px rgba(0,0,0,0.5),  inset 0 1px 0 rgba(0,0,0,0.5),  0 1px 0 rgba(255,255,255,0.2);
  -webkit-transition: all .5s ease;
  transition: all .5s ease;
}

.switch input ~ label i {
  display: block;
  height: 23px;
  width: 23px;
  position: absolute;
  left: 2.3px;
  top: 2.3px;
  z-index: 2;
  border-radius: inherit;
  background: #283446; /* Fallback */
  background: linear-gradient(#ffffff, #ffffff);
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.2),  0 0 8px rgba(0,0,0,0.3),  0 12px 12px rgba(0,0,0,0.4);
  -webkit-transition: all .5s ease;
  transition: all .5s ease;
}

.switch label + span {
  content: "";
  display: inline-block;
  position: absolute;
  right: 80px;
  top: 4px;
  width: 18px;
  height: 18px;
  border-radius: 10px;
  background: #ff0000;
  background: gradient-gradient(#36455b, #283446);
  box-shadow: inset 0 1px 0 rgba(0,0,0,0.1), 0 1px 0 rgba(255,255,255,0.1), 0 0 10px rgb(247, 67, 67), inset 0 0 8px rgba(245, 22, 22, 0.8), inset 0 -2px 5px rgba(185,231,253,0.3), inset 0 -3px 8px rgba(185,231,253,0.5);
  -webkit-transition: all .5s ease;
  transition: all .5s ease;
  z-index: 2;
}

/* Toggle */

.switch input:checked ~ label + span {
  content: "";
  display: inline-block;
  position: absolute;
  width: 18px;
  height: 18px;
  border-radius: 10px;
  -webkit-transition: all .5s ease;
  transition: all .5s ease;
  z-index: 2;
  background: #28ff38de;
  background: gradient-gradient(#ffffff, #77a1b9);
  box-shadow: inset 0 1px 0 rgba(0,0,0,0.1), 0 1px 0 rgba(255,255,255,0.1), 0 0 10px rgb(43, 255, 49), inset 0 0 8px rgba(58, 255, 92, 0.8), inset 0 -2px 5px rgba(185,231,253,0.3), inset 0 -3px 8px rgba(185,231,253,0.5);
}

.switch input:checked ~ label i {
  left: auto;
  left: 63%;
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.2), 0 0 8px rgba(0,0,0,0.3), 0 8px 8px rgba(0,0,0,0.3), inset -1px 0 1px #ffffff;
  -webkit-transition: all .5s ease;
  transition: all .5s ease;
}

</style>
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
                    <img style="width:180px;height:180px" src="<?php echo $web['logo']; ?>" class="rounded-circle">
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
                      <span class="heading">WebOFF</span>
                      <span class="description">ON & OFF</span>
                    </div>
                    <div>
                    <div class="switch">
                      <input type="checkbox" name="weboff" id="weboff" class="weboff" <?php if($web['weboff'] == 1){echo 'checked';}else{} ?>>
                      <label for="weboff"><i></i></label>
                      <span></span> 
                      </div>
                    </div>
                  </div>
                  <div class="card-profile-stats d-flex justify-content-center">
                  <div>
                      <span class="heading">SIGNIN</span>
                      <span class="description">BLOCK</span>
                    </div>
                    <div>
                    <div class="switch">
                      <input type="checkbox" name="signin" id="signin" class="signin" <?php if($web['accesslogin'] == 1){echo 'checked';}else{} ?>>
                      <label for="weboff"><i></i></label>
                      <span></span> 
                      </div>
                    </div>
                  </div>
                <div class="card-profile-stats d-flex justify-content-center">
                  <div>
                      <span class="heading">SIGNUP</span>
                      <span class="description">BLOCK</span>
                    </div>
                    <div>
                    <div class="switch">
                      <input type="checkbox" name="signup" id="signup" class="signup" <?php if($web['accessreg'] == 1){echo 'checked';}else{} ?>>
                      <label for="weboff"><i></i></label>
                      <span></span> 
                      </div>
                    </div>
                  </div>
                  </div>
              </div>
			  <form method="POST" name="add_post" id="add_post">
              <h6 class="heading-small text-muted mb-4">Social Links </h6>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="linkfb">Facebook</label>
                        <input id="linkfb" name="linkfb" class="form-control form-control-alternative" value="<?php echo $web['linkfb'];?>" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="linkin">Instagram</label>
                        <input id="linkin" name="linkin" class="form-control form-control-alternative" value="<?php echo $web['linkin'];?>" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="linktele">TeleGram</label>
                        <input id="linktele" name="linktele" class="form-control form-control-alternative" value="<?php echo $web['linktele'];?>" type="text">
                      </div>
                    </div>
                  </div>
                  <h6 class="heading-small text-muted mb-4">API FaceBook </h6>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="apifb">API FB</label>
                        <input id="apifb" name="apifb" class="form-control form-control-alternative" value="<?php echo $web['apifb'];?>" type="text">
                      </div>
                    </div>
                  </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Config Website</h3>
                </div>
                <div class="col-4 text-right">
                 
                </div>
              </div>
            </div>
            <div class="card-body">
            
            
                <h6 class="heading-small text-muted mb-4">Adjust </h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="webname">Web Name</label>
                        <input id="webname" name="webname" class="form-control form-control-alternative" value="<?php echo $web['webname'];?>" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="url">Domain</label>
                        <input  id="url" name="url" class="form-control form-control-alternative"  value="<?php echo $web['url'];?>" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="logo">Logo</label>
                        <input  id="logo" name="logo" class="form-control form-control-alternative"  value="<?php echo $web['logo'];?>" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="url">Icon</label>
                        <input  id="icon" name="icon" class="form-control form-control-alternative"  value="<?php echo $web['icon'];?>" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="meta">Description</label>
                        <input  id="meta" name="meta" class="form-control form-control-alternative"  value="<?php echo $web['meta'];?>" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="keyword">Keyword SEO</label>
                        <input  type="text" id="tags" name="tags" tags class="form-control form-control-alternative"  value="<?php echo $web['keyword'];?>" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="alertlogin">Notice SignIn page</label>
                        <input  id="alertlogin" name="alertlogin" class="form-control form-control-alternative"  value="<?php echo $web['alertlogin'];?>" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="alertreg">Notice SignUp page</label>
                        <input  id="alertreg" name="alertreg" class="form-control form-control-alternative"  value="<?php echo $web['alertreg'];?>" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="mess">Notice All page</label>
                        <input  id="mess" name="mess" class="form-control form-control-alternative"  value="<?php echo $web['mess'];?>" type="text">
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                </div>
                <div class="col-4 text-right">
                  <input type="submit" name="setupdate" value="UPDATE SETTINGS" class="btn btn-sm btn-warning">
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