<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "e-commerce";
$connect_to_DB = mysqli_connect($host,$user,$password,$database); //Build-in Function
// if($connect_to_DB)
// echo "Done conneting to DataBase";
// else 
// echo "Failed conneting to DataBase";

session_start();

function print_message($text,$state){
    if($state == 'normal')
    echo "<div style='text-align:center;margin-top:100px' class = 'alert alert-primary' role = 'alert' >". $text . "</div>";
    else if($state == 'danger')
    echo "<div style='text-align:center;' class = 'alert alert-danger' role = 'alert' >". $text . "</div>";
    
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<style>

*{

  margin: 0px;
  padding: 0px;
  top:0px
}
  
</style>
</head>

<body>
    
</body>
</html>