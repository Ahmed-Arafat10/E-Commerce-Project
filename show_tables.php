<?php
include('/xampp/htdocs/E-commerce/niceAdmin-main/Main/ConfigDB.php');

echo "test";

if (isset($_GET['delete_customer'])) {
  $id = $_GET['delete_customer'];
  $delete_q = "DELETE FROM customer WHERE id = $id";
  $is_done = mysqli_query($connect_to_DB, $delete_q);
  if ($is_done) header('location:show_tables.php');
  else print_message("Failed To Delete Customer Data", "danger");
}

if (isset($_GET['delete_product'])) {
  $id = $_GET['delete_product'];
  $delete_q = "DELETE FROM product WHERE id = $id";
  $is_done = mysqli_query($connect_to_DB, $delete_q);
  if ($is_done) header('location:show_tables.php');
  else print_message("Failed To Delete Product", "danger");
}

if (isset($_GET['delete_order'])) {
  $id = $_GET['delete_order'];
  $delete_q = "DELETE FROM orders WHERE id = $id";
  $is_done = mysqli_query($connect_to_DB, $delete_q);
  if ($is_done) header('location:show_tables.php');
  else print_message("Failed To Delete Order Data", "danger");
}

if (isset($_GET['delete_section'])) {
  $id = $_GET['delete_section'];
  $delete_q = "DELETE FROM section WHERE id = $id";
  $is_done = mysqli_query($connect_to_DB, $delete_q);
  if ($is_done) header('location:show_tables.php');
  else print_message("Failed To Delete Section", "danger");
}


if (isset($_GET['delete_admin'])) {
  $id = $_GET['delete_admin'];
  $delete_q = "DELETE FROM admin WHERE id = $id";
  $is_done = mysqli_query($connect_to_DB, $delete_q);
  if ($is_done) header('location:show_tables.php');
  else print_message("Failed To Delete Section", "danger");
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
  <link rel="stylesheet" href="show.css">
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
  include '/xampp/htdocs/E-commerce/niceAdmin-main/Nav_bar.php';
  ?>
  <section>
    <?php if ($_SESSION['admin_depart'] == 'JOKER' || $_SESSION['admin_depart'] == 'ADMIN' || $_SESSION['admin_depart'] == 'HR') : ?> <div class="table_customers">
        <!--main content start-->
        <section id="main-content">
          <section class="wrapper">
            <div class="row">
              <div class="col-lg-12">
                <section class="panel">
                  <header class="panel-heading">
                    Customers
                  </header>
                  <table class="table table-striped table-advance table-hover">
                    <tbody class="TEST">
                      <tr>
                        <th><i class="icon_profile"></i>ID</th>
                        <th><i class="icon_profile"></i>Full Name</th>
                        <th><i class="icon_mail_alt"></i>Email</th>
                        <th><i class="icon_pin_alt"></i>Adress</th>
                        <th><i class="icon_profile"></i>Image</th>
                        <th><i class="icon_mobile"></i>Phone</th>
                        <th><i class="icon_cogs"></i>Action</th>
                      </tr>
                      <?php
                      $select = "SELECT * FROM customer";
                      $cust_data = mysqli_query($connect_to_DB, $select);
                      foreach ($cust_data as $data) {
                      ?>
                        <tr>
                          <td><?php echo $data['id'] ?> </td>
                          <td><?php echo $data['name'] ?></td>
                          <td><?php echo $data['email'] ?></td>
                          <td><?php echo $data['address'] ?></td>
                          <?php if ($data['cust_img'] != NULL) : ?>
                            <td><img width="100" height="100" src="Resources/<?php echo $data['cust_img'] ?>"></td>
                          <?php else : ?>
                            <td>N/A</td>
                          <?php endif; ?>
                          <td><?php echo $data['phone'] ?></td>
                          <td>
                            <?php if ($_SESSION['admin_depart'] != 'HR') : ?>
                              <div class="btn-group">
                                <a class="btn btn-primary" href="signup_customer.php?update=<?php echo $data['id'] ?>">Edit</a>
                                <!-- <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a> -->
                                <a class="btn btn-danger" href="show_tables.php?delete_customer=<?php echo $data['id'] ?>" onclick="return confirm('Are You Sure ??')">Delete</a>
                              </div>
                            <?php else : ?>
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
    <?php endif; ?>
    <?php if ($_SESSION['admin_depart'] == 'JOKER' || $_SESSION['admin_depart'] == 'LOG'  || $_SESSION['admin_depart'] == 'ADMIN' || $_SESSION['admin_depart'] == 'HR') : ?>
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
                        <th>Pic Of Product</th>
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
                          <?php if ($data['product_img'] != NULL) : ?>
                            <td><img width="100" height="100" src="Resources/Products/<?php echo $data['product_img'] ?>"></td>

                          <?php else : ?>
                            <td>N/A</td>
                          <?php endif; ?>
                          <td><?php echo $data['ProductName'] ?></td>
                          <td><?php echo $data['description'] ?></td>
                          <td><?php echo $data['price'] ?></td>
                          <td><?php echo $data['Aname'] ?></td>
                          <td><?php echo $data['Sname'] ?></td>
                          <td>
                            <?php if($_SESSION['admin_depart'] != 'HR') : ?>
                              <div class="btn-group">
                                <a class="btn btn-primary" href="add_product.php?update=<?php echo $data['ProductID'] ?>">Edit</a>
                                <a class="btn btn-danger" href="show_tables.php?delete_product=<?php echo $data['ProductID'] ?>" onclick="return confirm('Are You Sure ??')">Delete</a>
                                <!-- <a class="btn btn-success" href="create_order.php?create_order=<?php echo $data['ProductID'] ?>&productPrice=<?php echo $data['price'] ?>&productName=<?php echo $data['ProductName'] ?>"><i class="icon_check_alt2"></i>Order</a> -->
                              </div>
                            <?php else : ?>
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
    <?php endif; ?>
    <?php if ($_SESSION['admin_depart'] == 'JOKER' || $_SESSION['admin_depart'] == 'LOG' || $_SESSION['admin_depart'] == 'ADMIN' || $_SESSION['admin_depart'] == 'HR') : ?>
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
                      $select = "SELECT *,customer.email AS Email_customer , product.name AS Name_product, orders.id AS O_ID, orders.price AS O_Price FROM orders JOIN customer,product WHERE orders.id_customer = customer.id AND  orders.id_product = product.id ";
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
                            <?php if ($_SESSION['admin_depart'] != 'HR'): ?>
                              <div class="btn-group">
                                <!-- <a class="btn btn-primary" href="add_section.php?update_order=">Edit</a> -->
                                <!-- <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a> -->
                                <a class="btn btn-danger" href="show_tables.php?delete_order=<?php echo $data['O_ID'] ?>" onclick="return confirm('Are You Sure ??')">Delete</a>
                              </div>
                            <?php else : ?>
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
    <?php endif; ?>
    <?php if ($_SESSION['admin_depart'] == 'JOKER' || $_SESSION['admin_depart'] == 'ADMIN' || $_SESSION['admin_depart'] == 'HR') : ?>
      <div class="table_section">
        <!--main content start-->
        <section id="main-content">
          <section class="wrapper">
            <div class="row">
              <div class="col">
                <section class="panel">
                  <header class="panel-heading">
                    Sections
                  </header>
                  <table class="table table-striped table-advance table-hover">
                    <tbody>
                      <tr>
                        <th><i class="icon_cogs"></i>ID</th>
                        <th>Name of section</th>
                        <th><i class="icon_profile"></i> Name of Admin</th>
                        <th><i class="icon_cogs"></i> Action</th>
                      </tr>
                      <?php
                      $select = "SELECT *, admin.name AS Admin_Name , section.name AS Section_Name, section.id AS SectionID FROM section JOIN admin WHERE section.id_admin = admin.id ";
                      $section_data = mysqli_query($connect_to_DB, $select);
                      foreach ($section_data as $data) {
                      ?>
                        <tr>
                          <td><?php echo $data['SectionID'] ?> </td>
                          <td><?php echo $data['Section_Name'] ?></td>
                          <td><?php echo $data['Admin_Name'] ?></td>
                          <td>
                            <?php if ($_SESSION['admin_depart'] != 'HR') : ?>
                              <div class="btn-group">
                                <a class="btn btn-primary" href="add_section.php?update_section=<?php echo $data['SectionID'] ?>">Edit</a>
                                <!-- <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a> -->
                                <a class="btn btn-danger" href="show_tables.php?delete_section=<?php echo $data['SectionID'] ?>" onclick="return confirm('Are You Sure ??')">Delete</a>
                              </div>
                            <?php else : ?>
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
    <?php endif; ?>
    <?php if ($_SESSION['admin_depart'] == 'JOKER') : ?>
      <div class="table_admin">
        <!--main content start-->
        <section id="main-content">
          <section class="wrapper">
            <div class="row">
              <div class="col-lg-12">
                <section class="panel">
                  <header class="panel-heading">
                    Admins
                  </header>
                  <table class="table table-striped table-advance table-hover">
                    <tbody>
                      <tr>
                        <th><i class="icon_cogs"></i>ID</th>
                        <th><i class="icon_profile"></i>Admin's Name</th>
                        <th><i class="icon_profile"></i>Admin's Pic</th>
                        <th><i class="icon_cogs"></i>Action</th>
                      </tr>
                      <?php
                      $select = "SELECT * FROM admin";
                      $admin_data = mysqli_query($connect_to_DB, $select);
                      foreach ($admin_data as $data) {
                      ?>
                        <tr>
                          <td><?php echo $data['id'] ?> </td>
                          <td><?php echo $data['name'] ?></td>
                          <?php if ($data['admin_img'] != NULL) : ?>
                            <td><img width="100" height="100" src="Resources/<?php echo $data['admin_img'] ?>"></td>
                          <?php else : ?>
                            <td>N/A</td>
                          <?php endif; ?>
                          <td>
                            <?php if ($_SESSION['admin_depart'] == 'JOKER' && $data['department'] != 'JOKER') : ?>
                              <div class="btn-group">
                                <!-- <a class="btn btn-primary" href="add_section.php?update_section=<?php echo $data['id'] ?>">Edit</a> -->
                                <!-- <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a> -->
                                <a class="btn btn-danger" href="show_tables.php?delete_admin=<?php echo $data['id'] ?>" onclick="return confirm('Are You Sure ??')">Delete</a>
                              </div>
                            <?php else : ?>
                              <p>OWNER</p>
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
    <?php endif; ?>
    <!--main content end-->

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