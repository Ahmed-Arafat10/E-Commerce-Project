<?php
include('/xampp/htdocs/E-commerce/niceAdmin-main/Main/ConfigDB.php');

$price_of_product = 0;

//If User click on Submit Buttom after entering data of employee
if (isset($_POST['order_btn']))
{
    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['id_of_product'];
    $no_of_items = $_POST['no_items'];
    $price = $_POST['final_price'];
    $description = $_POST['description_order'];
    $insert = "INSERT INTO orders VALUES(NULL,$customer_id,$product_id,$no_of_items,$price,'$description')";
    $query = mysqli_query($connect_to_DB, $insert);
    if ($query) header('location:index.php');
    else echo print_message("Failed Insertion To DataBase", "danger");
}
// $customer_id = "";
// $product_id = "";
// $no_of_items = "";
// $address = "";
// $phone;
// // $name="";
// // $salary="";
// $update = false;
// // //If User click on Edit Buttom in List Employee Page
// // if(isset($_GET['edit'])){
// //     $update = true;
// //     $id = $_GET['edit'];
// //     $select="SELECT * FROM employee WHERE id = $id";
// //     $select=mysqli_query($connect_to_DB,$select);
// //     $row=mysqli_fetch_assoc($select);
// //     $name = $row['name'];
// //     $salary = $row['salary'];
// // //If User click on Submit Buttom after entering UPDATED data of employee
// //     if(isset($_POST['update'])){
// //     $name = $_POST['name'];
// //     $salary = $_POST['salary'];
// //     $department=$_POST['department'];
// //     $update="UPDATE employee SET name = '$name' , salary = $salary , department = $department WHERE id=$id";
// //     $query = mysqli_query($connect_to_DB, $update);
// //     if($query) print_message("Done Updating DataBase");
// //     else echo print_message("Failed Updating  DataBase");
// //     }

// // }


if(isset($_GET['create_order']))
{
    $product_id = $_GET['create_order'];
    $price = $_GET['productPrice'];
    $product_name = $_GET['productName'];
}


// echo $_SESSION['customer_id'];


if (!isset($_SESSION['customer'])) header('location:login_customer.php');

?>
<!-- HTML CODE -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
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

    <style>
        * {

            margin: 0px;
            padding: 0px;
            top: 0px
        }
    </style>
</head>

<body>
<?php 
 include'/xampp/htdocs/E-commerce/niceAdmin-main/Header.php';
 ?>
<div style="margin-left: 360px;margin-top:130px" class="container col-md-5 align-items-center">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Customer's Name</label>
                <input disabled type="text" name="customer_name" value="<?php echo $_SESSION['customer'] ?>" class="form-control" placeholder="Enter  Product's Name Here">
                <input hidden type="text" name="customer_id" value="<?php echo $_SESSION['customer_id'] ?>" class="form-control" placeholder="Enter  Product's Name Here">
            </div>
            <div class="form-group">
                <label for="">Selected Product</label>
              <output style="font-size: 30px; font-weight:bold;color:cornflowerblue" ><?php echo $product_name;?></output>
                <input hidden type="text" name="id_of_product" value="<?php echo $product_id ?>">
            </div>
            <div class="form-group">
                <label for="">No. Of Items:</label>
                <input style="width: 50px;" oninput= "result_price.value = parseInt(no_items.value) * <?php echo $price; ?>,final_price.value = parseInt(no_items.value) * <?php echo $price; ?>" style="width: 150px;" min="1" max="25" type="number" name="no_items" >
            </div>
            <div class="form-group">
                <label for="">Price Of Order : </label>
                <!-- <input disabled type="number" name="price_order" value="" class="form-control" placeholder="Price"> -->
                <output style="font-size: 30px; font-weight:bold;color:cadetblue;" name="result_price"></output>
                <input hidden type="number" name="final_price" value="result_price.value">
                <label for="">L.E</label>
            </div>

            <div class="form-group">
                <label for="">Description of Order</label>
                <input required type="text" name="description_order"  class="form-control" placeholder="Enter Description of Order Here">
            </div>

             <!-- <?php if ($update == false) : ?> -->
                <button type="submit" name="order_btn" class="btn btn-primary btn-lg btn-block">Order Now</button>
            <!-- <?php else : ?> -->
                <!-- <button type="submit" name="update" class="btn btn-primary btn-lg btn-block">Update</button>
            <?php endif; ?> -->

        </form>
    </div>



</body>

</html>