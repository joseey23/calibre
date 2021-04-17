<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from  tblsubscribers  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$msg="Subscriber info deleted";

}


 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>Calibre Auto Lease |Admin reports </title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <!-- Bootstrap social button library -->
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <!-- Bootstrap file input -->
    <link rel="stylesheet" href="css/fileinput.min.css">
    <!-- Awesome Bootstrap checkbox -->
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <!-- Admin Stye -->
    <link rel="stylesheet" href="css/style.css">

    <style>
    .errorWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #dd3d36;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }

    .succWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #5cb85c;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }
    </style>

    <link href="css/bootstrap-responsive.css" rel="stylesheet">


    <link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="tcal.css" />
    <script type="text/javascript" src="tcal.js"></script>
    <script language="javascript">
    function Clickheretoprint() {
        var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
        disp_setting += "scrollbars=yes,width=700, height=400, left=100, top=25";
        var content_vlue = document.getElementById("content").innerHTML;

        var docprint = window.open("", "", disp_setting);
        docprint.document.open();
        docprint.document.write(
            '</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">'
        );
        docprint.document.write(content_vlue);
        docprint.document.close();
        docprint.focus();
    }
    </script>

</head>

<body>
    <?php include('includes/header.php');?>

    <div class="ts-main-content">
        <?php include('includes/leftbar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title"> Reports</h2>
                        <a href="dashboard.php"><button class="btn btn-default btn-large" style="float: none;"><i
                                    class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
                        <button style="float:right;" class="btn btn-success btn-mini"><a
                                href="javascript:Clickheretoprint()"> Print</button></a>
                        <!-- Zero Configuration Table -->


                        <div class="content" id="content">
                            <div class="panel-heading">Reports Details</div>
                            <div class="panel-body">

                                <div style="margin-top: -19px; margin-bottom: 21px;">

                                    <?php if($error){?><div class="errorWrap">
                                        <strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                                    </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                    <table id="zctb" class="display table table-striped table-bordered table-hover"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>VehiclesTitle</th>
                                                <th>VehiclesBrand</th>
                                                <th>VehiclesOverview</th>
                                                <th>PricePerDay</th>
                                                <th>FuelType</th>
                                                <th>ModelYear</th>
                                                <th>SeatingCapacity</th>

                                                <th>Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php $sql = "SELECT id,VehiclesTitle,VehiclesBrand,VehiclesOverview,PricePerDay,FuelType,ModelYear,SeatingCapacity FROM tblvehicles";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt);?></td>
                                                <td><?php echo htmlentities($result->VehiclesTitle);?></td>

                                                <td><?php echo htmlentities($result->VehiclesBrand);?></td>
                                                <td><?php echo htmlentities($result->VehiclesOverview);?></td>

                                                <td><?php echo htmlentities($result->PricePerDay);?></td>
                                                <td><?php echo htmlentities($result->FuelType);?></td>

                                                <td><?php echo htmlentities($result->ModelYear);?></td>

                                                <td><?php echo htmlentities($result->SeatingCapacity);?></td>

                                                <td>


                                                    <a href="vehiclereport.php?del=<?php echo $result->id;?>"
                                                        onclick="return confirm('Do you want to delete');"><i
                                                            class="fa fa-close"></i></a>
                                                </td>

                                            </tr>
                                            <?php $cnt=$cnt+1; }} ?>

                                        </tbody>
                                    </table>



                                </div>
                            </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Loading Scripts -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap-select.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
        <script src="js/Chart.min.js"></script>
        <script src="js/fileinput.js"></script>
        <script src="js/chartData.js"></script>
        <script src="js/main.js"></script>
</body>

<script src="js/jquery.js"></script>
<script type="text/javascript">
$(function() {


    $(".delbutton").click(function() {

        //Save the link in a variable called element
        var element = $(this);

        //Find the id of the link that was clicked
        var del_id = element.attr("id");

        //Built a url to send
        var info = 'id=' + del_id;
        if (confirm("Sure you want to delete this update? There is NO undo!")) {

            $.ajax({
                type: "GET",
                url: "deletesales.php",
                data: info,
                success: function() {

                }
            });
            $(this).parents(".record").animate({
                    backgroundColor: "#fbc7c7"
                }, "fast")
                .animate({
                    opacity: "hide"
                }, "slow");

        }

        return false;

    });

});
</script>

</html>
<?php } ?>