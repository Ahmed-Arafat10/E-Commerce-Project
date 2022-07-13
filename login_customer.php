<?php
include('/xampp/htdocs/E-commerce/niceAdmin-main/Main/ConfigDB.php');

if(isset($_POST['check_customer']))
{
$name=$_POST['customer_name'];
$password=$_POST['customer_password'];
$select_admin = "SELECT * FROM customer WHERE name = '$name' AND password = '$password' ";
$check = mysqli_query($connect_to_DB,$select_admin);
$data_row = mysqli_fetch_assoc($check);
$is_customer = mysqli_num_rows($check);
if($is_customer  > 0){
  $_SESSION['customer_id'] = $data_row['id'];
  $_SESSION['customer'] = $name;
  $_SESSION['customer_name'] = $data_row['name'];
  $_SESSION['customer_img'] = $data_row['cust_img'];
header('location:index.php');

}
else echo print_message("Please make sure that information is correct","danger");
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

  <title></title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
<link rel="stylesheet" href="login_customer.css">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">
<?php 
 include'/xampp/htdocs/E-commerce/niceAdmin-main/Header.php';

 ?>
 
  <div class="container">
    <form class="login-form" method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" name="customer_name" class="form-control" placeholder="Username" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="customer_password" class="form-control" placeholder="Password">
        </div>
        <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
        <button class="btn btn-primary btn-lg btn-block" name="check_customer" type="submit">Login</button>
<button  class="btn btn-primary btn-lg btn-block" type="submit"><a class="Signupbtn" href="signup_customer.php">SignUp</a></button>
        <!-- <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button> -->
      </div>
    </form>

  </div>


</body>

</html>
