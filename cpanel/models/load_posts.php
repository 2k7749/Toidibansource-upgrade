<?php require_once("../libraries/class.database.php"); ?>
<?php
$csdl = new mySQL();
$csdl->connect();
$sql = "select count(id) as total from `posts`";
$result = $csdl->query($sql);
$row = $csdl->fetch($result);
$total_records = $row['total'];
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;
$total_page = ceil($total_records / $limit);

if ($current_page > $total_page) {
  $current_page = $total_page;
} else if ($current_page < 1) {
  $current_page = 1;
}
if ($_POST["find"] == null) {
  $start = ($current_page - 1) * $limit;
  $query = "SELECT * FROM `posts` ORDER BY id DESC LIMIT $start, $limit";
} else {
  $total_page = 0;
  $query = "SELECT * FROM `posts` WHERE title LIKE '%" . $_POST["find"] . "%'";
}
$result2 = $csdl->query($query);
?>
<script language="javascript">
  function delete_Post() {
    jQuery.ajax({
      url: "c_delete.html",
      data: 'gameid=' + $("#gameid").val(),
      type: "POST",
      success: function() {
        toastr.success("Delete Post Success", "Success", {
          onHidden: function() {
            window.location.reload();
          }
        });
      },
      error: function(output) {
        toastr.Error(msg, "Error");
      }
    });
  }
</script>
<div class="container-fluid mt--7">
  <!-- Table -->
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <h3 class="mb-0">Posts(Game) Management
            <form method="post" action="" class="form-inline my-2 my-lg-0 float-right">
              <input class="form-control form-control-sm mr-sm-1" name="find" type="search" placeholder="Search Post" aria-label="Search"><button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form>
          </h3>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Status</th>
                <th scope="col">Tag</th>
                <th scope="col">Poster</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($loadposts = $csdl->fetch($result2)) {
                if ($loadposts['tag'] == 0) {
                  $active_status = '<span class="badge badge-dot mr-4">
                    <i class="bg-warning"></i> In-Active
                  </span>';
                } else {
                  $active_status = '<span class="badge badge-dot">
                    <i class="bg-success"></i> Active
                  </span>';
                }
                for ($j = 0; $j < $row["total"]; $j++) {
                  if ($loadposts["tag"] != $j) {
                    $quecate = "select c.cateid,c.catename FROM `categories` c,`posts` v WHERE " . $loadposts["tag"] . " = c.cateid group by c.cateid,c.catename";
                    $result3 = $csdl->query($quecate);
                    $fcate = $csdl->fetch($result3);
                    $leftcate = $fcate["catename"];
                  }
                }
                echo '<tr>
                  <td>' . $loadposts["id"] . '</td>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="' . $loadposts["img"] . '">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">' . $loadposts["title"] . '</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      ' . $active_status . '
                    </td>
                    <td>
                    ' . $leftcate . '
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="' . $author . '">
                          <img alt="Image placeholder" src="' . $web['logo'] . '" class="rounded-circle">
                        </a>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <input type="hidden" id="gameid" name="gameid" value="' . $loadposts["id"] . '">
                          <a class="dropdown-item" href="edit-post-' . $loadposts["id"] . '.html"><font color="#825ee4">Edit This</font></a>
                          <a class="dropdown-item" href="#" onclick="delete_Post()"><font color="red">Delete</font></a>
                          <a class="dropdown-item" href="' . $web['url'] . '../../source/codenum-' . $loadposts["id"] . '.html">View Post</a>
                        </div>
                      </div>
                    </td>
                  </tr>';
              }
              ?>
            </tbody>
          </table>
        </div>

        <?php
        echo ' <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">';
        $adjacents = 2;
        $second_last = $total_page - 1;
        if ($current_page > 1 && $total_page > 1) {
          echo '<li class="page-item">
                      <a class="page-link" href="posts-' . ($current_page - 1) . '.html" tabindex="-1">
                        <i class="fas fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                      </li>';
        } elseif ($total_page == 0) {
          echo '';
        } else {
        }
        if ($total_page <= 10) {
          for ($i = 1; $i <= $total_page; $i++) {
            if ($i == $current_page) {
              echo '<li class="page-item active"><a class="page-link">' . $i . '</a></li>';
            } else {
              echo '<li class="page-item">
                        <a class="page-link" href="posts-' . $i . '.html">' . $i . '<span class="sr-only">(current)</span></a>
                        </li>';
            }
          }
        } elseif ($total_page > 10) {
          if ($current_page <= 4) {
            for ($i = 1; $i < 8; $i++) {
              if ($i == $current_page) {
                echo '<li class="page-item active"><a class="page-link">' . $i . '</a></li>';
              } else {
                echo '<li class="page-item">
                      <a class="page-link" href="posts-' . $i . '.html">' . $i . '<span class="sr-only">(current)</span></a>
                      </li>';
              }
            }
            echo '<li class="page-item">
                <a class="page-link">...<span class="sr-only">(current)</span></a>
                </li>';
            echo '<li class="page-item">
                <a class="page-link" href="posts-' . $second_last . '.html">' . $second_last . '<span class="sr-only">(current)</span></a>
                </li>';
            echo '<li class="page-item">
                <a class="page-link" href="posts-' . $total_page . '.html">' . $total_page . '<span class="sr-only">(current)</span></a>
                </li>';
          } elseif ($current_page > 4 && $current_page < $total_page - 4) {
            echo '<li class="page-item"><a class="page-link" href="posts-1.html">1</a></li>';
            echo '<li class="page-item"><a class="page-link" href="posts-2.html">2</a></li>';
            echo '<li class="page-item">
                  <a class="page-link">...<span class="sr-only">(current)</span></a>
                  </li>';
            for ($i = $current_page - $adjacents; $i <= $current_page + $adjacents; $i++) {
              if ($i == $current_page) {
                echo '<li class="page-item active"><a class="page-link">' . $i . '</a></li>';
              } else {
                echo '<li class="page-item"><a class="page-link" href="posts-' . $i . '.html">' . $i . '</a></li>';
              }
            }
            echo '<li class="page-item">
                    <a class="page-link">...<span class="sr-only">(current)</span></a>
                    </li>';
            echo '<li class="page-item">
                <a class="page-link" href="posts-' . $second_last . '.html">' . $second_last . '<span class="sr-only">(current)</span></a>
                </li>';
            echo '<li class="page-item">
                <a class="page-link" href="posts-' . $total_page . '.html">' . $total_page . '<span class="sr-only">(current)</span></a>
                </li>';
          } else {
            echo '<li class="page-item"><a class="page-link" href="posts-1.html">1</a></li>';
            echo '<li class="page-item"><a class="page-link" href="posts-2.html">2</a></li>';
            echo '<li class="page-item">
                    <a class="page-link">...<span class="sr-only">(current)</span></a>
                    </li>';
            for ($i = $total_page - 6; $i <= $total_page; $i++) {
              if ($i == $current_page) {
                echo '<li class="page-item active"><a class="page-link">' . $i . '</a></li>';
              } else {
                echo '<li class="page-item"><a class="page-link" href="posts-' . $i . '.html">' . $i . '</a></li>';
              }
            }
          }
        }
        if ($current_page < $total_page && $total_page > 1) {
          echo ' <li class="page-item">
                  <a class="page-link" href="posts-' . ($current_page + 1) . '.html">
                    <i class="fas fa-angle-right"></i>
                    <span class="sr-only">Next</span>
                  </a>
                </li>';
        }
        echo '  </ul>
              </nav>
            </div>';
        ?>
      </div>
    </div>
  </div>