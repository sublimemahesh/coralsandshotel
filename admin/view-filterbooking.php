<?php
require_once './php-header.php';

$id = $_GET['id'];
$datein = $_GET['date1'];
$dateout = $_GET['date2'];
$BOOKING = new Booking($id);

$rooms = BookingRoomDetails::getRoomTypeDetailsByID($id);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Coral Sand Hotel - Admin Panel</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <link href="css/custome.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/booking.css" rel="stylesheet" type="text/css"/>
        <link href="../js/plugins/sweet-alert-2/sweetalert2.min.css" rel="stylesheet" type="text/css"/>

        <style>
            .filter {
                margin: 30px 4px 30px;
            }
        </style>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <?php include './header.php'; ?>
            <?php include './sidebar-menu.php'; ?>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        View Booking (<?php echo '#' . $id; ?>)
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="booking-manager.php"><i class="fa fa-list"></i> Booking Manager</a></li>
                        <li>View Booking</li>
                    </ol>
                </section>

                <div class="container">
                    <div class="final-listing filter">
                        <div class="row">
                            <div class="col-xs-3">
                                <ul>
                                    <li>Name:</li>
                                    <li>Country:</li>
                                    <li>Email:</li>
                                    <li>Phone:</li>
                                    <li>Total Amount:</li>
                                    <li>Advance Payment:</li>
                                    <li>Status:</li>
                                </ul>
                            </div>
                            <div class="col-xs-9">
                                <ul>
                                    <li><?php echo $BOOKING->name; ?></li>
                                    <li><?php echo $BOOKING->country; ?></li>
                                    <li><?php echo $BOOKING->email; ?></li>
                                    <li><?php echo $BOOKING->contact; ?></li>
                                    <li><?php echo $BOOKING->total; ?></li>
                                    <li><?php echo $BOOKING->advance; ?></li>
                                    <li>
                                        <?php
                                        if ($BOOKING->status == 0) {
                                            echo 'Unpaid';
                                        } elseif ($BOOKING->status == 1) {
                                            echo 'Paid';
                                        } else {
                                            echo 'Canceled';
                                        }
                                        ?></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6">
                                <div class="final-dates">
                                    <span>Checkin:</span> <span><?php echo $BOOKING->checkin; ?></span>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="final-dates">
                                    <span>Checkout:</span> <span><?php echo $BOOKING->checkout; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <table id="final-table" class="table table-striped">
                                    <tr>
                                        <th>Type</th>
                                        <th>Basis</th>
                                        <th>Extra Beds</th>
                                        <th>Adults</th>
                                        <th>Children</th>
                                        <th>Children's Ages</th>
                                    </tr>

                                    <?php
                                    foreach ($rooms as $room) {
                                        ?>
                                        <tr>
                                            <th>
                                                <?php
                                                $roomtype = RoomType::getAllRoomTypeById($room['room_type']);
                                                echo $roomtype['room_type'];
                                                ?>
                                            </th>
                                            <th>
                                                <?php
                                                $roombasis = RoomBasis::getRoomBasisById($room['room_basis']);
                                                echo $roombasis['name'];
                                                ?>
                                            </th>
                                            <th><?php
                                            if ($room['no_of_extra_beds']) {
                                                echo $room['no_of_extra_beds'];
                                            } else {
                                                echo '0';
                                            }
                                                ?></th>
                                            <th><?php echo $room['no_of_adults']; ?></th>
                                            <th><?php echo $room['no_of_children']; ?></th>
                                            <th><?php
                                                if ($room['children_ages']) {
                                                    echo $room['children_ages'];
                                                } else {
                                                    echo '0';
                                                }
                                                ?></th>
                                        </tr>
    <?php
}
?>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2 col-md-offset-10 btns">
                                <a href='filter-bookings.php?date1=<?php echo $datein; ?>&date2=<?php echo $dateout; ?>'><button class="btn btn-primary pull-right">Back</button></a>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
<?php include './footer.php'; ?>

        <div class="control-sidebar-bg"></div>

        <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="plugins/fastclick/fastclick.js"></script>
        <script src="dist/js/app.min.js"></script>
        <script src="dist/js/demo.js"></script>
        <script src="js/booking.js" type="text/javascript"></script>
        <script src="js/script-cancel.js" type="text/javascript"></script>

        <script src="plugins/jquery-datatable/jquery.dataTables.js" type="text/javascript"></script>
        <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js" type="text/javascript"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js" type="text/javascript"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js" type="text/javascript"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js" type="text/javascript"></script>
        <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js" type="text/javascript"></script>
        <script src="plugins/jquery-datatable/extensions/export/jszip.min.js" type="text/javascript"></script>
        <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js" type="text/javascript"></script>
        <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js" type="text/javascript"></script>
        <script src="js/tables/jquery-datatable.js" type="text/javascript"></script>
        <script src="../js/plugins/sweet-alert-2/sweetalert2.min.js" type="text/javascript"></script>

    </body>
</html>