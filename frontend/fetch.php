<?php
include '../backend/dbconnection.php';
$get_num = $_GET["tab"];
$sum = 0;
$sql = "select *from confirm where Tableno='$get_num'";
$execute = mysqli_query($connection, $sql);
$sqld = "select *from confirm where Tableno='$get_num'";
$executed = mysqli_query($connection, $sqld);
while ($cool = mysqli_fetch_array($executed)) {
    $sum = $sum + $cool[5];
}
$inf = "select *from tablereservation where Tableno='$get_num'";
$infe = mysqli_query($connection, $inf);
@$fe = mysqli_fetch_array($infe);
$count = mysqli_num_rows($infe);
?>
<style type="text/css">
    .table {
        margin: 0 auto;
        width: 80%;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Food-Delights</title>
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script src="../middleware/tabledetails.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../middleware/managergettables.js"></script>
    <script src="../middleware/manent.js"></script>
    <script src="../middleware/mremove.js"></script>
    <script src="../middleware/maniteup.js"></script>
    <!-- =======================================================
  * Template Name: Restaurantly - v3.7.0
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
    #table {
        display: inline-block;
        margin-left: 0em;
    }

    tr,
    td {
        color: white;
    }

    #oop {
        width: 40em;
    }

    th {
        color: #cda45e;
    }
</style>

<body>
    <main id="main">
        <section id="book-a-table" class="book-a-table">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Manager-panel</h2>
                    <p>Table Status</p>
                </div>
                <?php
                if ($count != 0) {
                ?>
                    <table class="table table-bordered" style="width:50%">
                        <tbody>
                            <tr>
                                <th scope="row">Name</th>
                                <td><?php echo $fe[0]; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Phno</th>
                                <td><?php echo $fe[1]; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Tableno</th>
                                <td><?php echo $fe[3]; ?>(<?php echo $fe[2]; ?>)</td>
                            </tr>
                            <tr>
                                <th scope="row">Bill</th>
                                <td>&#8377; <?php echo $sum; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Bill-Status</th>
                                <td><?php echo "Not Paid"; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Table Status</th>
                                <td><a type="button" class="btn btn-success" onclick="execute('<?php echo $get_num; ?>')">Vacate</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <table id="example" class="table table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Itemname</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>OrderTime</th>
                                <th>DeliveryTime</th>
                                <th>Delivery Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($fetch = mysqli_fetch_array($execute)) {
                                $tableno = $fetch[2];
                                $candid = $fetch[6];
                            ?>
                                <tr>
                                    <td><?php echo $fetch[9]; ?></td>
                                    <td><?php echo $fetch[4]; ?></td>
                                    <td><?php echo $fetch[5]; ?></td>
                                    <td><?php echo $fetch[10]; ?></td>
                                    <td><?php echo $fetch[11]; ?></td>
                                    <td><?php echo $fetch[13]; ?></td>
                                    <td><?php echo $fetch[14]; ?></td>
                                    <td>
                                        <?php
                                        if ($fetch[16] != "Delivered") {
                                        ?>
                                            <a style="color:red;cursor:pointer;" onclick="update('<?php echo $tableno; ?>','<?php echo $candid; ?>')"><?php echo $fetch[16]; ?></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a style="color:green;"><?php echo $fetch[16]; ?></a>&ensp;<i class="fas fa-check-circle"></i>
                                        <?php
                                        }
                                        ?>
                                    </td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                } else {
                ?>
                    <img id="oop" src="../assets/images/oops.svg" class="img-responsive center-block d-block mx-auto" alt="">
                <?php
                }
                ?>
            </div>
            </script>
        </section>
    </main>
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                searching: false,
                paging: false,
                info: false
            });
        });
    </script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
</body>

</html>