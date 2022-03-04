<?php
include '../backend/dbconnection.php';
include '../backend/cartsum.php';
$table_numbers = $_GET["tablenumber"];
$sql = "select *from cart where Tableno='$table_numbers'";
$exec = mysqli_query($connection, $sql);
$count_items = mysqli_num_rows($exec);
$items = [];
$candid=[];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../middleware/remove.js"></script>
    <script src="../middleware/signout.js"></script>
    <script src="../middleware/voice.js"></script>
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
                <i class="bi bi-phone d-flex align-items-center"><span>+91 9032271284</span></i>
                <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 11AM - 10PM</span></i>
            </div>
            <div class="contact-info d-flex align-items-left">
                <a onclick="play()"><i class="bi bi-box-arrow-left align-items-center ms-4"><span>Signout</span></i></a>
            </div>
        </div>
    </div>
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0">
                <p style="color:#cda45e;">Your Orders's List</p>
            </h1>
            <button type="button" class="btn btn-secondary" id="click" disabled>Confirm Order</button>
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
                     <li data-filter="*" class="filter-active">All Orders ( <?php echo $count_items; ?> )</li><a href="./payment.php? tableno=<?php echo $table_numbers;?>"><i class="bi bi-cart3 align-items-center ms-4" style="color:#cda45e;font-size:20px;"></i>
                        <sub style="font-size:15px;">&#8377; <?php echo $sum;?></sub></a>
                         <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkAll">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                                    Select All / Proceed All
                                </label>
                        </div>
                    </ul>
                    </div>
                </div>

                <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
                    <?php
                    $get_staters = "select *from cart where Tableno='$table_numbers'";
                    $execute_staters = mysqli_query($connection, $get_staters);
                    while ($fetchs = mysqli_fetch_array($execute_staters)) {
                        $get_item_no = $fetchs[3];
                        $can=$fetchs[6];
                        array_push($items, $get_item_no);
                        array_push($candid, $can);
                    }
                    for ($i = 0; $i < count($items); $i++) {
                        $iteminf = "select *from items where Itemid='$items[$i]'";
                        $execute_items = mysqli_query($connection, $iteminf);
                        $itemquan = "select *from cart where Candid='$candid[$i]'and  Item='$items[$i]'";
                        $execute_items_quan = mysqli_query($connection, $itemquan);
                        @$fetchr = mysqli_fetch_array($execute_items_quan);
                        $q = $fetchr[4];
                        $r = $fetchr[5];
                        $ct = $fetchr[6];
                        while ($fetchd = mysqli_fetch_array($execute_items)) {
                            $get_item_name = $fetchd[2];
                            $image = $fetchd[7];
                            $rate = $fetchd[4];
                            $it = $fetchd[0];
                    ?>
                            <div class="col-lg-4 menu-item filter-starters" id="garshana">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?php echo $ct; ?>" name="type">
                                </div>
                                <img src="../assets/images/<?php echo $image; ?>" class="menu-img" alt=""><sub><a onclick="remo('<?php echo $items[$i]; ?>','<?php echo $ct; ?>')"><i class="fa fa-minus-circle" aria-hidden="true" style="color:#cda45e;"></i></a></sub>
                                <div class="menu-content">
                                    <a href="#"><?php echo $get_item_name; ?></a><span>&#8377;<?php echo $rate; ?></span>
                                </div>
                                <div class="menu-ingredients">
                                    Item Quantity placed : <?php echo $q; ?>
                                </div>
                                <div class="menu-ingredients">
                                    Total Item : <span>&#8377; <?php echo $r; ?> </span>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
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
        <input type="hidden" value="<?php echo $table_numbers; ?>" id="tablenumber">
        <script>
            var tab=$("#tablenumber").val();
            $("#checkAll").click(function() {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
            var checkboxes = $("input[type='checkbox']"),
                submitButt = $("#click");

            checkboxes.click(function() {
                submitButt.attr("disabled", !checkboxes.is(":checked"));
            });
            $("#click").click(function() {
                voi("select your option");
                var array = [];
                $("input:checkbox[name=type]:checked").each(function() {
                    array.push($(this).val());
                });
                Swal.fire({
                    title: 'Select Your Option',
                    showDenyButton: true,
                    confirmButtonText: 'Proceed Payment',
                    denyButtonText: `Cancel`,
                }).then((result) => {
                    if(result.isConfirmed)
                    {
                    voi('You had Selected Proceed Payment');
                    $.ajax({
                        url:"../backend/confirms.php",
                        method:"post",
                        async:false,
                        data:{
                            "array":array
                        },
                        success:function(data)
                        {
                          window.location.replace('payment.php?%20tableno='+tab)
                          setTimeout(function(){
                            $('input:checkbox').not(this).prop('checked', false);
                          },1000);
                        }
                    }); 
                  }
                  else{
                    $('input:checkbox').not(this).prop('checked', false);
                  }
                })
            });
        </script>
        <script>
            function play(){
                voi('Are You Sure For Cancelling Your table ?');
                signout();
            }
        </script>

</body>

</html>