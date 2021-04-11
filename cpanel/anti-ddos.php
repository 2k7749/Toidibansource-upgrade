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
		    if (isset($_POST["save"])) {
		    	$timeflood = $_POST["timeflood"];

		    	$sql = "UPDATE website SET timeflood = '$timeflood' ";
		    	$query_sql = $csdl->query($sql);
                if($query_sql){
                    echo '<script>$(function () {toastr.success("Successful Update", "Success")});</script>';
                 }else{
                   echo '<script>$(function () {toastr.error("An error occurred", "Error")});</script>';
                 }
		    }
		    $flood = "flood";
		    $timeflood = "timeflood";

		    	$sql = "SELECT * FROM website";
		    	$query_sql = $csdl->query($sql);
		    	while ( $data = $csdl->fetch($query_sql)) 
		    	{
		    		$flood = $data["flood"];
		    		$timeflood = $data["timeflood"];
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
     <script type="text/javascript">
    $(document).ready(function(){
        $("input:checkbox.antiddos").change(function() { 
            if($(this).is(":checked")) { 
                jQuery.ajax({
	url: "c_enable.html",
	data: { antiddos : 1 },
	type: "POST",
	success: function(){
      toastr.success("AntiDDos On", "Success", {onHidden: function(){window.location.reload();}});   
         },
         error: function(output){
            toastr.Error(msg, "Error");
         }
	});
            } else {
                $.ajax({
                    url: "c_enable.html",
	                  data: { antiddos : 0 },
                    type: "POST",
                    success: function(){
      toastr.warning("AntiDDos Off", "Warning", {onHidden: function(){window.location.reload();}});   
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
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Anti DDos - Setting</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="pl-lg-4">
                  <div class="row">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                  <div>
                      <span class="heading">Status</span>
                      <span class="description">ON & OFF</span>
                    </div>
                    <div>
                    <div class="switch">
                      <input type="checkbox" name="antiddos" id="antiddos" class="antiddos" <?php if($flood == 1){echo 'checked';}else{} ?>>
                      <label for="weboff"><i></i></label>
                      <span></span> 
                      </div>
                    </div>
                  </div>
                  </div>
                  <form method="POST">
                  <div class="row">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                  <div>
                      <span class="heading">Request</span>
                      <span class="description">Max Secs</span>
                    </div>
                    <div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-alternative" name="timeflood" id="timeflood" value="<?php echo $timeflood; ?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row align-items-center">
                <div class="col-8">
                </div>
                <div class="col-4 text-right">
                  <input type="submit" name="save" value="UPDATE" class="btn btn-sm btn-warning">
                </div>
              </div>
              </form>
          </div>
        </div>
      </div>
<?php require_once("views/footer.php"); ?>
</body>
</html>