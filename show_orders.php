<?php
include('/xampp/htdocs/E-commerce/niceAdmin-main/Main/ConfigDB.php');

echo "test";

if(isset($_GET['delete_order']))
{
$id = $_GET['delete_order'];
$delete_q = "DELETE FROM orders WHERE id = $id";
$is_done = mysqli_query($connect_to_DB,$delete_q);
if($is_done) header('location:show_orders.php');
else print_message("Failed To Delete Order Data","danger");
}

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
  
  <title>Basic Table | Creative - Bootstrap 3 Responsive Admin Template</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

  <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
   
</head>

<body>
 <?php 
 include'/xampp/htdocs/E-commerce/niceAdmin-main/Nav_bar.php';
 ?>
     <div class="table_orders">
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  Orders
                </header>
                <table class="table table-striped table-advance table-hover">
                  <tbody>
                    <tr>
                      <th><i class="icon_cogs"></i>ID</th>
                      <th>Name of Product</th>
                      <th>No. of Item(s)</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th><i class="icon_mobile"></i>Email of Customer</th>
                      <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    <?php
                    if(isset($_GET['ORDER']))
                    $customer_id = $_GET['ORDER'];
                    $select = "SELECT *,customer.email AS Email_customer , product.name AS Name_product, orders.id AS O_ID, orders.price AS O_Price FROM orders JOIN customer,product WHERE orders.id_customer = $customer_id AND orders.id_product = product.id AND customer.email = (SELECT email from customer WHERE id= $customer_id)";
                    // $select = "SELECT customer.email AS Email_customer, product.name AS Name_product, orders.id AS O_ID, orders.price AS O_Price, orders.description AS O_description, orders.no_of_items AS O_items FROM orders,customer,product WHERE orders.id_customer = $customer_id AND orders.id_product = product.id ";
                    $orders_data = mysqli_query($connect_to_DB, $select);
                    foreach ($orders_data as $data) {
                    ?>
                      <tr>
                        <td><?php echo $data['O_ID'] ?> </td>
                        <td><?php echo $data['Name_product'] ?></td>
                        <td><?php echo $data['no_of_items'] ?></td>
                        <td><?php echo $data['description'] ?></td>
                        <td><?php echo $data['O_Price'] ?></td>
                        <td><?php echo $data['Email_customer'] ?></td>
                        <td>
                        <div class="btn-group">
                          <!-- <a class="btn btn-primary" href="add_section.php?update_section=<?php echo $data['O_ID'] ?>">Edit</a> -->
                            <!-- <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a> -->
                            <a class="btn btn-danger" href="show_orders.php?delete_order=<?php echo $data['O_ID'] ?>" onclick="return confirm('Are You Sure ??')">Delete</a>
                          </div>
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



  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nicescroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>


</body>

</html>