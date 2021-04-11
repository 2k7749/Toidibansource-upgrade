<?php 
require_once("../libraries/class.database.php");
require_once("models/load_information.php");
$csdl = new mySQL();
$csdl->connect();
if($info["level"] == 3){
  header("location: ./home.html");
}else if($info["level"] == 4){
  header("location: ./home.html");
}
?>
<?php require_once("views/header.php"); 

?>
<?php
$option_cate = "Select * FROM categories";
$query_option_cate = $csdl->query($option_cate);
if (isset($_POST["apost"])) 
{
    $title = htmlentities(strip_tags($_POST["title"]));
    $videoreviews = htmlentities($_POST["videoreviews"]);
    $img = htmlentities($_POST["img"]);
    $keyword = htmlentities(strip_tags($_POST["tags"]));
    $prices = $_POST["price"];
    $categories = $_POST["categories"];
    $linkdown = htmlentities($_POST["linkdown"]);
    $linkdemo = htmlentities($_POST["linkdemo"]);
    $author = htmlentities($_POST["author"]);
    $content = $_POST["post_content"];
    $tutorials = $_POST["post_tutorials"];
    $sql = "INSERT INTO posts(title,videoreviews,createdate,updatedate,prices,img,author,content,tutorials,linkdown,linkdemo,tag,keyword) VALUES ('$title','$videoreviews',now(),now(),$prices,'$img','$author','$content','$tutorials','$linkdown','$linkdemo',$categories,'$keyword')";
    $query_sql = $csdl->query($sql);
    if($query_sql){
       echo '<script>$(function () {toastr.success("Done Add", "Success")});</script>';
    }else{
      echo '<script>$(function () {toastr.error("An error occurred", "Error")});</script>';
    }
}
?>
<script src="<?php echo $web['url'];?>/cpanel/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
  var tags = $('#tags').inputTags({
    tags: [],
    autocomplete: {
      values: [<?php  
                $string = "";
                while ($fetch_option_cate_for_tag = $csdl->fetch($query_option_cate)) {
                  $string .= "'".$fetch_option_cate_for_tag['catename']."'" . ', ';
                }
                echo substr($string, 0, strlen($string) - 2);
                  ?>]
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
                  <?php if($img == ''){ ?>
                    <img style="width:180px;height:180px" src="<?php echo $web['logo']; ?>" class="rounded-circle">
                    <?php }else{ ?>
                      <img style="width:180px;height:180px" src="<?php echo $img; ?>" class="rounded-circle">
                    <?php }?>
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
                  <h3 class="mb-0">ADD POST</h3>
                </div>
                <div class="col-4 text-right">
                 
                </div>
              </div>
            </div>
            <div class="card-body">
            
            <form method="POST" name="add_post" id="add_post">
                <h6 class="heading-small text-muted mb-4">Game information </h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="title">Name of Game</label>
                        <input type="hidden" name="idpost" value="<?php echo $id; ?>">
                        <input type="text" id="title" name="title" class="form-control form-control-alternative" value="<?php echo $title; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="author">Author</label>
                        <input type="text" id="author" name="author" class="form-control form-control-alternative" value="<?php echo $author; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="keyword">Keyword</label>
                        <input type="text" id="tags" name="tags" tags class="form-control form-control-alternative" value="<?php echo $keyword; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="price">Price</label>
                        <input type="text" id="price" name="price" class="form-control form-control-alternative" value="<?php echo $prices;?>">
                      </div>
                    </div>
                    <?php 
                    $option_cate = "Select * FROM categories";
                    $query_option_cate = $csdl->query($option_cate);
                    ?>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="categories">Categories</label>
                        <select class="form-control" id="categories" name="categories">
                        <?php while($fetch_option_cate = $csdl->fetch($query_option_cate)){ echo '<option value="'.$fetch_option_cate['id'].'">'.$fetch_option_cate['catename'].'</option>'; }?>
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
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="videoreviews">Video Review</label>
                        <input type="text" id="videoreviews" name="videoreviews" class="form-control form-control-alternative" value="<?php echo $videoreviews; ?>">
                      </div>
                    </div>
                   
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Download -->
                <h6 class="heading-small text-muted mb-4">Link Download And Demo</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="linkdemo">Link Demo</label>
                        <input id="linkdemo" name="linkdemo" class="form-control form-control-alternative" p value="<?php echo $linkdemo;?>" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="linkdown">Link Download</label>
                        <input  id="linkdown" name="linkdown" class="form-control form-control-alternative"  value="<?php echo $linkdown;?>" type="text">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Content -->
                <h6 class="heading-small text-muted mb-4">Content And Tutorials</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control form-control-alternative" name="post_content" id="post_content" rows="10" cols="150"><?php echo $content; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Tutorials</label>
                    <textarea class="form-control form-control-alternative" name="post_tutorials" id="post_tutorials" rows="10" cols="150"><?php echo $tutorials; ?></textarea>
                  </div>
                </div>
             

            </div>

            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                </div>
                <div class="col-4 text-right">
                  <input type="submit" name="apost" value="ADD POST" class="btn btn-sm btn-warning">
                </div>
              </div>

              </form>
              <script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'post_content' );
</script>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'post_tutorials' );
</script>
</div>
          </div>
        </div>
      </div>
<?php require_once("views/footer.php"); ?>
</body>
</html>