<?php
  include 'Main/ConfigDB.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>E-Commerce Project</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="show.css">
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <?php
  include 'Nav_bar.php';
  ?>





  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="js/fullcalendar.min.js">
    </script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

    <h1 style="margin:75px 200px 0 200px;text-align:center;font-weight:bolder;font-size:80px;font-style:italic;color:cadetblue;position:absoulte">WELCOME To E-Commerce Project</h1>
    <div class="table_product">
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  Products
                </header>
                <table class="table table-striped table-advance table-hover">
                  <tbody>
                    <tr>
                      <th>Name Of Product</th>
                      <th>Pic Of Product</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Section</th>
                      <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    <?php
                    $select = "SELECT *,admin.name AS Aname, section.name AS Sname, product.name AS ProductName ,product.id AS ProductID FROM product JOIN admin,section WHERE product.id_admin = admin.id AND  product.id_section = section.id  ";
                    $product_data = mysqli_query($connect_to_DB, $select);
                    foreach ($product_data as $data) {
                    ?>
                      <tr>
                      <td><?php echo $data['ProductName'] ?></td>
                        <?php if ($data['product_img'] != NULL) : ?>
                          <td><img width="100" height="100" src="Resources/Products/<?php echo $data['product_img'] ?>"></td>
                        <?php else : ?>
                          <td>N/A</td>
                        <?php endif; ?>
                        <td><?php echo $data['description'] ?></td>
                        <td><?php echo $data['price'] ?></td>
                        <td><?php echo $data['Sname'] ?></td>
                        <td>
                          <?php if(!isset($_SESSION['admin'])): ?>
                          <div class="btn-group">
                            <?php if (isset($_SESSION['customer'])) : ?>
                              <a class="btn btn-success" href="create_order.php?create_order=<?php echo $data['ProductID'] ?>&productPrice=<?php echo $data['price'] ?>&productName=<?php echo $data['ProductName'] ?>"><i class="icon_check_alt2"></i>Order</a>
                            <?php else : ?>
                              <a class="btn btn-success" href="login_customer.php"><i class="icon_check_alt2"></i>Login To Order</a>
                            <?php endif; ?>
                          </div>
                            <?php else: ?>
                              <p>N/A</p>
                              <?php endif; ?>
                        </td>
                      <?php } ?>
                  </tbody>
                </table>
              </section>
            </div>
          </div>
          <!-- page end-->
        </section>
      </section>
    </div>
</body>

</html>