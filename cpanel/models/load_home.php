<?php require_once("../libraries/class.database.php");
$csdl = new mySQL();
$csdl->connect();
?>
<?php 

$profits_month="SELECT DATE_FORMAT(paydate, '%m-%Y') AS Month,SUM(prices) as profits_values FROM purchase_history GROUP BY DATE_FORMAT(paydate, '%m-%Y')";
$query_profits_month = $csdl->query($profits_month);

$orders_month="SELECT DATE_FORMAT(paydate, '%m-%Y') AS Month,SUM(idgame) as orders_month FROM purchase_history GROUP BY DATE_FORMAT(paydate, '%m-%Y') LIMIT 0,5";
$query_orders_month = $csdl->query($orders_month);

$profits_week="SELECT SUM(prices) as profits_week, WEEK(paydate) as week FROM purchase_history GROUP BY week";
$query_profits_week = $csdl->query($profits_week);

$traffic = "SELECT * FROM counter_values";
$query_traffic = $csdl->query($traffic);
$fetch_traffic = $csdl->fetch($query_traffic);

$onsite = "SELECT * FROM counter_ips";
$query_onsite = $csdl->query($onsite);
$fetch_onsite = $csdl->fetch($query_onsite);
?>

    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card bg-gradient-default shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                  <h2 class="text-white mb-0">Sales</h2>
                </div>
                <div class="col">
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[<?php  
                $string = "";
                while ($fetch_profits_month = $csdl->fetch_array($query_profits_month)) {
                  $string .= $fetch_profits_month['profits_values'] . ', ';
                }
                echo substr($string, 0, strlen($string) - 2);
                  ?>]}]}}' data-prefix="" data-suffix=" Scoin">
                      <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">Month</span>
                        <span class="d-md-none">M</span>
                      </a>
                    </li>
                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[<?php  
                $string_week = "";
                while ($fetch_profits_week = $csdl->fetch_array($query_profits_week)) {
                  $string_week .= $fetch_profits_week['profits_week'] . ', ';
                }
                echo substr($string_week, 0, strlen($string_week) - 2);
                  ?>]}]}}' data-prefix="" data-suffix=" Scoin">
                      <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="week_profits_active">
                        <span class="d-none d-md-block">Week</span>
                        <span class="d-md-none">W</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <canvas id="chart-sales" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                  <h2 class="mb-0">Total orders</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
            <span class="nav-item" data-toggle="chart" data-target="#chart-orders" data-update='{"data":{"datasets":[{"data":[<?php  
                $string_orders = "";
                while ($fetch_orders_month = $csdl->fetch_array($query_orders_month)) {
                  $string_orders .= $fetch_orders_month['orders_month'] . ', ';
                }
                echo substr($string_orders, 0, strlen($string_orders) - 2);
                  ?>]}]}}' data-prefix="" data-suffix=" Scoin">
                      <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="month_orders_active"></a>
                    </span>
              <!-- Chart -->
              <div class="chart">
                <canvas id="chart-orders" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Visiter On-Site</h3>
                </div>
                <div class="col text-right">
                Record <a class="btn btn-sm btn-primary"><font color="white"><?php echo $fetch_traffic['record_value']; ?> (<?php echo date("d-m-Y", strtotime($fetch_traffic['record_date'])) ?>)</font></a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">IP</th>
                    <th scope="col">Time Visit</th>
                  </tr>
                </thead>
                <tbody>
                <?php while($dataonsite =$csdl->fetch($query_onsite)){ ?>
                  <tr>
                    <th scope="row">
                      <?php echo $dataonsite['ip'];?>
                    </th>
                    <td>
                    <?php echo date('d/m/Y H:i:s',strtotime($dataonsite['visit'])); ?>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Website Traffic</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Types</th>
                    <th scope="col">Values</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      Today
                    </th>
                    <td>
                      <?php echo $fetch_traffic['day_value']; ?>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="<?php echo $fetch_traffic['day_value']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $fetch_traffic['day_value']; ?>%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Yesterday
                    </th>
                    <td>
                    <?php echo $fetch_traffic['yesterday_value']; ?>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="<?php echo $fetch_traffic['yesterday_value']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $fetch_traffic['yesterday_value']; ?>%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Week
                    </th>
                    <td>
                    <?php echo $fetch_traffic['week_value']; ?>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="<?php echo $fetch_traffic['week_value']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $fetch_traffic['week_value']; ?>%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Month
                    </th>
                    <td>
                    <?php echo $fetch_traffic['month_value']; ?>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="<?php echo $fetch_traffic['month_value']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $fetch_traffic['month_value']; ?>%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Year
                    </th>
                    <td>
                    <?php echo $fetch_traffic['year_value']; ?>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="<?php echo $fetch_traffic['year_value']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $fetch_traffic['year_value']; ?>%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Total
                    </th>
                    <td>
                    <?php echo $fetch_traffic['all_value']; ?>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="<?php echo $fetch_traffic['all_value']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $fetch_traffic['all_value']; ?>%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>