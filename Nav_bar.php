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
                        <!-- user login dropdown end -->
                    <?php endif; ?>
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
        </header>
        <!--header end-->

        <!--sidebar start-->

        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu">
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon_document_alt"></i>
                            <span>Forms</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="form_component.html">Form Elements</a></li>
                            <li><a class="" href="form_validation.html">Form Validation</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon_desktop"></i>
                            <span>UI Fitures</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="general.html">Elements</a></li>
                            <li><a class="" href="buttons.html">Buttons</a></li>
                            <li><a class="" href="grids.html">Grids</a></li>
                        </ul>
                    </li>
                                    <?php if(isset($_SESSION['admin'])): ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon_table"></i>
                            <span>Data</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <?php
                        if (isset($_SESSION['admin'])) :
                        ?>
                            <ul class="sub">
                                <li><a class="" href="/E-commerce/niceAdmin-main/show_tables.php">Show All Data</a></li>
                            </ul>
                        <?php endif; ?>
                    </li>
                        <?php endif;?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon_documents_alt"></i>
                            <span>Pages</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <?php
                            if (!isset($_SESSION['admin']) && !isset($_SESSION['customer'])) :
                            ?>
                                <li><a class="" href="login_admin.php">Login Admin</a></li>
                                <li><a class="" href="login_customer.php"><span>Login Customer</span></a></li>
                            <?php endif; ?>
                            <?php
                            if (!isset($_SESSION['customer'])) :
                            ?>
                                <li><a class="" href="signup_customer.php"><span>Signup Customer</span></a></li>
                            <?php endif; ?>
                            <?php
                            if (isset($_SESSION['admin'])) :
                            ?>
                                <li><a class="" href="signup_admin.php">SignUp Admin</a></li>
                                <li><a class="" href="add_product.php">Add Product</a></li>
                                <li><a class="" href="add_section.php">Add Section</a></li>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['customer'])) :
                            ?>
                                <li><a class="" href="show_products.php">Show Products</a></li>
                                <!-- <li><a class="" href="create_order.php">Create Order</a></li> -->
                                <li><a class="" href="show_orders.php?ORDER=<?php echo $_SESSION['customer_id'] ?>">Show My Orders</a></li>
                            <?php endif; ?>
                            <li><a class="" href="profile.html">Profile</a></li>
                            <li><a class="" href="login.php"><span>Login Page</span></a></li>
                            <li><a class="" href="contact.html"><span>Contact Page</span></a></li>
                            <li><a class="" href="blank.html">Blank Page</a></li>
                            <li><a class="" href="404.html">404 Error</a></li>
                        </ul>

                    </li>

                </ul>
                <!-- sidebar menu end-->

            </div>

        </aside>
        <!--sidebar end-->
    </section>

</body>

</html>