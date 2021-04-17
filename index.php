<?php
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Calibre Auto Lease</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <link href="assets/css/slick.css" rel="stylesheet">
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all"
        data-default-color="true" />
    <link rel="stylesheet" type="text/css" href="assets/css/reset.css">


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<style>
.banner-section {
    background-image: url("image/Calibre.jpg");
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    padding: 160px 0;
    position: relative;
}
</style>

<body>





    <?php include('includes/header.php'); ?>

    <section id="banner" class="banner-section">
    </section>

    <section class="section-padding gray-bg">
        <div class="container">
            <div class="section-header text-center">
                <h2>CALIBRE AUTO LEASE <span>We care for you</span></h2>
                <p>CALIBRE AUTO LEASE IS AN ORGANIZED COMPANY THAT RENTS CARS AND OTHER VEHICLES TO CLIENTS AT LOWER
                    COSTS. WE WE ARE HERE TO SERVE EVERY KENYAN CITIZEN.</p>
            </div>
            <div class="row">


                <div class="recent-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#resentnewcar" role="tab" data-toggle="tab">This
                                are cars which are available now.</a></li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="resentnewcar">

                        <?php $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
              foreach ($results as $result) {
            ?>

                        <div class="col-list-3">
                            <div class="recent-car-list">
                                <div class="car-info-box"> <a
                                        href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img
                                            src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>"
                                            class="img-responsive" alt="image"></a>
                                    <ul>
                                        <li><i class="fa fa-car"
                                                aria-hidden="true"></i><?php echo htmlentities($result->FuelType); ?>
                                        </li>
                                        <li><i class="fa fa-calendar"
                                                aria-hidden="true"></i><?php echo htmlentities($result->ModelYear); ?>
                                            Model</li>
                                        <li><i class="fa fa-user"
                                                aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity); ?>
                                            seats</li>
                                    </ul>
                                </div>
                                <div class="car-title-m">
                                    <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?>
                                            , <?php echo htmlentities($result->VehiclesTitle); ?></a></h6>
                                    <span class="price">Ksh<?php echo htmlentities($result->PricePerDay); ?> /Day</span>
                                </div>
                                <div class="inventory_info_m">
                                    <p><?php echo substr($result->VehiclesOverview, 0, 70); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php }
            } ?>

                    </div>
                </div>
            </div>
    </section>








    <!--Footer -->
    <?php include('includes/footer.php'); ?>

    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>

    <?php include('includes/login.php'); ?>



    <?php include('includes/registration.php'); ?>




    <?php include('includes/forgotpassword.php'); ?>



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/interface.js"></script>
    <script src="assets/switcher/js/switcher.js"></script>
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <!--Slider-JS-->
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
    $('input[name="check_in_date"]').daterangepicker();
    </script>

</body>

</html>