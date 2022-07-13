<?php
include('/xampp/htdocs/E-commerce/niceAdmin-main/Main/ConfigDB.php');

// function check($str,$sz){
//     for($i=0;$i<$sz;$i++){
//         for($j=0;$j<=9;$j++)
//     if($str[$i] == $j) return 1;
//     return 0;
//     }
// }
// $name = "";
// $password = "";
// $email = "";
// $address = "";
// $phone;

//If User click on Submit Buttom after entering data of employee
$formerrors = array();
if(isset($_POST['send_signup'])){
$name = $_POST['name'];
$password = $_POST['password'];
$depart=$_POST['admin_depart'];
//IMAGE
$image_type = $_FILES['image']['type'];
$image_name = $_FILES['image']['name'];
$image_temp = $_FILES['image']['tmp_name'];
$location = 'Resources/Admins/';
if(strlen($name) < 3){
    $formerrors[] = 'Username contains less than 3 charecters';
}
else{
    if(move_uploaded_file($image_temp,$location . $image_name)) echo "DONE";
else echo "SHITTTTT";
$insert = "INSERT INTO admin VALUES(NULL,'$name','$password','$image_name','$depart')";
$query = mysqli_query($connect_to_DB,$insert);
if($query) header('location:index.php');
else echo print_message("Failed Insertion To DataBase","danger");
}
}


$update = false;

if(isset($_GET['update']))
{
$update = true;
$id = $_GET['update'];
$select = "SELECT * FROM customer WHERE id = $id ";
$check = mysqli_query($connect_to_DB,$select);
$data_of_row = mysqli_fetch_assoc($check);
$name = $data_of_row['name'];
$password = $data_of_row['password'];
$email = $data_of_row['email'];
$address = $data_of_row['address'];
$phone = $data_of_row['phone'];

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $update = "UPDATE customer SET name = '$name' , password = '$password' , email = '$email' , address = '$address' , phone = $phone WHERE id = $id  ";
    $update_query = mysqli_query($connect_to_DB , $update);
    if($update_query) header('location:index.html');
    else echo print_message("Failed Updating To DataBase","danger");
}
}


// //If User click on Edit Buttom in List Employee Page
// if(isset($_GET['edit'])){
//     $update = true;
//     $id = $_GET['edit'];
//     $select="SELECT * FROM employee WHERE id = $id";
//     $select=mysqli_query($connect_to_DB,$select);
//     $row=mysqli_fetch_assoc($select);
//     $name = $row['name'];
//     $salary = $row['salary'];
// //If User click on Submit Buttom after entering UPDATED data of employee
//     if(isset($_POST['update'])){
//     $name = $_POST['name'];
//     $salary = $_POST['salary'];
//     $department=$_POST['department'];
//     $update="UPDATE employee SET name = '$name' , salary = $salary , department = $department WHERE id=$id";
//     $query = mysqli_query($connect_to_DB, $update);
//     if($query) print_message("Done Updating DataBase");
//     else echo print_message("Failed Updating  DataBase");
//     }

// }



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
  <link rel="stylesheet" href="show_tables.css">
<style>

*{

  margin: 0px;
  padding: 0px;
  top:0px
}
  
</style>
</head>

<body style="text-align:center; ">
<?php 
 include'/xampp/htdocs/E-commerce/niceAdmin-main/Header.php';
 ?>

    <div style="margin-left: 360px;margin-top:130px" class="container col-md-5 align-items-center">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Your Name Here">
            </div>
            <div class="errors">
                <?php foreach($formerrors as $error) { 
                    echo $error .'<br>';  
                }
                    ?>

            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password"  class="form-control" placeholder="Enter Your Password Here">
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image"  class="form-control" placeholder="Enter Image Here">
            </div>
            <div class="form-group">
                <select name="admin_depart">
           <option value="ADMIN">Admin</option>
           <option value="HR">HR</option>
           <option value="LOG">Log</option>
           <option value="JOKER">Joker</option>
           </select>
           </div>
           <?php if($update == false) : ?>
            <button type="submit" name="send_signup" class="btn btn-primary btn-lg btn-block" >SignUp Admin</button>
            <?php else:?>
                <button type="submit" name="update" class="btn btn-primary btn-lg btn-block" >Update</button>
            <?php endif;?>

        </form>
    </div>


</body>

</html>





