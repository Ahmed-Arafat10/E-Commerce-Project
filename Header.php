<?php

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- container section start -->
    <section id="container" class="">
        <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo">E- <span class="lite">Commerce</span></a>
            <!--logo end-->

            <div class="top-nav notification-row">
                <!-- notificatoin dropdown start-->
                <?php
                if (!isset($_SESSION['admin']) && !isset($_SESSION['customer'])) :
                ?>
                    <ul style="float: left;margin-top: 10px;">
                        <li class="btn btn-info"><a style="color:ivory" href="login_admin.php">Login As Admin</a></li>
                        <li class="btn btn-info"><a style="color:ivory" href="login_customer.php">Login As Customer</a></li>
                    </ul>
                <?php else : ?>
                    <!-- <ul style="float: left;margin-top: 10px;"> -->
                    <form style="float: left;margin-top: 10px;" action="" method="GET">
                        <button class="btn btn-danger" name="logout">Logout</button>
                    </form>
                    <!-- <li class="btn btn-info"><a style="color:ivory" href="login_admin.php">Login As Admin</a></li> -->
                    <!-- </ul> -->
                <?php endif; ?>
                <ul class="nav pull-right top-menu">

                    <?php
                    if (isset($_SESSION['customer']) || isset($_SESSION['admin'])) :
                    ?>
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="profile-ava">
                                <?php
                                    if (isset($_SESSION['customer'])) :
                                    ?>
                                       <img width="50" height="50"  src="Resources/Customers/<?php echo $_SESSION['customer_img'] ?>" >
                                    <?php else : ?>
                                        <img width="50" height="50"  src="Resources/Admins/<?php echo $_SESSION['admin_image'] ?>" >
                                    <?php endif; ?>
                                </span>
                                <?php
                                if (isset($_SESSION['customer'])) :
                                ?>
                                    <span class="username"><?php echo $_SESSION['customer_name']; ?></span>
                                <?php else : ?>
                                    <span class="username"><?php echo "Admin : " . $_SESSION['admin']; ?></span>
                                <?php endif; ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <li class="eborder-top">
                                    <a href="#"><i class="icon_profile"></i> My Profile</a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon_chat_alt"></i> Chats</a>
                                </li>
                                <li>
                                    <a href="login.php"><i class="icon_key_alt"></i> Log Out</a>
                                </li>
                                <li>
                                    <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
                                </li>
                                <li>
                                    <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
        </header>
        <!--header end-->
    </section>
</body>

</html>