<?php
include('/xampp/htdocs/E-commerce/niceAdmin-main/Main/ConfigDB.php');

echo "test";

if(isset($_GET['delete_customer']))
{
$id = $_GET['delete_customer'];
$delete_q = "DELETE FROM customer WHERE id = $id";
$is_done = mysqli_query($connect_to_DB,$delete_q);
if($is_done) header('location:show_tables.php');
else print_message("Failed To Delete Customer Data","danger");


}

if(isset($_GET['delete_product']))
{
$id = $_GET['delete_product'];
$delete_q = "DELETE FROM product WHERE id = $id";
$is_done = mysqli_query($connect_to_DB,$delete_q);
if($is_done) header('location:show_tables.php');
else print_message("Failed To Delete Product","danger");

}


if(isset($_GET['delete_section']))
{
$id = $_GET['delete_section'];
$delete_q = "DELETE FROM section WHERE id = $id";
$is_done = mysqli_query($connect_to_DB,$delete_q);
if($is_done) header('location:show_tables.php');
else print_message("Failed To Delete Section","danger");

}


if(isset($_GET['delete_admin']))
{
$id = $_GET['delete_admin'];
$delete_q = "DELETE FROM admin WHERE id = $id";
$is_done = mysqli_query($connect_to_DB,$delete_q);
if($is_done) header('location:show_tables.php');
else print_message("Failed To Delete Section","danger");

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
                      <th><i class="icon_cogs"></i>ID</th>
                      <th>Name Of Product</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th><i class="icon_profile"></i>Admin</th>
                      <th>Section</th>
                      <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    <?php
                    $select = "SELECT *,admin.name AS Aname, section.name AS Sname, product.name AS ProductName ,product.id AS ProductID FROM product JOIN admin,section WHERE product.id_admin = admin.id AND  product.id_section = section.id  ";
                    $product_data = mysqli_query($connect_to_DB, $select);
                    foreach ($product_data as $data) {
                    ?>
                      <tr>
                        <td><?php echo $data['ProductID'] ?> </td>
                        <td><?php echo $data['ProductName'] ?></td>
                        <td><?php echo $data['description'] ?></td>
                        <td><?php echo $data['price'] ?></td>
                        <td><?php echo $data['Aname'] ?></td>
                        <td><?php echo $data['Sname'] ?></td>
                        <td>
                          <div class="btn-group">
                          <!-- <a class="btn btn-primary" href="add_product.php?update=<?php echo $data['ProductID'] ?>">Edit</a>
                            <a class="btn btn-danger" href="show_tables.php?delete_product=<?php echo $data['ProductID'] ?>" onclick="return confirm('Are You Sure ??')">Delete</a> -->
                              <a class="btn btn-success" href="create_order.php?create_order=<?php echo $data['ProductID'] ?>&productPrice=<?php echo $data['price'] ?>&productName=<?php echo $data['ProductName'] ?>"><i class="icon_check_alt2"></i>Order</a>
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