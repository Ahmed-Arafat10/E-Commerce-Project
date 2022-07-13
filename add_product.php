<?php
include('/xampp/htdocs/E-commerce/niceAdmin-main/Main/ConfigDB.php');



//If User click on Submit Buttom after entering data of employee
if (isset($_POST['add_product'])) {
    $name = $_POST['name_product'];
    $description = $_POST['description_product'];
    $price = $_POST['price_product'];
    $admin = $_POST['admin_product'];
    $section = $_POST['section_product'];
    //IMAGE
$image_type = $_FILES['image']['type'];
$image_name = $_FILES['image']['name'];
$image_temp = $_FILES['image']['tmp_name'];
$location = 'Resources/Products/';
move_uploaded_file($image_temp,$location . $image_name);
    $insert = "INSERT INTO product VALUES(NULL,'$name','$description',$price,$admin,$section,'$image_name')";
    $query = mysqli_query($connect_to_DB, $insert);
    if ($query) header('location:index.php');
    else echo print_message("Failed Insertion To DataBase", "danger");
}
$name = "";
$description = "";
$price = "";
$admin = "";
$section = "";
$update = false;

if(isset($_GET['update']))
{
$update = true;
$id = $_GET['update'];
$select = "SELECT * FROM product WHERE id = $id ";
$check = mysqli_query($connect_to_DB,$select);
$data_of_row = mysqli_fetch_assoc($check);
$name = $data_of_row['name'];
$description = $data_of_row['description'];
$price = $data_of_row['price'];
$admin = $data_of_row['id_admin'];
$section = $data_of_row['id_section'];
if(isset($_POST['update']))
{
    $name = $_POST['name_product'];
    $description = $_POST['description_product'];
    $price = $_POST['price_product'];
    $admin = $_POST['admin_product'];
    $section = $_POST['section_product'];
        //IMAGE
$image_type = $_FILES['image']['type'];
$image_name = $_FILES['image']['name'];
$image_temp = $_FILES['image']['tmp_name'];
$location = 'Resources/Products/';
move_uploaded_file($image_temp,$location . $image_name);
    $update = "UPDATE product SET name = '$name' , description = '$description' , price = $price , id_admin = $admin , id_section = $section , product_img = '$image_name' WHERE id = $id  ";
    $update_query = mysqli_query($connect_to_DB , $update);
    if($update_query) header('location:index.php');
    else echo print_message("Failed Updating Product","danger");
}
}



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
                <label for="">Name of Product</label>
                <input type="text" name="name_product" value="<?php echo $name  ?>" class="form-control" placeholder="Enter  Product's Name Here">
            </div>
            <div class="form-group">
                <label for="">Description of Product</label>
                <input type="text" name="description_product" value="<?php echo $description ?>" class="form-control" placeholder="Enter Description Here">
            </div>
            <div class="form-group">
                <label for="">Price of Product</label>
                <input type="number" name="price_product" value="<?php echo $price ?>" class="form-control" placeholder="Enter Price Here">
            </div>
            <div class="form-group">
                <label for="">Admin</label>
                <select name="admin_product" id="">
                    <?php
                    $select = "SELECT * FROM admin";
                    $admin_data = mysqli_query($connect_to_DB, $select);
                    foreach ($admin_data  as $data) {
                    ?>
                        <option value="<?php echo $data['id']; ?>">
                            <?php echo $data['name']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Section</label>
                <select name="section_product" id="">
                    <?php
                    $select = "SELECT * FROM section";
                    $section_data = mysqli_query($connect_to_DB, $select);
                    foreach ($section_data  as $data) {
                    ?>
                        <option value="<?php echo $data['id']; ?>">
                            <?php echo $data['name']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image"  class="form-control" placeholder="Enter Image Here">
            </div>

            <?php if ($update == false) : ?>
                <button type="submit" name="add_product" class="btn btn-primary btn-lg btn-block">Add Product</button>
            <?php else : ?>
                <button type="submit" name="update" class="btn btn-primary btn-lg btn-block">Update</button>
            <?php endif; ?>

        </form>
    </div>



</body>

</html>