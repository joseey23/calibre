<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('Already Subscribed.');</script>";
}
else{
$sql="INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Subscribed successfully.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}
?>

<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <h6>About Us</h6>
                    <ul>


                        <li><a href="page.php?type=aboutus">About Us</a></li>
                        <li><a href="page.php?type=faqs">FAQs</a></li>
                        <li><a href="page.php?type=privacy">Privacy</a></li>
                        <li><a href="page.php?type=terms">Terms of use</a></li>

                    </ul>
                </div>
                <div class="col-md-6">
                    <h6>OUR CAR TYPES</h6>
                    <ul>
                        <li><a href="car-listing.php">Ractis</a></li>
                        <li><a href="car-listing.php">Fielder</a></li>
                        <li><a href="car-listing.php">Probox</a></li>
                        <li><a href="car-listing.php">Voxy</a></li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <h6>Calibre Auto Lease is an organized company that rents cars and other vehicles to clients at
                        lower costs. We we are here to serve every Kenyan Citizen</h6>

                </div>


            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-push-6 text-left">
                        <div class="footer_widget">
                            <p>Connect with Us:</p>
                            <ul>
                                <li><a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                                <li><a href="http://twitter.com/joseey23"><i class="fa fa-twitter-square"
                                            aria-hidden="true"></i></a></li>
                                <li><a href=""><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-pull-6">
                        <p class="copy-left">Copyright &copy; <?php echo date("Y") ?> Calibre Auto Lease. All Rights
                            Reserved | Designed by Joseph Maruria.</p>
                    </div>
                </div>
            </div>
        </div>
</footer>