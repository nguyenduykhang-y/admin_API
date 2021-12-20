<?php

$connect = new mysqli('localhost','root','','DFPTDUAN');
$query = "SELECT `tblcategories`.*, COUNT(tblproducts.category_id) AS 'number_cate' FROM `tblproducts` 
INNER JOIN `tblcategories` ON tblproducts.category_id = tblCategories.id GROUP BY tblproducts.category_id";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));;
$data = [];
while ($row = mysqli_fetch_array($result)){
  $data[] = $row;
}
// echo"<pre>";
// var_dump($data);
// echo"</pre>";

include('includes/header.php'); 
include('includes/navbar.php'); 


?>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data app</h1>
   
  </div>

  <!-- Content Row -->
  <div class="row">

  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Hóa đơn</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
                  require_once 'configs/connect.php';
                 $query = "SELECT id FROM tbloderct ORDER BY id";
                 $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
                 $row = mysqli_num_rows($result);
                  echo '<h6> Tổng : ' . $row. ' đơn hàng</h6>';
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Người dùng</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
                  require_once 'configs/connect.php';
                 $query = "SELECT id FROM tblusers ORDER BY id";
                 $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
                 $row = mysqli_num_rows($result);
                  echo '<h6> Tổng : ' . $row. ' người dùng</h6>';
                ?>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
 <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">ALL cửa hàng</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
                  require_once 'configs/connect.php';
                 $query = "SELECT storeId FROM tblstore ORDER BY storeId";
                 $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
                 $row = mysqli_num_rows($result);
                  echo '<h6> Tổng : ' . $row. ' Cửa hàng</h6>';
                ?>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>

  
  
   <!-- Pending Requests Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">All Sản phẩm</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                  require_once 'configs/connect.php';
                 $query = "SELECT id FROM tblproducts ORDER BY id";
                 $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
                 $row = mysqli_num_rows($result);
                 echo '<h6> Tổng : ' . $row. ' Sản phẩm</h6>';
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['name', 'number_cate'],
          <?php
          foreach ($data as $key) {
            echo "['" . $key['name'] . "', " . $key['number_cate'] . "],";
          }
        ?>
        ]);

        var options = {
          title: 'Thể loại sản phẩm của all app',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>


  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>