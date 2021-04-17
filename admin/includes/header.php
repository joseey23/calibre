<style>
.header-right {
    float: left;
    width: 5%;
    padding: 10px 20px;
    background: #222;
</style>

<div class="brand clearfix">
    <a href="dashboard.php" style="font-size: 20px;">Calibre Auto Lease | Admin Panel</a>
    <span class="menu-btn"><i class="fa fa-bars"></i></span>


    <div class="header-right">
        <div class="profile_details_left">
            <!--notifications of menu start -->
            <ul class="nofitications-dropdown">
                <?php
$ret1=mysqli_query($dbh,"select id,userEmail from  tblbooking where Status=''");
$num=mysqli_num_rows($ret1);

?>
                <li class="dropdown head-dpdn">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                            class="fa fa-bell"></i><span class="badge blue"><?php echo $num;?></span></a>

                    <ul class="dropdown-menu">
                        <li>
                            <div class="notification_header">
                                <h3>You have <?php echo $num;?> new notification</h3>
                            </div>
                        </li>
                        <li>

                            <div class="notification_desc">
                                <?php if($num>0){
while($result=mysqli_fetch_array($ret1))
{
            ?>
                                <a class="dropdown-item"
                                    href="manage-bookings.php?viewid=<?php echo $result['ID'];?>">New appointment
                                    received from <?php echo $result['userEmail'];?> </a><br />
                                <?php }} else {?>
                                <a class="dropdown-item" href="manage-bookings.php">No New Appointment Received</a>
                                <?php } ?>

                            </div>
                            <div class="clearfix"></div>
                            </a>
                        </li>


                        <li>
                            <div class="notification_bottom">
                                <a href="manage-bookings.php">See all notifications</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
            <div class="clearfix"> </div>
        </div>
    </div>

    <ul class="ts-profile-nav">

        <li class="ts-account">
            <a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i
                    class="fa fa-angle-down hidden-side"></i></a>
            <ul>
                <li><a href="change-password.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>
</div>