<?php 
session_start();
$_SESSION['csrf_ajax_key'] = sha1(uniqid());
$_SESSION['csrf_ajax_val'] = sha1(uniqid());
require_once('libraries/class.database.php');
require "crypt_hipz.php";
$csdl = new mySQL();
$csdl->connect();
$sql = "SELECT * FROM users WHERE username = '".$info['username']."'";
$result = $csdl->query($sql);
$row = $csdl->fetch($result);
?>
 <div id="content-wrapper">
            <div class="container-fluid upload-details">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="main-title">
                        <h6>Settings</h6>
                     </div>
                  </div>
               </div>

<script language="javascript">
 $(document).ready(function() {
               $("#usettings").click(function(){
                  var iemail = document.getElementById("iemail").value.match("^[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+(?:[a-zA-Z]{2}|aero|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel)$");
	               var full_name=document.getElementById("full_name").value;
                  var avatar_url=document.getElementById("avatar_url").value;
                  var current_pass=document.getElementById("current_pass").value.match("^\\S[0-9a-zA-Z.-]*$");
                  var new_pass=document.getElementById("new_pass").value.match("^\\S[0-9a-zA-Z.-]*$");
                  var confirm_pass=document.getElementById("confirm_pass").value.match("^\\S[0-9a-zA-Z.-]*$");
                  var str="full_name=" + full_name + "&iemail=" + iemail + "&avatar_url=" + avatar_url + "&current_pass=" + current_pass + "&new_pass=" + new_pass + "&confirm_pass=" + confirm_pass + "&<?php echo $_SESSION['csrf_ajax_key'];?>=" + "<?php echo $_SESSION['csrf_ajax_val'];?>";
                   $.ajax({
                       url: "../c_settings.html",
                       type: "POST",
                       data: str,
                       dataType: "JSON",
                       success: function (vData) {
						      if(vData.code == 0){
                          toastr.success(vData.msg, "Success", {onHidden: function(){window.location.reload();}});
                        }
                        else if(vData.code == 1){
                          toastr.error(vData.msg, "Error");
                        }else if(vData.code == 5){
                          toastr.warning(vData.msg, "Warning");
                        }else if(vData.code == 6){
                          toastr.warning(vData.msg, "Warning");
                        }else if(vData.code == 7){
                          toastr.warning(vData.msg, "Warning");
                        }else if(vData.code == 8){
                          toastr.warning(vData.msg, "Warning");
                        }else if(vData.code == 9){
                          toastr.warning(vData.msg, "Warning");
                        }
                       }
                   });
               });
           });
</script>

            <form name="fusettings" id="fusettings" method="POST">
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Full Name <span class="required">*</span></label>
                           <input class="form-control border-form-control" name="full_name" id = "full_name" placeholder="<?php echo $row['name'];?>" type="text">
                        </div>
                     </div>
					   <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Email Address <span class="required">*</span></label>
                           <input class="form-control border-form-control" name="iemail" id="iemail" readonly="readonly" value ="<?php echo $row['email'];?>" placeholder="<?php echo $row['email'];?>"  type="email">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Avatar <span class="required">*</span></label>
                           <input class="form-control border-form-control" name="avatar_url" id="avatar_url" placeholder="<?php echo $row['img'];?>" type="text">
                        </div>
                     </div>
					 <div class="col-sm-6">
                        <div class="form-group">
							<label class="control-label">Previews <span class="required"></span></label>
                           <img class="img-settings" src="<?php echo$row['img']; ?>"></img>
                        </div>
                     </div>
                  </div>
				   <div class="row">
                  <div class="col-lg-12">
                     <div class="main-title">
                        <h6>Change Password</h6>
                     </div>
                  </div>
               </div>
				   <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Current Password<span class="required">* (Enter the password before to change)</span></label>
                           <input class="form-control border-form-control" name="current_pass" id="current_pass" placeholder="•••••••••••" type="password">
                        </div>
                     </div>
				  </div>
				   <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">New Password<span class="required">*</span></label>
                           <input class="form-control border-form-control" name="new_pass" id ="new_pass" placeholder="•••••••••••••••••" type="password">
                        </div>
                     </div>
					 <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Confirm New Pass<span class="required">*</span></label>
                           <input class="form-control border-form-control" name="confirm_pass" id="confirm_pass" placeholder="•••••••••••••••••" type="password">
                        </div>
                     </div>
				  </div>
				   <div class="row">
                    <div class="col-sm-12 text-right">
                                <input type="button" value="Save Changes" class="btn btn-success border-none" name="usettings" id="usettings"/>
                     </div>
				  </div>
               </form>
            </div>


