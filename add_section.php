<?php
include('/xampp/htdocs/E-commerce/niceAdmin-main/Main/ConfigDB.php');



//If User click on Submit Buttom after entering data of employee
if (isset($_POST['add_section'])) {
    $name = $_POST['name_section'];
    $admin = $_POST['admin_section'];
    $insert = "INSERT INTO section VALUES(NULL,'$name',$admin)";
    $query = mysqli_query($connect_to_DB, $insert);
    if ($query) header('location:index.html');
    else echo print_message("Failed Insertion To DataBase", "danger");
}
$name = "";
$admin= "";
$update = false;
if(isset($_GET['update_section']))
{
$update = true;
$id = $_GET['update_section'];
$select = "SELECT * FROM section WHERE id = $id ";
$check = mysqli_query($connect_to_DB,$select);
$data_of_row = mysqli_fetch_assoc($check);
$name = $data_of_row['name'];
$admin = $data_of_row['id_admin'];
if(isset($_POST['update']))
{
    $name = $_POST['name_section'];
    $admin = $_POST['admin_section'];
    $update = "UPDATE section SET name = '$name', id_admin = $admin WHERE id = $id  ";
    $update_query = mysqli_query($connect_to_DB , $update);
    if($update_query) header('location:index.html');
    else echo print_message("Failed Updated Section","danger");
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
                <label for="">Name of Section</label>
                <input type="text" name="name_section" value="<?php echo $name  ?>" class="form-control" placeholder="Enter Name of Section Here">
            </div>
            <div class="form-group">
                <label for="">Admin</label>
                <select name="admin_section" id="">
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

            <?php if ($update == false) : ?>
                <button type="submit" name="add_section" class="btn btn-primary btn-lg btn-block">Add Section</button>
            <?php else : ?>
                <button type="submit" name="update" class="btn btn-primary btn-lg btn-block">Update</button>
            <?php endif; ?>

        </form>
    </div>



</body>

</html>