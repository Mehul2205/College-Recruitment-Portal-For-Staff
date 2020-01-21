<?php
require 'rec_stf_server.php';
session_start();

$firstname=$_SESSION['name'];
$lastname=$_SESSION['lastname'];
$img_url="images/".$_SESSION['id'].".jpg";
$department=$_SESSION['department'];
$post=$_SESSION['post'];
if(!file_exists($img_url))
{
    $img_url = "images/generic.jpg";
}

if(isset($_GET['emergency_phone_number']))
{
    $emergency_phone_number = $_GET['emergency_phone_number'];
    $alternate_email = $_GET['alternate_email'];

    $sql="DELETE FROM `contact` WHERE id='".$_SESSION['id']."';";
    $conn->query($sql);

    $sql="INSERT INTO `contact` (`id`, `emergency_phone_number`, `alternate_email`) VALUES ('".$_SESSION['id']."', '".$emergency_phone_number."', '".$alternate_email."')";
    $conn->query($sql);
}
$sql1 = "SELECT emergency_phone_number,alternate_email FROM `contact` WHERE id='".$_SESSION['id']."';";
$result = $conn->query($sql1);
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
		$ph1 = $row["emergency_phone_number"];
		$alter_email = $row["alternate_email"];
	}
}else{
	$ph1 = "";
	$alter_email = "";
}

?>
<!DOCTYPE html>
<html lang="en" class=" "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="scroll-viewwport" content="width=device-width, initial-scale=1">

    <title>Contact</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    
    <link href="css/select2.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md" cz-shortcut-listen="true">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                
            <?php include "./rec_stf_header.shtml" ?>

                <!-- page content -->
                <div class="right_col" role="main" style="min-height: 1087px;">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Contact Information</h3>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Please provide your latest information for the post of <?php  echo " ".$post."(".$department.")" ?></h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">


                                        <div class="jumbotron">
                                            <form method="get" action="">

                                                <div class="form-group">
                                                    <label for="emergency_phone_number">Emergency phone number</label>
													
                                                    <input class="form-control" id="emergency_phone_number" maxlength="16" name="emergency_phone_number" type="text" placeholder="<?php echo htmlspecialchars($ph1); ?>">
                                                    <p class="help-block"><small>Phone number must be entered in the format: '+91-9123456789'. +91 is the country code of India. If it is a Landline number, ommit preceding 0</small></p>
                                                </div>

                                                <div class="form-group">
                                                    <label for="id_alternate_email">Alternate email</label>
                                                    <input class="form-control" id="alternate_email" maxlength="128" name="alternate_email" type="email" placeholder="<?php echo htmlspecialchars($alter_email); ?>">
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Submit</button>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->
            </div>
        </div>

        <!-- jQuery -->

        <script src="js/jquery.min.js.download"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js.download"></script>
        <!-- FastClick -->
        <script src="js/fastclick.js.download"></script>
        <!-- NProgress -->
        <script src="js/nprogress.js.download"></script>
        <script src="js/jquery.easypiechart.min.js.download"></script>
        <script src="js/bootstrap-progressbar.min.js.download"></script>

        <script src="js/moment.min.js.download"></script>
        <script src="js/daterangepicker.js.download"></script>
        <script src="js/daterangepicker.js.download"></script>
        <script src="js/select2.full.min.js.download"></script>

        <!-- Custom Theme Scripts -->
        <script src="js/custom.min.js.download"></script>
        <script type="text/javascript">
        </script>
    </body>
</html>