<?php
include '../backend/tablenumber.php';
include '../backend/dbconnection.php';
include '../backend/cartcount.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Restaurantly Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../middleware/signout.js"></script>
    <script src="../middleware/getitem.js"></script>

    <!-- =======================================================
  * Template Name: Restaurantly - v3.7.0
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-center justify-content-md-between">

            <div class="contact-info d-flex align-items-center">
            <i class="bi bi-person-badge d-flex align-items-center ms-4"><span><?php echo "Hello..".$name;?></span></i>
            <i class="bi bi-phone d-flex align-items-center ms-4"><span>+91 <?php echo $phone;?></span></i>
               
            </div>
            <div class="contact-info d-flex align-items-left">
                <a onclick="signout()"><i class="bi bi-box-arrow-left align-items-center ms-4"><span>Signout</span></i></a>
            </div>
        </div>
    </div>
    <header id="header" class="fixed-top d-flex align-items-cente">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0">
                <p style="color:#cda45e;">Check Our Tasty Menu</p>
            </h1>
            <a href="./order.php? tablenumber=<?php echo $table_number;?>"><i class="bi bi-cart d-flex align-items-center" style="color:#cda45e;font-size:30px;"></i><sub><?php echo $count_items;?></sub></a>
        </div>
    </header>
    <main id="main">
        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <br>
                    <br>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="menu-flters">
                        <?php
                            $count_items="select *from items";
                            $get_result=mysqli_query($connection,$count_items);
                            $count=mysqli_num_rows($get_result);
                            ?>
                            <li data-filter="*" class="filter-active">All</li><sup><?php echo $count;?></sup>
                            <?php
                            $count_items="select *from items where Itemcat='Veg'";
                            $get_result=mysqli_query($connection,$count_items);
                            $count=mysqli_num_rows($get_result);
                            ?>
                            <li data-filter=".filter-veg" class="filter-active">Veg</li><sup><?php echo $count;?></sup>
                            <?php
                            $count_items="select *from items where Itemcat='Non-Veg'";
                            $get_result=mysqli_query($connection,$count_items);
                            $count=mysqli_num_rows($get_result);
                            ?>
                            <li data-filter=".filter-nonveg" class="filter-active">Non-Veg</li><sup><?php echo $count;?></sup>
                            <?php
                            $count_items="select *from items where Itemcat='Soups'";
                            $get_result=mysqli_query($connection,$count_items);
                            $count=mysqli_num_rows($get_result);
                            ?>
                            <li data-filter=".filter-soups" class="filter-active">Soups</li><sup><?php echo $count;?></sup>
                            <?php
                            $count_items="select *from items where Itemcat='Starters'";
                            $get_result=mysqli_query($connection,$count_items);
                            $count=mysqli_num_rows($get_result);
                            ?>
                            <li data-filter=".filter-starters">Starters</li><sup><?php echo $count;?></sup>
                            <?php
                            $count_items="select *from items where Itemcat='Salads'";
                            $get_result=mysqli_query($connection,$count_items);
                            $count=mysqli_num_rows($get_result);
                            ?>
                            <li data-filter=".filter-salads">Salads</li><sup><?php echo $count;?></sup>
                            <?php
                            $count_items="select *from items where Itemcat='Specialty'";
                            $get_result=mysqli_query($connection,$count_items);
                            $count=mysqli_num_rows($get_result);
                            ?>
                            <li data-filter=".filter-specialty">Specialty</li><sup><?php echo $count;?></sup>
                        </ul>
                    </div>
                </div>

                <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
                    <?php
                    $get_staters = "select *from items where Itemcat='Starters'";
                    $execute_staters = mysqli_query($connection, $get_staters);
                    while ($fetchs = mysqli_fetch_array($execute_staters)) {
                    ?>
                        <div class="col-lg-6 menu-item filter-starters">
                            <img onclick="getitem('<?php echo $table_number;?>','<?php echo $fetchs[0]; ?>','<?php echo $fetchs[2]; ?>','<?php echo $fetchs[4]; ?>','<?php echo $fetchs[5]; ?>','<?php echo $fetchs[6]; ?>','<?php echo $fetchs[7];?>','<?php echo $name; ?>','<?php echo $phone;?>')" src="../assets/images/<?php echo $fetchs[7];?>" class="menu-img" alt="">
                            <div class="menu-content">
                                <a style="text-decoration:none;cursor:pointer;color:#cda45e;" onclick="getitem('<?php echo $table_number;?>','<?php echo $fetchs[0]; ?>','<?php echo $fetchs[2]; ?>','<?php echo $fetchs[4]; ?>','<?php echo $fetchs[5]; ?>','<?php echo $fetchs[6]; ?>','<?php echo $fetchs[7]; ?>','<?php echo $name; ?>','<?php echo $phone;?>')"><?php echo $fetchs[2]; ?></a><span>&#8377;<?php echo $fetchs[4]; ?></span>
                            </div>
                            <div class="menu-ingredients">
                                <?php
                                $des = $fetchs[3];
                                for ($i = 0; $i < strlen($des); $i++) {
                                    if ($i <= 100) {
                                        echo $des[$i];
                                    } else {
                                        echo "....";
                                ?>
                                        <a onclick="getitemdes('<?php echo $fetchs[3]; ?>','<?php echo $fetchs[2]; ?>')" style="color:#cda45e;text-decoration:none;cursor:pointer;">ReadMore</a>
                                <?php
                                        break;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                     <?php
                    $get_staters = "select *from items where Itemcat='Soups'";
                    $execute_staters = mysqli_query($connection, $get_staters);
                    while ($fetchs = mysqli_fetch_array($execute_staters)) {
                    ?>
                        <div class="col-lg-6 menu-item filter-soups">
                        <img onclick="getitem('<?php echo $table_number;?>','<?php echo $fetchs[0]; ?>','<?php echo $fetchs[2]; ?>','<?php echo $fetchs[4]; ?>','<?php echo $fetchs[5]; ?>','<?php echo $fetchs[6]; ?>','<?php echo $fetchs[7];?>','<?php echo $name; ?>','<?php echo $phone;?>')" src="../assets/images/<?php echo $fetchs[7];?>" class="menu-img" alt="">
                            <div class="menu-content">
                            <a style="text-decoration:none;cursor:pointer;color:#cda45e;" onclick="getitem('<?php echo $table_number;?>','<?php echo $fetchs[0]; ?>','<?php echo $fetchs[2]; ?>','<?php echo $fetchs[4]; ?>','<?php echo $fetchs[5]; ?>','<?php echo $fetchs[6]; ?>','<?php echo $fetchs[7]; ?>','<?php echo $name; ?>','<?php echo $phone;?>')"><?php echo $fetchs[2]; ?></a><span>&#8377;<?php echo $fetchs[4]; ?></span>                            </div>
                            <div class="menu-ingredients">
                                <?php
                                $des = $fetchs[3];
                                for ($i = 0; $i < strlen($des); $i++) {
                                    if ($i <= 100) {
                                        echo $des[$i];
                                    } else {
                                        echo "....";
                                ?>
                                        <a onclick="getitemdes('<?php echo $fetchs[3]; ?>','<?php echo $fetchs[2]; ?>')" style="color:#cda45e;text-decoration:none;cursor:pointer;">ReadMore</a>
                                <?php
                                        break;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    $get_staters = "select *from items where Itemcat='Non-Veg'";
                    $execute_staters = mysqli_query($connection, $get_staters);
                    while ($fetchs = mysqli_fetch_array($execute_staters)) {
                    ?>
                        <div class="col-lg-6 menu-item filter-nonveg">
                        <img onclick="getitem('<?php echo $table_number;?>','<?php echo $fetchs[0]; ?>','<?php echo $fetchs[2]; ?>','<?php echo $fetchs[4]; ?>','<?php echo $fetchs[5]; ?>','<?php echo $fetchs[6]; ?>','<?php echo $fetchs[7];?>','<?php echo $name; ?>','<?php echo $phone;?>')" src="../assets/images/<?php echo $fetchs[7];?>" class="menu-img" alt="">
                            <div class="menu-content">
                            <a style="text-decoration:none;cursor:pointer;color:#cda45e;" onclick="getitem('<?php echo $table_number;?>','<?php echo $fetchs[0]; ?>','<?php echo $fetchs[2]; ?>','<?php echo $fetchs[4]; ?>','<?php echo $fetchs[5]; ?>','<?php echo $fetchs[6]; ?>','<?php echo $fetchs[7]; ?>','<?php echo $name; ?>','<?php echo $phone;?>')"><?php echo $fetchs[2]; ?></a><span>&#8377;<?php echo $fetchs[4]; ?></span>                            </div>
                            <div class="menu-ingredients">
                                <?php
                                $des = $fetchs[3];
                                for ($i = 0; $i < strlen($des); $i++) {
                                    if ($i <= 100) {
                                        echo $des[$i];
                                    } else {
                                        echo "....";
                                ?>
                                        <a onclick="getitemdes('<?php echo $fetchs[3]; ?>','<?php echo $fetchs[2]; ?>')" style="color:#cda45e;text-decoration:none;cursor:pointer;">ReadMore</a>
                                <?php
                                        break;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    $get_staters = "select *from items where Itemcat='Veg'";
                    $execute_staters = mysqli_query($connection, $get_staters);
                    while ($fetchs = mysqli_fetch_array($execute_staters)) {
                    ?>
                        <div class="col-lg-6 menu-item filter-veg">
                        <img onclick="getitem('<?php echo $table_number;?>','<?php echo $fetchs[0]; ?>','<?php echo $fetchs[2]; ?>','<?php echo $fetchs[4]; ?>','<?php echo $fetchs[5]; ?>','<?php echo $fetchs[6]; ?>','<?php echo $fetchs[7];?>','<?php echo $name; ?>','<?php echo $phone;?>')" src="../assets/images/<?php echo $fetchs[7];?>" class="menu-img" alt="">
                            <div class="menu-content">
                            <a style="text-decoration:none;cursor:pointer;color:#cda45e;" onclick="getitem('<?php echo $table_number;?>','<?php echo $fetchs[0]; ?>','<?php echo $fetchs[2]; ?>','<?php echo $fetchs[4]; ?>','<?php echo $fetchs[5]; ?>','<?php echo $fetchs[6]; ?>','<?php echo $fetchs[7]; ?>','<?php echo $name; ?>','<?php echo $phone;?>')"><?php echo $fetchs[2]; ?></a><span>&#8377;<?php echo $fetchs[4]; ?></span>                            </div>
                            <div class="menu-ingredients">
                                <?php
                                $des = $fetchs[3];
                                for ($i = 0; $i < strlen($des); $i++) {
                                    if ($i <= 100) {
                                        echo $des[$i];
                                    } else {
                                        echo "....";
                                ?>
                                        <a onclick="getitemdes('<?php echo $fetchs[3]; ?>','<?php echo $fetchs[2]; ?>')" style="color:#cda45e;text-decoration:none;cursor:pointer;">ReadMore</a>
                                <?php
                                        break;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    $get_staters = "select *from items where Itemcat='Specialty'";
                    $execute_staters = mysqli_query($connection, $get_staters);
                    while ($fetchs = mysqli_fetch_array($execute_staters)) {
                    ?>
                        <div class="col-lg-6 menu-item filter-specialty">
                        <img onclick="getitem('<?php echo $table_number;?>','<?php echo $fetchs[0]; ?>','<?php echo $fetchs[2]; ?>','<?php echo $fetchs[4]; ?>','<?php echo $fetchs[5]; ?>','<?php echo $fetchs[6]; ?>','<?php echo $fetchs[7];?>','<?php echo $name; ?>','<?php echo $phone;?>')" src="../assets/images/<?php echo $fetchs[7];?>" class="menu-img" alt="">
                            <div class="menu-content">
                            <a style="text-decoration:none;cursor:pointer;color:#cda45e;" onclick="getitem('<?php echo $table_number;?>','<?php echo $fetchs[0]; ?>','<?php echo $fetchs[2]; ?>','<?php echo $fetchs[4]; ?>','<?php echo $fetchs[5]; ?>','<?php echo $fetchs[6]; ?>','<?php echo $fetchs[7]; ?>','<?php echo $name; ?>','<?php echo $phone;?>')"><?php echo $fetchs[2]; ?></a><span>&#8377;<?php echo $fetchs[4]; ?></span>                            </div>
                            <div class="menu-ingredients">
                                <?php
                                $des = $fetchs[3];
                                for ($i = 0; $i < strlen($des); $i++) {
                                    if ($i <= 100) {
                                        echo $des[$i];
                                    } else {
                                        echo "....";
                                ?>
                                        <a onclick="getitemdes('<?php echo $fetchs[3]; ?>','<?php echo $fetchs[2]; ?>')" style="color:#cda45e;text-decoration:none;cursor:pointer;">ReadMore</a>
                                <?php
                                        break;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    $get_staters = "select *from items where Itemcat='Salads'";
                    $execute_staters = mysqli_query($connection, $get_staters);
                    while ($fetchs = mysqli_fetch_array($execute_staters)) {
                    ?>
                        <div class="col-lg-6 menu-item filter-salads">
                        <img onclick="getitem('<?php echo $table_number;?>','<?php echo $fetchs[0]; ?>','<?php echo $fetchs[2]; ?>','<?php echo $fetchs[4]; ?>','<?php echo $fetchs[5]; ?>','<?php echo $fetchs[6]; ?>','<?php echo $fetchs[7];?>','<?php echo $name; ?>','<?php echo $phone;?>')" src="../assets/images/<?php echo $fetchs[7];?>" class="menu-img" alt="">
                            <div class="menu-content">
                            <a style="text-decoration:none;cursor:pointer;color:#cda45e;" onclick="getitem('<?php echo $table_number;?>','<?php echo $fetchs[0]; ?>','<?php echo $fetchs[2]; ?>','<?php echo $fetchs[4]; ?>','<?php echo $fetchs[5]; ?>','<?php echo $fetchs[6]; ?>','<?php echo $fetchs[7]; ?>','<?php echo $name; ?>','<?php echo $phone;?>')"><?php echo $fetchs[2]; ?></a><span>&#8377;<?php echo $fetchs[4]; ?></span>                            </div>
                            <div class="menu-ingredients">
                                <?php
                                $des = $fetchs[3];
                                for ($i = 0; $i < strlen($des); $i++) {
                                    if ($i <= 100) {
                                        echo $des[$i];
                                    } else {
                                        echo "....";
                                ?>
                                   <a onclick="getitemdes('<?php echo $fetchs[3]; ?>','<?php echo $fetchs[2]; ?>')" style="color:#cda45e;text-decoration:none;cursor:pointer;">ReadMore</a>     
                                <?php
                                        break;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
        </section><!-- End Menu Section -->

        <!-- ======= Specials Section ======= -->
        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="../assets/vendor/aos/aos.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="../assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="../assets/js/main.js"></script>
        <input type="hidden" value="<?php echo $table_number; ?>" id="tablenumber">
        <script>
            $(document).ready(function() {
                window.history.pushState(null, "", window.location.href);
                window.onpopstate = function() {
                    window.history.pushState(null, "", window.location.href);
                };
            });
        </script>
</body>

</html>