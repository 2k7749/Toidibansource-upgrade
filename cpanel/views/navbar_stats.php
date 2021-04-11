<?php require_once("../libraries/class.database.php");
$csdl = new mySQL();
$csdl->connect();
?>
<?php 
$total_user="SELECT *,(select count(*) FROM users) as total FROM users"; 
$query_user = $csdl->query($total_user); 
$fetch_user = $csdl->fetch($query_user);

$pur_his = "SELECT *,(select count(*) FROM purchase_history WHERE DATE(NOW()) - INTERVAL 7 DAY) as sincepur,(SELECT count(*) FROM purchase_history WHERE paydate > DATE_SUB(NOW(), INTERVAL 14 DAY)) as last14,(SELECT count(*) FROM purchase_history WHERE paydate > DATE_SUB(NOW(), INTERVAL 7 DAY)) as last7 FROM purchase_history";
$query_pur =  $csdl->query($pur_his); 
$fetch_pur = $csdl->fetch($query_pur);

$traffic = "SELECT * FROM counter_values";
$query_traffic = $csdl->query($traffic);
$fetch_traffic = $csdl->fetch($query_traffic);
?>
    <script type="text/javascript">
  $(document).ready(function(){
  document.getElementById("week_profits_active").click();
  document.getElementById("month_orders_active").click();
  });
</script>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo number_format($fetch_traffic['month_value']);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap float-right">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total users</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $fetch_user['total'];?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                  <span class="text-warning mr-2"><i class="ni ni-time-alarm"></i></span>
                    <span class="text-nowrap float-right">All Times</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $fetch_pur['sincepur'];?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                  <?php $profits = $fetch_pur['last14'] - $fetch_pur['last7']; $cal_profits = @($profits/$fetch_pur['last14'])*100; $round2 = ROUND($cal_profits,2);
                  if($round2 > 0){
                    echo '<span class="text-success mr-2"><i class="fas fa-arrow-up"></i> '.$round2.'%</span>';
                  }else{
					echo '<span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> '.$round2.'%</span>';
				  }
                  ?>
                    <span class="text-nowrap float-right">Last 7 days</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                      <span class="h2 font-weight-bold mb-0">49,65%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap float-right">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>