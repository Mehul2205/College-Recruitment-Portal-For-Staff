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

if(isset($_GET['experience_defense']))
{
    $sql="DELETE FROM `expsummary` WHERE id='".$_SESSION['id']."';";
    $conn->query($sql);

    $description = $_GET['description'];
    $stmt = $conn->prepare("INSERT INTO `expsummary` (`id`, `description`) VALUES (?,?)");
    $stmt->bind_param("ss", $_SESSION['id'], $description);
    $stmt->execute();

}

$sql1 = "SELECT description FROM `expsummary` WHERE id='".$_SESSION['id']."';";
$result = $conn->query($sql1);
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
    $description1 = $row['description'];
	}
}else{
    $description1 = NULL;
}

?>
<!DOCTYPE html>
<html lang="en" class=" "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="scroll-viewwport" content="width=device-width, initial-scale=1">

    <title>Experience Summary</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    
    <link href="css/select2.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
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
                                <h3>Experience Summary</h3>
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
                                            <form>
                                                <div class="form-group">
                                                    <label class="col-sm-6 control-label" for="id_description">Describe your last work experience</label>
                                                    <textarea class="form-control" cols="40" id="id_description" name="description" rows="10" placeholder="<?php echo htmlspecialchars($description1); ?>"></textarea>									
                                                    <p class="help-block"><small>This field must be within 2000 characters. In case you want to add more details add details in a separate page and attach it with application form</small></p>
                                                </div>	
                                                <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
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